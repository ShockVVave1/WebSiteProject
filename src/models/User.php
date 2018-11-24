<?php
/**
 * Created by PhpStorm.
 * User: Денис
 * Date: 12.11.2018
 * Time: 20:21
 */

/**
 * Class User
 * Класс модели для работы с данными пользователя из БД или содержит общие фнкции
 */
class User{

    /**
     * @param $name
     * @param $email
     * @param $password
     * @return bool
     * Функция записи нового пользователя в БД
     */
    public static function register($name,$email,$password){
        $db = DB::getConnection();

        $sql = 'INSERT INTO db_wsite.ws_users (nickname, email, password) '
            .'VALUES (:name, :email, :password)';

        $result = $db->prepare($sql);
        $result->bindParam(':name',$name, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);

        return $result->execute();
    }

    /**
     * @param $name
     * @return bool
     * Функция по проверки имени на валидность
     */
    public  static function checkName($name){
        if(strlen($name)>2){
            return true;
        }
        return false;
    }

    /**
     * @param $password
     * @return bool
     * Функция по проверки пароля на валидность
     */
    public  static function checkPassword($password){
        if(strlen($password)>=6){
            return true;
        }
        return false;
    }

    /**
     * @param $email
     * @return bool
     * Функция проверки почты на валидность
     */
    public  static function checkEmail($email){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            return true;
        }
        return false;
    }

    /**
     * @param $email
     * @return bool
     * Функция проверки почты на уникальность
     */
    public static function checkEmailExists($email){

        $db = DB::getConnection();

        $sql = 'SELECT COUNT(*) FROM db_wsite.ws_users WHERE email = :email';

        $result = $db->prepare($sql);
        $result -> bindParam(':email',$email, PDO::PARAM_STR);
        $result ->execute();

        if($result->fetchColumn())
            return true;
        return false;
    }

    /**
     * @param $name
     * @return bool
     * Функция проверки логина на уникальность
     */
    public static function checkNameExists($name){

        $db = DB::getConnection();

        $sql = 'SELECT COUNT(*) FROM db_wsite.ws_users WHERE nickname = :name';

        $result = $db->prepare($sql);
        $result -> bindParam(':name',$name, PDO::PARAM_STR);
        $result ->execute();

        if($result->fetchColumn())
            return true;
        return false;
    }

    /**
     * @param $email
     * @param $password
     * @return bool
     * Аутентификация пользователя
     */
    public  static function checkUserDate($email,$password){

        $db = DB::getConnection();

        $sql = 'SELECT * FROM db_wsite.ws_users WHERE  email = :email;';

        $result = $db->prepare($sql);
        $result->bindParam(':email',$email, PDO::PARAM_STR);
        $result->execute();

        $user = $result->fetch();
        if($user){
            if( password_verify($password , $user['password'])){
                return $user['user_id'];
            }
        }

        return false;
    }

    /**
     * @param $userId
     * Авторизация пользователя
     */
    public  static function auth($userId){

        $_SESSION['user'] = $userId;

    }

    /**
     * @return mixed
     * Проверка авторизованности пользователя c перенаправлением
     */
    public static function checkLogged(){

        if(isset($_SESSION['user'])){
            return $_SESSION['user'];
        }

        header("Location: /WebsiteProject/user/login");
    }

    /**
     * @return bool
     * Проверка авторизованности пользователя с возвращением флага
     */
    public static function isGuest(){

        if(isset($_SESSION['user'])){
            return true;
        }
        return false;

    }

    /**
     * Функция разлогивания пользователя
     */
    public static function logout(){
        if(isset($_SESSION['user'])){
           unset($_SESSION['user']);
        }
    }

    /**
     * @param $userId
     * @return mixed
     * Получения данных пользователя по id
     */
    public static function getUserById($userId){


        if($userId){
            $db = DB::getConnection();

            $sql='SELECT * FROM db_wsite.ws_users WHERE user_id = :user_id';

            $result = $db->prepare($sql);
            $result -> bindParam(':user_id',$userId,PDO::PARAM_INT);

            $result->setFetchMode(PDO::FETCH_ASSOC);
            $result->execute();

            return $result->fetch();
        }
    }

    /**
     * @param $userId
     * @param $name
     * @param $password
     * @return bool
     * Функция редактирования данных пользователя
     */
    public static function edit($userId , $name , $password){

        if(strlen($password)>5) {
            $setpass = ', password = :password ';
        }else {
            $setpass = '';
        }

        if(isset($userId)){

            try{
                $db = DB::getConnection();


                $sql = 'UPDATE db_wsite.ws_users 
                        SET nickname = :name'.$setpass.
                        ' WHERE user_id = :id';
                $result = $db->prepare($sql);
                $result->bindParam(':id' , $userId ,PDO::PARAM_INT);
                $result->bindParam(':name' , $name ,PDO::PARAM_STR);
                if(strlen($password)>5) {
                    $result->bindParam(':password' , $password ,PDO::PARAM_STR);
                }
                return $result->execute();

            }catch (PDOException $e){
                echo $e->getMessage();
            }


        }



    }


    /**
     * @param $userId
     * @return mixed
     * Функция получения телефона пользователя по id
     */
    public static function getUserPhone($userId){

        try{

            $db = DB::getConnection();

            $sql = 'SELECT tel FROM db_wsite.ws_users WHERE user_id=:user_id';

            $result = $db->prepare($sql);
            $result->bindParam(':user_id' , $userId ,PDO::PARAM_INT);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $result->execute();

            return $result->fetch();

        }catch (PDOException $e){
            echo $e->getMessage();
        }
    }











}


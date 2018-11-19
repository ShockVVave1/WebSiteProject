<?php
/**
 * Created by PhpStorm.
 * User: Денис
 * Date: 12.11.2018
 * Time: 20:21
 */

class User{


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

    public  static function checkName($name){
        if(strlen($name)>2){
            return true;
        }
        return false;
    }

    public  static function checkPassword($password){
        if(strlen($password)>=6){
            return true;
        }
        return false;
    }

    public  static function checkEmail($email){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            return true;
        }
        return false;
    }

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

    public  static function auth($userId){

        $_SESSION['user'] = $userId;

    }

    public static function checkLogged(){

        if(isset($_SESSION['user'])){
            return $_SESSION['user'];
        }

        header("Location: /WebsiteProject/user/login");
    }

    public static function isGuest(){

        if(isset($_SESSION['user'])){
            return true;
        }
        return false;

    }

    public static function logout(){
        if(isset($_SESSION['user'])){
           unset($_SESSION['user']);
        }
    }

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

    public static function edit($userId , $name , $password){

        if(isset($userId)){

            try{
                $db = DB::getConnection();


                $sql = 'UPDATE db_wsite.ws_users 
                        SET nickname = :name, password = :password
                        WHERE user_id = :id';

                $result = $db->prepare($sql);
                $result->bindParam(':id' , $userId ,PDO::PARAM_INT);
                $result->bindParam(':name' , $name ,PDO::PARAM_STR);
                $result->bindParam(':password' , $password ,PDO::PARAM_STR);
                return $result->execute();

            }catch (PDOException $e){
                echo $e->getMessage();
            }


        }



    }











}


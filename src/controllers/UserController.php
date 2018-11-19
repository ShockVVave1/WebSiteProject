<?php
/**
 * Created by PhpStorm.
 * User: Денис
 * Date: 12.11.2018
 * Time: 18:18
 */

/**
 * Class UserController
 * Класс отвечающий за основные действия аккаунтов
 */
class UserController{

    /**
     * @return bool
     * Функция авторизации пользователя
     */
    public function actionLogin(){
        $password='';
        $email='';


        if(isset($_POST['submit'])){
            $password  = $_POST['password'];
            $email = $_POST['email'];

            $errors=false;



            if(User::checkEmail($email)){
                echo "<br> $email ok";
            }else{
                $errors[]='Неправильный email';
            }

            $userId = User::checkUserDate($email,$password);

            if($userId == false){
                $errors[]='Неправильные данные для входа на сайт';
            }else{
                User::auth($userId);

                header("Location: /WebsiteProject/cabinet/");

            }

        }
        require_once (ROOT.'/src/views/user/login.php');

        return true;
    }


    /**
     * @return bool
     * Функция регистрации пользователя
     */
    public function actionRegister(){

        $name='';
        $password='';
        $email='';



        if(isset($_POST['submit'])){
            $name = $_POST['login'];
            $password  = $_POST['password'];
            $email = $_POST['email'];

            $errors=false;

            if(User::checkName($name)){
                echo "<br> $name ok";
            }else{
                $errors[]='Имя не должно быть короче 2-х символов';
            }

            if(User::checkEmail($email)){
                echo "<br> $email ok";
            }else{
                $errors[]='Неправильный email';
            }

            if(User::checkPassword($password)){
                echo "<br> $password ok";
            }else{
                $errors[]='Пароль не должен быть короче 6-ти символов';
            }

            if(User::checkEmailExists($email)){
                $errors[]='Данная почта уже зарегестрирована';
            }

            if ($errors==false){
                $hash_password = password_hash($password,PASSWORD_DEFAULT);
                $result = User::register($name,$email,$hash_password);
            }

        }
        require_once (ROOT.'/src/views/user/register.php');

        return true;
    }

    /**
     *  Функция выхода из авторизованного аккаунта
     */
    public function actionLogout(){

        User::logout();
        header("Location: /WebsiteProject/user/login");

    }


}

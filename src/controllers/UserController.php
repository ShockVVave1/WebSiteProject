<?php
/**
 * Created by PhpStorm.
 * User: Денис
 * Date: 12.11.2018
 * Time: 18:18
 */

class UserController{

    public function actionRegister(){
        if(isset($_POST['submit'])){

            $name = $_POST['login'];
            $password  = $_POST['password'];
            $email = $_POST['email'];

            if(isset($name)){
                echo '<br>'.$name;
            }
            if(isset($password)){
                echo '<br>'.$password;
            }
            if(isset($email)){
                echo '<br>'.$email;
            }

        }
        require_once (ROOT.'/src/views/user/register.php');

        return true;
    }
}

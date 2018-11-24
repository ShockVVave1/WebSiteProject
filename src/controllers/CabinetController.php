<?php
/**
 * Created by PhpStorm.
 * User: Денис
 * Date: 15.11.2018
 * Time: 13:13
 */

/**
 * Class CabinetController
 * Класс обеспечивающий функции кабинета пользователя
 */
class CabinetController{

    /**
     * @return bool
     * Функция отображения личного кабинета
     */
    public function actionIndex(){

        $userId = User::checkLogged();
        $user = User::getUserById($userId);
        require_once (ROOT.'/src/views/cabinet/index.php');

        return true;
    }

    /**
     * Функция редактировалия профиля пользователя
     */
    public  function actionEdit(){
        $userId = User::checkLogged();
        $user = User::getUserById($userId);

        $name = $user['nickname'];
        $password = $user['password'];

        $result = false;

        if(isset($_POST['submit'])){
            $name = $_POST['name'];
            $password = $_POST['password'];

            $errors = false;

            if(User::checkName($name)){
                echo "<br> $name ok";
            }else{
                $errors[]='Имя не должно быть короче 2-х символов';
            }

            if($password !== '') {
                if (User::checkPassword($password)) {
                    echo "<br> $password ok";
                } else {
                    $errors[] = 'Пароль не должен быть короче 6-ти символов';
                }
            }

            if ($errors==false){
                if($password !== ''){
                    echo 'pass='.$password;
                    $hash_password = password_hash($password,PASSWORD_DEFAULT);
                }else{
                    $hash_password = '';
                }

                $result = User::edit($userId,$name, $hash_password);
            }

        }

        require_once (ROOT.'/src/views/cabinet/edit.php');
    }
}

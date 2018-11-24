<?php
/**
 * Created by PhpStorm.
 * User: Денис
 * Date: 02.11.2018
 * Time: 22:56
 */

/**
 * Class SiteController
 */
class SiteController{

    /**
     * Функция отображения главной страницы
     */
    function actionIndex(){
        $categories = Category::getRealestateCatList();
        $breadcrumbs = Breadcrumbs::getBreadCrumbs();
        $types = Type::getTypes();
        require_once(ROOT . '/src/views/index.php');
    }

    /**
     * Функция отправки письма обратной связи
     */
    public function actionContact(){

        $mail = 'dreemkiller69@gmail.com';
        $subject = 'Тема письма';
        $ymail = 'Ваша почта';

        $subject_value =  '';
        $ymail_value =   '';
        $message_value = '';

        $message = 'Содержание письма';

        if(isset($_POST['submit'])){
            $subject_value =  $_POST['subject'];
            $ymail_value =   $_POST['mail'];
            $message_value = $_POST['message'];

            $errors = false;

            $F_checkLength = function ($value,$num){
                if(strlen($value)>$num){
                    return true;
                }
                return false;
            };

            if($F_checkLength($subject_value,5)){
                echo "<br>$subject_value ok";
            }else{
                $errors[] = 'Тема сообщения должна быть длинее 6 символов';
            };

            if(User::checkEmail($ymail_value)){
                echo "<br>$ymail_value ok";
            }else{
                $errors[] = 'Введен не корректный email';
            };

            if($F_checkLength($message_value,15)){
                echo "<br>$ymail_value ok";
            }else{
                $errors[] = 'Сообщение слишком коротко, опишите более развернуто';
            };

            if ($errors==false){

                $result = mail($mail, $subject, $message);

            }

        }

        require_once (ROOT.'/src/views/site/contacts.php');

        die;
    }
}
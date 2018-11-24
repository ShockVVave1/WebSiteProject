<?php
/**
 * Created by PhpStorm.
 * User: Денис
 * Date: 20.11.2018
 * Time: 17:30
 */

/**
 * Class AjaxController
 * Контроллер с функциями работающие с Ajax
 */
class AjaxController{

    /**
     * @return bool
     * Получение телефона автора по id
     */
    function actionContact(){


        $userId=$_POST['id'];
        $tel = USER::getUserPhone($userId);
        $arr = array( 'tel' => $tel['tel']);
        echo(json_encode($arr));
        return true;
}
}
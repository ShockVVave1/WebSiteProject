<?php
/**
 * Created by PhpStorm.
 * User: Денис
 * Date: 29.10.2018
 * Time: 1:23
 */


class RealestateController{

    //Просмотр списка
    function actionIndex(){
        echo '<br>'.'actionIndex работает';
        return true;
    }

    //Просмотр единичного поста
    function actionView($kind,$category=0,$id=0){
        if(isset($kind))echo '<br>'.$kind;
        if(isset($category))echo '<br>'.$kind;
        if(isset($id))echo '<br>'.$id;
        return true;
    }
}
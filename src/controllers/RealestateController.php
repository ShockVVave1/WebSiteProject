<?php
/**
 * Created by PhpStorm.
 * User: Денис
 * Date: 29.10.2018
 * Time: 1:23
 */

//Подключение модели
include_once ROOT.'/src/models/Realestate.php';

class RealestateController{

    //Просмотр списка
    function actionList($cat){

        $postList = array();
        $postList = Realestate::getRealestateList($cat);
        echo '<pre>';
            print_r($postList);
        echo '</pre>';
        return true;
    }

    //Просмотр списка
    function actionIndex(){

        $postList = array();
        $postList = Realestate::getRealestateList();
        echo '<pre>';
        print_r($postList);
        echo '</pre>';
        return true;
    }

    //Просмотр единичного поста
    function actionView($id=0,$kind=null,$category=null){
        if(isset($kind))echo '<br>'.$kind;
        if(isset($category))echo '<br>'.$category;
        if(isset($id)){
            $postItem = Realestate::getRealestateById($id);
            echo '<pre>';
            print_r($postItem);
            echo '</pre>';
        }
        return true;
    }
}
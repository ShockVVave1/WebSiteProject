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
    function actionList($type , $transaction_type=null, $cat = null ){

        $postList = array();
        $postList = Realestate::getRealestateList($type , $transaction_type, $cat );
        require_once(ROOT . '/src/views/category.php');

       return true;
    }

    //Просмотр списка
    function actionIndex(){

        $postList = array();
        $postList   = Realestate::getRealestateList();

        require_once(ROOT . '/src/views/category.php');

        return true;
    }

    //Просмотр единичного поста
    function actionView($id=0,$kind=null,$category=null){
        if(isset($id)){
            $postItem  = Realestate::getRealestateById($id);
        }

        require_once(ROOT . '/src/views/post.php');

        return true;
    }
}
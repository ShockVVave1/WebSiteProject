<?php
/**
 * Created by PhpStorm.
 * User: Денис
 * Date: 29.10.2018
 * Time: 1:23
 */

//Подключение модели
include_once ROOT.'/src/models/Realestate.php';
include_once ROOT.'/src/models/Category.php';
include_once ROOT.'/src/models/Type.php';

//Подключение модулей;
include_once ROOT.'/src/controllers/Breadcrumbs.php';

class RealestateController{

    //Просмотр списка
    function actionList($transaction_type=null, $cat = null ){

        $postList = array();
        $categories = array();

        if(isset($transaction_type)){

            if(isset($cat)){
                $categories = Category::getRealestateCatList($transaction_type,$cat);
                $postList = Realestate::getRealestateList( $transaction_type, $cat );
                $breadcrumbs = Breadcrumbs::getBreadCrumbs($transaction_type,$cat);
                $types = Type::getTypes();

            }else{
                $categories = Category::getRealestateCatList($transaction_type);
                $postList = Realestate::getRealestateList( $transaction_type);
                $breadcrumbs = Breadcrumbs::getBreadCrumbs($transaction_type);
                $types = Type::getTypes($transaction_type);
            }

        }else{
            $postList = Realestate::getRealestateList( );
            $categories = Category::getRealestateCatList();
            $breadcrumbs = Breadcrumbs::getBreadCrumbs();
            $types = Type::getTypes();
        }
        //TODO Добавить контроллер типов
        // $types = Types::getTypes();
        require_once(ROOT . '/src/views/category.php');

       return true;
    }

    //Просмотр списка
    function actionIndex(){

        $postList = array();
        $postList   = Realestate::getRealestateList();
        $categories = Category::getRealestateCatList();
        //TODO Добавить контроллер типов
       // $types = Types::getTypes();
        require_once(ROOT . '/src/views/category.php');

        return true;
    }

    //Просмотр единичного поста
    function actionView($id=0,$transaction_type=null, $cat = null){
        if(isset($id)){
            $postItem  = Realestate::getRealestateById($id);
            $breadcrumbs = Breadcrumbs::getBreadCrumbs($transaction_type, $cat, $id);
        }
        $categories = Category::getRealestateCatList();
        require_once(ROOT . '/src/views/post.php');

        return true;
    }


}
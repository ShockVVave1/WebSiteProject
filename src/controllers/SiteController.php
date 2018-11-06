<?php
/**
 * Created by PhpStorm.
 * User: Денис
 * Date: 02.11.2018
 * Time: 22:56
 */

//Подключение модели
include_once ROOT.'/src/models/Category.php';
include_once ROOT.'/src/models/Type.php';

//Подключение модулей;
include_once ROOT.'/src/controllers/Breadcrumbs.php';
class SiteController{

    function actionIndex(){
        $categories = Category::getRealestateCatList();
        $breadcrumbs = Breadcrumbs::getBreadCrumbs();
        $types = Type::getTypes();
        require_once(ROOT . '/src/views/index.php');
    }
}
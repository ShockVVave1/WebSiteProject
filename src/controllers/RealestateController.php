
<?php
/**
 * Created by PhpStorm.
 * User: Денис
 * Date: 29.10.2018
 * Time: 1:23
 */



class RealestateController{

    //Просмотр списка
    function actionList($transaction_type=null, $cat = null, $params= '' ){
        $postList = array();
        $categories = array();

        $paramsArray = (Common::getParamsToArray($params));
        $current_page = isset($paramsArray['page']) ? intval($paramsArray['page']) : 1;

        if(isset($transaction_type)){

            if(isset($cat)){
                $categories = Category::getRealestateCatList($transaction_type,$cat);
                $postList = Realestate::getRealestateList($paramsArray, $transaction_type, $cat );
                $breadcrumbs = Breadcrumbs::getBreadCrumbs($transaction_type,$cat);
                $total=Realestate::getTotalPosts($transaction_type,$cat);
                $types = Type::getTypes();
                $catmenu = include_once ROOT.'/src/views/modules/categories.php';
                $pagination = new Pagination($total,$current_page,Realestate::SHOW_BY_DEFAULT,'?page=');

            }else{
                $categories = Category::getRealestateCatList($transaction_type);
                $postList = Realestate::getRealestateList($paramsArray,  $transaction_type);
                $breadcrumbs = Breadcrumbs::getBreadCrumbs($transaction_type);
                $total=Realestate::getTotalPosts($transaction_type);
                $types = Type::getTypes($transaction_type);
                $catmenu = include_once ROOT.'/src/views/modules/categories.php';
                $pagination = new Pagination($total,$current_page,Realestate::SHOW_BY_DEFAULT,'?page=');
            }
        }else{
            $postList = Realestate::getRealestateList( $paramsArray );
            $categories = Category::getRealestateCatList();
            $total=Realestate::getTotalPosts();
            $breadcrumbs = Breadcrumbs::getBreadCrumbs();
            $types = Type::getTypes();
            $pagination = new Pagination($total,$current_page,Realestate::SHOW_BY_DEFAULT,'?page=');
        }
        //TODO Добавить контроллер типов
        // $types = Types::getTypes();
        require_once(ROOT . '/src/views/category.php');

        return true;
    }

    //Просмотр списка
    function actionListt($transaction_type=null, $params= '' ){
        $postList = array();
        $categories = array();
        $paramsArray = (Common::getParamsToArray($params));
        $current_page = isset($paramsArray['page']) ? intval($paramsArray['page']) : 1;
        if(isset($transaction_type)){

            $categories = Category::getRealestateCatList($transaction_type);
            $postList = Realestate::getRealestateList($paramsArray,  $transaction_type);
            $breadcrumbs = Breadcrumbs::getBreadCrumbs($transaction_type);
            $total=Realestate::getTotalPosts($transaction_type);
            $types = Type::getTypes($transaction_type);
            $catmenu = include_once ROOT.'/src/views/modules/categories.php';
            $pagination = new Pagination($total,$current_page,Realestate::SHOW_BY_DEFAULT,'?page=');
        }else{
            $postList = Realestate::getRealestateList( $paramsArray );
            $categories = Category::getRealestateCatList();
            $total=Realestate::getTotalPosts();
            $breadcrumbs = Breadcrumbs::getBreadCrumbs();
            $types = Type::getTypes();
            $pagination = new Pagination($total,$current_page,Realestate::SHOW_BY_DEFAULT,'?page=');
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
            if(isset($transaction_type)){
                if(isset($cat)){
                    $categories = Category::getRealestateCatList($transaction_type, $cat);
                    $postItem  = Realestate::getRealestateById($id);
                    $breadcrumbs = Breadcrumbs::getBreadCrumbs($transaction_type, $cat, $id);
                    $catmenu = include_once ROOT.'/src/views/modules/categories.php';
                }else{
                    $categories = Category::getRealestateCatList($transaction_type);
                    $postItem  = Realestate::getRealestateById($id);
                    $breadcrumbs = Breadcrumbs::getBreadCrumbs($transaction_type, $cat, $id);
                    $catmenu = include_once ROOT.'/src/views/modules/categories.php';
                }
            }
        }
        $categories = Category::getRealestateCatList();
        require_once(ROOT . '/src/views/post.php');

        return true;
    }


}
<?php
/**
 * Created by PhpStorm.
 * User: Денис
 * Date: 02.11.2018
 * Time: 22:56
 */

class SiteController{

    function actionIndex(){
        require_once(ROOT . '/src/views/index.php');
    }
}
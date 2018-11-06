<?php
/**
 * Created by PhpStorm.
 * User: Денис
 * Date: 06.11.2018
 * Time: 12:47
 */
class Breadcrumbs{


    /**
     * @param null $transaction_type
     * @param null $cat
     * @param null $id
     * @return mixed
     */
    public static  function  getBreadCrumbs($transaction_type=null, $cat = null , $id=null){

       return require_once ROOT.'/src/views/layouts/breadcrumbs.php';

    }


}

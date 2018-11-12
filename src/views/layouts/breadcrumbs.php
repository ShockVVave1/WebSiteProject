<?php
/**
 * Created by PhpStorm.
 * User: Денис
 * Date: 06.11.2018
 * Time: 12:56
 */
?>

<?php

$breadcrumbs="";

if(!isset($transaction_type)){
    $breadcrumbs.= "<span>HOME</span>";
}else{
    $breadcrumbs.= "<a href=\"/WebsiteProject/\">HOME</a></a><span>-></span>";
}

if((!isset($cat)) && (isset($transaction_type))){

    $type_name = Type::getTypeByTag($transaction_type)['transaction_type'];
    $breadcrumbs.= "<span>$type_name</span>";

}elseif(isset($transaction_type)){
    $type_name = Type::getTypeByTag($transaction_type)['transaction_type'];
    $breadcrumbs.= "<a href=\"/WebsiteProject/$transaction_type/\">$type_name</a></a><span>-></span>";

}

if((!isset($id)) && (isset($cat))){
    $cat_name = Category::getCatByTag($cat)['category'];
    $breadcrumbs.= "<span>$cat_name</span>";
}elseif(isset($cat)){
    $cat_name = Category::getCatByTag($cat)['category'];
    $breadcrumbs.= "<a href=\"/WebsiteProject/$transaction_type/$cat/\">$cat_name</a></a><span>-></span>";
}

if(isset($id)){
    $breadcrumbs.= "<span>$id</span>";
}

return $breadcrumbs;
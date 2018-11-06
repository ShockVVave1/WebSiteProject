<?php
/**
 * Created by PhpStorm.
 * User: Денис
 * Date: 28.10.2018
 * Time: 0:21
 */

//Возвращает массив рутов

    return array(
        '([a-z]+)/([a-z]+)/([0-9]+)'=>'realestate/view/$3/$1/$2',
        '([a-z]+)/([a-z]+)'=>'realestate/list/$1/$2',
        '([a-z]+)'=>'realestate/list/$1',
        //TODO заменить ebsiteProject на /
        //'ebsiteProject'=>'realestate/list',


        //TODO заменить ebsiteProject на /
        'ebsiteProject'=>'site/index'
    );
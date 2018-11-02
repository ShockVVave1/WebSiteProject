<?php
/**
 * Created by PhpStorm.
 * User: Денис
 * Date: 28.10.2018
 * Time: 0:21
 */

//Возвращает массив рутов

    return array(
        'nedvizhimost/([a-z]+)/([a-z]+)/([0-9]+)'=>'realestate/view/$3/$1/$2',
        'nedvizhimost/([a-z]+)/([a-z]+)'=>'realestate/list/nedvizhimost/$1/$2',
        'nedvizhimost/([a-z]+)'=>'realestate/list/nedvizhimost/$1',
        'nedvizhimost'=>'realestate/list/nedvizhimost',

        'products'=>'products/list',

        //TODO заменить ebsiteProject на /
        'ebsiteProject'=>'site/index'
    );
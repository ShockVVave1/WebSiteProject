<?php
/**
 * Created by PhpStorm.
 * User: Денис
 * Date: 28.10.2018
 * Time: 0:21
 */

//Возвращает массив рутов

    return array(


        'buy/([a-z]+)/([0-9]+)'=>'realestate/view/$2/buy/$1',
        'buy/([a-z]+)((?:[?][a-z]+[=][a-z A-Z 0-9]+)+)'=>'realestate/list/buy/$1',
        'buy/([a-z]+)'=>'realestate/list/buy/$1',
        'buy((?:[?][a-z]+[=][a-z A-Z 0-9]+)+)'=>'realestate/listt/buy',
        'buy'=>'realestate/listt/buy',

        'rent/([a-z]+)/([0-9]+)'=>'realestate/view/$2/rent/$1',
        'rent/([a-z]+)((?:[?][a-z]+[=][a-z A-Z 0-9]+)+)'=>'realestate/list/rent/$1',
        'rent/([a-z]+)'=>'realestate/list/rent/$1',
        'rent((?:[?][a-z]+[=][a-z A-Z 0-9]+)+)'=>'realestate/listt/rent',
        'rent'=>'realestate/listt/rent',


        'ajax/contact' => 'ajax/contact',
        'user/register' => 'user/register',
        'user/login' => 'user/login',
        'user/logout' => 'user/logout',
        'user/edit' => 'user/edit',
        'cabinet/edit' => 'cabinet/edit',
        'cabinet' => 'cabinet/index',
        'contacts'=>'site/contact',
        //TODO заменить ebsiteProject на /
        //'ebsiteProject'=>'realestate/list',


        //TODO заменить ebsiteProject на /
        'ebsiteProject'=>'site/index'


    );
<?php
/**
 * Created by PhpStorm.
 * User: Денис
 * Date: 27.10.2018
 * Time: 22:03
 */

//FRONT CONTROLLER

//1.Общие настройки
ini_set('display_errors', 1);
error_reporting(E_ALL);

//2.Подключение файлов системы
define('ROOT',dirname(__FILE__));
require_once(ROOT.'/src/components/Router.php');

$router = new Router();
$router->run();


//3.Установка соединения с БД


//4.Вызов Router

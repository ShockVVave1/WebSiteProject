<?php
/**
 * Created by PhpStorm.
 * User: Денис
 * Date: 12.11.2018
 * Time: 17:50
 */

/**
 * @param $class_name
 * Подключает компоненты и модели
 */
function component_autoload($class_name){

    $array_paths = array(
        '/src/models/',
        '/src/components/'

    );

    foreach ($array_paths as $path){
        $path = ROOT.$path.$class_name.'.php';
        if(is_file($path)){
            include_once $path;
        }

    }
}

/**
 * Регистрируем автозагрузчик
 */
spl_autoload_register('component_autoload');
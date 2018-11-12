<?php
/**
 * Created by PhpStorm.
 * User: Денис
 * Date: 08.11.2018
 * Time: 16:38
 */


/**
 * Класс который будет содержать общие функции
 * Class Common
 */
class Common{

    public static function getParamsToArray(string $params){
        $segments = explode('?',$params);
        array_shift($segments);
        $paramsArray = array();

        foreach ($segments as $segment){
            $a = array();
            $a=explode('=',$segment);
            $b=array_shift($a);
            $c=array_shift($a);
            $paramsArray[$b] = $c;
        }

        return $paramsArray;

    }



}

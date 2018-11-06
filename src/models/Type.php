<?php
/**
 * Created by PhpStorm.
 * User: Денис
 * Date: 06.11.2018
 * Time: 15:39
 */

/**
 * Class Type
 * Класс для работы с списком типов сделок
 */
class Type{

    /**
     * Возвращает типы
     * @return array
     */
    public static function getTypes($type=null){

        $db = DB::getConnection();
        $types = array();

        $result = $db->query('SELECT * '
        .'FROM db_wsite.ws_transaction_type '
        .'ORDER BY transaction_type DESC ');

        $i=0;
        while($row = $result ->fetch()){
            $types[$i]['transaction_type_id'] = $row['transaction_type_id'];
            $types[$i]['transaction_type'] = $row['transaction_type'];
            $types[$i]['transaction_type_url'] = $row['transaction_type_url'];
            $types[$i]['sort_order'] = $row['sort_order'];
            if($type===$row['transaction_type_url']){
                $types[$i]['current'] = true;
            }else {
                $types[$i]['current'] = false;
            }
            $i++;
        }
        return $types;
    }


    public static function getTypeByTag($type_tag){
        $db = DB::getConnection();

        $result = $db->query('SELECT * '
            .'FROM db_wsite.ws_transaction_type '
            .'WHERE transaction_type_url = \''.$type_tag.'\'');

        return $result->fetch();
    }


}
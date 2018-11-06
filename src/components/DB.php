<?php
/**
 * Created by PhpStorm.
 * User: Денис
 * Date: 01.11.2018
 * Time: 1:36
 */

/**
 * Class DB
 *
 */
class DB{

    /**
     * @return PDO
     */
    public static function getConnection(){
        //Подключения файла конфигурации
        $paramsPath = ROOT.'/src/config/db_params.php';
        $params = include_once ($paramsPath);



        //Инициализация PDO
        try{
            $db =new PDO("mysql:host = ".DB_HOST.";dbname = ".DB_DBNAME,DB_USER, DB_PASS,[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        }catch (PDOException $e){
            echo $e->getMessage();
        }
        //Включение поддержки utf8
        $db->exec('set names utf8');
        return $db;
    }

}
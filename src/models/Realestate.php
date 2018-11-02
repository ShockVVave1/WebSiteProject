<?php
/**
 * Created by PhpStorm.
 * User: Денис
 * Date: 30.10.2018
 * Time: 0:49
 */


Class Realestate{


    /**
     * Возвращает 1 пост
     * @param int $id
     * @return array
     */
    public static function getRealestateById($id)
    {

        $db = DB::getConnection();

        if (isset($id)){
            $id = 'WHERE id = '.$id.' ';
        }

        //Включение поддержки utf8
        $db->exec('set names utf8');
        $result = $db ->query('SELECT * FROM db_wsite.ws_realestate '.$id);

            //TODO Выбрать в каком ввиде возвращаить
            //$result->setFetchMode(PDO::FETCH_NUM);
            $result->setFetchMode(PDO::FETCH_ASSOC);

        $postItem = $result->fetch();

        return $postItem;
    }

    /**
     * Возвращает список постов категории или все
     * @param int $cat
     * @return array
     */
    public static function getRealestateList($type, $transaction_type = null, $cat = null ){

        $db = DB::getConnection();

        $postList = array();

        if (isset($type)){
            $where = 'WHERE type = \''.$type.'\' ';
        }
        if (isset($transaction_type)){
            $where.='AND transaction_type = \''.$transaction_type.'\' ';
        }
        if (isset($cat)){
            $where.='AND category = \''.$cat.'\' ';
        }
        //Включение поддержки utf8
        $db->exec('set names utf8');
        $result = $db ->query('SELECT id, title, date, short_content, category, type, transaction_type '
            .'FROM db_wsite.ws_realestate '
            .$where
            .'ORDER BY date DESC '
            .'LIMIT 10');

        $result->setFetchMode(PDO::FETCH_ASSOC);

        $i = 0;

        while($row = $result->fetch()){
            $postList[$i]['id'] = $row['id'];
            $postList[$i]['title'] = $row['title'];
            $postList[$i]['date'] = $row['date'];
            $postList[$i]['short_content'] = $row['short_content'];
            $postList[$i]['category'] = $row['category'];
            $postList[$i]['type'] = $row['type'];
            $postList[$i]['transaction_type'] = $row['transaction_type'];
            $i++;
        }
        return $postList;
    }

    /**
     * Возвращает список категорий или список дочерних категорий
     * @param int $cat
     */
    public static function  getRealestateCatList($cat=0){

    }


}
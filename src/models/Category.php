<?php
/**
 * Created by PhpStorm.
 * User: Денис
 * Date: 05.11.2018
 * Time: 23:30
 */

class Category
{
    /**
     * Возвращает список категорий или список дочерних категорий
     * @param int $cat
     */
    public static function  getRealestateCatList($transaction_type=null, $cat=null){
        $db = DB::getConnection();

        $categories = array();


        $result =$db-> query('SELECT * '
            .'FROM db_wsite.ws_category '
            .'ORDER BY sort_order ASC');

        $result->setFetchMode(PDO::FETCH_ASSOC);

        $i = 0;

        while($row = $result->fetch()){
            $categories[$i]['category_id'] = $row['category_id'];
            $categories[$i]['category'] = $row['category'];
            $categories[$i]['category_url_tag'] = $row['category_url_tag'];
            $categories[$i]['sort_order'] = $row['sort_order'];
            if($row['category_url_tag']===$cat){
                $categories[$i]['current'] = true;
            }else{
                $categories[$i]['current'] = false;
            }
            $i++;
        }
        return $categories;
    }


    public static function getCatByTag($cat_tag=null){

        $db = DB::getConnection();

        $result =$db-> query('SELECT * '
            .'FROM db_wsite.ws_category '
            .'WHERE category_url_tag =\''.$cat_tag.'\'');

        return $result->fetch();
    }

}
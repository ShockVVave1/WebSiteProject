<?php
/**
 * Created by PhpStorm.
 * User: Денис
 * Date: 07.11.2018
 * Time: 13:45
 */
?>

<?php
    $catmenu='';
    $current_type_tag='';

        if(isset($transaction_type)){
            $current_type_tag = $transaction_type;
        }

    $cat = isset($cat)? $cat : '';?>


    <?php foreach($categories as $category){
    $category_url_tag = $category['category_url_tag'];
    if($cat == $category_url_tag){
        $catmenu .= "<p><span>".$category['category']."</span></p>";
    }else{
        $catmenu .= "<p><a href=\"$current_type_tag/".$category['category_url_tag']."\">".$category['category']."</a></p>";
    }


    }
    return $catmenu;
    ?>
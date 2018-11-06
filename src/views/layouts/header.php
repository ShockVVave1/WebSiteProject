<?php
/**
 * Created by PhpStorm.
 * User: Денис
 * Date: 02.11.2018
 * Time: 23:31
 */

?>


<html>
<head>
    <base href="/WebsiteProject/">
</head>
<body>
<header>
    <h1>Header</h1>
    <?php foreach($categories as $category):?>
        <p><a href="<?php echo $category['category_url_tag']; ?>"><?php echo $category['category']; ?></a></p>
    <?php endforeach;?>
</header>

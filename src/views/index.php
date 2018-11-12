<?php
/**
 * Created by PhpStorm.
 * User: Денис
 * Date: 02.11.2018
 * Time: 23:24
 */


?>
    <html>
    <head>
        <base href="/WebsiteProject/">
    </head>
<body>
<header>
    <h1>Уникальная главная страница</h1>
</header>
<h1>Main page</h1>
<?php foreach ($types as $type){?>
    <?php if($type['current']){?>
        <span><?php echo $type['transaction_type']; ?></span>
        <?php }else{?>
    <a href="/WebsiteProject/<?php echo $type['transaction_type_url']; ?>"><?php echo $type['transaction_type']; ?></a>
<?php }} ?>

<!--<h2><?php echo $postItem['title']; ?></h2>
<i><?php echo $postItem['date']; ?></i>
<p><?php echo $postItem['short_content']; ?></p>
<div>
    <p style="width:-moz-max-content; margin: 0 auto;"><a href="/WebsiteProject/<?php echo $postItem['type'];?>/<?php echo $postItem['transaction_type'];?>/<?php echo $postItem['category'];?>/<?php echo $postItem['id']?>">Read more</a></p>
</div>
<hr>-->

<?php include ROOT.'/src/views/layouts/footer.php'; ?>
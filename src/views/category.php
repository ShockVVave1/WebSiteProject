<?php
/**
 * Created by PhpStorm.
 * User: Денис
 * Date: 01.11.2018
 * Time: 19:46
 */

include ROOT.'/src/views/layouts/header.php';
?>
<html>
<head>
    <base href="/WebsiteProject/">
</head>
<body>
<?php foreach ($types as $type){?>
    <?php if($type['current']){?>
        <span><?php echo $type['transaction_type']; ?></span>
    <?php }else{?>
        <a href="/WebsiteProject/<?php echo $type['transaction_type_url']; ?>"><?php echo $type['transaction_type']; ?></a>
    <?php }} ?>
    <div>
        <?php  echo $breadcrumbs; ?>
    </div>
<?php
foreach ($postList as $Item):?>
    <hr>
    <h2><?php echo $Item['title']; ?></h2>
    <i><?php echo $Item['date']; ?></i>
    <p><?php echo $Item['short_content']; ?></p>
    <div>
        <p style="width:-moz-max-content; margin: 0 auto;"><a href="/WebsiteProject/<?php echo $Item['transaction_type'];?>/<?php echo $Item['category'];?>/<?php echo $Item['id']?>">Read more</a></p>
    </div>

<?php endforeach;?>
<?php include ROOT.'/src/views/layouts/footer.php'; ?>
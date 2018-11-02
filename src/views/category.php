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
<div>
    <?php  if((!isset($postList[0]['transaction_type'])) && (isset($$postList[0]['type']))){ ?>
        <span><?php echo $postList[0]['type'];?></span>
    <?php }else{ ?>
        <a href="/WebsiteProject/<?php echo $postList[0]['type'];?>"><?php echo $postList[0]['type'];?></a><span>-></span>
    <?php } ?>

    <?php  if((!isset($postList[0]['category'])) && (isset($postList[0]['transaction_type']))){ ?>
        <span><?php echo $postList[0]['transaction_type'];?></span>
    <?php }else{ ?>
        <a href="/WebsiteProject/<?php echo $postList[0]['type'];?>/<?php echo $postList[0]['transaction_type'];?>/"><?php echo $postList[0]['transaction_type'];?></a></a><span>-></span>
    <?php } ?>

    <?php  if((!isset($postList[0]['id'])) && (isset($postList[0]['category']))){ ?>
        <span><?php echo $postList[0]['category'];?></span>
    <?php }else{ ?>
        <a href="/WebsiteProject/<?php echo $postList[0]['type'];?>/<?php echo $postList[0]['transaction_type'];?>/<?php echo $postList[0]['category'];?>/"><?php echo $postList[0]['category'];?></a></a><span>-></span>
    <?php } ?>

    <?php  if(isset($postList[0]['id'])){ ?>
        <span><?php echo $postList[0]['id'];?></span>
    <?php }?>
</div>
<?php
foreach ($postList as $Item):?>
    <hr>
    <h2><?php echo $Item['title']; ?></h2>
    <i><?php echo $Item['date']; ?></i>
    <p><?php echo $Item['short_content']; ?></p>
    <div>
        <p style="width:-moz-max-content; margin: 0 auto;"><a href="/WebsiteProject/<?php echo $Item['type'];?>/<?php echo $Item['transaction_type'];?>/<?php echo $Item['category'];?>/<?php echo $Item['id']?>">Read more</a></p>
    </div>

<?php endforeach;?>
<?php include ROOT.'/src/views/layouts/footer.php'; ?>
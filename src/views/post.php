<?php
/**
 * Created by PhpStorm.
 * User: Денис
 * Date: 01.11.2018
 * Time: 22:10
 */
include ROOT.'/src/views/layouts/header.php';
?>

    <div>
       <?php  if((!isset($postItem['transaction_type'])) && (isset($postItem['type']))){ ?>
           <span><?php echo $postItem['type'];?></span>
       <?php }else{ ?>
           <a href="/WebsiteProject/<?php echo $postItem['type'];?>"><?php echo $postItem['type'];?></a><span>-></span>
       <?php } ?>

       <?php  if((!isset($postItem['category'])) && (isset($postItem['transaction_type']))){ ?>
           <span><?php echo $postItem['transaction_type'];?></span>
       <?php }else{ ?>
           <a href="/WebsiteProject/<?php echo $postItem['type'];?>/<?php echo $postItem['transaction_type'];?>/"><?php echo $postItem['transaction_type'];?></a></a><span>-></span>
       <?php } ?>

       <?php  if((!isset($postItem['id'])) && (isset($postItem['category']))){ ?>
           <span><?php echo $postItem['category'];?></span>
       <?php }else{ ?>
           <a href="/WebsiteProject/<?php echo $postItem['type'];?>/<?php echo $postItem['transaction_type'];?>/<?php echo $postItem['category'];?>/"><?php echo $postItem['category'];?></a></a><span>-></span>
       <?php } ?>

        <?php  if(isset($postItem['id'])){ ?>
            <span><?php echo $postItem['id'];?></span>
        <?php }?>
    </div>
    <h2><?php echo $postItem['title']; ?></h2>
    <i><?php echo $postItem['date']; ?></i>
    <p><?php echo $postItem['short_content']; ?></p>
    <div>
        <p style="width:-moz-max-content; margin: 0 auto;"><a href="/WebsiteProject/<?php echo $postItem['type'];?>/<?php echo $postItem['transaction_type'];?>/<?php echo $postItem['category'];?>/<?php echo $postItem['id']?>">Read more</a></p>
    </div>
    <hr>
<?php include ROOT.'/src/views/layouts/footer.php'; ?>
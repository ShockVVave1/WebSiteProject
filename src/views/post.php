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
        <?php  echo $breadcrumbs; ?>
    </div>
    <h2><?php echo $postItem['title']; ?></h2>
    <i><?php echo $postItem['date']; ?></i>
    <p><?php echo $postItem['short_content']; ?></p>
    <div>
        <p style="width:-moz-max-content; margin: 0 auto;"><a href="/WebsiteProject/<?php echo $postItem['type'];?>/<?php echo $postItem['transaction_type'];?>/<?php echo $postItem['category'];?>/<?php echo $postItem['id']?>">Read more</a></p>
    </div>
    <hr>
<?php include ROOT.'/src/views/layouts/footer.php'; ?>
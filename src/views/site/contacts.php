<?php
/**
 * Created by PhpStorm.
 * User: Денис
 * Date: 20.11.2018
 * Time: 11:32
 */


include ROOT.'/src/views/layouts/header.php';

?>

    <h2>Свяжитесь с нами</h2>


<?php if(isset($errors)&&is_array($errors)){?>
    <ul>
        <?php foreach ($errors as $error){ ?>
            <li>-<?php echo $error; ?></li>
        <?php } ?>
    </ul>
<?php } ?>
<?php if(isset($result)){?>
    <p>Отправленно</p>
<?php }else{ ?>
    <form action="contacts" method="post">
        <input type="text" name="subject" placeholder="<?php echo $subject;?>" value="<?php echo $subject_value ;?>">
        <input type="email" name="mail" placeholder="<?php echo $ymail;?>" value="<?php echo $ymail_value ;?>">
        <input type="textarea" name="message" placeholder="<?php echo $message;?>" value="<?php echo $message_value ;?>">
        <input type="submit" name="submit" value="true" class="btn btn-default" placeholder="">Отправить</input>
    </form>
<?php } ?>

<?php include ROOT.'/src/views/layouts/footer.php'; ?>
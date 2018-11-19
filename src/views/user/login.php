<?php
/**
 * Created by PhpStorm.
 * User: Денис
 * Date: 15.11.2018
 * Time: 13:24
 */


include ROOT.'/src/views/layouts/header.php';

?>

    <h2>Авторизация</h2>

<?php if(isset($result)){?>
    <p>Вы авторизировались!</p>
<?php } ?>
<?php if(isset($errors)&&is_array($errors)){?>
    <ul>
        <?php foreach ($errors as $error){ ?>
            <li>-<?php echo $error; ?></li>
        <?php } ?>
    </ul>
<?php } ?>
    <form action="user/login" method="post">
        <input type="email" name="email" placeholder="email" value="<?php echo $email;?>">
        <input type="password" name="password" placeholder="password" value="<?php echo $password;?>">
        <input type="submit" name="submit" value="true" class="btn btn-default" placeholder="">Отправить</input>
    </form>


<?php include ROOT.'/src/views/layouts/footer.php'; ?>
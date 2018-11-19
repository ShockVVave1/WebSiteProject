<?php
/**
 * Created by PhpStorm.
 * User: Денис
 * Date: 12.11.2018
 * Time: 18:23
 */

include ROOT.'/src/views/layouts/header.php';

?>

<h2>Регистрация на сайте</h2>

<?php if(isset($result)){?>
    <p>Вы зарегестрированы!</p>
<?php } ?>
<?php if(isset($errors)&&is_array($errors)){?>
    <ul>
        <?php foreach ($errors as $error){ ?>
          <li>-<?php echo $error; ?></li>
        <?php } ?>
    </ul>
<?php } ?>
<form action="user/register" method="post">
    <input type="text" name="login" placeholder="login" value="<?php echo $name;?>">
    <input type="email" name="email" placeholder="email" value="<?php echo $email;?>">
    <input type="password" name="password" placeholder="password" value="<?php echo $password;?>">
    <input type="submit" name="submit" value="true" class="btn btn-default" placeholder="">Отправить</input>
</form>


<?php include ROOT.'/src/views/layouts/footer.php'; ?>
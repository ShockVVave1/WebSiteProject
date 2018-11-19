<?php
/**
 * Created by PhpStorm.
 * User: Денис
 * Date: 16.11.2018
 * Time: 19:23
 */

include ROOT.'/src/views/layouts/header.php';

?>

    <h2>Редактирование персональных данных</h2>

<?php if(isset($result)){?>
    <p>Отредактировано!</p>
<?php } ?>
<?php if(isset($errors)&&is_array($errors)){?>
    <ul>
        <?php foreach ($errors as $error){ ?>
            <li>-<?php echo $error; ?></li>
        <?php } ?>
    </ul>
<?php } ?>
    <form action="cabinet/edit" method="post">
        <input type="text" name="name" placeholder="name" value="<?php echo $user['nickname'];?>">
        <input type="password" name="password" placeholder="password" value="">
        <input type="submit" name="submit" value="true" class="btn btn-default" placeholder="">Сохранить</input>
    </form>


<?php include ROOT.'/src/views/layouts/footer.php'; ?>
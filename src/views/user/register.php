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
<form action="user/register" method="post">
    <input type="text" name="login" placeholder="login">
    <input type="email" name="email" placeholder="email">
    <input type="password" name="password" placeholder="password">
    <input type="submit" name="submit" value="true" class="btn btn-default" placeholder="">Отправить</input>
</form>


<?php include ROOT.'/src/views/layouts/footer.php'; ?>
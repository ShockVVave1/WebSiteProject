<?php
/**
 * Created by PhpStorm.
 * User: Денис
 * Date: 02.11.2018
 * Time: 23:31
 */

?>


<html>
<head>
    <base href="/WebsiteProject/">
</head>
<body>
<header>
    <h1>Header</h1>
    <?php if(isset($catmenu))echo $catmenu; ?>
    <div style="float:right">
        <ul>


            <?php  if(User::isGuest()){?>
            <li><a href="cabinet">Кабинет</a></li>
            <li><a href="user/logout">Выход</a></li>
            <?php }else{?>
            <li><a href="user/register">Регистрация</a></li>
            <li><a href="user/login">Вход</a></li>
            <?php } ?>
        </ul>
    </div>
</header>

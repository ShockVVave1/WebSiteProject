<?php
/**
 * Created by PhpStorm.
 * User: Денис
 * Date: 15.11.2018
 * Time: 13:14
 */
include_once ROOT.'/src/views/layouts/header.php'; ?>

<section>
    <div>
        <div>
            <h1>Кабинет пользователя</h1>
            <h3><?php echo 'Добро пожаловать, '.$user['nickname']; ?></h3>
            <ul>
                <li><a href="/WebsiteProject/cabinet/edit">Редактировать данные</a></li>
                <li><a href="/WebsiteProject/cabinet/history">Список покупок</a></li>
            </ul>
        </div>
    </div>
</section>

<?php include_once ROOT.'/src/views/layouts/footer.php'; ?>

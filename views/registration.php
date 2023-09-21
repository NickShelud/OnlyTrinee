<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php require_once('layouts/menu.php') ?>
    <?php if(isset($error)) {
        echo $error;
    }?>
    <form action="../index.php" method="POST" name="register">
        <input type="hidden" name="action" value="register" />
        <label for="name">Имя:</label>
        <input name="name" id="name" type="text">
    
        <label for="phone">Номер телефона:</label>
        <input name="phone" id="phone" type="tel" maxlength="11">

        <label for="email">Почтовый ящик:</label>
        <input name="email" id="phone" type="email">

        <label for="password">Пароль:</label>
        <input name="password" id="password" type="password">

        <label for="confirm-password">Повторите пароль:</label>
        <input name="confirm-password" id="confirm-password" type="password">
    
        <button type="submit">Регистрация</button>
    </form>
</body>
</html>
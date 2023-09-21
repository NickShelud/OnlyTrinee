<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://smartcaptcha.yandexcloud.net/captcha.js" defer></script>
    <title>Document</title>
</head>
<body>
    <?php require_once('layouts/menu.php') ?>
    <?php if(isset($error)) {
        echo $error;
    }?>
    <form action="../index.php" method="post">
        <input type="hidden" name="action" value="autorization">
        <label for="login">Номер телефона или email:</label>
        <input name="login" id="login" type="text">

        <label for="password">Пароль:</label>
        <input name="password" id="password" type="password">

        <button type="submit">Войти</button>

        <div
            id="captcha-container"
            class="smart-captcha"
            data-sitekey="ysc1_Axe7xwclkMNwrD0T5wJX0So3hQCvbozX21bNad8ce053db83"
            style="height: 100px"
            name="smart-token"
        ></div>
    
    </form>
</body>
</html>
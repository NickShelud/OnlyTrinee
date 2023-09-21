<?php require_once('layouts/menu.php') ?>
<h1>Изменить данные</h1>
<h2>Здравствуйте, <?php echo $data['name']; ?></h2>

<?php if(isset($error)) {
    echo $error;
}?>

<form action="../index.php" method="POST" name="update">
        <input type="hidden" name="action" value="update">
        <input type="hidden" name="hiddenPhone" value="<?php echo $data['phone']; ?>">
        <label for="name">Имя:</label>
        <input name="name" id="name" type="text" value="<?php echo $data['name']; ?>">
    
        <label for="phone">Номер телефона:</label>
        <input name="phone" id="phone" type="text" value="<?php echo $data['phone']; ?>">

        <label for="email">Почтовый ящик:</label>
        <input name="email" id="email" type="text" value="<?php echo $data['email']; ?>">

        <label for="password">Пароль:</label>
        <input name="password" id="password" type="password" value="<?php echo $data['password']; ?>">

        <button type="submit">Изменить</button>
    </form>
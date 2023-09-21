<?php

require __DIR__ . '/vendor/autoload.php';
use \Php\template\Template;
use Database\Connection;
use Database\PgsqlAction;
use Database\CreatorTables;
use \Php\template\Validate;
use Php\template\CheckCaptcha;

$connection = new Connection();
$pdo = $connection->connect();

$table = new CreatorTables($pdo);
$table->createTable();

$query = new PgsqlAction($pdo);
$valid = new Validate();

$template = new Template();
if ($_SERVER['REQUEST_URI'] === '/') {
    echo $template->template('views/welcome.php');
}

if($_POST) {
    $data = [];
    $data['name'] = $_POST['name'] ?? '';
    $data['phone'] = $valid->validatePhone($_POST['phone']) ?? '';
    $data['email'] = $_POST['email'] ?? '';
    $data['password'] = $_POST['password'];

    
    switch ($_POST['action']) {
        case 'register':
            $phoneExists = $query->query("SELECT * FROM users WHERE phone = :phone", ['phone' => $data['phone']]);
            $emailExists = $query->query("SELECT * FROM users WHERE email = :email", ['email' => $data['email']]);

            if ($_POST['password'] !== $_POST['confirm-password']) {
                $error['error'] = 'Не совпадают пароли';
                echo $template->template('views/registration.php', $error);
            }

            if (count($phoneExists) === 0 and count($emailExists) === 0) {
                $query->query('INSERT INTO users (name, phone, email, password) VALUES (:name, :phone, :email, :password)', $data);
                echo $template->template('views/privateOffice.php', $data);
            } else {
                echo $template->template('views/registration.php', ['error' => 'Номер телефона или email уже существуют']);
            }

            break;
        case 'update':
            $id = $query->query("SELECT id FROM users WHERE phone = :phone", ['phone' => $_POST['hiddenPhone']]);
            $data['id'] = $id[0]['id'];
            $phoneExists = $query->query("SELECT * FROM users WHERE phone = :phone AND id != :id", ['phone' => $data['phone'], 'id' => $data['id']]);
            $emailExists = $query->query("SELECT * FROM users WHERE email = :email AND id != :id", ['email' => $data['email'], 'id' => $data['id']]);

            if (count($phoneExists) === 0 and count($emailExists) === 0) {
                $query->query('UPDATE users SET name = :name, phone = :phone, email = :email, password = :password WHERE id = :id', $data);
                echo $template->template('views/privateOffice.php', $data);
            } else {
                echo $template->template('views/privateOffice.php', ['error' => 'Номер телефона или email уже существуют']);
            }

            break;
        case 'autorization':
            $auth['login'] = $_POST['login'];
            $auth['password'] = $_POST['password'];

            $token = $_POST['smart-token'];
            $data = $query->query("SELECT * FROM users WHERE (phone = :login OR email = :login) AND password = :password", $auth);

            $captcha = new CheckCaptcha();
            if(count($data) == 0) {
                $error['error'] = 'Неверные данные';
                echo $template->template('views/autorization.php', $error);
            } elseif ($captcha->check_captcha($token)) {
                echo $template->template('views/privateOffice.php', $data[0]);
            } else {
                $error['error'] = 'Подтвертите что вы не робот';
                echo $template->template('views/autorization.php', $error);
            }
            break;
        }
    //echo $template->template('views/privateOffice.php', $data);
}

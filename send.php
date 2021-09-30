<?php
// Файлы phpmailer
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';
require 'phpmailer/Exception.php';

// Переменные, которые отправляет пользователь
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];

// Формирование самого письма
$title = "Новое обращение Best Tour Plan";
if(isset($_POST['email'])){
    // если есть что-то в $_POST['email']
    $body = '<b>' . 'Почта: ' . '</b>' . $_POST['email'];
} else {
    // если нет, отправлена форма с телефоном и пр.
    $body = '<b>' . 'Имя: ' . '</b>' . $_POST['name'] . ' <br />';
    $body .= '<b>' . 'Телефон: ' . '</b>' . $_POST['phone'] . ' <br />';
    $body .= '<b>' . 'Сообщение: ' . '</b>' . $_POST['message'] . ' <br />';
}

// Настройки PHPMailer
$mail = new PHPMailer\PHPMailer\PHPMailer();
try {
    $mail->isSMTP();
    $mail->CharSet = "UTF-8";
    $mail->SMTPAuth   = true;
    //$mail->SMTPDebug = 2;
    $mail->Debugoutput = function($str, $level) {$GLOBALS['status'][] = $str;};

    // Настройки вашей почты
    $mail->Host       = 'smtp.gmail.com'; // SMTP сервера вашей почты
    $mail->Username   = 'vadmelnichuk@gmail.com'; // Логин на почте
    $mail->Password   = 'owrnmxrujvgsbkjj'; // Пароль на почте
    $mail->SMTPSecure = 'ssl';
    $mail->Port       = 465;
    $mail->setFrom('vadmelnichuk@gmail.com', 'Вадим Мельничук'); // Адрес самой почты и имя отправителя

    // Получатель письма
    $mail->addAddress('vad-mk@yandex.ru');

// Отправка сообщения
$mail->isHTML(true);
$mail->Subject = $title;
$mail->Body = $body;

// Проверяем отравленность сообщения
if ($mail->send()) {$result = "success";}
else {$result = "error";}

} catch (Exception $e) {
    $result = "error";
    $status = "Сообщение не было отправлено. Причина ошибки: {$mail->ErrorInfo}";
}

// Отображение результата
header('Location: thankyou.html');
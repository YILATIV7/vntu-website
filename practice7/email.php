<?php
$message = 'Моє перше повідомлення, відправлене за допомогою PHP!';
$to = 'dturenko215@gmail.com';
$from = 'vitalytyrenko7@gmail.com';
$subject = 'Уроки PHP';

$subject = '=?utf-8?B?' . base64_encode($subject) . '?=';

$headers = "From: $from\r\nReply-to: $from\r\nContent-type:text/plain; charset=utf-8\r\n";

mail($to, $subject, $message, $headers);

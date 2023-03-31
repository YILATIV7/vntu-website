<?php
$title = 'undefined';
$main_part = '';

if (array_key_exists('page', $_GET)) {
    $p = $_GET['page'];

    switch ($p) {
        case 'nuclear-power-plants':
            $title = 'Атомна енергетика України';
            $main_part = 'nuclear-power-plants';
            break;
        case 'chornobyl':
            $title = 'Чорнобильська АЕС';
            $main_part = 'chornobyl';
            break;
        case 'zaporizhzhia':
            $title = 'Запорізька АЕС';
            $main_part = 'zaporizhzhia';
            break;
        case 'rivne':
            $title = 'Рівненська АЕС';
            $main_part = 'rivne';
            break;
        case 'khmelnytskyi':
            $title = 'Хмельницька АЕС';
            $main_part = 'khmelnytskyi';
            break;
        case 'south-ukraine':
            $title = 'Південноукраїнська АЕС';
            $main_part = 'south-ukraine';
            break;
        default:
            header('Location: index.php');

    }
} else {
    $title = 'Головна';
    $main_part = 'main';
}

require_once 'blocks/header.html';
require_once "blocks/$main_part.html";
require_once 'blocks/footer.html';

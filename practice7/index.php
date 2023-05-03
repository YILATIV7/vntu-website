<?php
date_default_timezone_set('Europe/Kiev');

function getComments($filename): array
{
    $file = fopen($filename, 'r');
    $n_bytes = filesize($filename);

    if ($n_bytes == 0) {
        $file_content = '';
    } else {
        $file_content = fread($file, $n_bytes);
    }

    fclose($file);

    $comments_raw = explode('#', $file_content);
    unset($comments_raw[0]);                          // видалення першого (пустого) коментаря
    $comments_raw = array_values($comments_raw);      //

    $comments = [];
    for ($i = 0; $i < count($comments_raw); $i++) {
        $author_and_msg = explode("\r\n", $comments_raw[$i], 2);
        $author_and_msg[1] = rtrim($author_and_msg[1], "\r\n");        // видалення останнього (зайвого) переносу рядка
        $comments[] = ['author' => $author_and_msg[0], 'msg' => $author_and_msg[1]];
    }

    return $comments;
}


// GET query (comments)

if (array_key_exists('page', $_GET)) {
    $p = $_GET['page'];

    switch ($p) {
        case 'main':
            $title = 'Головна';
            $main_part = 'main';
            break;
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
            exit();
    }

    $filename = 'comments_' . $main_part . '.txt';

    $comments = getComments($filename);
    for ($i = count($comments) - 1; $i >= 0; $i--) {
        $author = $comments[$i]['author'];
        $msg = $comments[$i]['msg'];
        require 'blocks/comment.html';
    }

    if (count($comments) == 0) {
        echo '<br>Немає коментарів...';
    }
}








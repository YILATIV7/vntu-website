<?php
require 'index.php';

$pages = ['main', 'nuclear-power-plants', 'chornobyl', 'khmelnytskyi', 'rivne', 'south-ukraine', 'zaporizhzhia'];
$jsonObject = [];

for ($i = 0; $i < count($pages); $i++) {
    $commentsOnPage = getComments('comments_' . $pages[$i] . '.txt');

    $jsonObject += [
        $pages[$i] => [
            'count' => count($commentsOnPage),
            'comments' => $commentsOnPage
        ]
    ];
}

echo json_encode($jsonObject, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

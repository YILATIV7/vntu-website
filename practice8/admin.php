<!DOCTYPE html>
<html lang="uk">
<head>
    <title>Адмін</title>
</head>
<body>
<label>
    Оберіть сторінку для відображення коментарів:
    <select onchange="showPageComments(parseInt(this.value))" style="width: 160px">
        <option value="0" selected="selected">Головна</option>
        <option value="1">Атомна енергетика</option>
        <option value="2">Чорнобильська АЕС</option>
        <option value="3">Хмельницька АЕС</option>
        <option value="4">Рівненська АЕС</option>
        <option value="5">Південноукраїнська АЕС</option>
        <option value="6">Запорізька АЕС</option>
    </select>
</label>
<div id="comments">
<?php

ob_start();
require 'json.php';
$jsonStr = ob_get_clean();
$jsonObj = json_decode($jsonStr, true);

$keys = array_keys($jsonObj);
for ($iter = 0; $iter < count($keys); $iter++) {

    echo '<div class="page-comments">';
    echo '<h1>' . 'Коментарі у файлі "comments_' . $keys[$iter] . '.txt"</h1>';

    $commentsCount = (int) $jsonObj[$keys[$iter]]['count'];
    $comments = (array) $jsonObj[$keys[$iter]]['comments'];
    for ($i = $commentsCount - 1; $i >= 0; $i--) {
        $author = $comments[$i]['author'];
        $msg = $comments[$i]['msg'];
        require 'blocks/comment.html';
    }

    if ($commentsCount == 0) {
        echo '<br>Немає коментарів...';
    }
    echo '</div>';
}

?>
</div>
<script>
    showPageComments(0);
    function showPageComments(index) {
        let commentsHolders = document.querySelectorAll("#comments > .page-comments");
        console.log(commentsHolders);
        for (let i = 0; i < commentsHolders.length; i++) {
            commentsHolders[i].style.display = i === index ? "block" : "none";
        }
    }
</script>
</body>
</html>


<?php
const FILE_NAME = 'http://lab.vntu.org//webusers/api-server/lab8.php?user=student&pass=p@ssw0rd';
$columns = ['name', 'affiliation', 'rank', 'location'];

$jsonStr = file_get_contents(FILE_NAME);
$jsonObj = json_decode($jsonStr, true);

$table = array_merge($jsonObj[0], $jsonObj[1]);
echo '<table border="1">';

for ($i = 0; $i < count($table); $i++) {
    echo '<tr>';
    echo '<td>' . $table[$i][$columns[0]] . '</td>';
    echo '<td>' . $table[$i][$columns[1]] . '</td>';
    echo '<td>' . $table[$i][$columns[2]] . '</td>';
    echo '<td>' . $table[$i][$columns[3]] . '</td>';
    echo '</tr>';
}

echo '</table><br>';

echo '<details><summary>Отриманий JSON</summary>';
echo '<pre>' . json_encode($jsonObj, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) . '</pre>';
echo '</details>';

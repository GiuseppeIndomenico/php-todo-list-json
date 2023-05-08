<?php
$testo = file_get_contents('./data.json');

$phparray = json_decode($testo, true);

if (isset($_POST['toDoItem'])) {
    $toDoItem = $_POST['toDoItem'];
    array_push($phparray, $toDoItem);
    file_put_contents('./data.json', json_encode($phparray));
}

header('Content-type: application/json');

echo json_encode($phparray);
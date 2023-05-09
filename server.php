<?php
$testo = file_get_contents('./data.json');

$phparray = json_decode($testo, true);

if (isset($_POST['toDoItem'])) {
    $toDoItem = $_POST['toDoItem'];
    array_push($phparray, $toDoItem);
    file_put_contents('./data.json', json_encode($phparray));
} elseif (isset($_POST['updateItem'])) {
    $index = $_POST['updateItem'];
    $phparray[$index]['done'] = !$phparray[$index]['done'];
    file_put_contents('./data.json', json_encode($phparray));
} elseif (isset($_POST['deleteItem'])) {
    $index = $_POST['deleteItem'];
    array_splice($phparray, $index, 1);
    file_put_contents('./data.json', json_encode($phparray));
}

header('Content-type: application/json');

echo json_encode($phparray);
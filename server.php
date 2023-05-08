<?php
$testo = file_get_contents('./data.json');

//echo $testo;

$phparray = json_decode($testo, true);

header('Content-type: application/json');

echo json_encode($phparray);
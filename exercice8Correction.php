<?php
include('./script/functions.php');
$data = openDB();
if (!empty($_POST)) {
    $securizedDataFromForm = treatFormData($_POST,"title","note",);
    extract($securizedDataFromForm, EXTR_OVERWRITE);
}

if(isset($title, $note)) {
    array_push($data["note"], ["title" => $title, "note" => $note,]);
    writeDB($data);
}

$notes = $data["note"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/CSS/bootstrap.css">
    <title>Exercice</title>
</head>
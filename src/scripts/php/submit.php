<?php

require $_SERVER["DOCUMENT_ROOT"] . '/vendor/autoload.php';


$name = "EduardoSosa";
$mental = $_POST['mental'];
$physical = $_POST['physical'];
$time = $_POST['time'];
$success = $_POST['success'];
$complexity = $_POST['complexity'];
$stress = $_POST['stress'];

$bulk = new MongoDB\Driver\BulkWrite;

$doc = [

    'mental' => $mental,

    'physical' => $physical,

    'time' => $time,

    'success' => $success,

    'complexity' => $complexity,

    'stress' => $stress

];
$query = ['name' => $name]; 
$update = ['$push'=> ['postExperience'=>$doc]];
$bulk->update($query, $update);


$client = new MongoDB\Client("mongodb+srv://codetrics:CodeTrics127@cluster0.caket.mongodb.net/codetrics?retryWrites=true&w=majority");
//$client->executeBulkWrite('codetrics.CodeLogs', $bulk);
    
?>
    
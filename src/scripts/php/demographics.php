<?php

require $_SERVER["DOCUMENT_ROOT"] . '/vendor/autoload.php';
$name = "EduardoSosa";
$gender = $_POST['gender'];
$experience = $_POST['experience'];
$years = $_POST['years'];
$frequency = $_POST['frequency'];

$bulk = new MongoDB\Driver\BulkWrite;

$doc = [

    'name' => $name,

    'gender' => $gender,

    'experience' => $experience,

    'years' => $years,

    'frequency' => $frequency,

    'codelogs' => array(),

    'postExperience' =>array()
];

$bulk->insert($doc);

$client = new MongoDB\Driver\Manager('mongodb://localhost:27017');
// $client = new MongoDB\Driver\Manager("mongodb+srv://codetrics:CodeTrics127@cluster0.caket.mongodb.net/codetrics?retryWrites=true&w=majority");
$client->executeBulkWrite('codetrics.CodeLogs', $bulk);

    
?>
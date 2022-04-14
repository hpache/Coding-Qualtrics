<?php
require $_SERVER["DOCUMENT_ROOT"] . '/vendor/autoload.php';
$filepath = $_SERVER["DOCUMENT_ROOT"] . "/plans/experimentlayout.csv";
$csvData = file_get_contents($filepath);
$lines = explode(PHP_EOL, $csvData);
$array = array();
foreach ($lines as $line) {
    $array[] = str_getcsv($line);
}

$row = 0;
$currentProgram = "";
# Iterate over each array
foreach ($array as $element){

    # Switch value to 1
    $array[$row][1] = "0";

    # Add one to count
    $row++;
}

// Open a file in write mode ('w')
$fp = fopen($filepath, 'w');

// Loop through file pointer and a line
foreach ($array as $fields) {
    fputcsv($fp, $fields);
}

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

// $client = new MongoDB\Driver\Manager('mongodb://localhost:27017');
$client = new MongoDB\Driver\Manager("mongodb+srv://codetrics:CodeTrics127@cluster0.caket.mongodb.net/codetrics?retryWrites=true&w=majority");
//$client->executeBulkWrite('codetrics.CodeLogs', $bulk);
    
?>
    
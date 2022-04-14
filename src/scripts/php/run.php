<?php

// $client = new MongoDB\Driver\Manager("mongodb://localhost:27017");
$client = new MongoDB\Driver\Manager("mongodb+srv://codetrics:CodeTrics127@cluster0.caket.mongodb.net/codetrics?retryWrites=true&w=majority");
$input = $_POST['input'];
$programmer = "EduardoSosa";
$bulk = new MongoDB\Driver\BulkWrite;

$query = ['name' => 'EduardoSosa']; 
$update = ['$push'=> ['codelogs'=>$input]];

$bulk->update($query, $update);  // Update Document     


$client->executeBulkWrite('codetrics.CodeLogs', $bulk);

$filepath = $_SERVER["DOCUMENT_ROOT"] . "/data/input.py";
$myfile = fopen($filepath, "w");
fwrite($myfile, $input);
fclose($myfile);


$output = shell_exec("python3 " . $filepath . " 2>&1");
echo $output;


?>
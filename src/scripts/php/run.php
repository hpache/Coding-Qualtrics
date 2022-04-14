<?php

require $_SERVER["DOCUMENT_ROOT"] . '/vendor/autoload.php';
$client = new MongoDB\Driver\Manager("mongodb+srv://codetrics:CodeTrics127@cluster0.caket.mongodb.net/codetrics?retryWrites=true&w=majority");
$input = $_POST['input'];
$programmer = "EduardoSosa";
$bulk = new MongoDB\Driver\BulkWrite;

$query = ['name' => 'EduardoSosa']; 
$update = ['$push'=> ['codelogs'=>$input]];

$bulk->update($query, $update);  // Update Document     


//$client->executeBulkWrite('codetrics.CodeLogs', $bulk);


$fp = fopen($_SERVER["DOCUMENT_ROOT"] . "/plans/current.txt", "r");
$program = fread($fp, filesize($_SERVER["DOCUMENT_ROOT"] . "/plans/current.txt"));

$program_name = explode(".",$program);

$runpath = $_SERVER["DOCUMENT_ROOT"] . "/data/";

$output = shell_exec("java -cp " . $runpath . " $program_name[0]" . " 2>&1");

echo $output;

?>
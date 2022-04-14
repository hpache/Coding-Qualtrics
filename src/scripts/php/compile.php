<?php
$client = new MongoDB\Driver\Manager('mongodb://localhost:27017');
$input = $_POST['input'];
$programmer = "EduardoSosa";
$bulk = new MongoDB\Driver\BulkWrite;

$query = ['name' => 'EduardoSosa']; 
$update = ['$push'=> ['codelogs'=>$input]];

$bulk->update($query, $update);  // Update Document     

//$client->executeBulkWrite('codetrics.CodeLogs', $bulk);

$fp = fopen($_SERVER["DOCUMENT_ROOT"] . "/plans/current.txt", "r");
$program = fread($fp, filesize($_SERVER["DOCUMENT_ROOT"] . "/plans/current.txt"));

$filepath = $_SERVER["DOCUMENT_ROOT"] . "/data/" . $program;
$myfile = fopen($filepath, "w");
fwrite($myfile, $input);
fclose($myfile);


$output = shell_exec("javac " . $filepath . " 2>&1");
echo $output . "\n";
?>
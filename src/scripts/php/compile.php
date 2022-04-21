<?php
$fp = fopen($_SERVER["DOCUMENT_ROOT"] . "/plans/current.txt", "r");
$program = fread($fp, filesize($_SERVER["DOCUMENT_ROOT"] . "/plans/current.txt"));

$filepath = $_SERVER["DOCUMENT_ROOT"] . "/data/" . $program;
$myfile = fopen($filepath, "w");
fwrite($myfile, $input);
fclose($myfile);


$output = shell_exec("javac " . $filepath . " 2>&1");
echo $output . "\n";
?>
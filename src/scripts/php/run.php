<?php

$input = $_POST['input'];
$filepath = $_SERVER["DOCUMENT_ROOT"] . "/data/input.py";
$myfile = fopen($filepath, "w");
fwrite($myfile, $input);
fclose($myfile);


$output = shell_exec("python3 " . $filepath . " 2>&1");
echo $output;

?>
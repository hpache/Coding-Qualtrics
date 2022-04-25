<?php

$fp = fopen($_SERVER["DOCUMENT_ROOT"] . "/plans/current.txt", "r");
$program = fread($fp, filesize($_SERVER["DOCUMENT_ROOT"] . "/plans/current.txt"));

$program_name = explode(".",$program);

$runpath = $_SERVER["DOCUMENT_ROOT"] . "/data/";

$output = shell_exec("java -cp " . $runpath . " $program_name[0]" . " 2>&1");

echo $output;

?>
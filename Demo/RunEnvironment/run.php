<?php

$input = $_POST["input"];

$myfile = fopen("input.py", "w") or die("Unable to write python file");
fwrite($myfile,$input);
fclose($myfile);

$output = shell_exec('python3 input.py 2>&1');
echo $output;

?>
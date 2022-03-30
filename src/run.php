<?php

$input = $_POST['input'];

$myfile = fopen("data/input.py", "w");
fwrite($myfile, $input);
fclose($myfile);


$output = shell_exec('python3 data/input.py');
echo $output;

?>
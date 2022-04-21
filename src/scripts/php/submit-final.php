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

    
?>
    
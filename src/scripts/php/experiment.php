<?php


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

    $program = $element[0];
    $picked = $element[1];

    # Find first with second element with 0
    if ($picked == 0){

        # Switch value to 1 then break loop
        $array[$row][1] = "1";
        # Assign to current program
        $currentProgram = $program;
        break;
    }

    # Add one to count
    $row++;

}

# Pick random integer
$rand_int = rand(2, 3);
# Get corresponding identifier
$identifier = $array[$row][$rand_int];

// Open a file in write mode ('w')
$fp = fopen($filepath, 'w');

// Loop through file pointer and a line
foreach ($array as $fields) {
    fputcsv($fp, $fields);
}

# Create program path
$porgrampath = $_SERVER["DOCUMENT_ROOT"] . "/experiment/" . $identifier . "/" . $program;

# read program
$myfile = fopen($porgrampath, "r") or die("Unable to open file!");

# write current program name
$currentTxt = $_SERVER["DOCUMENT_ROOT"] . "/plans/current.txt";

$fp = fopen($currentTxt, "w");
fwrite($fp, $program);
fclose($fp);


echo "$row" . fread($myfile,filesize($porgrampath));



?>
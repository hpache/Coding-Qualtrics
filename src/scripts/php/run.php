<?php

// Getting access to session data
session_start();

# Getting current program name
$program = $_SESSION["program"];

# Getting code
$input = $_POST["input"];

# Getting current time
$time = $_POST["time"];
$minutes = intval(explode(":", $time)[0]);
$seconds = $minutes * 60 + intval(explode(":", $time)[1]);

# Computing elapsed time
$timeElapsed = 15 * 60 - $seconds;
$seconds_elapsed = $timeElapsed % 60;
$minutes_elapsed = intdiv(($timeElapsed - $seconds_elapsed),60);
# Creating tag for logs
$tag = $minutes_elapsed . ":" . $seconds_elapsed;

$program_name = explode(".",$program);

$runpath = $_SERVER["DOCUMENT_ROOT"] . "/data/";

$output = shell_exec("java -cp " . $runpath . " $program_name[0]" . " 2>&1");

$json_array = Array(
    "program" => $program,
    "time" => $tag,
    "identifier" => $_SESSION["identifier_type"],
    "output" => $output
);

array_push($_SESSION["data"]["run"], $json_array);

// Writing json file with array
$json = json_encode($_SESSION["data"]);

// Getting path to data directory
$path = $_SERVER["DOCUMENT_ROOT"] . "/data/";

// Writing to json file
file_put_contents($path . "participant_data.json", $json);

echo $output;

?>
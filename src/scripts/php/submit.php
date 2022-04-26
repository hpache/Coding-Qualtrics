<?php
session_start();

// Getting user input
$mental_val = $_POST["mental"];
$physical_val = $_POST["physical"];
$time_val = $_POST["time"];
$success_val = $_POST["success"];
$complexity_val = $_POST["complexity"];
$stress_val = $_POST["stress"];

// Creating array for json encoding
$json_array = Array(
    "program" => $_SESSION["program"],
    "identifier" => $_SESSION["identifier_type"],
    "mental" => $mental_val,
    "physical" => $physical_val,
    "time" => $time_val,
    "success" => $success_val,
    "complexity" => $complexity_val,
    "stress" => $stress_val
);

array_push($_SESSION["data"]["nasa-tlx"], $json_array);

// Writing json file with array
$json = json_encode($_SESSION["data"]);

// Getting path to data directory
$path = $_SERVER["DOCUMENT_ROOT"] . "/data/";

// Writing to json file
file_put_contents($path . "participant_data.json", $json);

var_dump($_SESSION["data"]);

?>
    
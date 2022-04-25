<?php

// Start unique session id for current user
session_start();

// Check if the user already started a session
if (!isset($_SESSION["codes"]) || !isset($_SESSION["identifier"]) || !isset($_SESSION["nasa"])){
    // Starting with initial experiment
    $_SESSION["codes"] = Array(
        "0" => "TicTacToe.java",
        "1" => "Postfix.java",
        "2" => "Die.java"
    );
    // Randomly picking 0 or 1
    $_SESSION["identifier"] = random_int(0,1);
    // Adding nasa-tlx array
    $_SESSION["data"] = array();
}

// Gather input from user
$gender = $_POST["gender"];
$exp = $_POST["experience"];
$years = $_POST["years"];
$freq = $_POST["frequency"];

// Creating array with user input
$json_array = Array(
    "id" => session_id(),
    "gender" => $gender,
    "experience" => $exp,
    "years" => $years,
    "frequency" => $freq,
    "nasa-tlx" => array()
);

$_SESSION["data"] = $json_array;

// Writing json file with array
$json = json_encode($json_array);

// Getting path to data directory
$path = $_SERVER["DOCUMENT_ROOT"] . "/data/";

// Writing to json file
file_put_contents($path . "participant_data.json", $json);



    
?>
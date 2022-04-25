<?php
session_start();

// If the codes array is not empty do the following:
if (!empty($_SESSION["codes"])){


    $_SESSION["program"] = array_pop($_SESSION["codes"]);

    // Picking the identifier
    if ($_SESSION["identifier"] == 0){
        $identifier = "good_identifiers";
        $_SESSION["identifier_type"] = $identifier;
    }
    else{
        $identifier = "bad_identifiers";
        $_SESSION["identifier_type"] = $identifier;
    }

    // Reset identifier
    $_SESSION["identifier"] = random_int(0,1);

    # Create program path
    $porgrampath = $_SERVER["DOCUMENT_ROOT"] . "/experiment/" . $identifier . "/" . $_SESSION["program"];

    # read program
    $myfile = fopen($porgrampath, "r") or die("Unable to open file!");



    echo fread($myfile,filesize($porgrampath));
}

else{

    // Destroy session
    session_destroy();
    // run npm script
    $runpath = $_SERVER["DOCUMENT_ROOT"] . "/scripts/js/update.js";
    $output = shell_exec("node " . $runpath);
    echo "done";
}


?>
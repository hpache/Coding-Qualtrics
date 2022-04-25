/**
 * Codetrics Group
 * Created 12 April 2022
 * Script is responsible for updating the values of the form sliders
 */

$(document).ready(function(e){

    // Loading in initial values (default 50)
    $("#mental-val-out")[0].innerHTML = $("#mental")[0].value;
    $("#physical-val-out")[0].innerHTML = $("#physical")[0].value;
    $("#time-val-out")[0].innerHTML = $("#time")[0].value;
    $("#success-val-out")[0].innerHTML = $("#success")[0].value;
    $("#complex-val-out")[0].innerHTML = $("#complex")[0].value;
    $("#stress-val-out")[0].innerHTML = $("#stress")[0].value;

    // Updating when the user gives an input
    $("#nasa-tlx")[0].oninput = function(){
        $("#mental-val-out")[0].innerHTML = $("#mental")[0].value;
        $("#physical-val-out")[0].innerHTML = $("#physical")[0].value;
        $("#time-val-out")[0].innerHTML = $("#time")[0].value;
        $("#success-val-out")[0].innerHTML = $("#success")[0].value;
        $("#complex-val-out")[0].innerHTML = $("#complex")[0].value;
        $("#stress-val-out")[0].innerHTML = $("#stress")[0].value;
    }

    // Submitting to page
    $("#nasa-tlx").submit(function(e){

        // Blocking out post string
        e.preventDefault();
        
        // Making ajax request
        $.ajax({
            url: "http://localhost:3001/nasa-script",
            method: "POST",
            // Creating POST data variables
            data: {"mental": $("#mental")[0].value,
                   "physical": $("#physical")[0].value,
                   "time": $("#time")[0].value,
                   "success": $("#success")[0].value,
                   "complexity": $("#complex")[0].value,
                   "stress": $("#stress")[0].value},
            // On success log the variables and redirect to coding page
            success: function(res){
                console.log(res);
                window.location.href = "/";
            }
        })
        indow.location.href = "/"
    })
});
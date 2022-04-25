$(document).ready(function(e){
    $(".submit").click(function(e){
        e.preventDefault();
        var gender = ""
        var experience = ""
        var frequency = ""

        if ($("#male")[0].checked){
            gender = "male"
        }
        else if ($("#female")[0].checked){
            gender = "female"
        }
        else if ($("#nonBinary")[0].checked){
            gender = "nonBinary"
        }
        else {
            gender = "noSelection"
        }

        if ($("#none")[0].checked){
            experience = "none"
        }
        else if ($("#low")[0].checked){
            experience = "low"
        }
        else if ($("#medium")[0].checked){
            experience = "medium"
        }
        else {
            experience = "high"
        }

        if ($("#oneOrLess")[0].checked){
            frequency = "oneOrLess"
        }
        else if ($("#oneToFive")[0].checked){
            frequency = "oneToFive"
        }
        else if ($("#fiveToTen")[0].checked){
            frequency = "fiveToTen"
        }
        else if ($("#tenToTwenty")[0].checked){
            frequency = "tenToTwenty"
        }
        else {
            frequency = "moreThanTwenty"
        }
        // var xhttp = new XMLHttpRequest();
        // xhttp.open("POST", "index", true);

        // var data = {"gender": gender,
        // "experience": experience,
        // "years": $(".range")[0].value,
        // "frequency": frequency};

        // var sendString = JSON.stringify(data);
        // xhttp.send(sendString);

        $.ajax({
            url: 'http://localhost:3001/demographics',
            method: "POST",
            data: {"gender": gender,
                   "experience": experience,
                   "years": $(".range")[0].value,
                   "frequency": frequency},
            success: function(res){
                console.log(res);
                window.location.href = "/ide/ide.html";
            },
            error: function(res){
                console.log(res);
                window.location.href = "/ide/ide.html";
            }
            
        })
        window.location.href = "/ide/ide.html";
    })
});
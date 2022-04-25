$(document).ready(function(){

    $.ajax({
        url:"../scripts/php/experiment.php",
        method:"POST",
        success: function(result){
            if (result === "done"){
                window.location.href = "/";
            }
            else{
                generateIDE(result);
            }
            
        }
    });

    // Preventing refresh
    window.addEventListener('beforeunload', function (e) {
        // Cancel the event
        e.preventDefault();
        // Chrome requires returnValue to be set
        e.returnValue = '';
    });

});


function generateIDE(text, actionURL = "/surveys/NASA-TLX.html"){

    timerDisplay = document.createElement("p");
    timerDisplay.setAttribute("id", "timer");
    container = document.getElementById("mirror-container");
    timerContainer = document.getElementById("timerContainer");
    timerContainer.appendChild(timerDisplay);
    function startTimer(duration, display) {
        var timer = duration, seconds;
        setInterval(function () {
            minutes = parseInt(timer / 60, 10);
            seconds = parseInt(timer % 60, 10);

            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;

            display.textContent = minutes + ":" + seconds;

            if (--timer < 0) {
                window.location.href = "/surveys/NASA-TLX.html";
            }

        }, 1000);
    }
    
    var fifteenSeconds = 60*15;
    startTimer(fifteenSeconds, timerDisplay);

    var myCodeMirror = CodeMirror(container, {
        value: text,
        mode:  "javascript",
        theme: "midnight",
        lineNumbers: true
    });
    button = document.createElement("input");
    compile = document.createElement("input");
    run = document.createElement("input");
    errors = document.createElement("p");
    form = document.createElement("form");
    buttonBar = document.createElement("buttonBar")
    

    form.setAttribute("class", "error-container");
    buttonBar.setAttribute("class", "button-bar")
    errors.setAttribute("class", "errors-display");
    button.setAttribute("class", "run-button");
    button.setAttribute("type","submit");
    compile.setAttribute("class", "compile-button");
    compile.setAttribute("type", "button");
    run.setAttribute("class", "compile-button");
    run.setAttribute("type", "button");

    button.setAttribute("value", "next");
    run.setAttribute("value", "Run");
    compile.setAttribute("value", "Compile")

    form.appendChild(errors);
    buttonBar.appendChild(button);
    buttonBar.appendChild(compile);
    buttonBar.appendChild(run);
    form.appendChild(buttonBar)
    container.appendChild(form);

    // When the next button is pressed, send it to nasa-tlx form
    $("form").submit(function(e){
        e.preventDefault();
        $.ajax({
            url: actionURL,
            method: "POST",
            data: {'input':myCodeMirror.getValue()},
            success: function(res){
                window.location.href = actionURL;
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) { 
                alert("Status: " + textStatus); alert("Error: " + errorThrown); 
            }
        })
    })

    // Compile code
    compile.onclick = function(e){
        $.ajax({
            url: "/scripts/php/compile.php",
            method: "POST",
            data: {'input':myCodeMirror.getValue(), 
            'time': $("#timer")[0].innerText},
            success: function(res){
                errors.innerText = "compile \n" + res;
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) { 
                alert("Status: " + textStatus); alert("Error: " + errorThrown); 
            }
        })
    }

    // Run compiled code
    run.onclick = function(e){
        $.ajax({
            url: "/scripts/php/run.php",
            method: "POST",
            data: {'input':myCodeMirror.getValue(), 
            'time': $("#timer")[0].innerText},
            success: function(res){
                errors.innerText = "run \n" + res;
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) { 
                alert("Status: " + textStatus); alert("Error: " + errorThrown); 
            }
        })
    }


}
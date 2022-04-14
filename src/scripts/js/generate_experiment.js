$(document).ready(function(){

    $.ajax({
        url:"../scripts/php/experiment.php",
        method:"POST",
        success: function(result){
            count = parseInt(result.slice(0,1));
            code = result.slice(1);
            if (count != 2){
                generateIDE(code);
            }
            else{
                generateIDE(code, "/surveys/NASA-TLX.html")
            }
        }
    });

});

function generateIDE(text, actionURL = '../scripts/php/run.php'){

    window.onbeforeunload = function() {
        alert("Dude, are you sure you want to leave? Think of the kittens!");
    }

    container = document.getElementById("mirror-container");
    var myCodeMirror = CodeMirror(container, {
        value: text,
        mode:  "javascript",
        theme: "midnight",
        lineNumbers: true
    });
    button = document.createElement("input");
    errors = document.createElement("p");
    form = document.createElement("form");
    buttonBar = document.createElement("buttonBar")
    // runIcon = document.createElement('run-icon');

    form.setAttribute("class", "error-container");
    buttonBar.setAttribute("class", "button-bar")
    errors.setAttribute("class", "errors-display");
    button.setAttribute("class", "run-button");
    button.setAttribute("type","submit");
    // runIcon.setAttribute("class", "fa fa-home");

    button.setAttribute("value", "RUN");

    form.appendChild(errors);
    buttonBar.appendChild(button);
    form.appendChild(buttonBar)
    container.appendChild(form);

    $("form").submit(function(e){
        e.preventDefault();
        var input = myCodeMirror.getValue();
        $.ajax({
            url: actionURL,
            method: "POST",
            data: {'input':input},
            success: function(res){
                errors.innerText = res;
                window.location.href = "/surveys/NASA-TLX.html";
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) { 
                alert("Status: " + textStatus); alert("Error: " + errorThrown); 
            }
        })
    })
}
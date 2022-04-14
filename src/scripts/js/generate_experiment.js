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
                generateIDE(code, "/surveys/NASA-TLX-final.html");
            }
        }
    });

});

function generateIDE(text, actionURL = "/surveys/NASA-TLX.html"){

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

    var input = myCodeMirror.getValue();

    // When the next button is pressed, send it to nasa-tlx form
    $("form").submit(function(e){
        e.preventDefault();
        $.ajax({
            url: actionURL,
            method: "POST",
            data: {'input':input},
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
            data: {'input':input},
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
            data: {'input':input},
            success: function(res){
                errors.innerText = "run \n" + res;
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) { 
                alert("Status: " + textStatus); alert("Error: " + errorThrown); 
            }
        })
    }


}
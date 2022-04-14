
window.addEventListener('load', function () {
    container = document.getElementById("mirror-container");
    var myCodeMirror = CodeMirror(container, {
        value: "print('Hello World...')\n",
        mode:  "python",
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
            url: './scripts/php/run.php',
            method: "POST",
            data: {'input':input},
            success: function(res){
                errors.innerText = res;
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) { 
                alert("Status: " + textStatus); alert("Error: " + errorThrown); 
            }
        })
    })
});

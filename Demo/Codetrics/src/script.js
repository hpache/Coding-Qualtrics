
window.addEventListener('load', function () {
    container = document.getElementById("mirror-container");
    var myCodeMirror = CodeMirror(container, {
        value: "print('Hello World')\n",
        mode:  "python",
        theme: "oceanic-next",
        lineNumbers: true
    });
    button = document.createElement("input");
    errors = document.createElement("p");
    form = document.createElement("form");
    form.setAttribute("class", "error-container");
    form.setAttribute("id","test");
    errors.setAttribute("class", "errors-display");
    button.setAttribute("class", "run-button");
    button.setAttribute("type", "submit");
    button.setAttribute("value", "Run");
    button.innerText = "Run";
    errors.innerText = "Error Messages";
    form.appendChild(errors);
    form.appendChild(button);
    container.appendChild(form);
    console.log(myCodeMirror);

    $("#test").submit(function(e){

        e.preventDefault();
        let actionURL = "http://localhost:8080/run.php";
        let input = myCodeMirror.getValue();
        
        $.ajax({
            type: "POST",
            url: actionURL,
            data: {input:input},
            success: function(data){
                errors.innerText = data;
            }
        })
    })
});

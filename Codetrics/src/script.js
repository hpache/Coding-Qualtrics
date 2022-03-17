
window.addEventListener('load', function () {
    container = document.getElementById("mirror-container");
    var myCodeMirror = CodeMirror(container, {
        value: "function myScript(){return 100;}\n",
        mode:  "javascript",
        theme: "oceanic-next",
        lineNumbers: true
    });
    button = document.createElement("button");
    errors = document.createElement("p");
    div = document.createElement("div");
    div.setAttribute("class", "error-container");
    errors.setAttribute("class", "errors-display");
    button.setAttribute("class", "run-button");
    button.innerText = "Run";
    errors.innerText = "Error Messages";
    div.appendChild(errors);
    div.appendChild(button);
    container.appendChild(div);
    console.log(myCodeMirror);
});

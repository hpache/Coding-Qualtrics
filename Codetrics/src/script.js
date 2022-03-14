
window.addEventListener('load', function () {
    var myCodeMirror = CodeMirror(document.body, {
        value: "function myScript(){return 100;}\n",
        mode:  "javascript",
        theme: "oceanic-next",
        lineNumbers: true
    });
});

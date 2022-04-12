<!doctype html>
<html lang=en>

    <head>
    <meta charset="utf-8">
    <title>Codetrics</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="../favicon.ico">
    <script src="../node_modules/angular/angular.js"></script>
    </head>

    <form>
        <mat-slider aria-label="unit(s)"></mat-slider>
        <br>
        <input type="range" min="0" max="100" id="mental" ngmodel="mat-slider" >
        <br>
        <input type="range" min="0" max="100" id="physical">
        <br>
        <input type="range" min="0" max="100" id="time-pressure">
        <br>
        <input type="range" min="0" max="100" id="success">
        <br>
        <input type="range" min="0" max="100" id="complexity">
        <br>
        <input type="range" min="0" max="100" id="stress">
    </form>

</html>
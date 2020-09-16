<!DOCTYPE html>
<html>
<head>
<title>PHP Blog - Exemplo de utilização de Webcam com PHP</title>
<meta charset="UTF-8">
<div class="camera_snap">
    <video autoplay id="vid"></video>
    <canvas id="canvas" width="640" height="480"></canvas>
        <br />
    <input type="button" class="snapbutton"
    onclick="snapshot()"/>
</div>
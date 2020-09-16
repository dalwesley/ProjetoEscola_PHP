	
Exemplo Mínimo

PHP

camera.php

<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Tirar Fotos</title>
<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<style>
        video { border: 1px solid #ccc; display: block; margin: 0 0 20px 0; }
        #canvas { margin-top: 20px; border: 1px solid #ccc; display: block; }
</style>
</head>
<body>
<div>
    <div><video id="video" width="640" height="480" autoplay></video></div>
    <div><button id="snap">Tirar Foto</button></div>
    <div><button id="save">Salvar Foto</button></div>
    <div><canvas id="canvas" width="640" height="480"></canvas></div>
<script>
    window.addEventListener("DOMContentLoaded", function() {
        var canvas = document.getElementById("canvas"),
        context = canvas.getContext("2d"),
        video = document.getElementById("video"),
        videoObj = { "video": true },
        errBack = function(error) {
                console.log("Video capture error: ", error.code); 
        };  
        if(navigator.getUserMedia) {
            navigator.getUserMedia(videoObj, function(stream) {
                video.src = stream;
                video.play();
            }, errBack);
        } else if(navigator.webkitGetUserMedia) {
            navigator.webkitGetUserMedia(videoObj, function(stream){
                video.src = window.webkitURL.createObjectURL(stream);
                video.play();
            }, errBack);
        }
        else if(navigator.mozGetUserMedia) {
            navigator.mozGetUserMedia(videoObj, function(stream){
                video.src = window.URL.createObjectURL(stream);
                video.play();
            }, errBack);
        }
    }, false);
    document.getElementById("snap").addEventListener("click", function() {      
        canvas.getContext("2d").drawImage(video, 0, 0, 640, 480);       
        //alert(canvas.toDataURL());
    });
    document.getElementById("save").addEventListener("click", function() {      
        $.post('fotossalvar.php', {imagem:canvas.toDataURL()}, function(data){
        },'json');
    });
</script>    
</body>
</html>
fotossalvar.php

<?php
    function base64_to_jpeg( $base64_string, $output_file ) {
        $ifp = fopen( $output_file, "wb" ); 
        fwrite( $ifp, base64_decode( $base64_string) ); 
        fclose( $ifp ); 
        return( $output_file ); 
    }       
    $imagem = str_replace('data:image/png;base64,','',$_POST['imagem']);        
    base64_to_jpeg($imagem, "pasta1/foto1.png");        
    echo json_encode(array('imagem' => 1));
<?php
include "seguranca.php";
?>
<script language="JavaScript">
function abrir(URL) {
var width = 700;
var height = 680;
var left = 657;
var top = 0;
window.open(URL,'janela', 'width='+width+', height='+height+', top='+top+', left='+left+', scrollbars=no, status=no, toolbar=no, location=no, directories=no, menubar=no, resizable=no, fullscreen=no');
}
</script>

<style type="text/css">
	#div1 {
	        width:40%; /* Tamanho da Largura da Div */
			height:3%; /* Tamanho da Altura da Div */
	        position:absolute; 
	        top:0; 
	        margin-top:10px; /* ou seja ele pega 50% da altura tela e sobe metade do valor da altura no caso 100 */
	        left:0;
 	        margin-left:0%; /* ou seja ele pega 50% da largura tela e diminui  metade do valor da largura no caso 250 */
 
}
	#div2 {
    	    width:100%; /* Tamanho da Largura da Div */
			height:1%; /* Tamanho da Altura da Div */
    	    position:absolute; 
    	    top:0%; 
    	    margin-top:-15px; /* ou seja ele pega 50% da altura tela e sobe metade do valor da altura no caso 100 */
    	    left:1px;
    	    margin-left:0%; /* ou seja ele pega 50% da largura tela e diminui  metade do valor da largura no caso 250 */
 
}
	#div3 {
    	    width:40%; /* Tamanho da Largura da Div */
			height:3%; /* Tamanho da Altura da Div */
    	    position:absolute; 
    	    top:0%; 
    	    margin-top:-10px; /* ou seja ele pega 50% da altura tela e sobe metade do valor da altura no caso 100 */
    	    left:75%;
    	    margin-left:0%; /* ou seja ele pega 50% da largura tela e diminui  metade do valor da largura no caso 250 */
 
}
</style>
<body link="#000000" vlink="#000000" alink="#000000">
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Nova pagina 1</title>
</head>

<body>
<center><pre>






<img border='0' src='img/construcao.png' width='90%' height='332'>





<H1>Voltar
<img src="img/voltar.png" title="Selecione" onClick="window.open('selecione.php','_parent','');" name="Selecione" width="50" height="50">
</center>
</body>

</html>
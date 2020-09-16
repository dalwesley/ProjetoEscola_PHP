<?php
include "seguranca_1.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
	<title>A+ - Sistema Integrado</title>
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- As 3 meta tags acima *devem* vir em primeiro lugar dentro do `head`; qualquer outro conteúdo deve vir *após* essas tags -->
    
    <link href="css/bootstrap.min.css" rel="stylesheet">								<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">					<!-- Incluindo o CSS do Bootstrap -->
	<script src="http://code.jquery.com/jquery-latest.js"></script>						<!-- Incluindo o jQuery que é requisito do JavaScript do Bootstrap -->
	<script src="js/bootstrap.min.js"></script>											<!-- Incluindo o JavaScript do Bootstrap -->
<style type="text/css">
	#div0 {
			width:100%; /* Tamanho da Largura da Div */
			height:100%; /* Tamanho da Altura da Div */
	        top: %; 
	        margin-top:%; /* ou seja ele pega 50% da altura tela e sobe metade do valor da altura no caso 100 */
	        left:0;
	        margin-left:0; /* ou seja ele pega 50% da largura tela e diminui  metade do valor da largura no caso 250 */
}

	#div1 {
			width:100%; /* Tamanho da Largura da Div */
			height:100%; /* Tamanho da Altura da Div */
	        top: 10%; 
	        margin-top:13%; /* ou seja ele pega 50% da altura tela e sobe metade do valor da altura no caso 100 */
	        left:0;
	        margin-left:0; /* ou seja ele pega 50% da largura tela e diminui  metade do valor da largura no caso 250 */
}
</style>
<body>
<div id=div0>
	<div class='container'>
		<div class="row">
			<div class="col-xs-12 col-md-12">
				<?
					$pagina = $_GET['acessando'];
					if($pagina=='')
					  include ('home.php');
					elseif(file_exists($pagina.'.html')){
					  include ($pagina.'.html');
					}		
					elseif(file_exists($pagina.'.php')){
					  include ($pagina.'.php');
					}
					else 
					  include ('home.php');
				?>
			</div>
		</div>
	</div>
</div>
<div id=div1>
	<div class='container'>
		<div class="row">
			<div class="col-xs-12 col-md-12">
				<pre></pre>
			</div>
		</div>
	</div>
</div>
</body>
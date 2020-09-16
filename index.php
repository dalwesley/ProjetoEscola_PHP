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
			width:%; /* Tamanho da Largura da Div */
			height:%; /* Tamanho da Altura da Div */
    		top:0; 
    		margin-top:20%; /* ou seja ele pega 50% da altura tela e sobe metade do valor da altura no caso 100 */
    		left:%;
    		margin-left:%; /* ou seja ele pega 50% da largura tela e diminui  metade do valor da largura no caso 250 */
}
	#div1 {
			width:%; /* Tamanho da Largura da Div */
			height:%; /* Tamanho da Altura da Div */
    		top:0; 
    		margin-top:15%; /* ou seja ele pega 50% da altura tela e sobe metade do valor da altura no caso 100 */
    		left:%;
    		margin-left:%; /* ou seja ele pega 50% da largura tela e diminui  metade do valor da largura no caso 250 */

}

</style>
  </head>
<body background="img/wallpaper.jpg">
<form action="login.php" method="post">
	<div class="container-fluid"><center>
		<div class="row">
			<div class="col-xs-12 col-md-12">
				<h1>
					<span class="glyphicon glyphicon-text-color" aria-hidden="true" title='A'></span>
					<span class="glyphicon glyphicon-plus" aria-hidden="true" title='+'></span>
				</h1>
				<B>Sistema de Gestão de escola</B>
			</div>
		</div>
		<div id=div1>
			<div class="row">
				<div class="col-md-3">
				</div>
				<div class="col-md-6">
					<div class="input-group">
						<span class="input-group-addon" id="basic-addon1">
							<span class="glyphicon glyphicon-user" aria-hidden="true" title='usuario'></span>
						</span>
						<input type="text" name="usuario" id="txUsuario" class="form-control" placeholder='Digite seu nome de Usuário para acessar o Sistema A+' autofocus required/>
					</div><p>
					<div class="input-group">
						<span class="input-group-addon" id="basic-addon1">
							<span class="glyphicon glyphicon-lock" aria-hidden="true" title='Senha'></span>
						</span>
						<input type="password" name="senha" id="txSenha" class="form-control" placeholder='Digite sua senha de Usuário para acessar o Sistema A+' required/>
					</div>
					<p><p>
					<input type="submit" value="Entrar" style="width: 100%; font-size:17pt"/>
				</div>
				<div class="col-md-3">
				</div>
			</div>
		</div>
		<div id=div0>
			<div class="row">
				<div class="col-md-4">
				</div>
				<div class="col-md-4">
					<img src='img/mais.gif' border='0' width='200' height='40' title='Mais!'>
				</div>
				<div class="col-md-4">
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					Copyright © 2016 Mais Desenvolvimentos Inc. Todos os direitos reservados.<a href='javascript:abrir("adm_termos_de_uso.php");' style='text-decoration: none' title='Condições de Uso'> Condições de Uso</a> - <a href='javascript:abrir("adm_politica_de_privacidade.html");' style='text-decoration: none' title='Política de Privacidade'>Política de Privacidade</a><font size='2'><i> (Versão 1.0)
				</div>
			</div>
		</div>
	</div>
</form>
</body>
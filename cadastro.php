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
<script language="JavaScript">
function abrir(URL) {
var width = 700;
var height = 680;
var left = 657;
var top = 0;
window.open(URL,'janela', 'width='+width+', height='+height+', top='+top+', left='+left+', scrollbars=no, status=no, toolbar=no, location=no, directories=no, menubar=no, resizable=no, fullscreen=no');
}
</script>
	</head>

<body><center>
<div class="container-fluid">
	<div class="row">
		<div class="col-xs-12 col-sm-12">
		</div>
	</div>
	<div class="row">
		<div class="col-xs-3 col-sm-1">
		</div>
		<div class="col-xs-6 col-sm-10">
			<div class="list-group">
				<a href="#" class="list-group-item active disabled">
					<h3 class="list-group-item-heading"><center><B>Selecione uma opção para cadastro</h3></B>
				</a>
				<a href="#" class="list-group-item" class="list-group-item" data-toggle="modal" data-target="#01">
					<h4 class="list-group-item-heading"><center>Cadastrar novo Aluno</h4>
					<p class="list-group-item-text">Antes de Cadastrar novo Aluno verifique, por favor, se os Documentos nescessarios estão em ordem.</p>
				</a>
				<a href="#" class="list-group-item" data-toggle="modal" data-target="#02">
					<h4 class="list-group-item-heading">Cadastrar novo Professor</h4>
					<p class="list-group-item-text">Antes de Cadastrar novo Aluno verifique, por favor, se os Documentos nescessarios estão em ordem.</p>
				</a>
				<a href="#" class="list-group-item" data-toggle="modal" data-target="#03">
					<h4 class="list-group-item-heading">Cadastrar novo Usuário</h4>
					<p class="list-group-item-text">Antes de Cadastrar novo Aluno verifique, por favor, se os Documentos nescessarios estão em ordem.</p>
				</a>
				<a href="javascript:abrir('#');" class="list-group-item disabled" data-toggle="modal" data-target="#04">
					<h4 class="list-group-item-heading">Cadastrar nova Classe</h4>
					<p class="list-group-item-text">Antes de Cadastrar novo Aluno verifique, por favor, se os Documentos nescessarios estão em ordem.</p>
				</a>
				<a href="javascript:abrir('#');" class="list-group-item disabled" data-toggle="modal" data-target="#05">
					<h4 class="list-group-item-heading">Cadastrar nova Mensagem</h4>
					<p class="list-group-item-text">Antes de Cadastrar novo Aluno verifique, por favor, se os Documentos nescessarios estão em ordem.</p>
				</a>
			</div>
		</div>
		<div class="col-xs-3 col-sm-1">
		</div>
	</div>
</div>
<div class="modal fade" id="01" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<?php
					include "adm_aluno_cadastrar_dados_pessoais.php";
				?>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="02" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<?php
					include "adm_prof_cadastrar_dados_pessoais.php";
				?>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="03" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<?php
					include "adm_usuario_cadastrar_dados_pessoais.php";
				?>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="03" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<?php
					include "#";
				?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
				<button type="button" class="btn btn-primary">Salvar mudanças</button>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="03" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<?php
					include "#";
				?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
				<button type="button" class="btn btn-primary">Salvar mudanças</button>
			</div>
		</div>
	</div>
</div>
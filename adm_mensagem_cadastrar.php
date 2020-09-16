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

<body>
<?php
include "conecta.php";

$mes_select 		= $_GET['m']; //Recupera a variavel id para fazer o select
@$dia_select 		= $_GET['d']; //Recupera a variavel id para fazer o select
$date 				= date('Y-m-d');

echo"
<center>
	<div class='container-fluid'>
		<div class='row'>
			<div class='col-sm-12'>
				<div class='alert alert-info' role='alert'>
					<a href='#' class='alert-link'>
						<table border='0' width='100%' cellspacing='0' cellpadding='3'  bordercolor='#FFF' height='0' style='border-collapse: collapse'> 
							<tr>
								<td height='1' width='1'>
									<center><img src=\"img/voltar.png\" title=\"Voltar\" onClick=\"javascript:window.history.go(-1);\" name=\"voltar\" width=\"20'\" height=\"20\">
								</td>
								<td align=center><B>Cadastrando Mensagem para Dia $dia_select/$mes_select </center></B>
								</td>
							</tr>
						</table>
					</a>
				</div>
			</div>
		</div>
		<div class='thumbnail' style='border-style: solid; border-width: 1px; background-color:#F0F0F0'>
			<form id='mural' name='mural' method='post' action='adm_mensagem_cadastrar_motor.php'>
				<input type='hidden' name='mural_remetente' id='mural_remetente' value='$_SESSION[UsuarioNome]'/>
				<input type='hidden' name='mural_remetente_id'  id='mural_remetente_id' value='$_SESSION[UsuarioID]'/>
				<div class='form-group form-group-sm'>
					<div class='row'>
						<div class='col-xs-12'>
							<input class='form-control' name='mural_assunto' type='text' id='mural_assunto' maxlength='100' wrap='hard' placeholder='Digite o Assunto da Mensagem' required autofocus />
						</div>
					</div>
					<div class='row'>
						<div class='col-xs-2'>
							<input class='form-control' type='number' name='mural_dia' id='mural_dia' value='$dia_select' size='1%' min='1' max='31' wrap='hard'/>
						</div>
						<div class='col-xs-2'>
							<input class='form-control' type='number' name='mural_mes' id='mural_mes' value='$mes_select' size='1%' min='1' max='12' wrap='hard'/>
						</div>
						<div class='col-xs-4'>
							<input class='form-control' type='date' name='mural_data_cadastro' id='mural_data_cadastro' value='$date'>
						</div>
						<div class='col-xs-4'>
							<select class='form-control' type='text' name='mural_prioridade' id='mural_prioridade'/>
								<option>Prioridade</option>
								<option value='danger'>Alta</option>
								<option value='warning'>Normal</option>
								<option value='info'>Baixa</option>
							</select>
						</div>
					</div>
					<div class='row'>
						
					</div>
					<div class='row'>
						<div class='col-xs-12'>
							<textarea class='form-control' name=mural_mensagem id=mural_mensagem rows='7' cols='70%' placeholder='Digite sua mensagem...' required wrap='hard'></textarea>
						</div>
					</div>
				</div>
			</div>
			<div class='row'>
				<div class='col-xs-12'>
					<div class='panel panel-default'>
						<div class='panel-heading'>
							<center><B>Opções</B></center>
						</div>
						<div class='panel-body'>
							<center><font color='#FFA500'>Tem certeza que deseja cadastrar a <b>mensagem</b> para o dia <b>$dia_select/$mes_select</b>?</b></font><br>
							<input type='image' src='img/new.png' name='Concluir Cadastro'  id='button' value='Concluir Cadastro' width='20' height='20'/></center>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</center>";

?>
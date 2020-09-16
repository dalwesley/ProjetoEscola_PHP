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
include ('conecta.php');
$id_select2 	= $_GET['id']; //Recupera a variavel id para fazer o select
$date 			= date('Y-m-d');

$sql = "SELECT *, DATE_FORMAT(mural_data_cadastro, '%d/%m/%Y') as 'mural_data_cadastro' FROM mural where mural_id=$id_select2"; //Faz o select de todos os registros
$query = mysql_query($sql) or die("<center><h1>OOOPS!<BR>Não é esta a pagina que você esperava ver?<BR> Então algo esta errado...</h1><a href='home.php' style='text-decoration: none'><font color='#FF7F00'>Você pode clicar na imagem para voltar</font><p><img border='0' src='img/cones.png' width='544' height='332'></a></p>O Erro de conexão com banco de dados esta descrito logo abaixo!<BR>".mysql_error());
$linha = mysql_fetch_assoc($query);

$mural_id				= $linha ['mural_id'];
$mural_remetente		= $linha ['mural_remetente'];
$mural_assunto			= $linha ['mural_assunto'];
$mural_mensagem			= $linha ['mural_mensagem'];
$mural_dia				= $linha ['mural_dia'];
$mural_mes				= nl2br($linha ['mural_mes']);

echo"<div id=div1>
	<div class='container'>
		<div class='row'>
			<div class='col-sm-12'>
				<div class='alert alert-info' role='alert'>
					<a href='#' class='alert-link'>
						<table border='0' width='100%' cellspacing='0' cellpadding='3'  bordercolor='#FFF' height='0' style='border-collapse: collapse'> 
							<tr>
								<td height='1' width='1'>
									<span class='glyphicon glyphicon-circle-arrow-left' aria-hidden='true' style='font-size: 17px' onClick='javascript:window.history.go(-1);'></span>
								</td>
								<td>
									<center>Editando <B><i>mensagem $mural_assunto </i></B> do dia<i><B> $mural_dia/$mural_mes</i></B></center>
								</td>
								<td height='1' width='1'>
									<img src='img/obser.png' border='0' width='20' height='20' title='Foto'>
								</td>
							</tr>
						</table>
					</a>
				</div>
			</div>
		</div>
		<div class='thumbnail' style='border-style: solid; border-width: 1px; background-color:#F0F0F0'>
			<form id='cadastro' name='cadastro' method='post' action='adm_mensagem_editar_motor.php' enctype='multipart/form-data'>
				<input type='hidden' name='mural_remetente' id='mural_remetente' value='$_SESSION[UsuarioNome]'/> <input type='hidden' name='mural_remetente_id'  id='mural_remetente_id' value='$_SESSION[UsuarioID]'/>
				<input type='hidden' name='mural_id'  id='mural_id' value='$mural_id'/>
				<div class='form-group form-group-sm'>
					<div class='row'>
						<div class='col-xs-12'>
							<input class='form-control' name='mural_assunto' type='text' id='mural_assunto' size='67%' maxlength='60' value='$mural_assunto' placeholder='Digite o Assunto da Mensagem' required autofocus/>
						</div>
					</div>
					<div class='row'>
						<div class='col-xs-3'>
							<input class='form-control' type='number' name='mural_dia' id='mural_dia' value='$mural_dia' size='1%' min='1' max='31'/>
						</div>
						<div class='col-xs-3'>
							<input class='form-control' type='number' name='mural_mes' id='mural_mes' value='$mural_mes' size='1%' min='1' max='12'/>
						</div>
					</div>
					<div class='row'>
						<div class='col-xs-6'>
							<input class='form-control' type='date' name='mural_data_cadastro' id='mural_data_cadastro' value='$date'>
						</div>
					</div>
					<div class='row'>
						<div class='col-xs-12'>
							<textarea class='form-control' name=mural_mensagem id=mural_mensagem rows='7' cols='85%' placeholder='Digite sua mensagem...' required wrap='hard'>$mural_mensagem</textarea>
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
						<div class='panel-body'><center>
							<font color='#0000FF'>Tem certeza que deseja editar a <b>mensagem $mural_assunto</b>?</b></font><br>
							<input type='image' src='img/new.png' name='Concluir Cadastro'  id='button' value='Concluir Cadastro' width='20' height='20'/></center>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</center>";

?>
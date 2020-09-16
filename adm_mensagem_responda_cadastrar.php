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

	#div1 {
			width:100%; /* Tamanho da Largura da Div */
			height:0; /* Tamanho da Altura da Div */
	        top: 0; 
	        margin-top:0%; /* ou seja ele pega 50% da altura tela e sobe metade do valor da altura no caso 100 */
	        left:0;
	        margin-left:0; /* ou seja ele pega 50% da largura tela e diminui  metade do valor da largura no caso 250 */

}
</style>
<script language="JavaScript">
function abrir(URL) {
var width = 700;
var height = 680;
var left = 657;
var top = 0;
window.open(URL,'janela', 'width='+width+', height='+height+', top='+top+', left='+left+', scrollbars=no, status=no, toolbar=no, location=no, directories=no, menubar=no, resizable=no, fullscreen=no');
}
</script>
<script>
function aparece(ahhhh){
if(document.getElementById(ahhhh).style.display== "none"){
document.getElementById(ahhhh).style.display = "block";
}
else {
document.getElementById(ahhhh).style.display = "none"
}
}
</script>
<?php
include "conecta.php";
$id_select = $_GET['id']; //Recupera a variavel id para fazer o select
$date 				= date('Y-m-d');
$sql = "SELECT *, DATE_FORMAT(mural_data_cadastro, '%d/%m/%Y') as 'mural_data_cadastro' FROM mural where mural_id=$id_select"; //Faz o select de todos os registros
$query = mysql_query($sql) or die("<center><h1>OOOPS!<BR>Não é esta a pagina que você esperava ver?<BR> Então algo esta errado...</h1><a href='home.php' style='text-decoration: none'><font color='#FF7F00'>Você pode clicar na imagem para voltar</font><p><img border='0' src='img/cones.png' width='544' height='332'></a></p>O Erro de conexão com banco de dados esta descrito logo abaixo!<BR>".mysql_error());
$result = mysql_num_rows($query);

if($result>=1) {
    while($linha = mysql_fetch_array($query)) {

$mural_id				= $linha ['mural_id'];
$mural_remetente		= $linha ['mural_remetente'];
$mural_assunto			= $linha ['mural_assunto'];
$mural_mensagem			= $linha ['mural_mensagem'];
$mural_dia				= $linha ['mural_dia'];
$mural_mes				= nl2br($linha ['mural_mes']);
$mural_data_cadastro	= $linha ['mural_data_cadastro'];

echo"
	<div class='container'>
		<div class='row'>
			<div class='col-sm-12'>
				<div class='alert alert-success' role='alert'>
					<a href='#' class='alert-link'>
						<table border='0' width='100%' cellspacing='0' cellpadding='3'  bordercolor='#FFF' height='0' style='border-collapse: collapse'> 
							<tr>
								<td height='1' width='1'>
									<span class='glyphicon glyphicon-circle-arrow-left' aria-hidden='true' style='font-size: 17px' onClick='javascript:window.history.go(-1);'></span>
								</td>
								<td>
									<center>Cadastrando comentario da mensagem de numero<i><B> $mural_id</i></B></center>
								</td>
								<td height='1' width='1'>
									<span class='glyphicon glyphicon-info-sign aria-hidden='true' style='font-size: 17px'></span>
								</td>
							</tr>
						</table>
					</a>
				</div>
			</div>
		</div>
		<div class='row'>
			<div class='col-sm-12'>
				<div class='list-group'>
					<a href='#' class='list-group-item'>
						<legend><B>$linha[mural_assunto]</B></legend>
						<table border='0' width='100%' cellspacing='0' cellpadding='3'  bordercolor='#FFF' height='0' style='border-collapse: collapse'>
							<tr>	
								<td>
									Data:	    <B>$mural_data_cadastro</B>
									<BR>Remetente:  <B>$linha[mural_remetente]</B>
									<BR>Mensagem:
									<BR><B>$linha[mural_mensagem]</B>
								</td> 
							</tr>
						</table>					
					</a>
				</div>
			</div>
		</div>
		<div class='panel-group' id='accordion' role='tablist' aria-multiselectable='false'>
			<div class='panel panel-default'>
				<div class='panel-heading' role='tab' id='headingOne'>
					<h4 class='panel-title'>
						<a role='button' data-toggle='collapse' data-parent='#accordion' href='#collapseOne' aria-expanded='true' aria-controls='collapseOne'>
							<center><span class='glyphicon glyphicon-comment' aria-hidden='true' style='font-size: 17px'></span>
						</a>
					</h4>
				</div>
				<div id='collapseOne' class='panel-collapse collapse' role='tabpanel' aria-labelledby='headingOne'>
					<div class='panel-body'>
						<form id='mural' name='mural' method='post' action='adm_mensagem_resposta_cadastrar_motor.php'>
							<input type='hidden' name='mural_resposta_remetente' id='mural_resposta_remetente' value='$_SESSION[UsuarioNome]'/>
							<input type='hidden' name='mural_resposta_remetente_id'  id='mural_resposta_remetente_id' value='$_SESSION[UsuarioID]'/>
							<input type='hidden' name='mural_mensagem_original_id'  id='mural_mensagem_original_id' value='$mural_id'/>
							<div class='form-group form-group-sm'>
								<div class='row'>
									<div class='col-xs-4'>
										<input class='form-control' type='hidden' name='mural_resposta_data_cadastro' id='mural_resposta_data_cadastro' value='$date'>
									</div>
								</div>
								<div class='row'>
									<div class='col-xs-12'>
										<textarea class='form-control' name=mural_resposta_mensagem id=mural_resposta_mensagem rows='7' cols='85%' placeholder='Digite seu comentario a mensagem acima...' required wrap='hard'></textarea>
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
									<center><font color='#FFA500'>Tem certeza que deseja comentar a <b>mensagem nº $mural_id</b>?</font><br>
									<input type='image' src='img/new.png' name='Concluir Cadastro'  id='button' value='Concluir Cadastro' width='20' height='20'/></center>
								</div>
							</div>
						</div>
					</div>
						</form>
				</div>
			</div>
		</div>
	</div>";
    }
} else {
echo"<div id=div2>
<fieldset style='border-style: solid; border-width: 1px; background-color:#F0F0F0'>
<table border='1' width='100%' cellspacing='0' cellpadding='3'  bordercolor='#FFFFFF' height='0' style='border-collapse: collapse'> 
	<tr>
		<td align=center bgcolor=#FFFFFF>
		<br><i><strong>".$linha['aluno_nome']."</i></strong> sem Classificação cadastrada!<br><br>
		</td>
	</tr>
	<tr>
		<td align='center'>
			<b>Cadastrar<br>
			<a href='adm_mensagem_cadastrar.php?id=$aluno_id' style='text-decoration: none'>
			<img src='img/new.png' border='0' width='24' height='24' title='Cadastrar'></a>
		</td>
	</tr>
</table>
</fieldset>
</div>";
}
?>
<?php
include "seguranca_1.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
	<title>A+ - Sistema Integrado</title>
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- As 3 meta tags acima *devem* vir em primeiro lugar dentro do `head`; qualquer outro conte�do deve vir *ap�s* essas tags -->
    
    <link href="css/bootstrap.min.css" rel="stylesheet">								<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">					<!-- Incluindo o CSS do Bootstrap -->
	<script src="http://code.jquery.com/jquery-latest.js"></script>						<!-- Incluindo o jQuery que � requisito do JavaScript do Bootstrap -->
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
<style type="text/css">
	#div1 {
			width:100%; /* Tamanho da Largura da Div */
			height:100%; /* Tamanho da Altura da Div */
    		top:0; 
    		margin-top:0%; /* ou seja ele pega 50% da altura tela e sobe metade do valor da altura no caso 100 */
    		left:0%;
    		margin-left:0; /* ou seja ele pega 50% da largura tela e diminui  metade do valor da largura no caso 250 */
}
	#div2 {
			width:100%; /* Tamanho da Largura da Div */
			height:50%; /* Tamanho da Altura da Div */
    		top:0; 
    		margin-top:40%; /* ou seja ele pega 50% da altura tela e sobe metade do valor da altura no caso 100 */
    		left:0%;
    		margin-left:0; /* ou seja ele pega 50% da largura tela e diminui  metade do valor da largura no caso 250 */
}
</style>
</head>

<body>
<?php
include "conecta.php";
$id_select2 = $_GET['id']; //Recupera a variavel id para fazer o select
$sql = mysql_query("SELECT *, DATE_FORMAT(mural_data_cadastro, '%d/%m/%Y') as 'mural_data_cadastro' from mural where mural_id=$id_select2");
$result = mysql_num_rows($sql);

if($result>=1) {

    while($linha = mysql_fetch_array($sql)) {

$mural_id			= $linha ['mural_id'];
$mural_remetente	= $linha ['mural_remetente'];
$mural_assunto		= $linha ['mural_assunto'];
$mural_mensagem		= $linha ['mural_mensagem'];
$mural_dia			= $linha ['mural_dia'];
$mural_mes			= $linha ['mural_mes'];

echo"<div id=div1>
<form id='excluir' name='excluir' method='post' action='adm_mensagem_excluir_motor.php' enctype='multipart/form-data'>
	<div class='container'>
		<div class='row'>
			<div class='col-sm-12'>
				<div class='alert alert-danger' role='alert'>
					<a href='#' class='alert-link'>
						<table border='0' width='100%' cellspacing='0' cellpadding='3'  bordercolor='#FFF' height='0' style='border-collapse: collapse'> 
							<tr>
								<td height='1' width='1'>
									<span class='glyphicon glyphicon-circle-arrow-left' aria-hidden='true' style='font-size: 17px' onClick='javascript:window.history.go(-1);'></span>
								</td>
								<td>
									<center>Excluindo <B><i>mensagem $mural_assunto </i></B> do dia<i><B> $mural_dia/$mural_mes</i></B></center>
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
			<legend><B>Excluir mensagem n�: $mural_id</B></legend>
			<table border='0' width='100%' cellspacing='0' cellpadding='3'  bordercolor='#FFF' height='0' style='border-collapse: collapse'> 
				<tr>
					<td align='center' bgcolor='#FFF'><img src='img/checked.png' border='0' width='15' height='15' title='Selecione'></pre></td>
					<td align='center' bgcolor='#FFF'><B>Dados da Exclus�o</B></td>
				</tr>
					<td align='center'><input type='checkbox' name='cod[]' value=$linha[mural_id] required/></pre>
					</td>
					<td>
<BR>Data da Mensagem: 	<B>$linha[mural_data_cadastro]</B>
<BR>Remetente:	 	<B>$linha[mural_remetente]</B>
<BR>Mensagem:
<BR><B>$linha[mural_mensagem]</B>
					</td>
				</tr>
			</table>
		</div>";
}
echo"<div class='row'>
				<div class='col-xs-12'>
					<div class='panel panel-default'>
						<div class='panel-heading'>
							<center><B>Op��es</B></center>
						</div>
						<div class='panel-body'><center>
							<p class='text-danger'>Tem certeza que deseja exluir a <b>mensagem $mural_assunto</b>?</b></p>
							<button type='image' name='Excluir'  id='button' value='Excluir' class='btn btn-danger btn-sm'>
								Excluir <span class='glyphicon glyphicon-trash' aria-hidden='true'></span>
							</button>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div></div>
</center>";
}
else{
    echo "<div id=div2>
    <center><h1>OPA!<BR>N�o era bem isso que deveria aparecer!<BR> Ent�o algo esta errado...</h1><a href=home.php style=text-decoration: none><font color=#FF7F00>Voc� pode clicar na imagem para voltar</font><p><img border='0' src='img/cones.png' width='544' height='332'></a></div>";
}
?>
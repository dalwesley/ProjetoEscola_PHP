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
$id_select = $_GET['id']; //Recupera a variavel id para fazer o select
$sql = mysql_query("SELECT * FROM responsavel where responsavel_id=$id_select");
$result = mysql_num_rows($sql);

if($result != 0){

while($linha = mysql_fetch_array($sql)) {
		$responsavel_nome		= $linha['responsavel_nome'];
		$responsavel_aluno		= $linha['responsavel_aluno'];
		$responsavel_id			= $linha['responsavel_id'];
		$responsavel_doc		= $linha['responsavel_doc'];
		$responsavel_sexo		= $linha['responsavel_sexo'];
		$responsavel_data		= $linha['responsavel_data'];
		$responsavel_endereco	= $linha['responsavel_endereco'];
		$responsavel_numero		= $linha['responsavel_numero'];
		$responsavel_bairro		= $linha['responsavel_bairro'];
		$responsavel_cep		= $linha['responsavel_cep'];
		$responsavel_tel_1		= $linha['responsavel_tel_1'];
		$responsavel_tel_2		= $linha['responsavel_tel_2'];
		$responsavel_email		= $linha['responsavel_email'];
		$responsavel_cidade		= $linha['responsavel_cidade'];

echo"
<form id='excluir' name='excluir' method='post' action='adm_responsavel_excluir_motor.php' enctype='multipart/form-data'>
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
									<center>Excluindo <B><i>responsável</i></B> para <i><strong>$responsavel_aluno</center></i></strong>
								</td>
								<td height='1' width='1'>
									<span class='glyphicon glyphicon-info-sign' aria-hidden='true' style='font-size: 17px'></span>
								</td>
							</tr>
						</table>
					</a>
				</div>
			</div>
		</div>
		<div class='thumbnail' style='border-style: solid; border-width: 1px; background-color:#F0F0F0'>
			<legend>Exclusão Responsavel Doc: $responsavel_doc</legend>
			<table border='0' width='100%' cellspacing='0' cellpadding='3'  bordercolor='#FFF' height='0' style='border-collapse: collapse'> 
				<tr>
					<td align='center' bgcolor='#FFF'><img src='img/checked.png' border='0' width='20' height='20' title='Selecione'></td>
					<td align='center' bgcolor='#FFF'><B>Dados da Exclusão</B></td>
				</tr>
					<td align='center'><input type='checkbox' name='cod[]' value=$linha[responsavel_id]  required >
					</td>
					<td>
Nome:		<B>$responsavel_nome</B>
<BR>Data:		<B>$responsavel_data</B>
<BR>Doc:	 	<B>$responsavel_doc</B>
<BR>Endereço:	<B>$responsavel_endereco</B>
<BR>Numero:		<B>$responsavel_numero</B>
<BR>Bairro:		<B>$responsavel_bairro</B>
<BR>CEP:		<B>$responsavel_cep</B>
<BR>Telefone:	<B>$responsavel_tel_1</B>
<BR>Telefone:	<B>$responsavel_tel_2</B>
<BR>email:		<B>$responsavel_email</B>
<BR>Cidade:		<B>$responsavel_cidade</B>
					</td>
				</tr>
			</table>
		</div>";
}
echo"
		<div class='row'>
				<div class='col-xs-12'>
					<div class='panel panel-default'>
						<div class='panel-heading'>
							<center><B>Opções</B></center>
						</div>
						<div class='panel-body'><center>
							Tem certeza que deseja exluir os <b>dados pessoais</b> do(a) <b>$responsavel_nome</b>?</b><br>
							<button type='image' name='Excluir'  id='button' value='Excluir' class='btn btn-default btn-sm'>
								Excluir <span class='glyphicon glyphicon-trash' aria-hidden='true'></span>
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>
</center>";
}
else{
    echo "<div id=div2>
    <center><h1>OPA!<BR>Não era bem isso que deveria aparecer!<BR> Então algo esta errado...</h1><a href=home.php style=text-decoration: none><font color=#FF7F00>Você pode clicar na imagem para voltar</font><p><img border='0' src='img/cones.png' width='544' height='332'></a></div>";
}
?>
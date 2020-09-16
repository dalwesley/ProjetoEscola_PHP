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
	<script src="js/bootstrap.min.js"></script>	
<style type="text/css">

#div1 {
 
        width:100%; /* Tamanho da Largura da Div */
		height:0%; /* Tamanho da Altura da Div */
        top:0; 
        margin-top:35%; /* ou seja ele pega 50% da altura tela e sobe metade do valor da altura no caso 100 */
        left:0%;
       margin-left:0%; /* ou seja ele pega 50% da largura tela e diminui  metade do valor da largura no caso 250 */
		background-color:#FFFFFF;
 
}
</style>
<?php 
 
$host= '127.0.0.1';
$bd= 'escola';
$senhabd= '';
$userbd = 'root';
 
// RECEBENDO OS DADOS PREENCHIDOS DO FORMULÁRIO !
	
$aluno_nome						= isset($_POST ["aluno_nome"]) 						? $_POST['aluno_nome'] : '';
$aluno_id						= isset($_POST ["aluno_id"])						? $_POST['aluno_id'] : '';
$tipo							= isset($_POST ["tipo"])							? $_POST['tipo'] : '';
$aluno_ra						= isset($_POST ["aluno_ra"])						? $_POST['aluno_ra'] : '';
$aluno_cat						= isset($_POST ["aluno_cat"])						? $_POST['aluno_cat'] : '';
$aluno_sexo						= isset($_POST ["aluno_sexo"]) 						? $_POST['aluno_sexo'] : '';
$aluno_data						= isset($_POST ["aluno_data"]) 						? $_POST['aluno_data'] : '';
$aluno_nascimento				= isset($_POST ["aluno_nascimento"])				? $_POST['aluno_nascimento'] : '';
$aluno_estado					= isset($_POST ["aluno_estado"]) 					? $_POST['aluno_estado'] : '';
$aluno_nacionalidade        	= isset($_POST ["aluno_nacionalidade"]) 			? $_POST['aluno_nacionalidade'] : '';
$aluno_cor						= isset($_POST ["aluno_cor"]) 						? $_POST['aluno_cor'] : '';
$aluno_mae						= isset($_POST ["aluno_mae"]) 						? $_POST['aluno_mae'] : '';
$aluno_pai						= isset($_POST ["aluno_pai"]) 						? $_POST['aluno_pai'] : '';
$aluno_endereco					= isset($_POST ["aluno_endereco"]) 					? $_POST['aluno_endereco'] : '';
$aluno_numero					= isset($_POST ["aluno_numero"]) 					? $_POST['aluno_numero'] : '';
$aluno_bairro 					= isset($_POST ["aluno_bairro"]) 					? $_POST['aluno_bairro'] : '';
$aluno_cep						= isset($_POST ["aluno_cep"]) 						? $_POST['aluno_cep'] : '';
$aluno_tel_1					= isset($_POST ["aluno_tel_1"]) 					? $_POST['aluno_tel_1'] : '';
$aluno_tel_2					= isset($_POST ["aluno_tel_2"]) 					? $_POST['aluno_tel_2'] : '';
$aluno_tel_3					= isset($_POST ["aluno_tel_3"]) 					? $_POST['aluno_tel_3'] : '';
$aluno_email					= isset($_POST ["aluno_email"]) 					? $_POST['aluno_email'] : '';
$aluno_cidade					= isset($_POST ["aluno_cidade"]) 					? $_POST['aluno_cidade'] : '';
$data 							= date("D/m/Y");

//conectando com o localhost - mysql
$conexao = mysql_connect($host, $userbd, $senhabd);
if (!$conexao)
	die ("Erro de conexão com localhost, o seguinte erro ocorreu -> ".mysql_error());
//conectando com a tabela do banco de dados
$banco = mysql_select_db($bd,$conexao);
if (!$banco)
	die ("Erro de conexão com banco de dados, o seguinte erro ocorreu -> ".mysql_error());
//Verificando se algo foi digitado:
if ($aluno_ra>"1" && $aluno_nome>"1"){
$query = mysql_query("SELECT * FROM dados_pessoais_aluno WHERE aluno_ra='$aluno_ra'");
$numeros = mysql_num_rows ($query);
if ($numeros>"0"){
echo"<div id=div1>
<fieldset style='border-style: solid; border-width: 1px; background-color:#FFF'>
<table border='1' width='100%' cellspacing='0' cellpadding='3'  bordercolor='#FFF' height='0' style='border-collapse: collapse'> 
	<tr>
		<td height='1' width='1'>
			<center><img src=\"img/voltar.png\" title=\"Voltar\" onClick=\"javascript:window.history.go(-1);\" name=\"voltar\" width=\"20'\" height=\"20\">
		</td>
		<td><center><i><strong><h2>Opa!</h2></i></strong><pre>
<i><strong>$aluno_nome - $aluno_ra</i></strong><BR>
Este nome já está cadastrado em nosso banco de dados!
Verifique se o nome e/ou R.A foram digitados corretamente!<BR><BR>
<img src='img/nervousface.jpg' border='0' width='50' height='50' title='Cadastrar prof'></pre>
		</td>
		<td height='1' width='1'>
			<center><img src='img/fechar.png' title=\"Fechar\" onclick='self.close()' name=\"Fechar\" width=\"20'\" height=\"20\">
		</td>
	</tr>
</table></fieldset>";

}
else{
//conectando com o BD para gravar os dados
$query = "INSERT INTO `dados_pessoais_aluno` (`aluno_id` , `aluno_ra` , `tipo` , `aluno_nome` , `aluno_sexo` , `aluno_data` , `aluno_nascimento` , `aluno_estado` , `aluno_nacionalidade` , `aluno_cor` , `aluno_mae` , `aluno_pai` , `aluno_endereço` , `aluno_numero` , `aluno_tel_1`, `aluno_tel_2` , `aluno_tel_3` , `aluno_email` , `aluno_cidade` , `aluno_bairro` , `aluno_cep`)
VALUES 								   		 ('$aluno_id', '$aluno_ra', '$tipo', '$aluno_nome', '$aluno_sexo', '$aluno_data', '$aluno_nascimento', '$aluno_estado', '$aluno_nacionalidade', '$aluno_cor', '$aluno_mae', '$aluno_pai', '$aluno_endereco', '$aluno_numero', '$aluno_tel_1', '$aluno_tel_2', '$aluno_tel_3', '$aluno_email', '$aluno_cidade', '$aluno_bairro', '$aluno_cep')";
 
mysql_query($query,$conexao);
 
echo "
<div id=div1>
	<div class='container-fluid'>
		<div class='row'>
			<div class='col-xs-12 col-sm-12'>
				<div class='alert alert-success' role='alert'>
					<a href='#' class='alert-link'>
						<table border='1' width='100%' cellspacing='0' cellpadding='3'  bordercolor='#FFFFFF' height='0' style='border-collapse: collapse'> 
							<tr>
								<td align=center bgcolor=#FFFFFF colspan='2'>
								<i><strong><center>Cadastrado com sucesso!</i></strong>
								</td>
							</tr>
						 
							<tr>
								<td align='center'>
									<b>Cadastrar<br>
									<a href='adm_aluno_cadastrar_dados_pessoais.php' title='Cadastrar novo Aluno' class='alert-link'>
										<span class='glyphicon glyphicon glyphicon-file' aria-hidden='true' style='font-size: 17px'></span>
									</a>
								</td>
								<td align='center'>
									<b>Fechar<br>
									<a href='#' onclick='window.close()' title='Fechar' class='alert-link'>
										<span class='glyphicon glyphicon glyphicon-remove' aria-hidden='true' style='font-size: 17px'></span>
									</a>
								</td>
							</tr>
						</table>
					</a>
				</div>
			</div>
		</div>
	</div>
</div>";
}
}
?>
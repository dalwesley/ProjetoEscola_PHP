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
$sql = "SELECT * FROM dados_pessoais_aluno where aluno_id=$id_select"; //Faz o select de todos os registros
$query = mysql_query($sql) or die("<center><h1>OOOPS!<BR>Não é esta a pagina que você esperava ver?<BR> Então algo esta errado...</h1><a href='home.php' style='text-decoration: none'><font color='#FF7F00'>Você pode clicar na imagem para voltar</font><p><img border='0' src='img/cones.png' width='544' height='332'></a></p>O Erro de conexão com banco de dados esta descrito logo abaixo!<BR>".mysql_error());
$linha = mysql_fetch_assoc($query);

		$aluno_ra				= $linha['aluno_ra'];
		$aluno_id				= $linha['aluno_id'];
		$aluno_nome				= $linha['aluno_nome'];
?>
<?php
include "conecta.php";
$id_select2 = $_GET['opcao']; //Recupera a variavel id para fazer o select
$sql = mysql_query("SELECT *, DATE_FORMAT(matricula_data, '%d/%m/%Y') as 'matricula_data'
							, DATE_FORMAT(matricula_situacao_data, '%d/%m/%Y') as 'matricula_situacao_data'
 from matricula where matricula_id=$id_select2");
$result = mysql_num_rows($sql);

if($result>=1) {
    while($linha = mysql_fetch_array($sql)) {

$matricula_id				= $linha['matricula_id'];
$matricula_aluno_nome		= $linha['matricula_aluno_nome'];
$matricula_aluno_id			= $linha['matricula_aluno_id'];
$matricula_aceito_normas	= $linha['matricula_aceito_normas'];
$matricula_ano_civil		= $linha['matricula_ano_civil'];
$matricula_ano_letivo		= $linha['matricula_ano_letivo'];
$matricula_tipo_ensino		= $linha['matricula_tipo_ensino'];
$matricula_data				= $linha['matricula_data'];
$matricula_turno_turma		= $linha['matricula_turno_turma'];
$matricula_turno_ano		= $linha['matricula_turno_ano'];
$matricula_numero_chamada	= $linha['matricula_numero_chamada'];
$matricula_idade			= $linha['matricula_idade'];
$matricula_situacao_aluno	= $linha['matricula_situacao_aluno'];
$matricula_situacao_data	= $linha['matricula_situacao_data'];
$matricula_responsavel		= $linha['matricula_responsavel'];
$matricula_secretario		= $linha['matricula_secretario'];
$matricula_diretor			= $linha['matricula_diretor'];

echo" <div id=div1>
<form id='excluir' name='excluir' method='post' action='adm_aluno_matricula_excluir_motor.php' enctype='multipart/form-data'>
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
									<center>Excluindo <B><i>matrícula</i></B> para <i><strong> $aluno_nome - $aluno_ra </center></i></strong>
								</td>
								<td height='1' width='1'>
									<span class='glyphicon glyphicon-info-sign' aria-hidden='true'></span>
								</td>
							</tr>
						</table>
					</a>
				</div>
			</div>
		</div>
		<div class='thumbnail' style='border-style: solid; border-width: 1px; background-color:#F0F0F0'>
			<legend><B>$matricula_ano_letivo - $matricula_tipo_ensino ($matricula_ano_civil)</B></legend>
			<table border='0' width='100%' cellspacing='0' cellpadding='3'  bordercolor='#FFF' height='0' style='border-collapse: collapse'> 
				<tr>
					<td align='center' bgcolor='#FFF'><img src='img/checked.png' border='0' width='15' height='15' title='Selecione'></pre></td>
					<td align='center' bgcolor='#FFF'><B>Dados da Exclusão</B></td>
				</tr>
					<td align='center'><input type='checkbox' name='cod[]' value=$matricula_id required/></pre>
					</td>
					<td>
<BR>Matricula no: <B>$matricula_ano_letivo</B> do Ensino: <B>$matricula_tipo_ensino</B> em <B>$matricula_data</B>
<BR>Declarou acatar as normas desse Estabelecimento de Ensino: <B>$matricula_aceito_normas</B>
<BR>
<BR>Ano: <B>$matricula_ano_civil</B>	Série: <B>$matricula_turno_ano</B>    Turma: <B>$matricula_turno_turma</B>    Nº Chamada: <B>$matricula_numero_chamada</B>    Idade: <B>$matricula_idade</B>
<BR>		
<BR>Situação do aluno na Escola: <B>$matricula_situacao_aluno</B> em <B>$matricula_situacao_data</B>
<BR>
<BR>Responsável:	<B>$matricula_responsavel</B>
<BR>Secretario:	<B>$matricula_secretario</B>
<BR>Diretor:	<B>$matricula_diretor</B>
					</td>
				</tr>
			</table>
		</div>";
}
echo"<div class='row'>
				<div class='col-xs-12'>
					<div class='panel panel-default'>
						<div class='panel-heading'>
							<center><B>Opções</B></center>
						</div>
						<div class='panel-body'><center>
							Tem certeza que deseja exluir a <b>procedência</b> para <b>$aluno_nome</b>?</b><br>
							<button type='image' name='Excluir'  id='button' value='Excluir' class='btn btn-default btn-sm'>
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
    <center><h1>OPA!<BR>Não era bem isso que deveria aparecer!<BR> Então algo esta errado...</h1><a href=home.php style=text-decoration: none><font color=#FF7F00>Você pode clicar na imagem para voltar</font><p><img border='0' src='img/cones.png' width='544' height='332'></a></div>";
}
?>
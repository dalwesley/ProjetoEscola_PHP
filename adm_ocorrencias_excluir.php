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
	        top: 0%; 
	        margin-top:0%; /* ou seja ele pega 50% da altura tela e sobe metade do valor da altura no caso 100 */
	        left:0;
	        margin-left:0; /* ou seja ele pega 50% da largura tela e diminui  metade do valor da largura no caso 250 */

}
	#div2 {
			width:100%; /* Tamanho da Largura da Div */
			height:0; /* Tamanho da Altura da Div */
	        top: 0%; 
	        margin-top:30%; /* ou seja ele pega 50% da altura tela e sobe metade do valor da altura no caso 100 */
	        left:0;
	        margin-left:0; /* ou seja ele pega 50% da largura tela e diminui  metade do valor da largura no caso 250 */
}
</style>

</head>
<?php
include "conecta.php";
$id_select1 = $_GET['id']; //Recupera a variavel id para fazer o select
$sql = "SELECT * FROM dados_pessoais_aluno where aluno_id=$id_select1"; //Faz o select de todos os registros
$query = mysql_query($sql) or die("<center><h1>OOOPS!<BR>Não é esta a pagina que você esperava ver?<BR> Então algo esta errado...</h1><a href='home.php' style='text-decoration: none'><font color='#FF7F00'>Você pode clicar na imagem para voltar</font><p><img border='0' src='img/cones.png' width='544' height='332'></a></p>O Erro de conexão com banco de dados esta descrito logo abaixo!<BR>".mysql_error());
$linha = mysql_fetch_assoc($query);

		$aluno_ra				= $linha['aluno_ra'];
		$aluno_id				= $linha['aluno_id'];
		$aluno_nome				= $linha['aluno_nome'];
?>
<?php
include "conecta.php";
$id_select2 = $_GET['opcao']; //Recupera a variavel id para fazer o select
$sql = mysql_query("SELECT *, DATE_FORMAT(ocorrencias_data, '%d/%m/%Y') as 'ocorrencias_data' FROM ocorrencias where ocorrencias_id=$id_select2");
$result = mysql_num_rows($sql);

if($result>=1) {

while($linha = mysql_fetch_array($sql)) {

$ocorrencias_id							=  $linha['ocorrencias_id'];
$ocorrencias_aluno_id					=  $linha['ocorrencias_aluno_id'];
$ocorrencias_aluno_nome					=  $linha['ocorrencias_aluno_nome'];
$ocorrencias_serie						=  $linha['ocorrencias_serie'];
$ocorrencias_turma						=  $linha['ocorrencias_turma'];
$ocorrencias_professor_nome				=  $linha['ocorrencias_professor_nome'];
$ocorrencias							=  $linha['ocorrencias'];
$ocorrencias_outros						=  $linha['ocorrencias_outros'];
$ocorrencias_data						=  $linha['ocorrencias_data'];
$ocorrencias_hora						=  $linha['ocorrencias_hora'];
$ocorrencias_data_responsavel_ciente	=  $linha['ocorrencias_data_responsavel_ciente'];
$ocorrencias_responsavel_ciente			=  $linha['ocorrencias_responsavel_ciente'];
$ocorrencias_responsavel            	=  $linha['ocorrencias_responsavel'];
$ocorrencias_professor_providencia		=  $linha['ocorrencias_professor_providencia'];
$ocorrencias_direcao_providencia		=  $linha['ocorrencias_direcao_providencia'];
$ocorrencias_data						=  $linha['ocorrencias_data'];

echo"
<form id='excluir' name='excluir' method='post' action='adm_ocorrencias_excluir_motor.php' enctype='multipart/form-data'>
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
									<center>Excluindo <B><i>ocorrência</i></B> para <i><strong> $aluno_nome - $aluno_ra </center></i></strong>
								</td>
								<td height='1' width='1'>
									<span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true' style='font-size: 17px'></span>
								</td>
							</tr>
						</table>
					</a>
				</div>
			</div>
		</div>
		<div class='thumbnail' style='border-style: solid; border-width: 1px; background-color:#F0F0F0'>
			<legend><B>$ocorrencias_id - $ocorrencias ($ocorrencias_data)</B></legend>
			<table border='0' width='100%' cellspacing='0' cellpadding='3'  bordercolor='#FFF' height='0' style='border-collapse: collapse'> 
				<tr>
					<td align='center' bgcolor='#FFF'><img src='img/checked.png' border='0' width='15' height='15' title='Selecione'></pre></td>
					<td align='center' bgcolor='#FFF'><B>Dados da Exclusão</B></td>
				</tr>
					<td align='center'><input type='checkbox' name='cod[]' value=$ocorrencias_id required/></pre>
					</td>
					<td>
						<B>Professor(a):</B> $ocorrencias_professor_nome
						<BR><B>Data da Ocorrência:</B> $ocorrencias_data
						<BR>
						<BR><B>Outras Ocorrências:</B>
						<BR>$ocorrencias_outros
						<BR>
						<BR><B>Responsavel:</B>
						<BR>$ocorrencias_responsavel - $ocorrencias_responsavel_ciente
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
							Tem certeza que deseja exluir a <b>ocorrência</b> para <b>$aluno_nome</b>?</b><br>
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
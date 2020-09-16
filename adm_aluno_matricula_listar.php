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
<script language="JavaScript">
function abrir(URL) {
var width = 700;
var height = 680;
var left = 657;
var top = 0;
window.open(URL,'janela', 'width='+width+', height='+height+', top='+top+', left='+left+', scrollbars=no, status=no, toolbar=no, location=no, directories=no, menubar=no, resizable=no, fullscreen=no');
}
</script>

<script language='javascript'>
				function imprime(text){
				text=document
				print(text) }	     
</script>
</head>
<?php
include ('conecta.php');
$id_select1 = $_GET['id'];		//Recupera a variavel id para fazer o select
$sql = "SELECT * FROM dados_pessoais_aluno where aluno_id=$id_select1"; //Faz o select de todos os registros
$query = mysql_query($sql) or die("<center><h1>OOOPS!<BR>Não é esta a pagina que você esperava ver?<BR> Então algo esta errado...</h1><a href='home.php' style='text-decoration: none'><font color='#FF7F00'>Você pode clicar na imagem para voltar</font><p><img border='0' src='img/cones.png' width='544' height='332'></a></p>O Erro de conexão com banco de dados esta descrito logo abaixo!<BR>".mysql_error());
$linha = mysql_fetch_assoc($query);

		$aluno_ra				= $linha['aluno_ra'];
		$aluno_id				= $linha['aluno_id'];
		$aluno_nome				= $linha['aluno_nome'];
?>
<?php
include "conecta.php";
$id_select = $_GET['id']; //Recupera a variavel id para fazer o select
$sql = mysql_query("SELECT *,DATE_FORMAT(matricula_data	, '%d/%m/%Y') as 'matricula_data', DATE_FORMAT(matricula_situacao_data, '%d/%m/%Y') as 'matricula_situacao_data' from matricula where matricula_aluno_id=$id_select");
$result = mysql_num_rows($sql);
$valor = 0;	

if($result>=1) {
echo"
	<div class='container-fluid'>
		<div class='row'>
			<div class='col-sm-12'>
				<div class='alert alert-success' role='alert'>
					<table border='0' width='100%' cellspacing='0' cellpadding='3'  bordercolor='#FFF' height='0' style='border-collapse: collapse'> 
						<tr>
							<td height='1' width='1'>
								<span class='glyphicon glyphicon-map-marker' aria-hidden='true' style='font-size: 17px'></span>
							</td>
							<td>
								<center>Exibindo <B><i>matrícula</i></B>  para <i><strong>$aluno_nome - $aluno_ra</center></i></strong>
							</td>
						</tr>
					</table>
				</div>
			</div>
		</div>";

	   while($linha = mysql_fetch_array($sql)) {
$matricula_id	    		= $linha['matricula_id'];
$matricula_aluno_id			= $linha['matricula_aluno_id'];
$matricula_aluno_nome		= $linha['matricula_aluno_nome'];
$matricula_aceito_normas	= $linha['matricula_aceito_normas'];
$matricula_ano_civil		= $linha['matricula_ano_civil'];
$matricula_ano_letivo		= $linha['matricula_ano_letivo'];
$matricula_tipo_ensino		= $linha['matricula_tipo_ensino'];
$matricula_data				= $linha['matricula_data'];
$matricula_turno_ano		= $linha['matricula_turno_ano'];
$matricula_turno_turma		= $linha['matricula_turno_turma'];
$matricula_numero_chamada	= $linha['matricula_numero_chamada'];
$matricula_idade			= $linha['matricula_idade'];
$matricula_situacao_aluno	= $linha['matricula_situacao_aluno'];
$matricula_situacao_data	= $linha['matricula_situacao_data'];	
$matricula_responsavel		= $linha['matricula_responsavel'];
$matricula_secretario		= $linha['matricula_secretario'];
$matricula_diretor			= $linha['matricula_diretor'];
$valor++;
echo "
		<div class='row'>
			<div class='col-sm-12'>
				<div class='panel-group' id='accordion' role='tablist' aria-multiselectable='false'>
					<div class='panel panel-default'>
						<div class='panel-heading' role='tab' id='heading$valor'>
							<h4 class='panel-title'>
								<a role='button' data-toggle='collapse' data-parent='#accordion' href='#collapse$valor' aria-expanded='true' aria-controls='collapseOne' title='Clique para comentar essa mensagem!'>
									$valor - Série: $matricula_ano_letivo - ($matricula_data)
								</a>
							</h4>
						</div>
						<div id='collapse$valor' class='panel-collapse collapse' role='tabpanel' aria-labelledby='heading$valor'>
							<div class='panel-body'>
Solicitou matricula no: <B>$matricula_ano_letivo</B> do Ensino: <B>$matricula_tipo_ensino</B> em <B>$matricula_data</B>
<BR>Ano civil: <B>$matricula_ano_civil</B>    Série: <B>$matricula_turno_ano</B>    Turma: <B>$matricula_turno_turma</B>    Nº Chamada: <B>$matricula_numero_chamada</B>    Idade: <B>$matricula_idade</B>
<BR>	
<BR>Situação do aluno na Escola: <B>$matricula_situacao_aluno</B> em <B>$matricula_situacao_data</B>
<BR>Declarou acatar as normas desse Estabelecimento de Ensino: <B>$matricula_aceito_normas</B>
<BR>
<BR>Responsável:	<B>$matricula_responsavel</B>
<BR>Secretario:	<B>$matricula_secretario</B>
<BR>Diretor:	<B>$matricula_diretor</B>
								<div class='panel-body'>
									<div class='btn-group btn-group-justified' role='group' aria-label='...'>
										<div class='btn-group' role='group'>
											<a href='adm_aluno_matricula_editar.php?id=$matricula_aluno_id&&opcao=$matricula_id' class='alert-link' title='Editar dados pessoais'>
												<button type='image' name='Editar'  id='button' value='Editar' class='btn btn-default btn-sm'>
													Editar <span class='glyphicon glyphicon-edit' aria-hidden='true'></span>
												</button>
											</a>
										</div>
										<div class='btn-group' role='group'>
											<a href='adm_aluno_matricula_excluir.php?id=$matricula_aluno_id&&opcao=$matricula_id' class='alert-link' title='Excluir dados pessoais'>
												<button type='image' name='Excluir'  id='button' value='Excluir' class='btn btn-default btn-sm'>
													Excluir <span class='glyphicon glyphicon-trash' aria-hidden='true' onClick=\"javascript:abrir('adm_aluno_excluir_dados_pessoais.php?id=$aluno_id','03');\"></span>
												</button>
											</a>
										</div>
										<div class='btn-group' role='group'>
											<a href=onClick='imprime()' class='alert-link' title='Excluir dados pessoais'>
												<button type='image' name='Excluir'  id='button' value='Excluir' class='btn btn-default btn-sm'>
													Imprimir <span class='glyphicon glyphicon-print' aria-hidden='true' ></span>
												</button>
											</a>
										</div>
									</div>				
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>";
}
echo"	<div class='row'>
			<div class='col-sm-12'>
				<div class='panel panel-default'>
					<div class='panel-heading'>
						<center><i><strong>Opções</i></strong></center>
					</div>
					<div class='panel-body'>
						<div class='btn-group btn-group-justified' role='group' aria-label='...'>
							<div class='btn-group' role='group'>
								<a href='adm_aluno_matricula_cadastrar.php?id=$matricula_aluno_id' class='alert-link' title='Cadastrar Responsavel'>
									<button type='image' name='Cadastrar'  id='button' value='Cadastrar' class='btn btn-default btn-sm'>
										Cadastrar <span class='glyphicon glyphicon-edit' aria-hidden='true'></span>
									</button>
								</a>
							</div>
							<div class='btn-group' role='group'>
								<a href=onClick='imprime()' class='alert-link' title='Imprimir matrícula'>
									<button type='image' name='Imprimir'  id='button' value='Imprimir' class='btn btn-default btn-sm'>
										Imprimir <span class='glyphicon glyphicon-print' aria-hidden='true' ></span>
									</button>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>";

} else {
echo"<div id=div2>
		<div class='row-fluid'>
			<div class='col-sm-12'>
				<div class='panel panel-default'>
					<div class='panel-heading'>
						<center><i><strong>".$linha['aluno_nome']."</i></strong> sem matrícula cadastrado!
					</div>
					<div class='panel-body'>
						<table border='1' width='100%' cellspacing='0' cellpadding='3'  bordercolor='#FFFFFF' height='0' style='border-collapse: collapse'> 
							<tr>
								<td align='center'>
									<b>Cadastrar<br>
									<a href='adm_aluno_matricula_cadastrar.php?id=$aluno_id' style='text-decoration: none'>
									<img src='img/new.png' border='0' width='24' height='24' title='Cadastrar'></a>
								</td>
							</tr>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>";
}
?>
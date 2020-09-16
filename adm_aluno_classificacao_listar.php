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
$sql = mysql_query("SELECT *, DATE_FORMAT(class_pela_comp_data, '%d/%m/%Y') as 'class_pela_comp_data' 
							, DATE_FORMAT(reclass_pela_comp_data, '%d/%m/%Y') as 'reclass_pela_comp_data'
							, DATE_FORMAT(reclass_pelo_conselho_data, '%d/%m/%Y') as 'reclass_pelo_conselho_data'
from classificacao where class_aluno_id=$id_select");
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
								<span class='glyphicon glyphicon-sort' aria-hidden='true' style='font-size: 17px'></span>
							</td>
							<td>
								<center>Exibindo <B><i>classificação</i></B>  para <i><strong>$aluno_nome - $aluno_ra</center></i></strong>
							</td>
						</tr>
					</table>
				</div>
			</div>
		</div>";

	   while($linha = mysql_fetch_array($sql)) {
$class_id						= $linha['class_id'];	    
$class_responsavel				= $linha['class_responsavel'];
$class_secretario				= $linha['class_secretario'];
$class_diretor					= $linha['class_diretor'];
$class_pela_comp_data			= $linha['class_pela_comp_data'];
$class_pela_comp_para_o_ano		= $linha['class_pela_comp_para_o_ano'];
$reclass_pela_comp_data			= $linha['reclass_pela_comp_data'];
$reclass_pela_comp_para_ano		= $linha['reclass_pela_comp_para_ano'];
$reclass_pelo_conselho_data		= $linha['reclass_pelo_conselho_data'];
$reclass_pelo_conselho_ano		= $linha['reclass_pelo_conselho_ano'];
$class_aluno_id					= $linha['class_aluno_id'];
$class_aluno_nome				= $linha['class_aluno_nome'];
$valor++;
		
echo "	<div class='row'>
			<div class='col-sm-12'>
				<div class='panel-group' id='accordion' role='tablist' aria-multiselectable='false'>
					<div class='panel panel-default'>
						<div class='panel-heading' role='tab' id='heading$valor'>
							<h4 class='panel-title'>
								<a role='button' data-toggle='collapse' data-parent='#accordion' href='#collapse$valor' aria-expanded='true' aria-controls='collapseOne' title='Clique para comentar essa mensagem!'>
									$valor - $class_pela_comp_para_o_ano Série/Ano ($class_pela_comp_data)
								</a>
							</h4>
						</div>
						<div id='collapse$valor' class='panel-collapse collapse' role='tabpanel' aria-labelledby='heading$valor'>
							<div class='panel-body'>
Classificação através de Avaliação de Competência em:	<B>$class_pela_comp_data</B> para o <B>$class_pela_comp_para_o_ano</B> ano.
<BR>Reclassificação através de Avaliação de Competência em:	<B>$reclass_pela_comp_data</B> para o <B>$reclass_pela_comp_para_ano</B> ano.
<BR>Reclassificação por decisão do Conselho de Classe:	<B>$reclass_pelo_conselho_data</B> para o <B>$reclass_pelo_conselho_ano</B> ano.
<BR>
<BR>Responsavel:	<B>$class_responsavel</B>
<BR>Secretário: 	<B>$_SESSION[UsuarioNome]</B>
<BR>Diretor(a):	<B>$class_diretor</B>
								<div class='panel-body'>
									<div class='btn-group btn-group-justified' role='group' aria-label='...'>
										<div class='btn-group' role='group'>
											<a href='adm_aluno_classificacao_editar.php?id=$class_aluno_id&&opcao=$class_id' class='alert-link' title='Editar procedencia'>
												<button type='image' name='Editar'  id='button' value='Editar' class='btn btn-default btn-sm'>
													Editar <span class='glyphicon glyphicon-pencil' aria-hidden='true'></span>
												</button>
											</a>
										</div>
										<div class='btn-group' role='group'>
											<a href='adm_aluno_classificacao_excluir.php?id=$class_aluno_id&&opcao=$class_id' class='alert-link' title='Excluir procedencia'>
												<button type='image' name='Excluir'  id='button' value='Excluir' class='btn btn-default btn-sm'>
													Excluir <span class='glyphicon glyphicon-trash' aria-hidden='true'></span>
												</button>
											</a>
										</div>
										<div class='btn-group' role='group'>
											<a href=onClick='imprime()' class='alert-link' title='Excluir procedencia'>
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
								<a href='adm_aluno_classificacao_cadastrar.php?id=$class_aluno_id' class='alert-link' title='Cadastrar Responsavel'>
									<button type='image' name='Cadastrar'  id='button' value='Cadastrar' class='btn btn-default btn-sm'>
										Cadastrar <span class='glyphicon glyphicon-ok' aria-hidden='true'></span>
									</button>
								</a>
							</div>
							<div class='btn-group' role='group'>
								<a href=onClick='imprime()' class='alert-link' title='Imprimir Procedencia'>
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
						<center><i><strong>".$linha['aluno_nome']."</i></strong> sem classificação cadastrada!
					</div>
					<div class='panel-body'>
						<table border='1' width='100%' cellspacing='0' cellpadding='3'  bordercolor='#FFFFFF' height='0' style='border-collapse: collapse'> 
							<tr>
								<td align='center'>
									<b>Cadastrar<br>
									<a href='adm_aluno_classificacao_cadastrar.php?id=$aluno_id' style='text-decoration: none'>
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
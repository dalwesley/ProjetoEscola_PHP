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
error_reporting(E_ERROR | E_WARNING | E_PARSE);
$conex = mysql_connect("localhost", "root", "");
mysql_select_db("escola", $conex);
$id_select = $_GET['id']; //Recupera a variavel id para fazer o select
$sql = "SELECT * FROM dados_pessoais_aluno where aluno_id=$id_select"; //Faz o select de todos os registros
$query = mysql_query($sql) or die("<center><h1>OOOPS!<BR>Não é esta a pagina que você esperava ver?<BR> Então algo esta errado...</h1><a href='home.php' style='text-decoration: none'><font color='#FF7F00'>Você pode clicar na imagem para voltar</font><p><img border='0' src='img/cones.png' width='544' height='332'></a></p>O Erro de conexão com banco de dados esta descrito logo abaixo!<BR>".mysql_error());
$linha = mysql_fetch_assoc($query);

		$aluno_ra					= $linha['aluno_ra'];
		$aluno_id					= $linha['aluno_id'];
		$aluno_nome					= $linha['aluno_nome'];
?>
<?php

$conex = mysql_connect("localhost", "root", "");
mysql_select_db("escola", $conex);
$id_select = $_GET['id']; //Recupera a variavel id para fazer o select
$sql = "SELECT * FROM foto where foto_aluno_id=$id_select"; //Faz o select de todos os registros
$query = mysql_query($sql) or die("<center><h1>OOOPS!<BR>Não é esta a pagina que você esperava ver?<BR> Então algo esta errado...</h1><a href='home.php' style='text-decoration: none'><font color='#FF7F00'>Você pode clicar na imagem para voltar</font><p><img border='0' src='img/cones.png' width='544' height='332'></a></p>O Erro de conexão com banco de dados esta descrito logo abaixo!<BR>".mysql_error());
$result = mysql_num_rows($query);
$valor = 0;

if($result>=1) {

echo"
 <div class='container-fluid'>
		<div class='row'>
			<div class='col-sm-12'>
				<div class='well well-sm'>
					<a href='adm_mensagem_cadastrar.php?m=$mes_select&&d=$dia_select','mural' title='cadastrar mensagem para o dia $dia_select do mês $mes_select' class='alert-link'>
						<table border='0' width='100%' cellspacing='0' cellpadding='3'  bordercolor='#FFF' height='0' style='border-collapse: collapse'> 
							<tr>
								<td height='1' width='1'>
									<span class='glyphicon glyphicon-camera' aria-hidden='true' style='font-size: 17px'></span>
								</td>
								<td>
									<center>Exibindo <B><i>foto</i></B> para <i><strong> $aluno_nome - $aluno_ra </center></i></strong>
								</td>
							</tr>
						</table>
					</a>
				</div>
			</div>
		</div>";

	    while($linha = mysql_fetch_array($query)) {

		$foto_aluno_nome	 	= $linha['foto_aluno_nome'];
		$foto_aluno_id 			= $linha['foto_aluno_id'];
		$foto	 				= $linha['foto'];
		$valor++;
		
echo "	<div class='row'>
			<div class='col-sm-12'>
				<div class='panel-group' id='accordion' role='tablist' aria-multiselectable='true'>
					<div class='panel panel-default'>
						<div class='panel-heading' role='tab' id='heading$valor'>
							<h4 class='panel-title'>
								<a role='button' data-toggle='collapse' data-parent='#accordion' href='#collapse$valor' aria-expanded='true' aria-controls='collapseOne' title='Clique para comentar essa mensagem!'>
									$foto_aluno_nome - $foto_aluno_id
								</a>
							</h4>
						</div>
						<div id='collapse$valor' class='panel-collapse collapse in' role='tabpanel' aria-labelledby='heading$valor'>
							<div class='panel-body'><center>
								<img src='getImagem.php?id=$linha[foto_aluno_id]' border='1' width='300' height='300'>
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
								<a href='adm_foto_editar.php?id=$foto_aluno_id' class='alert-link' title='Editar procedencia'>
									<button type='image' name='Editar'  id='button' value='Editar' class='btn btn-default btn-sm'>
										Editar <span class='glyphicon glyphicon-edit' aria-hidden='true'></span>
									</button>
								</a>
							</div>
							<div class='btn-group' role='group'>
								<a href='adm_foto_excluir.php?id=$foto_aluno_id' class='alert-link' title='Excluir procedencia'>
									<button type='image' name='Excluir'  id='button' value='Excluir' class='btn btn-default btn-sm'>
										Excluir <span class='glyphicon glyphicon-trash' aria-hidden='true' onClick=\"javascript:abrir('adm_aluno_excluir_dados_pessoais.php?id=$aluno_id','03');\"></span>
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
</div>";

} else {
echo"<div id=div2>
		<div class='row-fluid'>
			<div class='col-sm-12'>
				<div class='panel panel-default'>
					<div class='panel-heading'>
						<center><i><strong>".$linha['aluno_nome']."</i></strong> sem foto cadastrada!
					</div>
					<div class='panel-body'>
						<div class='btn-group btn-group-justified' role='group' aria-label='...'>
							<div class='btn-group' role='group'>
								<a href='adm_foto_tirar.php?id=$aluno_id' class='alert-link' title='Cadastrar Responsavel'>
									<button type='image' name='Cadastrar'  id='button' value='Cadastrar' class='btn btn-default btn-sm' disabled='disabled'>
										Camera <span class='glyphicon glyphicon-camera' aria-hidden='true'></span>
									</button>
								</a>
							</div>
							<div class='btn-group' role='group'>
								<a href='adm_foto_cadastrar.php?id=$aluno_id' class='alert-link' title='Cadastrar Responsavel'>
									<button type='image' name='Cadastrar'  id='button' value='Cadastrar' class='btn btn-default btn-sm'>
										Arquivo <span class='glyphicon glyphicon-level-up' aria-hidden='true'></span>
									</button>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>";
}
?>
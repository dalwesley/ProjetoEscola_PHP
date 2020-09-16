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
</head>
<script language="JavaScript">
function abrir(URL) {
var width = 700;
var height = 680;
var left = 657;
var top = 0;
window.open(URL,'janela', 'width='+width+', height='+height+', top='+top+', left='+left+', scrollbars=no, status=no, toolbar=no, location=no, directories=no, menubar=no, resizable=no, fullscreen=no');
}
</script>
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
$sql = "SELECT *, DATE_FORMAT(aluno_data, '%d/%m/%Y') as 'aluno_data' FROM dados_pessoais_aluno where aluno_id=$id_select"; //Faz o select de todos os registros
$query = mysql_query($sql) or die("<center><h1>OOOPS!<BR>Não é esta a pagina que você esperava ver?<BR> Então algo esta errado...</h1><a href='home.php' style='text-decoration: none'><font color='#FF7F00'>Você pode clicar na imagem para voltar</font><p><img border='0' src='img/cones.png' width='544' height='332'></a></p>O Erro de conexão com banco de dados esta descrito logo abaixo!<BR>".mysql_error());
$result = mysql_num_rows($query);

if($result>=1) {

echo"
	<div class='container-fluid'>
		<div class='row'>
			<div class='col-sm-12'>
				<div class='alert alert-success' role='alert'>
					<a href='#' class='alert-link'>
						<table border='0' width='100%' cellspacing='0' cellpadding='3'  bordercolor='#F0F0F0' height='0' style='border-collapse: collapse'> 
							<tr>
								<td height='1' width='1'>
									<span class='glyphicon glyphicon-circle-arrow-left' aria-hidden='true' style='font-size: 17px' onClick='javascript:window.history.go(-1);'></span>
								</td>
								<td>
									<center>$aluno_nome - $aluno_ra
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
		<div class='row'>
			<div class='col-sm-12'>
				<div class='panel panel-default'>
					<div class='panel-heading'>
						<center><b>Identificação do Aluno</b>
					</div>
					<div class='panel-body'><p class='text-justify'>
Sexo:	    <B>$linha[aluno_sexo]</B><BR>			
Data:	    <B>$linha[aluno_data]</B><BR>
Cor:	    <B>$linha[aluno_cor]</B><BR>
Nascimento: <B>$linha[aluno_nascimento]</B><BR>
Pai:	    <B>$linha[aluno_pai]</B><BR>
Mãe:	    <B>$linha[aluno_mae]</B>
					</div>
				</div>
			</div>
		</div>
		<div class='row'>
			<div class='col-sm-12'>
				<div class='panel panel-default'>
					<div class='panel-heading'>
						<center><b>Residência</b>
					</div>
					<div class='panel-body'><p class='text-justify'>
Nacionalidade:	<B>$linha[aluno_nacionalidade]</B><BR>
Estado:<B>$linha[aluno_estado]</B><BR>
Cidade:		<B>$linha[aluno_cidade]</B><BR>
Endereço:	<B>$linha[aluno_endereço]</B><BR>
Bairro:		<B>$linha[aluno_bairro]</B><BR>
Numero:		<B>$linha[aluno_numero]</B><BR>
CEP:	<B>$linha[aluno_cep]</B>
					</div>
				</div>
			</div>
		</div>
		<div class='row'>
			<div class='col-sm-12'>
				<div class='panel panel-default'>
					<div class='panel-heading'>
						<center><b>Contato</b>
					</div>
					<div class='panel-body'><p class='text-justify'>
Telefone 1: <B>$linha[aluno_tel_1]</B><BR>
Telefone 2: <B>$linha[aluno_tel_2]</B><BR>
Telefone 3: <B>$linha[aluno_tel_3]</B><BR>
Email:      <B>$linha[aluno_email]</B>
					</div>
				</div>
			</div>
		</div>
		<div class='row'>
				<div class='col-md-12'>
					<div class='panel panel-default'>
						<div class='panel-heading'>
							<center><B>Opções</B></center>
						</div>
						<div class='panel-body'><center>
							<div class='btn-group btn-group-justified' role='group' aria-label='...'>
								<div class='btn-group' role='group'>
									<a href='adm_aluno_editar_dados_pessoais.php?id=$aluno_id','03'' class='alert-link' title='Editar dados pessoais'>
										<button type='image' name='Editar'  id='button' value='Editar' class='btn btn-default btn-sm'>
											Editar <span class='glyphicon glyphicon-edit' aria-hidden='true'></span>
										</button>
									</a>
								</div>
								<div class='btn-group' role='group'>
									<a href='adm_aluno_excluir_dados_pessoais.php?id=$aluno_id','03'' class='alert-link' title='Excluir dados pessoais'>
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
		<div class='row'>
			<div class='col-xs-12'>
				<div class='panel-body'>
					<div class='panel-body'><center>
						<div class='btn-group btn-group-justified' role='group' aria-label='...'>
							<div class='btn-group' role='group'>
								<a href='adm_aluno_editar_dados_pessoais.php?id=','03'' class='alert-link' title='Editar dados pessoais'>
									<button type='image' name='Editar'  id='button' value='Editar' class='btn btn-default btn-sm'>
										Editar <span class='glyphicon glyphicon-edit' aria-hidden='true'></span>
									</button>
								</a>
							</div>
							<div class='btn-group' role='group'>
								<a href='adm_aluno_excluir_dados_pessoais.php?id=','03'' class='alert-link' title='Excluir dados pessoais'>
									<button type='image' name='Excluir'  id='button' value='Excluir' class='btn btn-default btn-sm'>
										Excluir <span class='glyphicon glyphicon-trash' aria-hidden='true' onClick=\"javascript:abrir('adm_aluno_excluir_dados_pessoais.php?id=$aluno_id','03');\"></span>
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
echo "
<div id='div2'>
	<div class='container-fluid'>
		<div class='row'>
			<div class='col-sm-12'>
				<div class='alert alert-danger' role='alert'><center>
					<table border='0' width='100%' cellspacing='0' cellpadding='3'  bordercolor='#FFF' height='0' style='border-collapse: collapse'> 
						<tr>
							<td height='1' width='1'>
								<span class='glyphicon glyphicon-alert' aria-hidden='true' style='font-size: 50px'></span>
							</td>
							<td>
								<center><H1>Opss!</H1><H4>Alguma coisa sair errado!</H4>
							</td>
							<td height='1' width='1'>
								<span class='glyphicon glyphicon-alert' aria-hidden='true' style='font-size: 50px'></span>
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
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
			height:100%; /* Tamanho da Altura da Div */
	        top: 0; 
	        margin-top:0%; /* ou seja ele pega 50% da altura tela e sobe metade do valor da altura no caso 100 */
	        left:0;
	        margin-left:0; /* ou seja ele pega 50% da largura tela e diminui  metade do valor da largura no caso 250 */

}

</style>
</head>
<?php
include ('conecta.php');
$id_select = $_GET['id']; //Recupera a variavel id para fazer o select
$sql = "SELECT * FROM dados_pessoais_aluno where aluno_id=$id_select"; //Faz o select de todos os registros
$query = mysql_query($sql) or die("<center><h1>OOOPS!<BR>Não é esta a pagina que você esperava ver?<BR> Então algo esta errado...</h1><a href='home.php' style='text-decoration: none'><font color='#FF7F00'>Você pode clicar na imagem para voltar</font><p><img border='0' src='img/cones.png' width='544' height='332'></a></p>O Erro de conexão com banco de dados esta descrito logo abaixo!<BR>".mysql_error());
$linha = mysql_fetch_assoc($query);

		$aluno_ra					= $linha['aluno_ra'];
		$aluno_id					= $linha['aluno_id'];
		$aluno_nome					= $linha['aluno_nome'];
?>
<?php
include ('conecta.php');
$id_select = $_GET['id']; //Recupera a variavel id para fazer o select
$sql = "SELECT * FROM foto where foto_aluno_id=$id_select"; //Faz o select de todos os registros
$query = mysql_query($sql) or die("<center><h1>OOOPS!<BR>Não é esta a pagina que você esperava ver?<BR> Então algo esta errado...</h1><a href='home.php' style='text-decoration: none'><font color='#FF7F00'>Você pode clicar na imagem para voltar</font><p><img border='0' src='img/cones.png' width='544' height='332'></a></p>O Erro de conexão com banco de dados esta descrito logo abaixo!<BR>".mysql_error());
$result = mysql_num_rows($query);

if($result>=1) {

echo"<center>
<form id='cadastro' name='cadastro' method='post' action='adm_foto_editar_motor.php' enctype='multipart/form-data'>
	<div class='container-fluid'>
		<div class='row'>
			<div class='col-sm-12'>
				<div class='alert alert-warning' role='alert'>
					<a href='#' class='alert-link'>
						<table border='0' width='100%' height='0'> 
							<tr>
							<td height='1' width='1'>
									<span class='glyphicon glyphicon-circle-arrow-left' aria-hidden='true' style='font-size: 17px' onClick='javascript:window.history.go(-1);'></span>
								</td>
								<td>
									<center>Editando <B><I>foto</B></I> para <i><strong>$aluno_nome - $aluno_ra</center></i></strong>
								</td>
								<td height='1' width='1'>
									<span class='glyphicon glyphicon-info-sign' aria-hidden='true' style='font-size: 17px'></span>
								</td>
							</tr>
						</table>
					</a>
				</div>
			</div>
		</div>";

		while($linha = mysql_fetch_array($query)) {
		$foto_aluno_nome	 	= $linha['foto_aluno_nome'];
		$foto_aluno_id	 		= $linha['foto_aluno_id'];
		$foto_id		 		= $linha['foto_id'];
		$foto			 		= $linha['foto'];

echo"	<div class='row'>
			<div class='col-sm-12'>
			<div class='panel panel-default'>
				<div class='panel-heading'>
					<B>Foto</B>
				</div>
				<div class='panel-body'>
					<div class='col-xs-12'>
						<input type='hidden' name='foto_aluno_nome' value='$foto_aluno_nome' size='70'>
						<input type='hidden' name='foto_aluno_id' value='$aluno_id' size='3'>
						<input type='hidden' name='foto_id' value='$foto_id' size='3'>
						<img src='getImagem.php?id=$foto_aluno_id' border='1' width='300' height='300'>
						<div class='panel-body'>
							<div class='btn-group btn-group-justified' role='group' aria-label='...'>
								<div class='input-group input-group-sm'>
									<input type='file' name='imagem' class='btn btn-default'/>
								</div>
								<div class='input-group input-group-sm'>
									<a href='adm_foto_editar.php?id=$aluno_id' class='alert-link' title='Cadastrar Responsavel'>
										Arquivo <span class='glyphicon glyphicon-level-up' aria-hidden='true'></span>
									</a>
								</div>
							</div>				
						</div>
					
					</div>
				</div>
			</div>
		</div>
		<div class='col-sm-12'>
			<div class='panel panel-default'>
				<div class='panel-heading'>
					<B>Opções</B>
				</div>
				


<fieldset style='border-style: solid; border-width: 1px; background-color:#F0F0F0'>
<legend><B></B></legend><table border='1' width='100%' cellspacing='0' cellpadding='3'  bordercolor='#FFFFFF' height='0' style='border-collapse: collapse'> 
	<tr>
	<td align=center bgcolor=#FFFFFF><B>Editar</B></td>
		<td align=center bgcolor=#FFFFFF><B>Limpar</B></td>
	</tr>
	<tr>
		<td align='center'><input name='editar' type='submit' id='editar' value='Salvar Edição' />
		</td>
		<td align='center'><input name='limpar' type='reset' id='limpar' value='Limpar Edição' />
		</td>
	</tr>
</table>
</fieldset>
</div>";
    }
} else {
echo"<div id=div2>
<fieldset style='border-style: solid; border-width: 1px; background-color:#F0F0F0'>
<table border='1' width='100%' cellspacing='0' cellpadding='3'  bordercolor='#FFFFFF' height='0' style='border-collapse: collapse'> 
	<tr>
		<td align=center bgcolor=#FFFFFF>
		<br><i><strong>".$linha['aluno_nome']."</i></strong> sem foto cadastrada!<br><br>
		</td>
	</tr>
	<tr>
		<td align='center'>
			<b>Cadastrar<br>
			<a href='adm_aluno_classificacao_cadastrar.php?id=$aluno_id' style='text-decoration: none'>
			<img src='img/new.png' border='0' width='24' height='24' title='Cadastrar'></a>
		</td>
	</tr>
</table>
</fieldset>
</div></div>";
}
?>
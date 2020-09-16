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
        top:0; 
        margin-top:0%; /* ou seja ele pega 50% da altura tela e sobe metade do valor da altura no caso 100 */
        left:0%;
		margin-left:0%; /* ou seja ele pega 50% da largura tela e diminui  metade do valor da largura no caso 250 */
		background-color:#FFFFFF;
 
}
</style>
 
</head>
<?php

$conex = mysql_connect("localhost", "root", "");
mysql_select_db("escola", $conex);
$id_select = $_GET['id']; //Recupera a variavel id para fazer o select
$sql = "SELECT * FROM dados_pessoais_aluno where aluno_id=$id_select"; //Faz o select de todos os registros
$query = mysql_query($sql) or die("<center><h1>OOOPS!<BR>Não é esta a pagina que você esperava ver?<BR> Então algo esta errado...</h1><a href='home.php' style='text-decoration: none'><font color='#FF7F00'>Você pode clicar na imagem para voltar</font><p><img border='0' src='img/cones.png' width='544' height='332'></a></p>O Erro de conexão com banco de dados esta descrito logo abaixo!<BR>".mysql_error());
$linha = mysql_fetch_assoc($query);


		$aluno_id				= $linha['aluno_id'];
		$aluno_ra				= $linha['aluno_ra'];
		$aluno_nome				= $linha['aluno_nome'];
?>
<?php

$conexao = mysql_connect("127.0.0.1","root",""); //Faz conexão com o mysql
$db = mysql_select_db("escola"); //Seleciona o banco de dados
$id_select = $_GET['id']; //Recupera a variavel id para fazer o select
$sql = "SELECT * FROM responsavel where responsavel_aluno_id=$id_select"; //Faz o select de todos os registros
$query = mysql_query($sql) or die(mysql_error()); //Verifica se o comando foi executado
$result = mysql_num_rows($query);


echo"
<form id='cadastro' name='cadastro' method='post' action='adm_aluno_classificacao_cadastrar_motor.php'>
	<div class='container-fluid'>
		<div class='row'>
			<div class='col-sm-12'>
				<div class='alert alert-info' role='alert'>
					<a href='#' class='alert-link'>
						<table border='0' width='100%' height='0'> 
							<tr>
							<td height='1' width='1'>
									<center><img src='img/voltar.png' title='Voltar' onClick='javascript:window.history.go(-1);' name='voltar' width='20' height='20'>
								</td>
								<td>
									<center>Cadastrando <B><i>classificação</i></B> para <i><strong> $aluno_nome - $aluno_ra </center></i></strong>
								</td>
								<td height='1' width='1'>
									<center><img src='img/obser.png' border='0' width='20' height='20' title='Foto'>
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
						<center><B>Classificação e Reclassificação</B></center>
					</div>
					<div class='panel-body'>
						<div class='col-xs-9'>
							<div class='input-group input-group-sm'>
								<span class='input-group-addon' id='sizing-addon3'>
									Classificação através de Avaliação de Competência
								</span>
								<input type='hidden' class='form-control' name='class_aluno_nome' value='$linha[aluno_nome]' size='70'>
								<input type='hidden' class='form-control' name='class_aluno_id' value='$linha[aluno_id]' size='3'>
								<input type='date'  class='form-control' name='class_pela_comp_data' autofocus placeholder='Data?' aria-describedby='sizing-addon3'>
							</div>
						</div>
						<div class='col-xs-3'>
							<div class='input-group input-group-sm'>
								<span class='input-group-addon' id='sizing-addon3'>
									para
								</span>
								<select class='form-control' name='class_pela_comp_para_o_ano' id='class_avaliacao_comp_para_o_ano'>
									<option>Ano...</option>
									<option value='1'>1°</option>
									<option value='2'>2°</option>
									<option value='3'>3°</option>
									<option value='4'>4°</option>
									<option value='5'>5°</option>
									<option value='6'>6°</option>
									<option value='7'>7°</option>
									<option value='8'>8°</option>
									<option value='9'>9°</option>
								</select>
							</div>
						</div>
						<div class='col-xs-9'>
							<div class='input-group input-group-sm'>
								<span class='input-group-addon' id='sizing-addon3'>
									Reclassificação através de Avaliação de Competência
								</span>
								<input type='date'  class='form-control' name='reclass_pela_comp_data' autofocus placeholder='Data?' aria-describedby='sizing-addon3'>
							</div>
						</div>
						<div class='col-xs-3'>
							<div class='input-group input-group-sm'>
								<span class='input-group-addon' id='sizing-addon3'>
									para
								</span>
								<select class='form-control' name='reclass_pela_comp_para_ano' id='reclass_pela_comp_para_ano'>
									<option>Ano...</option>
									<option value='1'>1°</option>
									<option value='2'>2°</option>
									<option value='3'>3°</option>
									<option value='4'>4°</option>
									<option value='5'>5°</option>
									<option value='6'>6°</option>
									<option value='7'>7°</option>
									<option value='8'>8°</option>
									<option value='9'>9°</option>
								</select>
							</div>
						</div>
						<div class='col-xs-9'>
							<div class='input-group input-group-sm'>
								<span class='input-group-addon' id='sizing-addon3'>
									Reclassificação por decisão do Conselho de Classe
								</span>
								<input type='date'  class='form-control' name='reclass_pelo_conselho_data' autofocus placeholder='Data?' aria-describedby='sizing-addon3'>
							</div>
						</div>
						<div class='col-xs-3'>
							<div class='input-group input-group-sm'>
								<span class='input-group-addon' id='sizing-addon3'>
									para
								</span>
								<select class='form-control' name='reclass_pelo_conselho_ano' id='reclass_pelo_conselho_ano'>
									<option>Ano...</option>
									<option value='1'>1°</option>
									<option value='2'>2°</option>
									<option value='3'>3°</option>
									<option value='4'>4°</option>
									<option value='5'>5°</option>
									<option value='6'>6°</option>
									<option value='7'>7°</option>
									<option value='8'>8°</option>
									<option value='9'>9°</option>
								</select>
							</div>
						</div>
					</div>
				</div>
				<div class='row'>
					<div class='col-sm-12'>
						<div class='panel panel-default'>
							<div class='panel-heading'>
								<center><B>Responsáveis</B></center>
							</div>
							<div class='panel-body'>
								<div class='col-xs-12'>
									<div class='input-group input-group-sm'>
										<span class='input-group-addon' id='sizing-addon3'>
										</span>
										<select class='form-control' name='class_responsavel' id='class_responsavel'>
											<option>selecione o responsável pelo aluno...</option>";
												while($linha = mysql_fetch_array($query)) {
												$responsavel_nome		= $linha['responsavel_nome'];
												$responsavel_doc		= $linha['responsavel_doc'];
												$responsavel_parentesco	= $linha['responsavel_parentesco'];
echo "										<option value='$responsavel_nome - $responsavel_doc - $responsavel_parentesco'>".$responsavel_nome." - ".$responsavel_doc." - ".$responsavel_parentesco."</option>";
																							}
echo"									</select>
									</div>
								</div>
								<div class='col-xs-12'>
									<div class='input-group input-group-sm'>
										<span class='input-group-addon' id='sizing-addon3'>
										</span>
										<input type='text' id='class_secretario' name='class_secretario' class='form-control' value='$_SESSION[UsuarioNome]' size='70' readonly>
									</div>
								</div>
								<div class='col-xs-12'>
									<div class='input-group input-group-sm'>
										<span class='input-group-addon' id='sizing-addon3'>
										</span>
										<input type='text' id='class_diretor' name='class_diretor' class='form-control' size='70' maxlength='60' placeholder='Preenchido pela Direção'/>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class='row'>
					<div class='col-xs-12'>
					<div class='panel panel-default'>
						<div class='panel-heading'>
							<center><B>Opções</B></center>
						</div>
						<div class='panel-body'><center>
							Tem certeza que deseja cadastrar a <b>classificação</b> para <b>$aluno_nome</b>?</b><br>
							<button type='image' name='Cadastrar'  id='button' value='Cadastrar' class='btn btn-default btn-sm'>
								Cadastrar	<span class='glyphicon glyphicon-ok' aria-hidden='true'></span>
							</button>
						</div>
					</div>
				</div>
				</div>
			</div>
		</div>
	</div>
</form>"
?>;
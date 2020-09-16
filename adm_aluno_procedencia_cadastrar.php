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
 
<?php
include ('conecta.php');
$id_select = $_GET['id']; //Recupera a variavel id para fazer o select
$sql = "SELECT * FROM dados_pessoais_aluno where aluno_id=$id_select"; //Faz o select de todos os registros
$query = mysql_query($sql) or die("<center><h1>OOOPS!<BR>Não é esta a pagina que você esperava ver?<BR> Então algo esta errado...</h1><a href='home.php' style='text-decoration: none'><font color='#FF7F00'>Você pode clicar na imagem para voltar</font><p><img border='0' src='img/cones.png' width='544' height='332'></a></p>O Erro de conexão com banco de dados esta descrito logo abaixo!<BR>".mysql_error());
$linha = mysql_fetch_assoc($query);

		$aluno_ra				= $linha['aluno_ra'];
		$aluno_id				= $linha['aluno_id'];
		$aluno_nome				= $linha['aluno_nome'];
?>
<?php

include ('conecta.php');
$id_select = $_GET['id']; //Recupera a variavel id para fazer o select
$sql = "SELECT * FROM responsavel where responsavel_aluno_id=$id_select"; //Faz o select de todos os registros
$query = mysql_query($sql) or die(mysql_error()); //Verifica se o comando foi executado
$result = mysql_num_rows($query);

echo"
<form id='cadastro' name='cadastro' method='post' action='adm_aluno_procedencia_cadastrar_motor.php'>
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
									<center>Cadastrando <B><i>procedência</i></B> para <i><strong> $aluno_nome - $aluno_ra </center></i></strong>
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
						<center><B>Procedência</B></center>
					</div>
					<div class='panel-body'>
						<div class='col-xs-12'>
							<div class='input-group input-group-sm'>
								<span class='input-group-addon' id='sizing-addon3'>
								</span>
								<input type='hidden' class='form-control' name='proced_aluno_nome' value='$aluno_nome' placeholder='Nome Completo'>
								<input type='hidden' class='form-control' name='proced_aluno_id' value='$aluno_id' placeholder='Nome Completo'>
								<input type='text' class='form-control' name='proced_escola' id='proced_escola' placeholder='Nome da escola de onde foi transferido?' aria-describedby='sizing-addon3'>
							</div>
						</div>
						<div class='col-xs-6'>
							<div class='input-group input-group-sm'>
								<span class='input-group-addon' id='sizing-addon3'>
								</span>
								<input type='number' class='form-control' name='proced_serie_ano' id='proced_serie_ano' placeholder='Qual série/ano cursou ou estava cursando?'>
							</div>
						</div>
						<div class='col-xs-6'>
							<div class='input-group input-group-sm'>
								<span class='input-group-addon' id='sizing-addon3'>
								</span>
								<input type='date' class='form-control' name='proced_data_saida' id='proced_data_saida' placeholder='Qual a data de saída?'>
							</div>
						</div>
						<div class='col-xs-12'>
							<div class='input-group input-group-sm'>
								<span class='input-group-addon' id='sizing-addon3'>
								</span>
								<input type='text' class='form-control' name='proced_cidade' id='proced_cidade' placeholder='Qual Cidade ficava a escola?'>
							</div>
						</div>
						<div class='col-xs-12'>
							<div class='input-group input-group-sm'>
								<span class='input-group-addon' id='sizing-addon3'>
								</span>
								<input type='text' class='form-control' name='proced_bairro' id='proced_bairro' placeholder='Qual Bairro ficava a escola?'>
							</div>
						</div>
						<div class='col-xs-12'>
							<div class='input-group input-group-sm'>
								<span class='input-group-addon' id='sizing-addon3'>
								</span>
								<input type='text' class='form-control' name='proced_país' id='proced_país' Value='Brasil' placeholder='Qual Pais ficava a escola?'>
							</div>
						</div>
						<div class='col-xs-6'>
							<div class='input-group input-group-sm'>
								<span class='input-group-addon' id='sizing-addon3'>
								</span>
								<select class='form-control' name='proced_estado' id='proced_estado' aria-describedby='sizing-addon3'/>
									<option>Estado</option>
									<option value='AC'>AC</option>
									<option value='AL'>AL</option>
									<option value='AP'>AP</option>
									<option value='AM'>AM</option>
									<option value='BA'>BA</option>
									<option value='CE'>CE</option>
									<option value='ES'>ES</option>
									<option value='DF'>DF</option>
									<option value='MA'>MA</option>
									<option value='MT'>MT</option>
									<option value='MS'>MS</option>
									<option value='MG'>MG</option>
									<option value='PA'>PA</option>
									<option value='PB'>PB</option>
									<option value='PR'>PR</option>
									<option value='PE'>PE</option>
									<option value='PI'>PI</option>
									<option value='RJ'>RJ</option>
									<option value='RN'>RN</option>
									<option value='RS'>RS</option>
									<option value='RO'>RO</option>
									<option value='RR'>RR</option>
									<option value='SC'>SC</option>
									<option value='SP'>SP</option>
									<option value='SE'>SE</option>
									<option value='TO'>TO</option>
								</select>
							</div>
						</div>
						<div class='col-xs-6'>
							<div class='input-group input-group-sm'>
								<span class='input-group-addon' id='sizing-addon3'>
								</span>
								<select class='form-control' name='proced_estudou_na_escola' id='proced_estudou_na_escola' aria-describedby='sizing-addon3'/>
									<option>Já estudou aqui?</option>
									<option value='Sim'>Sim</option>
									<option value='Não'>Não</option>
								</select>
							</div>
						</div>
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
								<select class='form-control' name='proced_responsavel' id='proced_responsavel' aria-describedby='sizing-addon3'>
									<option>Selecione o Responsável...</option>";
										while($linha = mysql_fetch_array($query)) {
										$responsavel_nome		= $linha['responsavel_nome'];
										$responsavel_doc		= $linha['responsavel_doc'];
										$responsavel_parentesco	= $linha['responsavel_parentesco'];
							echo"	<option value='$responsavel_nome - $responsavel_doc - $responsavel_parentesco'>".$responsavel_nome." - ".$responsavel_doc." - ".$responsavel_parentesco."</option>";
								}
							echo"</select>
							</div>
						</div>
						<div class='col-xs-12'>
							<div class='input-group input-group-sm'>
								<span class='input-group-addon' id='sizing-addon3'>
								</span>
								<input type='text' class='form-control' name='proced_secretario' value='$_SESSION[UsuarioNome]' placeholder='Usuario logado'>
							</div>
						</div>
						<div class='col-xs-12'>
							<div class='input-group input-group-sm'>
								<span class='input-group-addon' id='sizing-addon3'>
								</span>
								<input type='text' class='form-control' name='proced_diretor' value='$_SESSION[UsuarioNome]' placeholder='Usuario logado'>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class='row'>
			<div class='col-sm-12'>
				<div class='panel panel-default'>
					<div class='panel-heading'>
						<B>Opções</B>
					</div>
					<div class='panel-body'>
						<table border='1' width='100%' cellspacing='0' cellpadding='3'  bordercolor='#FFFFFF' height='0' style='border-collapse: collapse'> 
							<tr>
							<td align=center bgcolor=#FFFFFF><B>Cadastrar</B></td>
							</tr>
							<tr>
								<td align='center'>
									<input type='image' src='img/new.png' name='Concluir Cadastro'  id='button' value='Concluir Cadastro' width='20' height='20'/>
								</td>
							</tr>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>";
?>

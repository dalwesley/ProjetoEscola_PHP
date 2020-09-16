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
include ('conecta.php');
$id_select2 = $_GET['opcao']; //Recupera a variavel id para fazer o select
$sql = "SELECT * FROM matricula where matricula_id=$id_select2"; //Faz o select de todos os registros
$query = mysql_query($sql) or die("<center><h1>OOOPS!<BR>Não é esta a pagina que você esperava ver?<BR> Então algo esta errado...</h1><a href='home.php' style='text-decoration: none'><font color='#FF7F00'>Você pode clicar na imagem para voltar</font><p><img border='0' src='img/cones.png' width='544' height='332'></a></p>O Erro de conexão com banco de dados esta descrito logo abaixo!<BR>".mysql_error());
$row = mysql_fetch_assoc($query);

$matricula_id					= $row['matricula_id'];
$matricula_ano_letivo			= $row['matricula_ano_letivo'];
$matricula_tipo_ensino			= $row['matricula_tipo_ensino'];
$matricula_aceito_normas		= $row['matricula_aceito_normas'];
$matricula_data					= $row['matricula_data'];
$matricula_responsavel			= $row['matricula_responsavel'];
$matricula_secretario			= $row['matricula_secretario'];
$matricula_diretor				= $row['matricula_diretor'];
$matricula_situacao_aluno		= $row['matricula_situacao_aluno'];
$matricula_situacao_data		= $row['matricula_situacao_data'];
$matricula_turno_turma			= $row['matricula_turno_turma'];
$matricula_ano_civil			= $row['matricula_ano_civil'];
$matricula_turno_ano			= $row['matricula_turno_ano'];
$matricula_numero_chamada		= $row['matricula_numero_chamada'];
$matricula_idade				= $row['matricula_idade'];
$matricula_responsavel			= $row['matricula_responsavel'];
$matricula_secretario			= $row['matricula_secretario'];
$matricula_diretor				= $row['matricula_diretor'];
$matricula_aluno_id				= $row['matricula_aluno_id'];
$matricula_aluno_nome			= $row['matricula_aluno_nome'];
$matricula_data 				= $row['matricula_data'];
?>
<?php
include ('conecta.php');
$id_select1 = $_GET['id']; //Recupera a variavel id para fazer o select
$sql = "SELECT * FROM responsavel where responsavel_aluno_id=$id_select1"; //Faz o select de todos os registros
$query = mysql_query($sql) or die(mysql_error()); //Verifica se o comando foi executado
$result = mysql_num_rows($query);

echo"
<form id='cadastro' name='cadastro' method='post' action='adm_aluno_matricula_editar_motor.php' enctype='multipart/form-data'>
<div class='container-fluid'>
		<div class='row'>
			<div class='col-sm-12'>
				<div class='alert alert-warning' role='alert'>
					<a href='#' class='alert-link'>
						<table border='0' width='100%' height='0'> 
							<tr>
							<td height='1' width='1'>
									<center><img src='img/voltar.png' title='Voltar' onClick='javascript:window.history.go(-1);' name='voltar' width='20' height='20'>
								</td>
								<td>
									<center>Editando <B><i>matrícula</i></B> para <i><strong> $aluno_nome - $aluno_ra </center></i></strong>
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
						<center><B>Matrícula</B></center>
					</div>
					<div class='panel-body'>
						<div class='col-xs-4'>
							<div class='input-group input-group-sm'>
								<span class='input-group-addon' id='sizing-addon3'>
								</span>
								<input type='hidden' class='form-control' name='matricula_aluno_nome' value='$matricula_aluno_nome' placeholder='Nome Completo'>
								<input type='hidden' class='form-control' name='matricula_aluno_id' value='$matricula_aluno_id' placeholder='Nome Completo'>
								<input type='hidden' class='form-control' name='matricula_id' value='$matricula_id' placeholder='Nome Completo'>
								<input type='number' class='form-control' name='matricula_ano_letivo' id='matricula_ano_letivo' value='$matricula_ano_letivo' placeholder='Série/Ano' aria-describedby='sizing-addon3' min='1' max='9' step='1'>
							</div>
						</div>
						<div class='col-xs-4'>
							<div class='input-group input-group-sm'>
								<span class='input-group-addon' id='sizing-addon3'>
								</span>
								<select class='form-control' name='matricula_tipo_ensino' id='matricula_tipo_ensino'>
									<option>$matricula_tipo_ensino</option>
									<option value='fundamental'>Fundamental</option>
									<option value='medio'>Médio</option>
								</select>
							</div>
						</div>
						<div class='col-xs-4'>
							<div class='input-group input-group-sm'>
								<span class='input-group-addon' id='sizing-addon3'>
								</span>
								<input type='date' class='form-control' name='matricula_data' id='matricula_data' value='$matricula_data' placeholder='Data em que o aluno esta sendo matriculado?' aria-describedby='sizing-addon3'>
							</div>
						</div>
					</div>
				</div>
				<div class='panel panel-default'>
					<div class='panel-heading'>
						<center><B>Movimentação</B></center>
					</div>
					<div class='panel-body'>
						<div class='col-xs-4'>
							<div class='input-group input-group-sm'>
								<span class='input-group-addon' id='sizing-addon3'>
								</span>
								<input type='number' class='form-control' min='1' max='9' step='1' name='matricula_ano_civil' id='matricula_ano_civil' value='$matricula_ano_civil' placeholder='Ano Civil'>
							</div>
						</div>
						<div class='col-xs-4'>
							<div class='input-group input-group-sm'>
								<span class='input-group-addon' id='sizing-addon3'>
								</span>
								<input type='number' class='form-control' min='1' max='9' step='1' name='matricula_turno_ano' id='matricula_turno_ano' value='$matricula_turno_ano' placeholder='Turno/Ano'>
							</div>
						</div>
						<div class='col-xs-4'>
							<div class='input-group input-group-sm'>
								<span class='input-group-addon' id='sizing-addon3'>
								</span>
								<select class='form-control' name='matricula_turno_turma' id='matricula_turno_turma'>
									<option>$matricula_turno_turma</option>
									<option value='A'>A</option>
									<option value='B'>B</option>
									<option value='C'>C</option>
									<option value='D'>D</option>
									<option value='E'>E</option>
									<option value='F'>F</option>
									<option value='G'>G</option>
									<option value='H'>H</option>
									<option value='I'>I</option>
								</select>
							</div>
						</div>
						<div class='col-xs-4'>
							<div class='input-group input-group-sm'>
								<span class='input-group-addon' id='sizing-addon3'>
								</span>
								<input type='number' class='form-control' min='1' max='100' step='1' name='matricula_numero_chamada' id='matricula_numero_chamada' value='$matricula_numero_chamada' placeholder='Qual o numero de Chamada?'>
							</div>
						</div>						
						<div class='col-xs-6'>
							<div class='input-group input-group-sm'>
								<span class='input-group-addon' id='sizing-addon3'>
								</span>
								<input type='number' class='form-control' min='1' max='100' step='1' name='matricula_idade' id='matricula_idade' value='$matricula_idade' placeholder='Qual a idade do Aluno?'>
							</div>
						</div>
					</div>
				</div>
				<div class='panel panel-default'>
					<div class='panel-heading'>
						<center><B>Situação do Aluno</B></center>
					</div>
					<div class='panel-body'>
						<div class='col-xs-6'>
							<div class='input-group input-group-sm'>
								<span class='input-group-addon' id='sizing-addon3'>
								</span>
								<select class='form-control' name='matricula_situacao_aluno' id='matricula_situacao_aluno'>
									<option>$matricula_situacao_aluno</option>
									<option value='Ativo'>Ativo</option>
									<option value='Transferido'>Transferido</option>
									<option value='Evadido'>Evadido</option>
									<option value='Inativo'>Inativo</option>
								</select>
							</div>
						</div>
						<div class='col-xs-6'>
							<div class='input-group input-group-sm'>
								<span class='input-group-addon' id='sizing-addon3'>
								</span>
								<input type='date' class='form-control' name='matricula_situacao_data' value='$matricula_situacao_data'>
							</div>
						</div>
						<div class='col-xs-12'>
							<div class='input-group input-group-sm'>
								<span class='input-group-addon' id='sizing-addon3'>
								</span>
								<select class='form-control' name='matricula_aceito_normas' id='matricula_aceito_normas'>
									<option>$matricula_aceito_normas</option>
									<option value='Sim'>Sim</option>
									<option value='Não'>Não</option>
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
								<select class='form-control' name='matricula_responsavel' id='matricula_responsavel' aria-describedby='sizing-addon3'>
									<option>$matricula_responsavel</option>";
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
								<input type='text' class='form-control' name='matricula_secretario' value='$_SESSION[UsuarioNome]' placeholder='Usuario logado'>
							</div>
						</div>
						<div class='col-xs-12'>
							<div class='input-group input-group-sm'>
								<span class='input-group-addon' id='sizing-addon3'>
								</span>
								<input type='text' class='form-control' name='matricula_diretor' value='$_SESSION[UsuarioNome]' placeholder='Usuario logado'>
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
						<center><B>Opções</B></center>
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
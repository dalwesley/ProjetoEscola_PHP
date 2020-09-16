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
	        top: 0; 
	        margin-top:0%; /* ou seja ele pega 50% da altura tela e sobe metade do valor da altura no caso 100 */
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
$sql = "SELECT * FROM ocorrencias where ocorrencias_id=$id_select2"; //Faz o select de todos os registros
$query = mysql_query($sql) or die("<center><h1>OOOPS!<BR>Não é esta a pagina que você esperava ver?<BR> Então algo esta errado...</h1><a href='home.php' style='text-decoration: none'><font color='#FF7F00'>Você pode clicar na imagem para voltar</font><p><img border='0' src='img/cones.png' width='544' height='332'></a></p>O Erro de conexão com banco de dados esta descrito logo abaixo!<BR>".mysql_error());
$result = mysql_fetch_assoc($query);

$ocorrencias_id							=  $result['ocorrencias_id'];
$ocorrencias_aluno_id					=  $result['ocorrencias_aluno_id'];
$ocorrencias_aluno_nome					=  $result['ocorrencias_aluno_nome'];
$ocorrencias_serie						=  $result['ocorrencias_serie'];
$ocorrencias_turma						=  $result['ocorrencias_turma'];
$ocorrencias_professor_nome				=  $result['ocorrencias_professor_nome'];
$ocorrencias							=  $result['ocorrencias'];
$ocorrencias_outros						=  $result['ocorrencias_outros'];
$ocorrencias_data						=  $result['ocorrencias_data'];
$ocorrencias_hora						=  $result['ocorrencias_hora'];
$ocorrencias_data_responsavel_ciente	=  $result['ocorrencias_data_responsavel_ciente'];
$ocorrencias_responsavel_ciente			=  $result['ocorrencias_responsavel_ciente'];
$ocorrencias_responsavel            	=  $result['ocorrencias_responsavel'];
$ocorrencias_professor_providencia		=  $result['ocorrencias_professor_providencia'];
$ocorrencias_direcao_providencia		=  $result['ocorrencias_direcao_providencia'];


echo"
<form id='cadastro' name='cadastro' method='post' action='adm_ocorrencias_editar_motor.php'>
	<div class='container'>
		<div class='row'>
			<div class='col-sm-12'>
				<div class='alert alert-info' role='alert'>
					<a href='#' class='alert-link'>
						<table border='0' width='100%' cellspacing='0' cellpadding='3'  bordercolor='#FFF' height='0' style='border-collapse: collapse'> 
							<tr>
								<td height='1' width='1'>
									<span class='glyphicon glyphicon-circle-arrow-left' aria-hidden='true' style='font-size: 17px' onClick='javascript:window.history.go(-1);'></span>
								</td>
								<td>
									<center>Editando <B><i>Ocorrência</i></B> para <i><strong> $aluno_nome - $aluno_ra </center></i></strong>
								</td>
								<td height='1' width='1'>
									<span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true' style='font-size: 17px'></span>
								</td>
							</tr>
						</table>
					</a>
				</div>
			</div>
		</div><div class='row'>
			<div class='col-sm-12'>
				<div class='panel panel-default'>
					<div class='panel-heading'>
						<center><B>Editar ocorrências</B></center>
					</div>
					<div class='panel-body'>  
						<div class='col-xs-6'>
							<div class='input-group input-group-sm'>
								<span class='input-group-addon' id='sizing-addon3'>
								</span>
								<input type='hidden' class='form-control' name='ocorrencias_data_responsavel_ciente' id='ocorrencias_data_responsavel_ciente' value='$ocorrencias_data_responsavel_ciente'>
								<input type='hidden' class='form-control' name='ocorrencias_aluno_nome' id='ocorrencias_aluno_nome' value='$ocorrencias_aluno_nome'>
								<input type='hidden' class='form-control' name='ocorrencias_aluno_id' id='ocorrencias_aluno_id' value='$ocorrencias_aluno_id'>
								<input type='hidden' class='form-control' name='ocorrencias_id' id='ocorrencias_id' value='$ocorrencias_id'>
								<input type='hidden' class='form-control' name='ocorrencias_serie' id='ocorrencias_serie' value='$ocorrencias_serie'/>
								<input type='hidden' class='form-control' name='ocorrencias_turma' id='ocorrencias_turma' value='$ocorrencias_turma'/>
								<input type='date' class='form-control' name='ocorrencias_data' id='ocorrencias_data' value='$ocorrencias_data'>
							</div>
						</div>
						<div class='col-xs-6'>
							<div class='input-group input-group-sm'>
								<span class='input-group-addon' id='sizing-addon3'>
								</span>
								<input type='time' class='form-control' name='ocorrencias_hora' id='ocorrencias_hora' value='$ocorrencias_hora'>
							</div>
						</div>
						<div class='col-xs-12'>
							<div class='input-group input-group-sm'>
								<span class='input-group-addon' id='sizing-addon3'>
								</span>
								<select class='form-control' name='ocorrencias' id='ocorrencias' >
									<option>$ocorrencias</option>
										<option value='Nao fez tarefas'>Não fez tarefa.</option>
										<option value='Nao realizou atividades'>Não realizou as atividades propostas na sala de aula.</option>
										<option value='Conversa paralala'>Conversou com o colega, atrapalhando seu rendimento e do proximo.</option>
										<option value='Nao colaborou com sua equipe de lipeza'>Não colaborou com sua equipe de limpeza.</option>
										<option value='Faltou ao reforco da aula'>Faltou ao reforço da aula.</option>
										<option value='Atrasou na entrada da 1 aula'>Atrasou na entrada da 1º aula.</option>
										<option value='Atrasou na entrada da troca de aula'>Atrasou na entrada da troca de sala.</option>
										<option value='Falou palavra de baixo calao'>Falou palavra de baixo calão.</option>
										<option value='Fez brincadeira inadequada com o colega'>Fez brincadeira inadequada com o colega.</option>
										<option value='Desrespeitou o professor'>Desrespeitou o professor(a)</option>
										<option value='Nao assistiu a aula mesmo estando na escola'>Não assistiu à aula, mesmo estando na escola.</option>
										<option value='Retirouse da sala sem autorizacao do professor'>Retirou-se da sala sem autorização do Professor(a).</option>
										<option value='Agrediu uma pessoa fisicamente.'>Agrediu uma pessoa fisicamente.</option>
										<option value='Outras'>Outras.</option>
								</select>
							</div>
						</div>
						<div class='col-xs-12'>
						</div>
						<div class='col-xs-12'>
							<textarea name='ocorrencias_outros' id='ocorrencias_outros' class='form-control' rows='6' cols='80' placeholder='Outras Ocorrências' wrap='hard'>$ocorrencias_outros</textarea>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class='row'>
			<div class='col-sm-12'>
				<div class='panel panel-default'>
					<div class='panel-heading'>
						<center><B>Editar providências</B></center>
					</div>
					<div class='panel-body'>
						<div class='col-xs-12'>
							<textarea name='ocorrencias_professor_providencia' id='ocorrencias_professor_providencia' class='form-control' rows='6' cols='80' wrap='hard' placeholder='Quais as providências tomadas pelo Professor?'>$ocorrencias_professor_providencia</textarea>
						</div>
						<div class='col-xs-12'>
						</div>
						<div class='col-xs-12'>
							<textarea name='ocorrencias_direcao_providencia' id='ocorrencias_direcao_providencia' class='form-control' rows='6' cols='80' wrap='hard' placeholder='Quais as providências tomadas pelo Direção?'>$ocorrencias_direcao_providencia</textarea>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class='row'>
			<div class='col-sm-12'>
				<div class='panel panel-default'>
					<div class='panel-heading'>
						<center><B>Editar responsáveis</B></center>
					</div>
					<div class='panel-body'>
						<div class='col-xs-12'>
							<div class='input-group input-group-sm'>
								<span class='input-group-addon' id='sizing-addon3'>
								</span>";
								$sql = "SELECT * FROM responsavel where responsavel_aluno_id=$id_select1"; //Faz o select de todos os registros
								$query = mysql_query($sql) or die(mysql_error()); //Verifica se o comando foi executado
								$result = mysql_num_rows($query);
								echo"<select class='form-control' name='ocorrencias_responsavel' id='ocorrencias_responsavel'>
									<option>$ocorrencias_responsavel</option>";
										while($linha = mysql_fetch_array($query)) {
										$responsavel_nome		= $linha['responsavel_nome'];
										$responsavel_doc		= $linha['responsavel_doc'];
										$responsavel_parentesco	= $linha['responsavel_parentesco'];
									echo"<option value='$responsavel_nome'>".$responsavel_nome." - ".$responsavel_doc." - ".$responsavel_parentesco."</option>";
									}
								echo"</select>	
							</div>
						</div>
						<div class='col-xs-12'>
							<div class='input-group input-group-sm'>
								<span class='input-group-addon' id='sizing-addon3'>
								</span>
								<select class='form-control' name='ocorrencias_responsavel_ciente' id='ocorrencias_responsavel_ciente'>
									<option>$ocorrencias_responsavel_ciente</option>
									<option value='Não Ciente'>Não Ciente</option>
									<option value='Ciente'>Ciente</option>
								</select>
							</div>
						</div>
						<div class='col-xs-12'>
							<div class='input-group input-group-sm'>
								<span class='input-group-addon' id='sizing-addon3'>
								</span>";
								include ('conecta.php');
								$sql = "SELECT * FROM professor_dados_pessoais  JOIN professor_disciplina ON professor_dados_pessoais.prof_id=professor_disciplina.prof_disciplina_prof_id"; //Faz o select de todos os registros
								$query = mysql_query($sql) or die(mysql_error()); //Verifica se o comando foi executado
								$result = mysql_num_rows($query);
								echo"
								<select class='form-control' name='ocorrencias_professor_nome' id='ocorrencias_professor_nome'>
												<option>$ocorrencias_professor_nome</option>";
									while($result = mysql_fetch_array($query)) {
										$prof_nome    					= $result['prof_nome'];
										$prof_disciplina_prof_nome    	= $result['prof_disciplina_prof_nome'];
								echo "<option value='$prof_nome'>".$prof_nome."</option>";
									}
								echo"</select>
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
						<center><B>Opções</B>
					</div>
					<div class='panel-body'>
						<table border='1' width='100%' cellspacing='0' cellpadding='3'  bordercolor='#FFFFFF' height='0' style='border-collapse: collapse'> 
							<tr>
								<td align=center bgcolor=#FFFFFF>Tem certeza que deseja cadastrar a <b>ocorrência</b> para <b>$aluno_nome</b>?</b></font><br></td>	
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
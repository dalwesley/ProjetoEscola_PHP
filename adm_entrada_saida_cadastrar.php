<?php
include "seguranca_1.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
	<title>A+ - Sistema Integrado</title>
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- As 3 meta tags acima *devem* vir em primeiro lugar dentro do `head`; qualquer outro conte�do deve vir *ap�s* essas tags -->
    
    <link href="css/bootstrap.min.css" rel="stylesheet">								<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">					<!-- Incluindo o CSS do Bootstrap -->
	<script src="http://code.jquery.com/jquery-latest.js"></script>						<!-- Incluindo o jQuery que � requisito do JavaScript do Bootstrap -->
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
$id_select1 = $_GET['id'];		//Recupera a variavel id para fazer o select
$sql = "SELECT * FROM matricula where matricula_aluno_id=$id_select1"; //Faz o select de todos os registros
$query = mysql_query($sql) or die("<center><h1>OOOPS!<BR>N�o � esta a pagina que voc� esperava ver?<BR> Ent�o algo esta errado...</h1><a href='home.php' style='text-decoration: none'><font color='#FF7F00'>Voc� pode clicar na imagem para voltar</font><p><img border='0' src='img/cones.png' width='544' height='332'></a></p>O Erro de conex�o com banco de dados esta descrito logo abaixo!<BR>".mysql_error());
$row = mysql_fetch_assoc($query);

$matricula_id	    		= $row['matricula_id'];
$matricula_aluno_id			= $row['matricula_aluno_id'];
$matricula_aluno_nome		= $row['matricula_aluno_nome'];
$matricula_aceito_normas	= $row['matricula_aceito_normas'];
$matricula_ano_civil		= $row['matricula_ano_civil'];
$matricula_ano_letivo		= $row['matricula_ano_letivo'];
$matricula_tipo_ensino		= $row['matricula_tipo_ensino'];
$matricula_data				= $row['matricula_data'];
$matricula_turno_ano		= $row['matricula_turno_ano'];
$matricula_turno_turma		= $row['matricula_turno_turma'];
$matricula_numero_chamada	= $row['matricula_numero_chamada'];
$matricula_idade			= $row['matricula_idade'];
$matricula_situacao_aluno	= $row['matricula_situacao_aluno'];
$matricula_situacao_data	= $row['matricula_situacao_data'];	
$matricula_responsavel		= $row['matricula_responsavel'];
$matricula_secretario		= $row['matricula_secretario'];
$matricula_diretor			= $row['matricula_diretor'];

?>

<?php
include ('conecta.php');
$id_select1 = $_GET['id'];		//Recupera a variavel id para fazer o select
$id_select2 = $_GET['opcao'];		//Recupera a variavel id para fazer o select
$sql = "SELECT * FROM dados_pessoais_aluno where aluno_id=$id_select1"; //Faz o select de todos os registros
$query = mysql_query($sql) or die("<center><h1>OOOPS!<BR>N�o � esta a pagina que voc� esperava ver?<BR> Ent�o algo esta errado...</h1><a href='home.php' style='text-decoration: none'><font color='#FF7F00'>Voc� pode clicar na imagem para voltar</font><p><img border='0' src='img/cones.png' width='544' height='332'></a></p>O Erro de conex�o com banco de dados esta descrito logo abaixo!<BR>".mysql_error());
$linha = mysql_fetch_assoc($query);

		$aluno_ra				= $linha['aluno_ra'];
		$aluno_id				= $linha['aluno_id'];
		$aluno_nome				= $linha['aluno_nome'];
?>
<?php
include ('conecta.php');
date_default_timezone_set('America/Sao_Paulo');
$date = date('Y-m-d');
$hora = date('H:i:s');
$sql = "SELECT * FROM responsavel where responsavel_aluno_id=$id_select1"; //Faz o select de todos os registros
$query = mysql_query($sql) or die(mysql_error()); //Verifica se o comando foi executado
$result = mysql_num_rows($query);

echo"
<form id='entrada_saida' name='entrada_saida' method='post' action='adm_entrada_saida_cadastrar_motor.php'>
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
									<center>Cadastrando <B><i>$id_select2</i></B> para <i><strong> $aluno_nome - $aluno_ra </center></i></strong>
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
						<center><B>$id_select2</B></center>
					</div>
					<div class='panel-body'>
						<div class='col-xs-6'>
							<div class='input-group input-group-sm'>
								<span class='input-group-addon' id='sizing-addon3'>
								</span>
								<input type='hidden' class='form-control' name='es_aluno_nome' value='$aluno_nome' placeholder='Nome Completo'>
								<input type='hidden' class='form-control' name='es_aluno_id' value='$aluno_id' placeholder='Nome Completo'>
								<input type='hidden' class='form-control' name='es_tipo' value='$id_select2' placeholder='Nome Completo'>
								<input type='date' class='form-control' name='es_data' id='es_data' value='$date' aria-describedby='sizing-addon3'>
							</div>
						</div>
						<div class='col-xs-6'>
							<div class='input-group input-group-sm'>
								<span class='input-group-addon' id='sizing-addon3'>
								</span>
								<input type='time' class='form-control' name='es_hora' id='es_hora' value='$hora' aria-describedby='sizing-addon3'>
							</div>
						</div>
						<div class='col-xs-6'>
							<div class='input-group input-group-sm'>
								<span class='input-group-addon' id='sizing-addon3'>
								S�rie/Turma:
								</span>
								<input type='text' class='form-control' name='es_turno_ano' id='es_turno_ano' value='$matricula_turno_ano' aria-describedby='sizing-addon3'>
							</div>
						</div>
						<div class='col-xs-6'>
							<div class='input-group input-group-sm'>
								<span class='input-group-addon' id='sizing-addon3'>
								</span>
								<input type='text' class='form-control' name='es_turno_turma' id='es_turno_turma' value='$matricula_turno_turma' aria-describedby='sizing-addon3'>
							</div>
						</div>
						<div class='col-xs-12'>
							<div class='input-group input-group-sm'>
								<span class='input-group-addon' id='sizing-addon3'>
								</span>
								<select class='form-control' name='es_motivo' id='es_motivo'>
									<option>Selecione um dos motivos</option>
									<option value='Nao fez tarefas'>N�o fez tarefa.</option>
									<option value='Nao realizou atividades'>N�o realizou as atividades propostas na sala de aula.</option>
									<option value='Conversa paralala'>Conversou com o colega, atrapalhando seu rendimento e do proximo.</option>
									<option value='Nao colaborou com sua equipe de lipeza'>N�o colaborou com sua equipe de limpeza.</option>
									<option value='Faltou ao reforco da aula'>Faltou ao refor�o da aula.</option>
									<option value='Atrasou na entrada da 1 aula'>Atrasou na entrada da 1� aula.</option>
									<option value='Atrasou na entrada da troca de aula'>Atrasou na entrada da troca de sala.</option>
									<option value='Falou palavra de baixo calao'>Falou palavra de baixo cal�o.</option>
									<option value='Fez brincadeira inadequada com o colega'>Fez brincadeira inadequada com o colega.</option>
									<option value='Desrespeitou o professor'>Desrespeitou o professor(a)</option>
									<option value='Nao assistiu a aula mesmo estando na escola'>N�o assistiu � aula, mesmo estando na escola.</option>
									<option value='Retirouse da sala sem autorizacao do professor'>Retirou-se da sala sem autoriza��o do Professor(a).</option>
									<option value='Agrediu uma pessoa fisicamente.'>Agrediu uma pessoa fisicamente.</option>
								</select>
							</div>
						</div>
						<div class='col-xs-12'>
							<textarea class='form-control' name=es_outros_motivos id=es_outros_motivos placeholder='Informa��es ou outros motivos referente a Entrada ou Sa�da.' rows='6' cols='80' wrap='hard'></textarea>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class='row'>
			<div class='col-sm-12'>
				<div class='panel panel-default'>
					<div class='panel-heading'>
						<center><B>Respons�veis</B></center>
					</div>
					<div class='panel-body'>
						<div class='col-xs-12'>
							<div class='input-group input-group-sm'>
								<span class='input-group-addon' id='sizing-addon3'>
								</span>
								<select class='form-control' name='es_responsavel' id='es_responsavel'>
									<option>selecione o Respons�vel</option>";
									while($linha = mysql_fetch_array($query)) {
										$responsavel_nome		= $linha['responsavel_nome'];
										$responsavel_doc		= $linha['responsavel_doc'];
										$responsavel_parentesco	= $linha['responsavel_parentesco'];
									echo "<option value='$responsavel_nome - $responsavel_doc - $responsavel_parentesco'>".$responsavel_nome." - ".$responsavel_doc." - ".$responsavel_parentesco."</option>";
									}
									echo"
								</select>
							</div>
						</div>
						<div class='col-xs-12'>
							<div class='input-group input-group-sm'>
								<span class='input-group-addon' id='sizing-addon3'>
								</span>
								<input type='text' class='form-control' name='es_secretaria' id='es_secretaria' value='$_SESSION[UsuarioNome]' size='70' maxlength='88' readonly/>
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
						<center><B>Op��es</B>
					</div>
					<div class='panel-body'>
						<table border='1' width='100%' cellspacing='0' cellpadding='3'  bordercolor='#FFFFFF' height='0' style='border-collapse: collapse'> 
							<tr>
								<td align=center bgcolor=#FFFFFF>Tem certeza que deseja cadastrar a <b>entrada/sa�da</b> para <b>$aluno_nome</b>?</b></font><br></td>	
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
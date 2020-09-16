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
include ('conecta.php');

$id_select1 = $_GET['id'];		//Recupera a variavel id para fazer o select
$id_select2 = $_GET['opcao'];	//Recupera a variavel opcao para fazer o select

$sql = "SELECT * FROM dados_pessoais_aluno where aluno_id=$id_select1"; //Faz o select de todos os registros
$query = mysql_query($sql) or die("<center><h1>OOOPS!<BR>Não é esta a pagina que você esperava ver?<BR> Então algo esta errado...</h1><a href='home.php' style='text-decoration: none'><font color='#FF7F00'>Você pode clicar na imagem para voltar</font><p><img border='0' src='img/cones.png' width='544' height='332'></a></p>O Erro de conexão com banco de dados esta descrito logo abaixo!<BR>".mysql_error());
$linha = mysql_fetch_assoc($query);

		$aluno_ra				= $linha['aluno_ra'];
		$aluno_id				= $linha['aluno_id'];
		$aluno_nome				= $linha['aluno_nome'];
?>
<?php
include ('conecta.php');
$sql = "SELECT * FROM obs where obs_id=$id_select2"; //Faz o select de todos os registros
$query = mysql_query($sql) or die("<center><h1>OOOPS!<BR>Não é esta a pagina que você esperava ver?<BR> Então algo esta errado...</h1><a href='home.php' style='text-decoration: none'><font color='#FF7F00'>Você pode clicar na imagem para voltar</font><p><img border='0' src='img/cones.png' width='544' height='332'></a></p>O Erro de conexão com banco de dados esta descrito logo abaixo!<BR>".mysql_error());
$row = mysql_fetch_assoc($query);

$obs_id							= $row['obs_id'];
$obs_aluno_nome					= $row['obs_aluno_nome'];
$obs_aluno_id					= $row['obs_aluno_id'];
$obs_visual						= $row['obs_visual'];
$obs_visual_qual				= $row['obs_visual_qual'];
$obs_auditiva					= $row['obs_auditiva'];
$obs_auditiva_qual      		= $row['obs_auditiva_qual'];
$obs_fisica						= $row['obs_fisica'];
$obs_fisica_qual          		= $row['obs_fisica_qual'];
$obs_movimento					= $row['obs_movimento'];
$obs_movimento_qual     		= $row['obs_movimento_qual'];
$obs_comportamento     			= $row['obs_comportamento'];
$obs_comportamento_qual			= $row['obs_comportamento_qual'];
$obs_fraldas					= $row['obs_fraldas'];
$obs_cadeira_rodas	            = $row['obs_cadeira_rodas'];
$obs_mencionar_prob_import	    = $row['obs_mencionar_prob_import'];


echo"
<form id='cadastro' name='cadastro' method='post' action='adm_aluno_obs_editar_motor.php'>
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
									<center>Editando <B><i>Observação</i></B> para <i><strong> $aluno_nome - $aluno_ra </center></i></strong>
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
						<center><B>Seu Filho(a) tem Deficiência:</B></center>
					</div>
					<div class='panel-body'>
						<div class='col-xs-3'>
							<div class='input-group input-group-sm'>
								<span class='input-group-addon' id='sizing-addon3'>
									Visual?
								</span>
								<input type='hidden' class='form-control' name='obs_aluno_nome' value='$obs_aluno_nome' size='60'>
								<input type='hidden' class='form-control' name='obs_aluno_id' value='$obs_aluno_id' size='3'>
								<input type='hidden' class='form-control' name='obs_id' value='$obs_id' size='3'>
								<select class='form-control' name='obs_visual' id='obs_visual'>
									<option>...</option>
									<option value='Sim'>Sim</option>
									<option value='Nao'>Não</option>
								</select>
							</div>
						</div>
						<div class='col-xs-9'>
							<div class='input-group input-group-sm'>
								<span class='input-group-addon' id='sizing-addon3'>
								</span>
								<input type='text' name='obs_visual_qual' id='obs_visual_qual' value='$obs_visual_qual' class='form-control' placeholder='Qual?' />
							</div>
						</div>
						<div class='col-xs-3'>
							<div class='input-group input-group-sm'>
								<span class='input-group-addon' id='sizing-addon3'>
									Auditiva?
								</span>
								<select class='form-control' name='obs_auditiva' id='obs_auditiva'>
									<option>$obs_auditiva</option>
									<option value='Sim'>Sim</option>
									<option value='Nao'>Não</option>
								</select>
							</div>
						</div>
						<div class='col-xs-9'>
							<div class='input-group input-group-sm'>
								<span class='input-group-addon' id='sizing-addon3'>
								</span>
								<input type='text' name='obs_auditiva_qual' id='obs_auditiva_qual' value='$obs_auditiva_qual' class='form-control' size='40' maxlength='70' placeholder='Qual?' />
							</div>
						</div>
						<div class='col-xs-3'>
							<div class='input-group input-group-sm'>
								<span class='input-group-addon' id='sizing-addon3'>
									Física?
								</span>
								<select class='form-control' name='obs_fisica' id='obs_fisica'>
									<option>$obs_fisica</option>
									<option value='Sim'>Sim</option>
									<option value='Nao'>Não</option>
								</select>
							</div>
						</div>
						<div class='col-xs-9'>
							<div class='input-group input-group-sm'>
								<span class='input-group-addon' id='sizing-addon3'>
								</span>
								<input type='text' name='obs_fisica_qual' id='obs_fisica_qual' value='$obs_fisica_qual' class='form-control' size='40' maxlength='70' placeholder='Qual?' />
							</div>
						</div>
						<div class='col-xs-3'>
							<div class='input-group input-group-sm'>
								<span class='input-group-addon' id='sizing-addon3'>
									Nos Movimentos?
								</span>
								<select class='form-control' name='obs_movimento' id='obs_movimento'>
									<option>$obs_movimento</option>
									<option value='Sim'>Sim</option>
									<option value='Nao'>Não</option>
								</select>
							</div>
						</div>
						<div class='col-xs-9'>
							<div class='input-group input-group-sm'>
								<span class='input-group-addon' id='sizing-addon3'>
								</span>
								<input type='text' name='obs_movimento_qual' id='obs_movimento_qual' value='$obs_movimento_qual' class='form-control' size='40' maxlength='70' placeholder='Qual?' />
							</div>
						</div>
						<div class='col-xs-3'>
							<div class='input-group input-group-sm'>
								<span class='input-group-addon' id='sizing-addon3'>
									De Comportamento?
								</span>
								<select class='form-control' name='obs_comportamento' id='obs_comportamento'>
									<option>$obs_comportamento</option>
									<option value='Sim'>Sim</option>
									<option value='Nao'>Não</option>
								</select>
							</div>
						</div>
						<div class='col-xs-9'>
							<div class='input-group input-group-sm'>
								<span class='input-group-addon' id='sizing-addon3'>
								</span>
								<input type='text' name='obs_comportamento_qual' id='obs_comportamento_qual' value='$obs_comportamento_qual' class='form-control' size='40' maxlength='70' placeholder='Qual?' />
							</div>
						</div>
						<div class='col-xs-6'>
							<div class='input-group input-group-sm'>
								<span class='input-group-addon' id='sizing-addon3'>
									Usa Fraldas?
								</span>
								<select class='form-control' name='obs_fraldas' id='obs_fraldas'>
									<option>$obs_fraldas</option>
									<option value='Sim'>Sim</option>
									<option value='Nao'>Não</option>
								</select>
							</div>
						</div>
						<div class='col-xs-6'>
							<div class='input-group input-group-sm'>
								<span class='input-group-addon' id='sizing-addon3'>
									Usa cadeira de rodas?
								</span>
								<select class='form-control' name='obs_cadeira_rodas' id='obs_cadeira_rodas'>
									<option>$obs_cadeira_rodas</option>
									<option value='Sim'>Sim</option>
									<option value='Nao'>Não</option>
								</select>
							</div>
						</div>
					</div>
						<div class='col-sm-12'>
							<textarea class='form-control' rows='3' name=obs_mencionar_prob_import id=obs_mencionar_prob_import placeholder='Ex:Outras informações referente ao aluno'  wrap='hard'>$obs_mencionar_prob_import</textarea>
						</div><br>
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
							Tem certeza que deseja cadastrar a <b>Observação</b> para <b>$aluno_nome</b>?</b><br>
							<button type='image' name='Cadastrar'  id='button' value='Cadastrar' class='btn btn-default btn-sm'>
								Cadastrar	<span class='glyphicon glyphicon-ok' aria-hidden='true'></span>
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>";
?>
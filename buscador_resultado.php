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
	<script language="JavaScript">
function abrir(URL) {
var width = 700;
var height = 680;
var left = 657;
var top = 0;
window.open(URL,'janela', 'width='+width+', height='+height+', top='+top+', left='+left+', scrollbars=no, status=no, toolbar=no, location=no, directories=no, menubar=no, resizable=no, fullscreen=no');
}
</script>
<style>
#tabela{
width:600px;
height:100px;
text-align:center;
}

.coluna{
width:50px;
height:20px;
}
.coluna:hover{
background-color:#F0F0F0;
}
</style>
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
	        margin-top:20%; /* ou seja ele pega 50% da altura tela e sobe metade do valor da altura no caso 100 */
	        left:0;
	        margin-left:0; /* ou seja ele pega 50% da largura tela e diminui  metade do valor da largura no caso 250 */

}
</style>

<?php
include "conecta.php";

$busca = $_POST['busca'];// palavra que o usuario digitou
$categoria = $_POST['categorias']; //categoria que o usuario deseja

if ( $_POST['categorias'] == 0 ) {
    
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
								<center><H1>Opss!</H1><H4>Selecione uma categoria para continuar sua pesquisa!</H4>
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
if ( $_POST['categorias'] == 1 ) {

$sql = mysql_query("SELECT *,DATE_FORMAT(aluno_data, '%d/%m/%y') as 'aluno_data' FROM dados_pessoais_aluno left join matricula ON dados_pessoais_aluno.aluno_id=matricula.matricula_aluno_id WHERE 
dados_pessoais_aluno.aluno_nome LIKE '%$busca%' 
OR dados_pessoais_aluno.aluno_ra LIKE '%$busca%' 
OR matricula.matricula_turno_turma LIKE '%$busca%' 
OR matricula.matricula_ano_civil LIKE '%$busca%' 
OR matricula.matricula_ano_letivo LIKE '%$busca%' 
OR matricula.matricula_tipo_ensino LIKE '%$busca%' ORDER BY aluno_nome ASC")or die(mysql_error());
$result = mysql_num_rows($sql);

if($result>=1)  {
echo"
<center><small>
	<div class='container-fluid'>
		<div class='row'>
			<div class='col-sm-12'>
				<div class='alert alert-success' role='alert'>
					<center><strong>".$result."</strong> resultado(s) para <i><strong>'".$_POST['busca']."'</i></strong> na categoria <i><strong>Aluno!</i></strong></center>
				</div>
			</div>
		</div>
		<div class='row'>
			<div class='col-sm-12'>
				<div class='table-condensed'>
				<table border='0' class='table table-hover'> 
					<tr>
						<td align=center bgcolor=#F0F0F0><B>Foto</td>  
						<td align=center bgcolor=#F0F0F0><B>R.A</td>  
						<td align=center bgcolor=#F0F0F0><B>Nome do Aluno</td>
						<td align=center bgcolor=#F0F0F0><B>D/Nasc.</td>
						<td align=center bgcolor=#F0F0F0><B>Pai/Mãe</td>
						<td align=center bgcolor=#F0F0F0><B>Situação</td>
						<td align=center bgcolor=#F0F0F0><B>Série/Turma</td>
						<td align=center bgcolor=#F0F0F0><B>Opções</td>
					</tr>";

while ($linha = mysql_fetch_assoc($sql)){        

		$matricula_situacao_aluno	= $linha['matricula_situacao_aluno'];
		$matricula_turno_turma		= $linha['matricula_turno_turma'];
		$matricula_turno_ano		= $linha['matricula_turno_ano'];
		$aluno_nome	 				= $linha['aluno_nome'];
		$aluno_id 					= $linha['aluno_id'];
		$aluno_ra 					= $linha['aluno_ra'];		
		$aluno_data 				= $linha['aluno_data'];
		$aluno_pai 					= $linha['aluno_pai'];
		$aluno_mae 					= $linha['aluno_mae'];	

echo"
<tr>
			<td align=center>
				<a href='javascript:abrir(\"adm_foto_visualizar.php?id=$aluno_id\");' style='text-decoration: none' title='Cadastrar foto do Aluno'>
				<img src='getImagem.php?id=$aluno_id' border='0' width='30' height='30' class='img-circle'></a>
			</td>
			<td align=center>
			<a href='javascript:abrir(\"adm_aluno_dados_pessoais.php?id=$aluno_id\");' style='text-decoration: none' title='Dados do Aluno' class='alert-link'>
			$aluno_ra</a>
			</td>
			<td align=center>
			<a href='javascript:abrir(\"adm_aluno_dados_pessoais.php?id=$aluno_id\");' style='text-decoration: none' title='Dados do Aluno'>
			$aluno_nome</a>
			</td>
			<td align=center>
			$aluno_data
			</td>
			<td align=center width='%'>
			<a href='javascript:abrir(\"adm_responsavel_listar.php?id=$aluno_id\");' style='text-decoration: none' title='Responsaveis pelo Aluno'>
			$aluno_pai<BR>$aluno_mae</a>
			</td>
			<td align=center>
			$matricula_situacao_aluno
			</td>
			<td align=center>
			$matricula_turno_ano/$matricula_turno_turma
			</td>
			<td align=center width='15%' heigth='%'>
				<a href='javascript:abrir(\"adm_aluno_procedencia_listar.php?id=$aluno_id\");' style='text-decoration: none'>
					<span class='glyphicon glyphicon-map-marker' aria-hidden='true' style='font-size: 19px' title='Procedência do Aluno'></span>
				</a>

				<a href='javascript:abrir(\"adm_aluno_matricula_listar.php?id=$aluno_id\");' style='text-decoration: none'>
					<span class='glyphicon glyphicon-education' aria-hidden='true' style='font-size: 19px' title='Matrícula'></span>
				</a>

				<a href='javascript:abrir(\"adm_aluno_classificacao_listar.php?id=$aluno_id\");' style='text-decoration: none'>
					<span class='glyphicon glyphicon-sort' aria-hidden='true' style='font-size: 19px' title='Classificação'></span>
				</a>

				<a href='javascript:abrir(\"adm_aluno_obs_listar.php?id=$aluno_id\");' style='text-decoration: none'>
					<span class='glyphicon glyphicon-info-sign' aria-hidden='true' style='font-size: 19px' title='Observações'></span>
				</a>

				<a href='javascript:abrir(\"adm_entrada_saida_listar.php?id=$aluno_id\");' style='text-decoration: none'>
					<span class='glyphicon glyphicon-time' aria-hidden='true' style='font-size: 19px' title='Entrada e Saída'></span>
				</a>

				<a href='javascript:abrir(\"adm_ocorrencias_listar.php?id=$aluno_id\");' style='text-decoration: none'>
					<span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true' style='font-size: 19px' title='Ocorrência'></span>
				</a>
			</td>
		</tr>";
    }
	echo"</table>
	</div>";
}
else {
    echo "
<div id='div2'>
	<div class='container-fluid'>
		<div class='row'>
			<div class='col-sm-12'>
				<div class='alert alert-danger' role='alert'><center>
					<a href=javascript:abrir('adm_aluno_cadastrar_dados_pessoais.php?naoencontrou=$busca'); style='text-decoration: none'>
						<table border='0' width='100%' cellspacing='0' cellpadding='3'  bordercolor='#FFF' height='0' style='border-collapse: collapse'> 
							<tr>
								<td height='1' width='1'>
									<span class='glyphicon glyphicon-alert' aria-hidden='true' style='font-size: 17px'></span>
								</td>
								<td>
									<center>Não encontramos nenhum <i><strong>'$busca'</i></strong> na categoria <i><strong>aluno</i></strong> no nosso banco de dados!<BR>
									Clique aqui para cadastrar!
								</td>
								<td height='1' width='1'>
									<span class='glyphicon glyphicon-alert' aria-hidden='true' style='font-size: 17px'></span>
								</td>
							</tr>
						</table>
					</a>
				</div>
			</div>
		</div>
	</div>
</div>";
}
}
if ( $_POST['categorias'] == 2 ) {

$sql = mysql_query("SELECT *,DATE_FORMAT(prof_data, '%d/%m/%y') as 'prof_data' FROM professor_dados_pessoais left join professor_formacao ON professor_dados_pessoais.prof_id=professor_formacao.prof_formacao_prof_id WHERE 
professor_dados_pessoais.prof_nome LIKE '%$busca%' 
OR professor_dados_pessoais.prof_ra LIKE '%$busca%'
OR professor_dados_pessoais.prof_situação_funcional LIKE '%$busca%' 
OR professor_formacao.prof_formacao_instituicao LIKE '%$busca%' 
OR professor_formacao.prof_formacao_curso_tipo LIKE '%$busca%' 
OR professor_formacao.prof_formacao_curso LIKE '%$busca%' 'ORDER BY prof_nome ASC' ")or die(mysql_error());
$result = mysql_num_rows($sql);


if($result>=1)  {
echo"
<center><small>
	<div class='container-fluid'>
		<div class='row'>
			<div class='col-sm-12'>
				<div class='alert alert-success' role='alert'>
					<center><strong>".$result."</strong> resultado(s) para <i><strong>'".$_POST['busca']."'</i></strong> na categoria <i><strong>Professor(a)!</i></strong></center>
				</div>
			</div>
		</div>
		<div class='row'>
			<div class='col-sm-12'>
				<div class='table-responsive'>
					<table border='0' class='table table-hover'> 
						<tr>
						<td align=center bgcolor=#F0F0F0><B>Foto</td>  
						<td align=center bgcolor=#F0F0F0><B>Matrícula</td>  
						<td align=center bgcolor=#F0F0F0><B>Nome do Professor</td>
						<td align=center bgcolor=#F0F0F0><B>D/Nasc.</td>
						<td align=center bgcolor=#F0F0F0><B>Dependentes</td>
						<td align=center bgcolor=#F0F0F0><B>Situação</td>
						<td align=center bgcolor=#F0F0F0><B>Formação</td>
						<td align=center bgcolor=#F0F0F0><B>Opções</td>
						</tr>";

while ($linha = mysql_fetch_assoc($sql)){        
		
		$prof_formacao_curso	 		= $linha['prof_formacao_curso'];
		$prof_situação_funcional 		= $linha['prof_situação_funcional'];
		$prof_id	 					= $linha['prof_id'];		
		$prof_nome 						= $linha['prof_nome'];
		$prof_data 						= $linha['prof_data'];
		$prof_ra 						= $linha['prof_ra'];
		
echo"<tr class='coluna'>
			<td align=center>
				<a href='javascript:abrir(\"adm_visualizar_foto.php?id=$prof_id\");' style='text-decoration: none' title='Cadastrar foto do Aluno'>
				<img src='getImagem.php?id=$prof_id' border='0' width='30' height='30'></a>
			</td>
			<td align=center>
			<a href='javascript:abrir(\"adm_prof_dados_pessoais.php?id=$prof_id\");' style='text-decoration: none' title='Dados do Professor'>
			$prof_ra</a>
			</td>
			<td align=center>
			<a href='javascript:abrir(\"adm_prof_dados_pessoais.php?id=$prof_id\");' style='text-decoration: none' title='Dados do Professor'>
			$prof_nome</a>
			</td>
			<td align=center>
			$prof_data
			</td>
			<td align=center>
			<a href='javascript:abrir(\"adm_prof_dependente_listar.php?id=$prof_id\");' style='text-decoration: none' title='Dados do Professor'>
			prof_dependentes</a>
			</td>
			<td align=center>
			$prof_situação_funcional
			</td>
			<td align=center>
			$prof_formacao_curso
			</td>
			<td align=center width='15%'>
				<a href='javascript:abrir(\"adm_prof_procedencia_listar.php?id=$prof_id\");' style='text-decoration: none'>
				<img src='img/proc.png' border='0' width='19' height='19' title='Procedência'></a>
				
				<a href='javascript:abrir(\"adm_prof_formacao_listar.php?id=$prof_id\");' style='text-decoration: none'>
				<img src='img/Diploma.png' border='0' width='19' height='19' title='Formação'></a>
				
				<a href='javascript:abrir(\"adm_prof_disciplina_listar.php?id=$prof_id\");' style='text-decoration: none'>
				<img src='img/book_stack.png' border='0' width='19' height='19' title='Disciplina'></a>

				<a href='javascript:abrir(\"adm_prof_plano_de_aula_listar.php?id=$prof_id\");' style='text-decoration: none'>
				<img src='img/plano_de_aula.png' border='0' width='19' height='19' title='Plano de Aula'></a>
				
				<a href='javascript:abrir(\"adm_prof_obs_listar.php?id=$prof_id\");' style='text-decoration: none'>
				<img src='img/obser.png' border='0' width='19' height='19' title='Observações'></a>

				<a href='javascript:abrir(\"adm_prof_chamada_listar.php?id=$prof_id\");' style='text-decoration: none'>
				<img src='img/check.png' border='0' width='19' height='19' title='Chamada'></a>
			</td>
		</tr>";
    }
	echo"</table></div>";
}
else {
    echo "
<div id='div2'>
	<div class='container-fluid'>
		<div class='row'>
			<div class='col-sm-12'>
				<div class='alert alert-danger' role='alert'><center>
					<a href=javascript:abrir('adm_prof_cadastrar_dados_pessoais.php'); style='text-decoration: none'>
						Não encontramos nenhum <i><strong>$busca</i></strong> na categoria <i><strong>Professor</i></strong> no nosso banco de dados!
						Verifique se o nome foi digitado corretamente ou, se precisar, cadastre!<br>
						<img src='img/nervousface.jpg' border='0' width='50' height='50' title='Cadastrar Aluno'>
					</a>
				</div>
			</div>
		</div>
	</div>
</div>";
}
}
if ( $_POST['categorias'] == 3 ) {
$sql = mysql_query("SELECT *,DATE_FORMAT(responsavel_data, '%d/%m/%y') as 'responsavel_data' FROM dados_pessoais_aluno join responsavel 
ON dados_pessoais_aluno.aluno_id=responsavel.responsavel_aluno_id 
WHERE 
dados_pessoais_aluno.aluno_nome LIKE '%$busca%' 
OR dados_pessoais_aluno.aluno_ra LIKE '%$busca%' 
OR responsavel.responsavel_nome LIKE '%$busca%' 
OR responsavel.responsavel_doc LIKE '%$busca%' 
OR responsavel.responsavel_aluno LIKE '%$busca%' ORDER BY responsavel_nome ASC")or die(mysql_error());
$result = mysql_num_rows($sql);

if($result>=1)  {
echo"
<center><small>
	<div class='container-fluid'>
		<div class='row'>
			<div class='col-sm-12'>
				<div class='alert alert-success' role='alert'>
					<center><strong>".$result."</strong> resultado(s) para <i><strong>'".$_POST['busca']."'</i></strong> na categoria <i><strong>Responsável!</i></strong></center>
				</div>
			</div>
		</div>
		<div class='row'>
			<div class='col-sm-12'>
				<div class='table-responsive'>
					<table border='0' class='table table-hover'> 
						<tr>
							<td align=center bgcolor=#F0F0F0><B>Foto</td>  
							<td align=center bgcolor=#F0F0F0><B>Nome do Responsável</td>
							<td align=center bgcolor=#F0F0F0><B>Doc</td>			
							<td align=center bgcolor=#F0F0F0><B>Data de Nasc.</td>
							<td align=center bgcolor=#F0F0F0><B>Estudante</td>
							<td align=center bgcolor=#F0F0F0><B>Opções</td>
						</tr>";

while ($linha = mysql_fetch_assoc($sql)){        

		$responsavel_id			= $linha['responsavel_id'];
		$responsavel_nome		= $linha['responsavel_nome'];
		$responsavel_doc		= $linha['responsavel_doc'];
		$responsavel_data		= $linha['responsavel_data'];
		$responsavel_aluno		= $linha['responsavel_aluno'];
		$responsavel_aluno_id	= $linha['responsavel_aluno_id'];
				
echo"<tr>
			<td align=center>
				<a href='javascript:abrir(\"adm_visualizar_foto.php?id=$responsavel_id\");' style='text-decoration: none' title='Cadastrar foto do Aluno'>
				<img src='getImagem.php?id=$responsavel_id' border='0' width='30' height='30'></a>
			</td>
			<td align=center>
			<a href='javascript:abrir(\"adm_responsavel_visualizar.php?id=$responsavel_id\");' style='text-decoration: none' title='Responsaveis pelo Aluno'>
				$responsavel_nome</a>
			</td>
			<td align=center>
				$responsavel_doc
			</td>
			<td align=center>
			$responsavel_data
			</td>
			<td align=center>
			<a href='javascript:abrir(\"adm_aluno_dados_pessoais.php?id=$responsavel_aluno_id\");' style='text-decoration: none' title='Responsaveis pelo Aluno'>
			$responsavel_aluno</a>
			</td>
			<td align=center width='%'>
				<a href='javascript:abrir(\"adm_responsavel_obs_listar.php?id=$responsavel_id\");' style='text-decoration: none'>
				<img src='img/obser.png' border='0' width='19' height='19' title='Observações'></a>

				<a href='javascript:abrir(\"adm_responsavel_mensagem_listar.php?id=$responsavel_id\");' style='text-decoration: none'>
				<img src='img/04.png' border='0' width='19' height='19' title='Enviar SMS/Email'></a>
				
				<a href='javascript:abrir(\"adm_responsavel_conversa_listar.php?id=$responsavel_id\");' style='text-decoration: none'>
				<img src='img/conversa.png' border='0' width='19' height='19' title='Conversa direta'></a>
			</td>
		</tr>";
    }
	echo"</table></div>";
}
else {
    echo "
<div id='div2'>
	<div class='container-fluid'>
		<div class='row'>
			<div class='col-sm-12'>
				<div class='alert alert-danger' role='alert'><center>
					Não encontramos nenhum <i><strong>$busca</i></strong> na categoria <i><strong>Responsável</i></strong> no nosso banco de dados!
					Verifique se o nome foi digitado corretamente ou, se precisar, cadastre!<br>
					<img src='img/nervousface.jpg' border='0' width='50' height='50' title='Cadastrar Aluno'>
				</div>
			</div>
		</div>
	</div>
</div>";
}
}
if ( $_POST['categorias'] == 4) {
	
$sql = mysql_query("SELECT *,DATE_FORMAT(usuario_data, '%d/%m/%y') as 'usuario_data' FROM usuario_dados_pessoais LEFT JOIN usuario_dados_login ON usuario_dados_pessoais.usuario_id=usuario_dados_login.login_usuario_id WHERE 
usuario_dados_pessoais.usuario_nome LIKE '%$busca%' 
OR usuario_dados_pessoais.usuario_ra LIKE '%$busca%' 
OR usuario_dados_login.login_nivel LIKE '%$busca%' 
OR usuario_dados_login.login_ativo LIKE '%$busca%' 
OR usuario_dados_login.login_nome LIKE '%$busca%' ")or die(mysql_error());

$result = mysql_num_rows($sql);

if($result>=1)  {
	echo"
<center><small>
	<div class='container-fluid'>
		<div class='row'>
			<div class='col-sm-12'>
				<div class='alert alert-success' role='alert'>
					<center><strong>".$result."</strong> resultado(s) para <i><strong>'".$_POST['busca']."'</i></strong> na categoria <i><strong>Usuário!</i></strong></center>
				</div>
			</div>
		</div>
		<div class='row'>
			<div class='col-sm-12'>
				<div class='table-responsive'>
					<table border='0' class='table table-hover'> 
						<tr>
							<td align=center bgcolor=#F0F0F0><B>Foto</td>  
							<td align=center bgcolor=#F0F0F0><B>ID</td>	
							<td align=center bgcolor=#F0F0F0><B>Nome do Usuário</td>
							<td align=center bgcolor=#F0F0F0><B>Login</td>
							<td align=center bgcolor=#F0F0F0><B>Nível</td>
							<td align=center bgcolor=#F0F0F0><B>Ativo</td>
							<td align=center bgcolor=#F0F0F0><B>Opções</td>
						</tr>";

while ($linha = mysql_fetch_assoc($sql)){        

$login_id				= $linha['login_id'];
$login_nome				= $linha['login_nome'];
$login_ativo			= $linha['login_ativo'];
$login_senha			= $linha['login_senha'];
$login_nivel			= $linha['login_nivel'];

$usuario_id				= $linha['usuario_id'];
$usuario_nome			= $linha['usuario_nome'];

echo"<tr>
			<td align=center>
				<a href='javascript:abrir(usuario_id);' style='text-decoration: none' title='Cadastrar foto do Aluno'>
				<img src='getImagem.php?id=$usuario_id' border='0' width='30' height='30'></a>
			</td>
			<td align=center>
			<a href='javascript:abrir(\"adm_usuario_dados_pessoais_visualizar.php?id=$usuario_id\");' style='text-decoration: none' title='Visualizar dados do Usuário'>	
				$usuario_id</a>
			</td>
			<td align=center>
			<a href='javascript:abrir(\"adm_usuario_dados_pessoais_visualizar.php?id=$usuario_id\");' style='text-decoration: none' title='Visualizar dados do Usuário'>
				$usuario_nome</a>
			</td>
			<td align=center>
			$login_nome
			</td>
			<td align=center>
			$login_nivel
			</td>
			<td align=center>
			$login_ativo
			</td>
			<td align=center width='15%'>
				<a href='javascript:abrir(\"adm_usuario_login_visualizar.php?id=$usuario_id\");' style='text-decoration: none'>
				<img src='img/14.png' border='0' width='19' height='19' title='Procedência do usuario'></a>

				<a href='javascript:abrir(\"adm_entrada_saida_listar.php?id=$usuario_id\");' style='text-decoration: none'>
				<img src='img/relogio.png' border='0' width='19' height='19' title='Entrada e Saida'></a>

				<a href='javascript:abrir(\"adm_responsavel_obs_listar.php?id=$usuario_id\");' style='text-decoration: none'>
				<img src='img/obser.png' border='0' width='19' height='19' title='Observações'></a>

				<a href='javascript:abrir(\"adm_ocorrencias_listar.php?id=$usuario_id\");' style='text-decoration: none'>
				<img src='img/ocorre.png' border='0' width='19' height='19' title='Visualizar Ocorrência'></a>
			</td>
		</tr>";
    }
	echo"</table></div>";
	}
else {
    echo "
<div id='div2'>
	<div class='container-fluid'>
		<div class='row'>
			<div class='col-sm-12'>
				<div class='alert alert-danger' role='alert'><center>
					<a href=javascript:abrir('adm_usuario_cadastrar_dados_pessoais.php'); style='text-decoration: none'>
						Não encontramos nenhum <i><strong>$busca</i></strong> na categoria <i><strong>Usuário</i></strong> no nosso banco de dados!
						Verifique se o nome foi digitado corretamente ou, se precisar, cadastre!<br>
						<img src='img/nervousface.jpg' border='0' width='50' height='50' title='Cadastrar Aluno'>
					</a>
				</div>
			</div>
		</div>
	</div>
</div>";
}
}
if ( $_POST['categorias'] == 5 ) {
echo"
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
								<center><H1>Opss!</H1><H4>A pagina que você esta tentando acessar parece não fazer parte do seu pacote.<BR>Entre em contato com o Administrador do Sistema e verifique!</H4>
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
if ( $_POST['categorias'] == 6 ) {
echo"
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
								<center><H1>Opss!</H1><H4>A pagina que você esta tentando acessar parece não fazer parte do seu pacote.<BR>Entre em contato com o Administrador do Sistema e verifique!</H4>
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
if ( $_POST['categorias'] == 7 ) {
echo"
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
								<center><H1>Opss!</H1><H4>A pagina que você esta tentando acessar parece não fazer parte do seu pacote.<BR>Entre em contato com o Administrador do Sistema e verifique!</H4>
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
if ( $_POST['categorias'] == 8 ) {
$sql = mysql_query("SELECT * FROM mural WHERE mural_remetente LIKE '%$busca%'
							   OR mural.mural_assunto LIKE '%$busca%'
							   OR mural.mural_mensagem LIKE '%$busca%'
							   OR mural.mural_dia LIKE '%$busca%'
							   OR mural.mural_mes LIKE '$busca'
")or die(mysql_error());


$result = mysql_num_rows($sql);

if($result>=1)  {
echo"
<center><small>
	<div class='container-fluid'>
		<div class='row'>
			<div class='col-sm-12'>
				<div class='alert alert-success' role='alert'>
					<center><strong>".$result."</strong> resultado(s) para <i><strong>'".$_POST['busca']."'</i></strong> na categoria <i><strong>Mensagem!</i></strong></center>
				</div>
			</div>
		</div>
		<div class='row'>
			<div class='col-sm-12'>
				<div class='table-condensed'>
					<table border='0' class='table table-hover'> 
						<tr>
							<td align=center bgcolor=#F0F0F0><B>ID</td>  
							<td align=center bgcolor=#F0F0F0><B>data</td>
							<td align=center bgcolor=#F0F0F0><B>Remetente</td>
							<td align=center bgcolor=#F0F0F0><B>Assunto</td>
							<td align=center bgcolor=#F0F0F0><B>Opções</td>
						</tr>";

while ($linha = mysql_fetch_assoc($sql)){        

$mural_id			= $linha ['mural_id'];
$mural_remetente	= $linha ['mural_remetente'];
$mural_assunto		= $linha ['mural_assunto'];
$mural_mensagem		= $linha ['mural_mensagem'];
$mural_dia			= $linha ['mural_dia'];
$mural_mes			= $linha ['mural_mes'];
$mural_prioridade	= $linha ['mural_prioridade'];

		echo"	<tr>
			<td align=center>
				$mural_id
			</td>
			<td align=center>
				$mural_dia/$mural_mes
			</td>
			<td align=center>
				$mural_remetente
			</td>
			<td align=center>
				<a href='javascript:abrir(\"adm_mural_visualizar.php?id=$mural_id\");' style='text-decoration: none' title='Cadastrar'>
				<p class='text-$mural_prioridade'>$mural_assunto</p>
			</a>
			</td>
			<td align=center>
			---
			</td>
		</tr>";
    }
	echo"</table></div>";
}
else {
    echo "<div id='div2'><center><pre>
    Não foi encontrado nenhum resultado para <i><strong>".$_POST['busca']."</i></strong> na categoria <i><strong>Mensagem</i></strong>
	<BR><BR><BR><BR><BR><BR><BR><BR>
<img src='img/interrogacao.png' border='0' width='200' height='200'>
     </div>";
}
}
?>
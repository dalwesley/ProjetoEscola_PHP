<?php

// A sessão precisa ser iniciada em cada página diferente
if (!isset($_SESSION)) session_start();

$nivel_necessario = 2;

// Verifica se não há a variável da sessão que identifica o usuário
if (!isset($_SESSION['UsuarioID']) OR ($_SESSION['UsuarioNivel'] < $nivel_necessario)) {
	// Destrói a sessão por segurança
	session_destroy();
	// Redireciona o visitante de volta pro login
	header("Location: acesso_negado.htm"); exit;
}
?>
<?php
include ('conecta.php');
$id_select1 = $_GET['id'];		//Recupera a variavel id para fazer o select
$sql = "SELECT * FROM professor_disciplina where prof_disciplina_prof_id=$id_select1"; //Faz o select de todos os registros
$query = mysql_query($sql) or die("<center><h1>OOOPS!<BR>Não é esta a pagina que você esperava ver?<BR> Então algo esta errado...</h1><a href='home.php' style='text-decoration: none'><font color='#FF7F00'>Você pode clicar na imagem para voltar</font><p><img border='0' src='img/cones.png' width='544' height='332'></a></p>O Erro de conexão com banco de dados esta descrito logo abaixo!<BR>".mysql_error());
$linha = mysql_fetch_assoc($query);

		$prof_disciplina_prof_id				= $linha['prof_disciplina_prof_id'];
		$prof_disciplina_prof_nome				= $linha['prof_disciplina_prof_nome'];
		$serie_select							= $linha['prof_disciplina_serie'];
		$turma_select							= $linha['prof_disciplina_turma'];

?>
<?php
include ('conecta.php');
date_default_timezone_set('America/Sao_Paulo');
$date = date('Y-m-d');
$hora = date('H:i:s');
$sql = "SELECT * FROM matricula where ('matricula_ano_letivo=$serie_select') AND ('matricula_turno_turma=$turma_select')"; //Faz o select de todos os registros
$query = mysql_query($sql) or die(mysql_error()); //Verifica se o comando foi executado
$result = mysql_num_rows($query);

if($result>=1) {

while($linha = mysql_fetch_array($query)) {
		$matricula_turno_ano					= $linha['matricula_turno_ano'];
		$matricula_turno_turma					= $linha['matricula_turno_turma'];
		$matricula_aluno_nome					= $linha['matricula_aluno_nome'];

echo"<pre>
Data/Hora:  <input type='date' name='es_data' id='es_data' value='$date'>-<input type='time' name='es_hora' id='es_hora' value='$hora'>
Série/Turma:<input type='text' name='es_turno_ano' id='es_turno_ano' value='$result[matricula_turno_ano]' size=2 readonly/>-<input type='text' name='es_turno_turma' id='es_turno_turma' value='$matricula_turno_turma' size=2 readonly/>
$matricula_aluno_nome
";
		}
} else {
echo"erro";
}
?>
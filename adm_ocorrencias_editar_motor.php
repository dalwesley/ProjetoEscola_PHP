<script language="javascript">setTimeout("window.history.go(-2);",1000)</script>

<?php 

//PREENCHA OS DADOS DE CONEXÃO A SEGUIR:
  
$host= '127.0.0.1';
$bd= 'escola';
$senhabd= '';
$userbd = 'root';
 
 
// RECEBENDO OS DADOS PREENCHIDOS DO FORMULÁRIO !

$ocorrencias_id							= $_POST ["ocorrencias_id"];
$ocorrencias_aluno_id					= $_POST ["ocorrencias_aluno_id"];
$ocorrencias_aluno_nome					= $_POST ["ocorrencias_aluno_nome"];
$ocorrencias_serie						= $_POST ["ocorrencias_serie"];
$ocorrencias_turma						= $_POST ["ocorrencias_turma"];
$ocorrencias_professor_nome				= $_POST ["ocorrencias_professor_nome"];
$ocorrencias							= $_POST ["ocorrencias"];
$ocorrencias_outros						= $_POST ["ocorrencias_outros"];
$ocorrencias_data						= $_POST ["ocorrencias_data"];
$ocorrencias_hora						= $_POST ["ocorrencias_hora"];
$ocorrencias_data_responsavel_ciente	= $_POST ["ocorrencias_data_responsavel_ciente"];
$ocorrencias_responsavel_ciente			= $_POST ["ocorrencias_responsavel_ciente"];
$ocorrencias_responsavel            	= $_POST ["ocorrencias_responsavel"];
$ocorrencias_professor_providencia		= $_POST ["ocorrencias_professor_providencia"];
$ocorrencias_direcao_providencia		= $_POST ["ocorrencias_direcao_providencia"];


//Gravando no banco de dados !
//conectando com o localhost - mysql

$conexao = mysql_connect($host, $userbd, $senhabd);
if (!$conexao)
	die ("Erro de conexão com localhost, o seguinte erro ocorreu -> ".mysql_error());
//conectando com a tabela do banco de dados
$banco = mysql_select_db($bd,$conexao);
if (!$banco)
	die ("<center><h1>OOOPS!<BR>Não é esta a pagina que você esperava ver?<BR> Então algo esta errado...</h1><a href='home.php' style='text-decoration: none'><font color='#FF7F00'>Você pode clicar na imagem para voltar</font><p><img border='0' src='img/cones.png' width='544' height='332'></a></p>O Erro de conexão com banco de dados esta descrito logo abaixo!<BR>".mysql_error());
 
$atu = "UPDATE ocorrencias SET

ocorrencias_id							= '$ocorrencias_id',
ocorrencias_aluno_id					= '$ocorrencias_aluno_id',
ocorrencias_aluno_nome					= '$ocorrencias_aluno_nome',
ocorrencias_serie						= '$ocorrencias_serie',
ocorrencias_turma						= '$ocorrencias_turma',
ocorrencias_professor_nome				= '$ocorrencias_professor_nome',
ocorrencias								= '$ocorrencias',
ocorrencias_outros						= '$ocorrencias_outros',
ocorrencias_data						= '$ocorrencias_data',
ocorrencias_hora						= '$ocorrencias_hora',
ocorrencias_data_responsavel_ciente		= '$ocorrencias_data_responsavel_ciente',
ocorrencias_responsavel_ciente			= '$ocorrencias_responsavel_ciente',
ocorrencias_responsavel            		= '$ocorrencias_responsavel',
ocorrencias_professor_providencia		= '$ocorrencias_professor_providencia',
ocorrencias_direcao_providencia			= '$ocorrencias_direcao_providencia'

WHERE ocorrencias_id = $ocorrencias_id";



$sucesso = mysql_query($atu);

if ($sucesso){
   echo" <h1><center>Atualização realizada com sucesso!</h1></center>";
}else{
   die (mysql_error());
}
 
mysql_close($conexao);
?>
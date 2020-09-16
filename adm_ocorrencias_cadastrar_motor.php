<script language="javascript">setTimeout("window.history.go(-2);",1000)</script>
<style type="text/css">

#div1 {
 
        width:100%; /* Tamanho da Largura da Div */
		height:0%; /* Tamanho da Altura da Div */
        position:absolute; 
        top:0; 
        margin-top:35%; /* ou seja ele pega 50% da altura tela e sobe metade do valor da altura no caso 100 */
        left:0%;
       margin-left:0%; /* ou seja ele pega 50% da largura tela e diminui  metade do valor da largura no caso 250 */
		background-color:#FFFFFF;
 
}
</style>
<?php 

//PREENCHA OS DADOS DE CONEXÃO A SEGUIR:
  
 
$host= '127.0.0.1';
$bd= 'escola';
$senhabd= '';
$userbd = 'root';
 
 
// RECEBENDO OS DADOS PREENCHIDOS DO FORMULÁRIO !

$ocorrencias_aluno_id					= isset($_POST ["ocorrencias_aluno_id"]) 				? $_POST['ocorrencias_aluno_id'] : '';
$ocorrencias_aluno_nome					= isset($_POST ["ocorrencias_aluno_nome"]) 				? $_POST['ocorrencias_aluno_nome'] : '';
$ocorrencias_serie						= isset($_POST ["ocorrencias_serie"])					? $_POST['ocorrencias_serie'] : '';
$ocorrencias_turma						= isset($_POST ["ocorrencias_turma"]) 					? $_POST['ocorrencias_turma'] : '';
$ocorrencias_professor_nome				= isset($_POST ["ocorrencias_professor_nome"]) 			? $_POST['ocorrencias_professor_nome'] : '';
$ocorrencias							= isset($_POST ["ocorrencias"]) 						? $_POST['ocorrencias'] : '';
$ocorrencias_outros						= isset($_POST ["ocorrencias_outros"]) 					? $_POST['ocorrencias_outros'] : '';
$ocorrencias_data						= isset($_POST ["ocorrencias_data"]) 					? $_POST['ocorrencias_data'] : '';
$ocorrencias_hora						= isset($_POST ["ocorrencias_hora"]) 					? $_POST['ocorrencias_hora'] : '';
$ocorrencias_data_responsavel_ciente	= isset($_POST ["ocorrencias_data_responsavel_ciente"]) ? $_POST['ocorrencias_data_responsavel_ciente'] : '';
$ocorrencias_responsavel_ciente			= isset($_POST ["ocorrencias_responsavel_ciente"]) 		? $_POST['ocorrencias_responsavel_ciente'] : '';
$ocorrencias_responsavel            	= isset($_POST ["ocorrencias_responsavel"]) 			? $_POST['ocorrencias_responsavel'] : '';
$ocorrencias_professor_providencia		= isset($_POST ["ocorrencias_professor_providencia"]) 	? $_POST['ocorrencias_professor_providencia'] : '';
$ocorrencias_direcao_providencia		= isset($_POST ["ocorrencias_direcao_providencia"])		? $_POST['ocorrencias_direcao_providencia'] : '';

//Gravando no banco de dados !
//conectando com o localhost - mysql

$conexao = mysql_connect($host, $userbd, $senhabd);
if (!$conexao)
	die ("<center><h1>OOOPS!<BR>Não é esta a pagina que você esperava ver?<BR> Então algo esta errado...</h1><a href='home.php' style='text-decoration: none'><font color='#FF7F00'>Você pode clicar na imagem para voltar</font><p><img border='0' src='img/cones.png' width='544' height='332'></a></p>O Erro de conexão com banco de dados esta descrito logo abaixo!<BR>".mysql_error());
//conectando com a tabela do banco de dados
$banco = mysql_select_db($bd,$conexao);
if (!$banco)
	die ("<center><h1>OOOPS!<BR>Não é esta a pagina que você esperava ver?<BR> Então algo esta errado...</h1><a href='home.php' style='text-decoration: none'><font color='#FF7F00'>Você pode clicar na imagem para voltar</font><p><img border='0' src='img/cones.png' width='544' height='332'></a></p>O Erro de conexão com banco de dados esta descrito logo abaixo!<BR>".mysql_error());
 
 
 
$query = "INSERT INTO `ocorrencias` ( `ocorrencias_aluno_id`, `ocorrencias_aluno_nome`, `ocorrencias_serie`, `ocorrencias_turma`, `ocorrencias_professor_nome`, `ocorrencias`, `ocorrencias_outros`, `ocorrencias_data`, `ocorrencias_hora`, `ocorrencias_data_responsavel_ciente`, `ocorrencias_responsavel_ciente`, `ocorrencias_responsavel`, `ocorrencias_professor_providencia`, `ocorrencias_direcao_providencia`) 
VALUES 						   		( '$ocorrencias_aluno_id', '$ocorrencias_aluno_nome', '$ocorrencias_serie', '$ocorrencias_turma', '$ocorrencias_professor_nome', '$ocorrencias', '$ocorrencias_outros', '$ocorrencias_data', '$ocorrencias_hora', '$ocorrencias_data_responsavel_ciente', '$ocorrencias_responsavel_ciente', '$ocorrencias_responsavel', '$ocorrencias_professor_providencia', '$ocorrencias_direcao_providencia')";
 
mysql_query($query,$conexao);
 
echo "<div id=div1>
<B><center><h1>Cadastrado com sucesso!";
?>
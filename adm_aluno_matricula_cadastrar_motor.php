<script language="javascript">setTimeout("window.history.go(-2);",1000)</script>
<style type="text/css">

#div1 {
 
        width:100%; /* Tamanho da Largura da Div */
		height:0%; /* Tamanho da Altura da Div */
        top:0; 
        margin-top:35%; /* ou seja ele pega 50% da altura tela e sobe metade do valor da altura no caso 100 */
        left:0%;
       margin-left:0%; /* ou seja ele pega 50% da largura tela e diminui  metade do valor da largura no caso 250 */
		background-color:#FFFFFF;
 
}
</style>
<?php 
 
$host= '127.0.0.1';
$bd= 'escola';
$senhabd= '';
$userbd = 'root';
 
// RECEBENDO OS DADOS PREENCHIDOS DO FORMUL�RIO !

$matricula_id						= isset($_POST ["matricula_id"])						? $_POST['matricula_id'] : '';						//atribui��o do campo "nome" vindo do formul�rio para variavel	
$matricula_aluno_id					= isset($_POST ["matricula_aluno_id"]) 					? $_POST['matricula_aluno_id'] : '';						//atribui��o do campo "nome" vindo do formul�rio para variavel	
$matricula_aluno_nome				= isset($_POST ["matricula_aluno_nome"]) 				? $_POST['matricula_aluno_nome'] : '';						//atribui��o do campo "nome" vindo do formul�rio para variavel	
$matricula_aceito_normas			= isset($_POST ["matricula_aceito_normas"]) 			? $_POST['matricula_aceito_normas'] : '';								//atribui��o do campo "" vindo do formul�rio para variavel	
$matricula_ano_civil				= isset($_POST ["matricula_ano_civil"]) 				? $_POST['matricula_ano_civil'] : '';								//atribui��o do campo "" vindo do formul�rio para variavel	
$matricula_ano_letivo				= isset($_POST ["matricula_ano_letivo"]) 				? $_POST['matricula_ano_letivo'] : '';								//atribui��o do campo "" vindo do formul�rio para variavel	
$matricula_tipo_ensino				= isset($_POST ["matricula_tipo_ensino"]) 				? $_POST['matricula_tipo_ensino'] : '';								//atribui��o do campo "" vindo do formul�rio para variavel	
$matricula_turno_turma				= isset($_POST ["matricula_turno_turma"]) 				? $_POST['matricula_turno_turma'] : '';								//atribui��o do campo "" vindo do formul�rio para variavel	
$matricula_turno_ano				= isset($_POST ["matricula_turno_ano"]) 				? $_POST['matricula_turno_ano'] : '';								//atribui��o do campo "" vindo do formul�rio para variavel	
$matricula_numero_chamada			= isset($_POST ["matricula_numero_chamada"])			? $_POST['matricula_numero_chamada'] : '';								//atribui��o do campo "" vindo do formul�rio para variavel	
$matricula_idade					= isset($_POST ["matricula_idade"]) 					? $_POST['matricula_idade'] : '';								//atribui��o do campo "" vindo do formul�rio para variavel	
$matricula_situacao_aluno			= isset($_POST ["matricula_situacao_aluno"]) 			? $_POST['matricula_situacao_aluno'] : '';								//atribui��o do campo "" vindo do formul�rio para variavel	
$matricula_situacao_data			= isset($_POST ["matricula_situacao_data"])	 			? $_POST['matricula_situacao_data'] : '';								//atribui��o do campo "" vindo do formul�rio para variavel	
$matricula_responsavel				= isset($_POST ["matricula_responsavel"])				? $_POST['matricula_responsavel'] : '';								//atribui��o do campo "" vindo do formul�rio para variavel	
$matricula_secretario				= isset($_POST ["matricula_secretario"]) 				? $_POST['matricula_secretario'] : '';								//atribui��o do campo "" vindo do formul�rio para variavel	
$matricula_diretor					= isset($_POST ["matricula_diretor"]) 					? $_POST['matricula_diretor'] : '';								//atribui��o do campo "" vindo do formul�rio para variavel	
$matricula_data						= date("Y/m/d");



//Gravando no banco de dados !
 
//conectando com o localhost - mysql
$conexao = mysql_connect($host, $userbd, $senhabd);
if (!$conexao)
	die ("Erro de conex�o com localhost, o seguinte erro ocorreu -> ".mysql_error());
//conectando com a tabela do banco de dados
$banco = mysql_select_db($bd,$conexao);
if (!$banco)
	die ("Erro de conex�o com banco de dados, o seguinte erro ocorreu -> ".mysql_error());
 
 
$query = "INSERT INTO `matricula` ( `matricula_id` , `matricula_aluno_id` , `matricula_aluno_nome` , `matricula_aceito_normas` , `matricula_ano_letivo` , `matricula_tipo_ensino` , `matricula_data` , `matricula_responsavel` , `matricula_secretario` , `matricula_diretor` , `matricula_situacao_aluno` , `matricula_situacao_data` , `matricula_ano_civil` , `matricula_turno_turma` , `matricula_turno_ano` , `matricula_numero_chamada` , `matricula_idade` ) 
VALUES 							  ( '$matricula_id', '$matricula_aluno_id', '$matricula_aluno_nome', '$matricula_aceito_normas', '$matricula_ano_letivo', '$matricula_tipo_ensino', '$matricula_data', '$matricula_responsavel', '$matricula_secretario', '$matricula_diretor', '$matricula_situacao_aluno', '$matricula_situacao_data' , '$matricula_ano_civil' , '$matricula_turno_turma' , '$matricula_turno_ano' , '$matricula_numero_chamada' , '$matricula_idade' )";

mysql_query($query,$conexao);
 
echo "<div id=div1><B><center><h1>Cadastrado com sucesso!";
?>
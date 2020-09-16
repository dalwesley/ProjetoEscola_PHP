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
 
$host= '127.0.0.1';
$bd= 'escola';
$senhabd= '';
$userbd = 'root';
 
 
// RECEBENDO OS DADOS PREENCHIDOS DO FORMULÁRIO !

$class_id						= isset($_POST ["class_id"]) 						? $_POST['class_id'] : '';						//atribuição do campo "nome" vindo do formulário para variavel	
$class_aluno_id					= isset($_POST ["class_aluno_id"]) 					? $_POST['class_aluno_id'] : '';						//atribuição do campo "nome" vindo do formulário para variavel	
$class_aluno_nome				= isset($_POST ["class_aluno_nome"]) 				? $_POST['class_aluno_nome'] : '';						//atribuição do campo "nome" vindo do formulário para variavel	
$class_responsavel				= isset($_POST ["class_responsavel"])				? $_POST['class_responsavel'] : '';								//atribuição do campo "" vindo do formulário para variavel	
$class_secretario				= isset($_POST ["class_secretario"]) 				? $_POST['class_secretario'] : '';								//atribuição do campo "" vindo do formulário para variavel	
$class_diretor					= isset($_POST ["class_diretor"]) 					? $_POST['class_diretor'] : '';								//atribuição do campo "" vindo do formulário para variavel	
$class_pela_comp_data			= isset($_POST ["class_pela_comp_data"]) 			? $_POST['class_pela_comp_data'] : '';								//atribuição do campo "" vindo do formulário para variavel	
$class_pela_comp_para_o_ano		= isset($_POST ["class_pela_comp_para_o_ano"])		? $_POST['class_pela_comp_para_o_ano'] : '';								//atribuição do campo "" vindo do formulário para variavel	
$reclass_pela_comp_data			= isset($_POST ["reclass_pela_comp_data"])			? $_POST['reclass_pela_comp_data'] : '';								//atribuição do campo "" vindo do formulário para variavel	
$reclass_pela_comp_para_ano		= isset($_POST ["reclass_pela_comp_para_ano"])		? $_POST['reclass_pela_comp_para_ano'] : '';								//atribuição do campo "" vindo do formulário para variavel	
$reclass_pelo_conselho_data		= isset($_POST ["reclass_pelo_conselho_data"]) 		? $_POST['reclass_pelo_conselho_data'] : '';								//atribuição do campo "" vindo do formulário para variavel	
$reclass_pelo_conselho_ano		= isset($_POST ["reclass_pelo_conselho_ano"]) 		? $_POST['reclass_pelo_conselho_ano'] : '';								//atribuição do campo "" vindo do formulário para variavel	
$class_foi_transferido			= isset($_POST ["class_foi_transferido"]) 			? $_POST['class_foi_transferido'] : '';								//atribuição do campo "" vindo do formulário para variavel	
$class_data 					= date("Y/m/d");




//Gravando no banco de dados !
 
//conectando com o localhost - mysql
$conexao = mysql_connect($host, $userbd, $senhabd);
if (!$conexao)
	die ("Erro de conexão com localhost, o seguinte erro ocorreu -> ".mysql_error());
//conectando com a tabela do banco de dados
$banco = mysql_select_db($bd,$conexao);
if (!$banco)
	die ("Erro de conexão com banco de dados, o seguinte erro ocorreu -> ".mysql_error());
 
 
$query = "INSERT INTO `classificacao` ( `class_id` , `class_aluno_id` , `class_aluno_nome` , `class_responsavel` , `class_secretario` , `class_diretor` , `class_pela_comp_data` , `class_pela_comp_para_o_ano` , `reclass_pela_comp_data` , `reclass_pela_comp_para_ano` , `reclass_pelo_conselho_data` , `reclass_pelo_conselho_ano` ) 
VALUES 								  ( '$class_id', '$class_aluno_id', '$class_aluno_nome', '$class_responsavel', '$class_secretario', '$class_diretor', '$class_pela_comp_data', '$class_pela_comp_para_o_ano', '$reclass_pela_comp_data', '$reclass_pela_comp_para_ano', '$reclass_pelo_conselho_data', '$reclass_pelo_conselho_ano' )";
 
mysql_query($query,$conexao);
 
echo "<div id=div1>
<B><center><h1>Cadastrado com sucesso!";
?>
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

$proced_id							= isset($_POST ["proced_id"]) 					? $_POST['proced_id'] : '';
$proced_escola						= isset($_POST ["proced_escola"])		 		? $_POST['proced_escola'] : '';								//atribuição do campo "" vindo do formulário para variavel	
$proced_serie_ano					= isset($_POST ["proced_serie_ano"])			? $_POST['proced_serie_ano'] : '';								//atribuição do campo "" vindo do formulário para variavel	
$proced_data_saida					= isset($_POST ["proced_data_saida"])			? $_POST['proced_data_saida'] : '';								//atribuição do campo "" vindo do formulário para variavel	
$proced_país						= isset($_POST ["proced_país"]) 				? $_POST['proced_país'] : '';								//atribuição do campo "" vindo do formulário para variavel	
$proced_estado						= isset($_POST ["proced_estado"]) 				? $_POST['proced_estado'] : '';								//atribuição do campo "" vindo do formulário para variavel	
$proced_cidade						= isset($_POST ["proced_cidade"]) 				? $_POST['proced_cidade'] : '';								//atribuição do campo "" vindo do formulário para variavel	
$proced_bairro						= isset($_POST ["proced_bairro"]) 				? $_POST['proced_bairro'] : '';								//atribuição do campo "" vindo do formulário para variavel	
$proced_estudou_na_escola			= isset($_POST ["proced_estudou_na_escola"])	? $_POST['proced_estudou_na_escola'] : '';								//atribuição do campo "" vindo do formulário para variavel	
$proced_secretario					= isset($_POST ["proced_secretario"]) 			? $_POST['proced_secretario'] : '';								//atribuição do campo "" vindo do formulário para variavel	
$proced_diretor						= isset($_POST ["proced_diretor"]) 				? $_POST['proced_diretor'] : '';								//atribuição do campo "" vindo do formulário para variavel	
$proced_responsavel					= isset($_POST ["proced_responsavel"])			? $_POST['proced_responsavel'] : '';								//atribuição do campo "" vindo do formulário para variavel	
$proced_aluno_id					= isset($_POST ["proced_aluno_id"]) 			? $_POST['proced_aluno_id'] : '';						//atribuição do campo "nome" vindo do formulário para variavel	
$proced_aluno_nome					= isset($_POST ["proced_aluno_nome"]) 			? $_POST['proced_aluno_nome'] : '';						//atribuição do campo "nome" vindo do formulário para variavel	
$proced_data 						= date("Y/m/d");




//Gravando no banco de dados !
 
//conectando com o localhost - mysql
$conexao = mysql_connect($host, $userbd, $senhabd);
if (!$conexao)
	die ("Erro de conexão com localhost, o seguinte erro ocorreu -> ".mysql_error());
//conectando com a tabela do banco de dados
$banco = mysql_select_db($bd,$conexao);
if (!$banco)
	die ("Erro de conexão com banco de dados, o seguinte erro ocorreu -> ".mysql_error());
 
 
$query = "INSERT INTO `procedencia` (`proced_id`, `proced_escola`, `proced_serie_ano`, `proced_data_saida`, `proced_país`, `proced_estado`, `proced_cidade`, `proced_bairro`, `proced_estudou_na_escola`, `proced_secretario`, `proced_responsavel`, `proced_diretor`, `proced_aluno_nome`, `proced_aluno_id`, `proced_data`)
VALUES 								( '$proced_id', '$proced_escola', '$proced_serie_ano', '$proced_data_saida', '$proced_país', '$proced_estado', '$proced_cidade', '$proced_bairro', '$proced_estudou_na_escola', '$proced_secretario', '$proced_responsavel', '$proced_diretor', '$proced_aluno_nome', '$proced_aluno_id', '$proced_data' )";
 
mysql_query($query,$conexao);
 
echo "<div id=div1>
<B><center><h1>Cadastrado com sucesso!";
?>

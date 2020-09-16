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

$prof_proced_id							= isset($_POST ["prof_proced_id"]) 					? $_POST['prof_proced_id'] : '';
$prof_proced_escola						= isset($_POST ["prof_proced_escola"])		 		? $_POST['prof_proced_escola'] : '';								//atribuição do campo "" vindo do formulário para variavel	
$prof_proced_ano_inicio					= isset($_POST ["prof_proced_ano_inicio"])			? $_POST['prof_proced_ano_inicio'] : '';								//atribuição do campo "" vindo do formulário para variavel	
$prof_proced_ano_fim					= isset($_POST ["prof_proced_ano_fim"])				? $_POST['prof_proced_ano_fim'] : '';								//atribuição do campo "" vindo do formulário para variavel	
$prof_proced_pais						= isset($_POST ["prof_proced_pais"]) 				? $_POST['prof_proced_pais'] : '';								//atribuição do campo "" vindo do formulário para variavel	
$prof_proced_estado						= isset($_POST ["prof_proced_estado"]) 				? $_POST['prof_proced_estado'] : '';								//atribuição do campo "" vindo do formulário para variavel	
$prof_proced_cidade						= isset($_POST ["prof_proced_cidade"]) 				? $_POST['prof_proced_cidade'] : '';								//atribuição do campo "" vindo do formulário para variavel	
$prof_proced_bairro						= isset($_POST ["prof_proced_bairro"]) 				? $_POST['prof_proced_bairro'] : '';								//atribuição do campo "" vindo do formulário para variavel	
$prof_proced_trabalhou_na_escola		= isset($_POST ["prof_proced_trabalhou_na_escola"])	? $_POST['prof_proced_trabalhou_na_escola'] : '';								//atribuição do campo "" vindo do formulário para variavel	
$prof_proced_secretario					= isset($_POST ["prof_proced_secretario"]) 			? $_POST['prof_proced_secretario'] : '';								//atribuição do campo "" vindo do formulário para variavel	
$prof_proced_diretor					= isset($_POST ["prof_proced_diretor"]) 			? $_POST['prof_proced_diretor'] : '';								//atribuição do campo "" vindo do formulário para variavel	
$prof_proced_prof_id					= isset($_POST ["prof_proced_prof_id"]) 			? $_POST['prof_proced_prof_id'] : '';						//atribuição do campo "nome" vindo do formulário para variavel	
$prof_proced_prof_nome					= isset($_POST ["prof_proced_prof_nome"]) 			? $_POST['prof_proced_prof_nome'] : '';						//atribuição do campo "nome" vindo do formulário para variavel	
$prof_proced_data 						= date("Y/m/d");




//Gravando no banco de dados !
 
//conectando com o localhost - mysql
$conexao = mysql_connect($host, $userbd, $senhabd);
if (!$conexao)
	die ("Erro de conexão com localhost, o seguinte erro ocorreu -> ".mysql_error());
//conectando com a tabela do banco de dados
$banco = mysql_select_db($bd,$conexao);
if (!$banco)
	die ("Erro de conexão com banco de dados, o seguinte erro ocorreu -> ".mysql_error());
 
 
$query = "INSERT INTO `professor_procedencia`(`prof_proced_id`, `prof_proced_escola`, `prof_proced_ano_inicio`, `prof_proced_ano_fim`, `prof_proced_pais`, `prof_proced_estado`, `prof_proced_cidade`, `prof_proced_bairro`, `prof_proced_trabalhou_na_escola`, `prof_proced_secretario`, `prof_proced_diretor`, `prof_proced_prof_nome`, `prof_proced_prof_id`, `prof_proced_data`)
									   VALUES('$prof_proced_id', '$prof_proced_escola', '$prof_proced_ano_inicio', '$prof_proced_ano_fim', '$prof_proced_pais', '$prof_proced_estado', '$prof_proced_cidade', '$prof_proced_bairro', '$prof_proced_trabalhou_na_escola', '$prof_proced_secretario', '$prof_proced_diretor', '$prof_proced_prof_nome', '$prof_proced_prof_id', '$prof_proced_data')";

									   $inserir = mysql_query($query);
if ($inserir) {
echo "Notícia inserida com sucesso!";
} else {
echo "Não foi possível inserir a notícia, tente novamente.<br>";
// Exibe dados sobre o erro:
echo "Dados sobre o erro:" . mysql_error();
}
?>

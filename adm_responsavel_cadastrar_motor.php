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
 
 
// RECEBENDO OS DADOS PREENCHIDOS DO FORMULÁRIO !

$responsavel_aluno_id		= isset($_POST ["responsavel_aluno_id"])		? $_POST['responsavel_aluno_id'] : '';
$responsavel_aluno			= isset($_POST ["responsavel_aluno"]) 			? $_POST['responsavel_aluno'] : '';
$responsavel_doc			= isset($_POST ["responsavel_doc"])				? $_POST['responsavel_doc'] : '';
$responsavel_parentesco		= isset($_POST ["responsavel_parentesco"])		? $_POST['responsavel_parentesco'] : '';
$responsavel_nome			= isset($_POST ["responsavel_nome"])			? $_POST['responsavel_nome'] : '';
$responsavel_sexo			= isset($_POST ["responsavel_sexo"]) 			? $_POST['responsavel_sexo'] : '';
$responsavel_data			= isset($_POST ["responsavel_data"]) 			? $_POST['responsavel_data'] : '';
$responsavel_nascimento		= isset($_POST ["responsavel_nascimento"]) 		? $_POST['responsavel_nascimento'] : '';
$responsavel_estado			= isset($_POST ["responsavel_estado"]) 			? $_POST['responsavel_estado'] : '';
$responsavel_nacionalidade  = isset($_POST ["responsavel_nacionalidade"]) 	? $_POST['responsavel_nacionalidade'] : '';	
$responsavel_cor			= isset($_POST ["responsavel_cor"]) 			? $_POST['responsavel_cor'] : '';		
$responsavel_cidade			= isset($_POST ["responsavel_cidade"]) 			? $_POST['responsavel_cidade'] : '';	
$responsavel_endereco		= isset($_POST ["responsavel_endereco"]) 		? $_POST['responsavel_endereco'] : '';	
$responsavel_numero			= isset($_POST ["responsavel_numero"]) 			? $_POST['responsavel_numero'] : '';	
$responsavel_bairro 		= isset($_POST ["responsavel_bairro"]) 			? $_POST['responsavel_bairro'] : '';	
$responsavel_cep			= isset($_POST ["responsavel_cep"]) 			? $_POST['responsavel_cep'] : '';		
$responsavel_tel_1			= isset($_POST ["responsavel_tel_1"]) 			? $_POST['responsavel_tel_1'] : '';		
$responsavel_tel_2			= isset($_POST ["responsavel_tel_2"]) 			? $_POST['responsavel_tel_2'] : '';		
$responsavel_tel_3			= isset($_POST ["responsavel_tel_3"]) 			? $_POST['responsavel_tel_3'] : '';		
$responsavel_email			= isset($_POST ["responsavel_email"]) 			? $_POST['responsavel_email'] : '';		
$data = date("Y/m/d");


//Gravando no banco de dados !
 
//conectando com o localhost - mysql
$conexao = mysql_connect($host, $userbd, $senhabd);
if (!$conexao)
	die ("Erro de conexão com localhost, o seguinte erro ocorreu -> ".mysql_error());
//conectando com a tabela do banco de dados
$banco = mysql_select_db($bd,$conexao);
if (!$banco)
	die ("Erro de conexão com banco de dados, o seguinte erro ocorreu -> ".mysql_error());
 
 
$query = "INSERT INTO `responsavel` (`responsavel_nome` , `responsavel_aluno_id` , `responsavel_aluno` , `responsavel_doc` , `responsavel_parentesco` , `responsavel_sexo` , `responsavel_data` , `responsavel_nascimento` , `responsavel_estado` , `responsavel_nacionalidade` , `responsavel_cor` , `responsavel_endereco` , `responsavel_numero` , `responsavel_tel_1` , `responsavel_tel_2` , `responsavel_tel_3` , `responsavel_email` , `responsavel_cidade` , `responsavel_bairro` , `responsavel_cep` ) 
VALUES 								('$responsavel_nome', '$responsavel_aluno_id', '$responsavel_aluno', '$responsavel_doc', '$responsavel_parentesco', '$responsavel_sexo', '$responsavel_data', '$responsavel_nascimento', '$responsavel_estado', '$responsavel_nacionalidade', '$responsavel_cor', '$responsavel_endereco', '$responsavel_numero', '$responsavel_tel_1', '$responsavel_tel_2', '$responsavel_tel_3', '$responsavel_email', '$responsavel_cidade', '$responsavel_bairro', '$responsavel_cep')";
 
mysql_query($query,$conexao);
 
echo "<div id=div1>
<B><center><h1>Cadastrado com sucesso!";
?>
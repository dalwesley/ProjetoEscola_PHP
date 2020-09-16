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
	
$responsavel_obs_responsavel_nome		= isset($_POST ["responsavel_obs_responsavel_nome"]) 		? $_POST['responsavel_obs_responsavel_nome'] : '';
$responsavel_obs_responsavel_id			= isset($_POST ["responsavel_obs_responsavel_id"])			? $_POST['responsavel_obs_responsavel_id'] : '';
$responsavel_obs_visual					= isset($_POST ["responsavel_obs_visual"]) 					? $_POST['responsavel_obs_visual'] : '';
$responsavel_obs_visual_qual			= isset($_POST ["responsavel_obs_visual_qual"]) 			? $_POST['responsavel_obs_visual_qual'] : '';
$responsavel_obs_auditiva				= isset($_POST ["responsavel_obs_auditiva"]) 				? $_POST['responsavel_obs_auditiva'] : '';
$responsavel_obs_auditiva_qual      	= isset($_POST ["responsavel_obs_auditiva_qual"])			? $_POST['responsavel_obs_auditiva_qual'] : '';
$responsavel_obs_fisica					= isset($_POST ["responsavel_obs_fisica"]) 					? $_POST['responsavel_obs_fisica'] : '';
$responsavel_obs_fisica_qual          	= isset($_POST ["responsavel_obs_fisica_qual"]) 			? $_POST['responsavel_obs_fisica_qual'] : '';
$responsavel_obs_movimento				= isset($_POST ["responsavel_obs_movimento"]) 				? $_POST['responsavel_obs_movimento'] : '';
$responsavel_obs_movimento_qual     	= isset($_POST ["responsavel_obs_movimento_qual"]) 			? $_POST['responsavel_obs_movimento_qual'] : '';
$responsavel_obs_comportamento     		= isset($_POST ["responsavel_obs_comportamento"]) 			? $_POST['responsavel_obs_comportamento'] : '';
$responsavel_obs_comportamento_qual		= isset($_POST ["responsavel_obs_comportamento_qual"])		? $_POST['responsavel_obs_comportamento_qual'] : '';
$responsavel_obs_fraldas				= isset($_POST ["responsavel_obs_fraldas"]) 				? $_POST['responsavel_obs_fraldas'] : '';
$responsavel_obs_cadeira_rodas          = isset($_POST ["responsavel_obs_cadeira_rodas"]) 			? $_POST['responsavel_obs_cadeira_rodas'] : '';
$responsavel_obs_mencionar_prob_import  = isset($_POST ["responsavel_obs_mencionar_prob_import"])	? $_POST['responsavel_obs_mencionar_prob_import'] : '';
$data 									= date("Y/m/d");


//Gravando no banco de dados !
 
//conectando com o localhost - mysql
$conexao = mysql_connect($host, $userbd, $senhabd);
if (!$conexao)
	die ("Erro de conexão com localhost, o seguinte erro ocorreu -> ".mysql_error());
//conectando com a tabela do banco de dados
$banco = mysql_select_db($bd,$conexao);
if (!$banco)
	die ("Erro de conexão com banco de dados, o seguinte erro ocorreu -> ".mysql_error());
 
$query = "INSERT INTO `responsavel_obs` (`responsavel_obs_responsavel_id` , `responsavel_obs_responsavel_nome` , `responsavel_obs_visual` , `responsavel_obs_visual_qual` , `responsavel_obs_auditiva` , `responsavel_obs_auditiva_qual` , `responsavel_obs_fisica` , `responsavel_obs_fisica_qual`, `responsavel_obs_movimento`, `responsavel_obs_movimento_qual`, `responsavel_obs_comportamento` , `responsavel_obs_comportamento_qual` , `responsavel_obs_fraldas` , `responsavel_obs_cadeira_rodas` , `responsavel_obs_mencionar_prob_import`)
VALUES 								  ('$responsavel_obs_responsavel_id', '$responsavel_obs_responsavel_nome', '$responsavel_obs_visual', '$responsavel_obs_visual_qual', '$responsavel_obs_auditiva', '$responsavel_obs_auditiva_qual', '$responsavel_obs_fisica', '$responsavel_obs_fisica_qual', '$responsavel_obs_movimento', '$responsavel_obs_movimento_qual', '$responsavel_obs_comportamento', '$responsavel_obs_comportamento_qual', '$responsavel_obs_fraldas', '$responsavel_obs_cadeira_rodas', '$responsavel_obs_mencionar_prob_import')";
 
mysql_query($query,$conexao);
 
echo "<div id=div1>
<B><center><h1>Cadastrado com sucesso!";
?>
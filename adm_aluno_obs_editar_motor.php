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

$obs_id							= $_POST ["obs_id"];
$obs_aluno_nome					= $_POST ["obs_aluno_nome"];
$obs_aluno_id					= $_POST ["obs_aluno_id"];
$obs_visual						= $_POST ["obs_visual"];
$obs_visual_qual				= $_POST ["obs_visual_qual"];
$obs_auditiva					= $_POST ["obs_auditiva"];
$obs_auditiva_qual      		= $_POST ["obs_auditiva_qual"];
$obs_fisica						= $_POST ["obs_fisica"];
$obs_fisica_qual          		= $_POST ["obs_fisica_qual"];
$obs_movimento					= $_POST ["obs_movimento"];
$obs_movimento_qual     		= $_POST ["obs_movimento_qual"];
$obs_comportamento     			= $_POST ["obs_comportamento"];
$obs_comportamento_qual			= $_POST ["obs_comportamento_qual"];
$obs_fraldas					= $_POST ["obs_fraldas"];
$obs_cadeira_rodas            	= $_POST ["obs_cadeira_rodas"];
$obs_mencionar_prob_import    	= $_POST ["obs_mencionar_prob_import"];

//Gravando no banco de dados !
//conectando com o localhost - mysql

$conexao = mysql_connect($host, $userbd, $senhabd);
if (!$conexao)
	die ("Erro de conexão com localhost, o seguinte erro ocorreu -> ".mysql_error());

//conectando com a tabela do banco de dados
$banco = mysql_select_db($bd,$conexao);
if (!$banco)
	die ("<center><h1>OOOPS!<BR>Não é esta a pagina que você esperava ver?<BR> Então algo esta errado...</h1><a href='home.php' style='text-decoration: none'><font color='#FF7F00'>Você pode clicar na imagem para voltar</font><p><img border='0' src='img/cones.png' width='544' height='332'></a></p>O Erro de conexão com banco de dados esta descrito logo abaixo!<BR>".mysql_error());
 
$atu = "UPDATE obs SET

obs_id						= '$obs_id',
obs_aluno_nome				= '$obs_aluno_nome',
obs_aluno_id				= '$obs_aluno_id',
obs_visual					= '$obs_visual',
obs_visual_qual				= '$obs_visual_qual',
obs_auditiva				= '$obs_auditiva',
obs_auditiva_qual			= '$obs_auditiva_qual',
obs_fisica					= '$obs_fisica',
obs_fisica_qual				= '$obs_fisica_qual',
obs_movimento				= '$obs_movimento',
obs_movimento_qual			= '$obs_movimento_qual',
obs_comportamento			= '$obs_comportamento',
obs_comportamento_qual		= '$obs_comportamento_qual',
obs_fraldas					= '$obs_fraldas',
obs_cadeira_rodas			= '$obs_cadeira_rodas',
obs_mencionar_prob_import	= '$obs_mencionar_prob_import'

WHERE obs_id=$obs_id";

$sucesso = mysql_query($atu);

if ($sucesso){
   echo '<div id=div1><h1><center>Atualização realizada com sucesso!</h1></center>';
}else{
   die (mysql_error());
}
 
mysql_close($conexao);
?>
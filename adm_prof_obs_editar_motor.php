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

$prof_obs_id						= $_POST ["prof_obs_id"];
$prof_obs_prof_nome					= $_POST ["prof_obs_prof_nome"];
$prof_obs_prof_id					= $_POST ["prof_obs_prof_id"];
$prof_obs_visual					= $_POST ["prof_obs_visual"];
$prof_obs_visual_qual				= $_POST ["prof_obs_visual_qual"];
$prof_obs_auditiva					= $_POST ["prof_obs_auditiva"];
$prof_obs_auditiva_qual      		= $_POST ["prof_obs_auditiva_qual"];
$prof_obs_fisica					= $_POST ["prof_obs_fisica"];
$prof_obs_fisica_qual          		= $_POST ["prof_obs_fisica_qual"];
$prof_obs_movimento					= $_POST ["prof_obs_movimento"];
$prof_obs_movimento_qual     		= $_POST ["prof_obs_movimento_qual"];
$prof_obs_comportamento     		= $_POST ["prof_obs_comportamento"];
$prof_obs_comportamento_qual		= $_POST ["prof_obs_comportamento_qual"];
$prof_obs_fraldas					= $_POST ["prof_obs_fraldas"];
$prof_obs_cadeira_rodas            	= $_POST ["prof_obs_cadeira_rodas"];
$prof_obs_mencionar_prob_import    	= $_POST ["prof_obs_mencionar_prob_import"];

//Gravando no banco de dados !
//conectando com o localhost - mysql

$conexao = mysql_connect($host, $userbd, $senhabd);
if (!$conexao)
	die ("Erro de conexão com localhost, o seguinte erro ocorreu -> ".mysql_error());

//conectando com a tabela do banco de dados
$banco = mysql_select_db($bd,$conexao);
if (!$banco)
	die ("<center><h1>OOOPS!<BR>Não é esta a pagina que você esperava ver?<BR> Então algo esta errado...</h1><a href='home.php' style='text-decoration: none'><font color='#FF7F00'>Você pode clicar na imagem para voltar</font><p><img border='0' src='img/cones.png' width='544' height='332'></a></p>O Erro de conexão com banco de dados esta descrito logo abaixo!<BR>".mysql_error());
 
$atu = "UPDATE professor_obs SET

prof_obs_id						= '$prof_obs_id',
prof_obs_prof_nome				= '$prof_obs_prof_nome',
prof_obs_prof_id				= '$prof_obs_prof_id',
prof_obs_visual					= '$prof_obs_visual',
prof_obs_visual_qual			= '$prof_obs_visual_qual',
prof_obs_auditiva				= '$prof_obs_auditiva',
prof_obs_auditiva_qual			= '$prof_obs_auditiva_qual',
prof_obs_fisica					= '$prof_obs_fisica',
prof_obs_fisica_qual			= '$prof_obs_fisica_qual',
prof_obs_movimento				= '$prof_obs_movimento',
prof_obs_movimento_qual			= '$prof_obs_movimento_qual',
prof_obs_comportamento			= '$prof_obs_comportamento',
prof_obs_comportamento_qual		= '$prof_obs_comportamento_qual',
prof_obs_fraldas				= '$prof_obs_fraldas',
prof_obs_cadeira_rodas			= '$prof_obs_cadeira_rodas',
prof_obs_mencionar_prob_import	= '$prof_obs_mencionar_prob_import'

WHERE prof_obs_id=$prof_obs_id";

$sucesso = mysql_query($atu);

if ($sucesso){
   echo '<div id=div1><h1><center>Atualização realizada com sucesso!</h1></center>';
}else{
   die (mysql_error());
}
 
mysql_close($conexao);
?>
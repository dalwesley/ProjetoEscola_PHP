<script language="javascript">setTimeout("window.history.go(-2);",1000)</script>
<?php

// A sess�o precisa ser iniciada em cada p�gina diferente
if (!isset($_SESSION)) session_start();

$nivel_necessario = 2;

// Verifica se n�o h� a vari�vel da sess�o que identifica o usu�rio
if (!isset($_SESSION['UsuarioID']) OR ($_SESSION['UsuarioNivel'] < $nivel_necessario)) {
	// Destr�i a sess�o por seguran�a
	session_destroy();
	// Redireciona o visitante de volta pro login
	header("Location: acesso_negado.htm"); exit;
}

?>
<style type="text/css">

	#div1 {
			width:100%; /* Tamanho da Largura da Div */
			height:0; /* Tamanho da Altura da Div */
	        top: 0%; 
	        margin-top:30%; /* ou seja ele pega 50% da altura tela e sobe metade do valor da altura no caso 100 */
	        left:0;
	        margin-left:0; /* ou seja ele pega 50% da largura tela e diminui  metade do valor da largura no caso 250 */

}
</style>
<?php 
date_default_timezone_set('America/Sao_Paulo');
//PREENCHA OS DADOS DE CONEX�O A SEGUIR:
  
$host= '127.0.0.1';
$bd= 'escola';
$senhabd= '';
$userbd = 'root';
 
 
// RECEBENDO OS DADOS PREENCHIDOS DO FORMUL�RIO !

$mural_id				= $_POST ["mural_id"];
$mural_remetente		= $_POST ["mural_remetente"];
$mural_assunto			= $_POST ["mural_assunto"];
$mural_mensagem			= $_POST ["mural_mensagem"];
$mural_dia				= $_POST ["mural_dia"];
$mural_mes				= $_POST ["mural_mes"];

//Gravando no banco de dados !
//conectando com o localhost - mysql

$conexao = mysql_connect($host, $userbd, $senhabd);
if (!$conexao)
	die ("Erro de conex�o com localhost, o seguinte erro ocorreu -> ".mysql_error());
//conectando com a tabela do banco de dados
$banco = mysql_select_db($bd,$conexao);
if (!$banco)
	die ("<center><h1>OOOPS!<BR>N�o � esta a pagina que voc� esperava ver?<BR> Ent�o algo esta errado...</h1><a href='home.php' style='text-decoration: none'><font color='#FF7F00'>Voc� pode clicar na imagem para voltar</font><p><img border='0' src='img/cones.png' width='544' height='332'></a></p>O Erro de conex�o com banco de dados esta descrito logo abaixo!<BR>".mysql_error());
 
$atu = "UPDATE mural SET

mural_id			= '$mural_id',
mural_remetente		= '$mural_remetente',
mural_assunto		= '$mural_assunto',
mural_mensagem		= '$mural_mensagem',
mural_dia			= '$mural_dia',
mural_mes			= '$mural_mes'

WHERE mural_id=$mural_id";

$sucesso = mysql_query($atu);

if ($sucesso){
echo '<div id=div1>
<h1><center>Atualiza��o realizada com sucesso!</h1></center>';
}else{
   die (mysql_error());
}
 
mysql_close($conexao);
?>

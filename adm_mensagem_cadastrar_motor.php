<script language= "JavaScript">
setTimeout("document.location = 'adm_mensagem_listar.php'",1000);
</script>
<?php

// A sessão precisa ser iniciada em cada página diferente
if (!isset($_SESSION)) session_start();

$nivel_necessario = 2;

// Verifica se não há a variável da sessão que identifica o usuário
if (!isset($_SESSION['UsuarioID']) OR ($_SESSION['UsuarioNivel'] < $nivel_necessario)) {
	// Destrói a sessão por segurança
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

//PREENCHA OS DADOS DE CONEXÃO A SEGUIR:
  
 
$host= '127.0.0.1';
$bd= 'escola';
$senhabd= '';
$userbd = 'root';
 
 
// RECEBENDO OS DADOS PREENCHIDOS DO FORMULÁRIO !

$mural_id				= isset($_POST ["mural_id"])				? $_POST['mural_id'] : '';
$mural_remetente		= isset($_POST ["mural_remetente"])			? $_POST['mural_remetente'] : '';
$mural_remetente_id		= isset($_POST ["mural_remetente_id"])		? $_POST['mural_remetente_id'] : '';
$mural_assunto			= isset($_POST ["mural_assunto"])			? $_POST['mural_assunto'] : '';
$mural_prioridade		= isset($_POST ["mural_prioridade"])		? $_POST['mural_prioridade'] : '';
$mural_mensagem			= isset($_POST ["mural_mensagem"])			? $_POST['mural_mensagem'] : '';
$mural_data				= isset($_POST ["mural_data"])				? $_POST['mural_data'] : '';
$mural_data_cadastro	= isset($_POST ["mural_data_cadastro"])		? $_POST['mural_data_cadastro'] : '';
$mural_dia				= isset($_POST ["mural_dia"])				? $_POST['mural_dia'] : '';
$mural_mes				= isset($_POST ["mural_mes"])				? $_POST['mural_mes'] : '';


//Gravando no banco de dados !
//conectando com o localhost - mysql

$conexao = mysql_connect($host, $userbd, $senhabd);
if (!$conexao)
	die ("Erro de conexão com localhost, o seguinte erro ocorreu -> ".mysql_error());
//conectando com a tabela do banco de dados
$banco = mysql_select_db($bd,$conexao);
if (!$banco)
	die ("<center><h1>OOOPS!<BR>Não é esta a pagina que você esperava ver?<BR> Então algo esta errado...</h1><a href='home.php' style='text-decoration: none'><font color='#FF7F00'>Você pode clicar na imagem para voltar</font><p><img border='0' src='img/cones.png' width='544' height='332'></a></p>O Erro de conexão com banco de dados esta descrito logo abaixo!<BR>".mysql_error());
 
// faz inserção
$query = "INSERT INTO `mural` (`mural_remetente`, `mural_remetente_id`, `mural_assunto`, `mural_prioridade`, `mural_mensagem`, `mural_data_cadastro`, `mural_dia`, `mural_mes` ) 
VALUES 				   		  ('$mural_remetente', '$mural_remetente_id', '$mural_assunto', '$mural_prioridade', '$mural_mensagem', '$mural_data_cadastro', '$mural_dia', '$mural_mes')";
 
mysql_query($query,$conexao);
 
echo"<div id=div1>
<center><h1><B>Mensagem cadastrada com sucesso!</div>";
?>

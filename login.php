<?php

// Verifica se houve POST e se o usu�rio ou a senha �(s�o) vazio(s)
if (!empty($_POST) AND (empty($_POST['usuario']) OR empty($_POST['senha']))) {
	header("Location: index.php"); exit;
}

// Tenta se conectar ao servidor MySQL
mysql_connect('localhost', 'root', '') or trigger_error(mysql_error());
// Tenta se conectar a um banco de dados MySQL
mysql_select_db('escola') or trigger_error(mysql_error());

$login_nome = mysql_real_escape_string($_POST['usuario']);
$login_senha = mysql_real_escape_string($_POST['senha']);

// Valida��o do usu�rio/senha digitados
$sql = "SELECT `login_id`, `login_senha`, `login_nome`, `login_nivel` FROM `usuario_dados_login` WHERE (`login_nome` = '". $login_nome ."') AND (`login_senha` = '$login_senha') AND (`login_ativo` = 1) LIMIT 1";
$query = mysql_query($sql);
if (mysql_num_rows($query) != 1) {
	// Mensagem de erro quando os dados s�o inv�lidos e/ou o usu�rio n�o foi encontrado
	echo "<center><h1>OOOPS!<BR>Me parece que alguma coisa saiu errado!<BR> Ent�o vamos tentar novamente...</h1><a href='index.php' style='text-decoration: none'><font color='#FF7F00'>Voc� pode clicar na imagem para voltar</font><p><img border='0' src='img/cones.png' width='544' height='332'></a></p>Os possiveis erros est�o descritos logo abaixo!<BR><li>Usu�rio invalido<BR><li>Senha invalida<BR><li>Erro de conex�o"; exit;
} else {
	// Salva os dados encontrados na vari�vel $resultado
	$resultado = mysql_fetch_assoc($query);

	// Se a sess�o n�o existir, inicia uma
	if (!isset($_SESSION)) session_start();

	// Salva os dados encontrados na sess�o
	$_SESSION['UsuarioID'] = $resultado['login_id'];
	$_SESSION['UsuarioNome'] = $resultado['login_nome'];
	$_SESSION['UsuarioNivel'] = $resultado['login_nivel'];

	if ($_SESSION['UsuarioNivel'] >= 6){
		// Redireciona o visitante
header("Location: adm_frames.php"); exit;
	}
	elseif ($_SESSION['UsuarioNivel'] == 5){
header("Location: home_direcao.php"); exit;
}
	elseif ($_SESSION['UsuarioNivel'] == 4){
header("Location: home_sec.php"); exit;
}
	elseif ($_SESSION['UsuarioNivel'] == 3){
header("Location: home_prof.php"); exit;
}
elseif ($_SESSION['UsuarioNivel'] == 2){
header("Location: home_resp.php"); exit;
}
elseif ($_SESSION['UsuarioNivel'] == 1){
header("Location: aluno_frames.php"); exit;
}
}

?>
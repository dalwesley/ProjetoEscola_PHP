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

$login_nome						= isset($_POST ["login_nome"])					? $_POST['login_nome'] : '';
$login_usuario_ra				= isset($_POST ["login_usuario_ra"])			? $_POST['login_usuario_ra'] : '';
$login_usuario_id				= isset($_POST ["login_usuario_id"])			? $_POST['login_usuario_id'] : '';
$login_senha					= isset($_POST ["login_senha"]) 				? $_POST['login_senha'] : '';
$login_nivel					= isset($_POST ["login_nivel"]) 				? $_POST['login_nivel'] : '';
$login_ativo					= isset($_POST ["login_ativo"]) 				? $_POST['login_ativo'] : '';
$login_email					= isset($_POST ["login_email"]) 				? $_POST['login_email'] : '';
$login_tel_1					= isset($_POST ["login_tel_1"]) 				? $_POST['login_tel_1'] : '';
$login_tel_2					= isset($_POST ["login_tel_2"]) 				? $_POST['login_tel_2'] : '';
$login_cadastrado_por			= isset($_POST ["login_cadastrado_por"]) 		? $_POST['login_cadastrado_por'] : '';
$login_data_cadastro			= date('Y-m-d');

//Gravando no banco de dados !
 
//conectando com o localhost - mysql
$conexao = mysql_connect($host, $userbd, $senhabd);
if (!$conexao)
	die ("Erro de conexão com localhost, o seguinte erro ocorreu -> ".mysql_error());
//conectando com a tabela do banco de dados
$banco = mysql_select_db($bd,$conexao);
if (!$banco)
	die ("Erro de conexão com banco de dados, o seguinte erro ocorreu -> ".mysql_error());
//Verificando se algo foi digitado:
if ($login_nome>"1" && $login_usuario_ra>"1"){
$query = mysql_query("SELECT * FROM usuario_dados_login WHERE login_nome='$login_nome'");
$numeros = mysql_num_rows ($query);
if ($numeros>"0"){
echo"<div id=div1>
<fieldset style='border-style: solid; border-width: 1px; background-color:#FFF'>
<table border='1' width='100%' cellspacing='0' cellpadding='3'  bordercolor='#FFF' height='0' style='border-collapse: collapse'> 
	<tr>
		<td height='1' width='1'>
			<center><img src=\"img/voltar.png\" title=\"Voltar\" onClick=\"javascript:window.history.go(-1);\" name=\"voltar\" width=\"20'\" height=\"20\">
		</td>
		<td><center><i><strong><h2>Opa!</h2></i></strong><pre>
<i><strong>$login_nome - $login_usuario_ra</i></strong><BR>
Este nome e/ou RA já está cadastrado em nosso banco de dados!
Verifique se o nome e/ou R.A foram digitados corretamente!<BR><BR>
<img src='img/nervousface.jpg' border='0' width='50' height='50' title='Cadastrar prof'></pre>
		</td>
		<td height='1' width='1'>
			<center><img src='img/fechar.png' title=\"Fechar\" onclick='self.close()' name=\"Fechar\" width=\"20'\" height=\"20\">
		</td>
	</tr>
</table></fieldset>";

}
else{
//conectando com o BD para gravar os dados
$query = "INSERT INTO `usuario_dados_login`(`login_nome`, `login_usuario_ra`, `login_usuario_id`, `login_senha`, `login_nivel`, `login_ativo`, `login_email`, `login_tel_1`, `login_tel_2`, `login_data_cadastro`, `login_cadastrado_por`)
VALUES 								   	   	('$login_nome', '$login_usuario_ra', '$login_usuario_id', '$login_senha', '$login_nivel', '$login_ativo', '$login_email', '$login_tel_1', '$login_tel_2', '$login_data_cadastro', '$login_cadastrado_por')";
 
mysql_query($query,$conexao) OR DIE(mysql_error());;
 
echo "<div id=div1>
<B><center><h1>$login_senha Cadastrado com sucesso!
novo    fechar";
}
}

?>
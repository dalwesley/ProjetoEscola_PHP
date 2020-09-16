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
	
$usuario_ra						= isset($_POST ["usuario_ra"])					? $_POST['usuario_ra'] : '';
$usuario_nome					= isset($_POST ["usuario_nome"]) 				? $_POST['usuario_nome'] : '';
$usuario_sexo					= isset($_POST ["usuario_sexo"]) 				? $_POST['usuario_sexo'] : '';
$usuario_data					= isset($_POST ["usuario_data"]) 				? $_POST['usuario_data'] : '';
$usuario_nascimento				= isset($_POST ["usuario_nascimento"])			? $_POST['usuario_nascimento'] : '';
$usuario_estado					= isset($_POST ["usuario_estado"]) 				? $_POST['usuario_estado'] : '';
$usuario_nacionalidade        	= isset($_POST ["usuario_nacionalidade"]) 		? $_POST['usuario_nacionalidade'] : '';
$usuario_cor					= isset($_POST ["usuario_cor"]) 				? $_POST['usuario_cor'] : '';
$usuario_pai					= isset($_POST ["usuario_pai"]) 				? $_POST['usuario_pai'] : '';
$usuario_mae					= isset($_POST ["usuario_mae"]) 				? $_POST['usuario_mae'] : '';
$usuario_cidade					= isset($_POST ["usuario_cidade"]) 				? $_POST['usuario_cidade'] : '';
$usuario_endereco				= isset($_POST ["usuario_endereco"]) 			? $_POST['usuario_endereco'] : '';
$usuario_numero					= isset($_POST ["usuario_numero"]) 				? $_POST['usuario_numero'] : '';
$usuario_bairro 				= isset($_POST ["usuario_bairro"]) 				? $_POST['usuario_bairro'] : '';
$usuario_cep					= isset($_POST ["usuario_cep"]) 				? $_POST['usuario_cep'] : '';
$usuario_email					= isset($_POST ["usuario_email"]) 				? $_POST['usuario_email'] : '';
$usuario_tel_1					= isset($_POST ["usuario_tel_1"]) 				? $_POST['usuario_tel_1'] : '';
$usuario_tel_2					= isset($_POST ["usuario_tel_2"]) 				? $_POST['usuario_tel_2'] : '';
$usuario_tel_3					= isset($_POST ["usuario_tel_3"]) 				? $_POST['usuario_tel_3'] : '';
$usuario_cadastrado_por			= isset($_POST ["usuario_cadastrado_por"]) 		? $_POST['usuario_cadastrado_por'] : '';
$usuario_data_cadastro			= date('Y-m-d');

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
if ($usuario_ra>"1" && $usuario_nome>"1"){
$query = mysql_query("SELECT * FROM usuario_dados_pessoais WHERE usuario_ra='$usuario_ra'");
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
<i><strong>$usuario_nome - $usuario_ra</i></strong><BR>
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
$query = "INSERT INTO `usuario_dados_pessoais`(`usuario_ra`, `usuario_nome`, `usuario_sexo`, `usuario_data`, `usuario_nascimento`, `usuario_estado`, `usuario_nacionalidade`, `usuario_cor`, `usuario_pai`, `usuario_mae`, `usuario_cidade`, `usuario_endereco`, `usuario_numero`, `usuario_bairro`, `usuario_cep`, `usuario_email`, `usuario_tel_1`, `usuario_tel_2`, `usuario_tel_3`, `usuario_data_cadastro`, `usuario_cadastrado_por`)
VALUES 								   	   	  ('$usuario_ra', '$usuario_nome', '$usuario_sexo', '$usuario_data', '$usuario_nascimento', '$usuario_estado', '$usuario_nacionalidade', '$usuario_cor', '$usuario_pai', '$usuario_mae', '$usuario_cidade', '$usuario_endereco', '$usuario_numero', '$usuario_bairro', '$usuario_cep', '$usuario_email', '$usuario_tel_1', '$usuario_tel_2', '$usuario_tel_3', '$usuario_data_cadastro', '$usuario_cadastrado_por')";
 
mysql_query($query,$conexao) OR DIE(mysql_error());;
 
echo "<div id=div1>
<B><center><h1>$usuario_nome Cadastrado com sucesso!
novo    fechar";
}
}

?>
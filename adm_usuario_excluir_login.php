<?php
include "seguranca.php";
?>
<style type="text/css">
		
	#div1 {
			width:100%; /* Tamanho da Largura da Div */
			height:100%; /* Tamanho da Altura da Div */
    		top:0; 
    		margin-top:0%; /* ou seja ele pega 50% da altura tela e sobe metade do valor da altura no caso 100 */
    		left:0%;
    		margin-left:0; /* ou seja ele pega 50% da largura tela e diminui  metade do valor da largura no caso 250 */
 
}
	#div2 {
			width:100%; /* Tamanho da Largura da Div */
			height:50%; /* Tamanho da Altura da Div */
    		top:0; 
    		margin-top:40%; /* ou seja ele pega 50% da altura tela e sobe metade do valor da altura no caso 100 */
    		left:0%;
    		margin-left:0; /* ou seja ele pega 50% da largura tela e diminui  metade do valor da largura no caso 250 */
 
}

</style>
<?php
include "conecta.php";
$id_select = $_GET['id']; //Recupera a variavel id para fazer o select
$sql = "SELECT * FROM usuario_dados_pessoais where usuario_id=$id_select"; //Faz o select de todos os registros
$query = mysql_query($sql) or die("<center><h1>OOOPS!<BR>Não é esta a pagina que você esperava ver?<BR> Então algo esta errado...</h1><a href='home.php' style='text-decoration: none'><font color='#FF7F00'>Você pode clicar na imagem para voltar</font><p><img border='0' src='img/cones.png' width='544' height='332'></a></p>O Erro de conexão com banco de dados esta descrito logo abaixo!<BR>".mysql_error());
$linha = mysql_fetch_assoc($query);

		$usuario_ra					= $linha['usuario_ra'];
		$usuario_id					= $linha['usuario_id'];
		$usuario_nome				= $linha['usuario_nome'];
?>
<?php
include "conecta.php";
$id_select = $_GET['id']; //Recupera a variavel id para fazer o select
$sql = mysql_query("SELECT * from usuario_dados_login where login_usuario_id=$id_select");
$result = mysql_num_rows($sql);

if($result>=1) {

 while($linha = mysql_fetch_array($sql)) {

$login_id						= $linha['login_id'];
$login_nome						= $linha['login_nome'];
$login_usuario_ra				= $linha['login_usuario_ra'];
$login_usuario_id				= $linha['login_usuario_id'];
$login_senha					= $linha['login_senha'];
$login_nivel					= $linha['login_nivel'];
$login_ativo					= $linha['login_ativo'];
$login_email					= $linha['login_email'];
$login_tel_1					= $linha['login_tel_1'];
$login_tel_2					= $linha['login_tel_2'];
$login_cadastrado_por			= $linha['login_cadastrado_por'];
$login_data_cadastro			= date('Y-m-d');


echo "<div id=div1>
<form id='excluir' name='excluir' method='post' action='adm_usuario_excluir_login_motor.php' enctype='multipart/form-data'>
<fieldset style='border-style: solid; border-width: 1px; background-color:#FF0000'>
<table border='1' width='100%' cellspacing='0' cellpadding='3'  bordercolor='#F0F0F0' height='0' style='border-collapse: collapse'> 
	<tr>
		<td height='1' width='1'>
			<center><img src=\"img/voltar.png\" title=\"Voltar\" onClick=\"javascript:window.history.go(-1);\" name=\"voltar\" width=\"20'\" height=\"20\">
		</td>
		<td>
			<center>Excluindo <B><I>observação</B></I> para <i><strong>$login_nome - $login_usuario_ra</center></i></strong>
		</td>
		<td height='1' width='1'>
			<center><img src='img/obser.png' border='0' width='20' height='20' title='Foto'>
		</td>
	</tr>
</table></fieldset>
<fieldset style='border-style: solid; border-width: 1px; background-color:#F0F0F0'>
<legend><font color='#FF0000'><B>Excluir Observação</B></legend>
<table border='1' width='100%' cellspacing='0' cellpadding='3'  bordercolor='#FFF' height='0' style='border-collapse: collapse'> 
<tr>
	<td align='center' bgcolor='#FFF' width='1%'><img src='img/checked.png' border='0' width='20' height='20' title='Selecione'></td>
	<td align='center' bgcolor='#FFF'><B>Dados da Exclusão</B></td>
</tr>
	<td align='center'><input type='checkbox' name='cod[]' value=$linha[login_id] required/>
	</td>
	<td><pre>
Login:	$login_nome
Senha:	$login_senha
Nível:	$login_nivel
Ativo:	$login_ativo

Telefone 1: $login_tel_1
Telefone 2: $login_tel_2
Email:      $login_email
</td>
</tr>
</table>";
}
echo"</fieldset>
<fieldset style='border-style: solid; border-width: 1px; background-color:#F0F0F0'><legend><B>Opções</B></legend>  
<table border='1' width='100%' cellspacing='0' cellpadding='3'  bordercolor='#FFFFFF' height='0' style='border-collapse: collapse'> 
	<tr>
		<td align=center bgcolor=#FFFFFF><font color='#FF0000'>Tem certeza que deseja exluir a <b>observação</b> para <b>$login_nome</b>?</b></font><br></td>	
	</tr>	
	<tr>
		<td align='center'>
<input type='image' src='img/delete.png' name='Excluir'  id='button' value='Excluir' width='20' height='20'/>
		</td>
	</tr>
</table></form></div>";
}
else{
    echo "<div id=div2>
    <center><h1>OPA!<BR>Não era bem isso que deveria aparecer!<BR> Então algo esta errado...</h1><a href=home.php style=text-decoration: none><font color=#FF7F00>Você pode clicar na imagem para voltar</font><p><img border='0' src='img/cones.png' width='544' height='332'></a></div>";
}
?>
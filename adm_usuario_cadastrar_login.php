<?php
include "seguranca.php";
?>
<style type="text/css">

	#div1 {
			width:100%; /* Tamanho da Largura da Div */
			height:100%; /* Tamanho da Altura da Div */
	        top: 0; 
	        margin-top:0%; /* ou seja ele pega 50% da altura tela e sobe metade do valor da altura no caso 100 */
	        left:0;
	        margin-left:0; /* ou seja ele pega 50% da largura tela e diminui  metade do valor da largura no caso 250 */

}

</style>
<script type="text/javascript" src="mtel.js"></script>
</head>
<?php
include ('conecta.php');

$date 		= date('Y-m-d');
$hora 		= date('H:i:s');
$id_select 	= $_GET['id']; //Recupera a variavel id para fazer o select

$sql = "SELECT * FROM usuario_dados_pessoais where usuario_id=$id_select"; //Faz o select de todos os registros
$query = mysql_query($sql) or die("<center><h1>OOOPS!<BR>Não é esta a pagina que você esperava ver?<BR> Então algo esta errado...</h1><a href='home.php' style='text-decoration: none'><font color='#FF7F00'>Você pode clicar na imagem para voltar</font><p><img border='0' src='img/cones.png' width='544' height='332'></a></p>O Erro de conexão com banco de dados esta descrito logo abaixo!<BR>".mysql_error());
$linha = mysql_fetch_assoc($query);

		$usuario_ra					= $linha['usuario_ra'];
		$usuario_id					= $linha['usuario_id'];
		$usuario_nome				= $linha['usuario_nome'];

echo"
<div id=div1>
<form id='cadastro' name='cadastro' method='post' action='adm_usuario_cadastrar_login_motor.php' enctype='multipart/form-data'>
<input type='hidden' name='login_usuario_ra' id='login_usuario_ra' size='7' value='$usuario_ra'/><input type='hidden' name='login_usuario_id' id='login_usuario_id' size='7' value='$usuario_id'/>
<fieldset style='border-style: solid; border-width: 1px; background-color:#FFA500'>
<table border='1' width='100%' cellspacing='0' cellpadding='3'  bordercolor='#FFF' height='0' style='border-collapse: collapse'> 
	<tr>
	<td height='1' width='1'>
			<center><img src='img/voltar.png' title='Voltar' onClick='javascript:window.history.go(-1);' name='voltar' width='20'' height='20'>
		</td>
		<td>
			<center>Cadastrando login para<i><strong>$usuario_nome - $usuario_ra</center></i></strong>
		</td>
		<td height='1' width='1'>
			<center><img src='img/obser.png' border='0' width='20' height='20' title='Foto'>
		</td>
	</tr>
</table>
</fieldset>
<fieldset style='border-style: solid; border-width: 1px; background-color:#F0F0F0'>
	<legend><B>Dados de Login</B></legend><pre>
Nome:	<input type='text' name='login_nome' id='login_nome' size='70' placeholder='Nome Completo' autofocus value='$usuario_nome'/>
Login:	<input name='login_login' type='text' id='login_login' size='70' maxlength='60' placeholder='Digite um nome de login' />
Senha:	<input name='login_senha' type='password' id='login_senha' size='70' maxlength='60' placeholder='Digite uma senha de login' />
Nível:	<select name='login_nivel' id='login_nivel'>
       		<option>...</option>
        		<option value='01'>01</option>
        		<option value='02'>02</option>
				<option value='03'>03</option>
				<option value='04'>04</option>
				<option value='05'>05</option>
				<option value='06'>06</option>
        	</select>		Ativo:<input type='checkbox' name='login_ativo' value='1' checked>
</fieldset>
<fieldset style='border-style: solid; border-width: 1px; background-color:#F0F0F0'>
			<legend><B>Contato de Trabalho</B></legend><pre>
Telefone 1: <input type='login_tel_1' maxlength='15' name='login_tel_1' onkeyup='mascara( this, mtel );'/>
Telefone 2: <input type='login_tel_2' maxlength='15' name='login_tel_2' onkeyup='mascara( this, mtel );'/>
Email:      <input type='login_email' class='input-text' name='login_email' pattern='[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$' placeholder='seunome@provedor' size='70' maxlength='70'/>
</fieldset>
<fieldset style='border-style: solid; border-width: 1px; background-color:#F0F0F0'>
<legend><B>Opções</B></legend><table border='1' width='100%' cellspacing='0' cellpadding='3'  bordercolor='#FFFFFF' height='0' style='border-collapse: collapse'> 
	<tr>
	<td align=center bgcolor=#FFFFFF><B>Cadastrar</B></td>
	</tr>
	<tr>
		<td align='center'>
			<input type='image' src='img/new.png' name='Concluir Cadastro'  id='button' value='Concluir Cadastro' width='20' height='20'/>
		</td>
	</tr>
</table>
</div>
</form>";
?>
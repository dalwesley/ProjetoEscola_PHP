<?php
include "seguranca.php";
?>
<style type="text/css">
		
	#div1 {
			width:100%; /* Tamanho da Largura da Div */
			height:100%; /* Tamanho da Altura da Div */
    		position:absolute; 
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
$sql = mysql_query("SELECT * FROM usuario where usuario_id=$id_select");
$result = mysql_num_rows($sql);

if($result != 0){
while($linha = mysql_fetch_array($sql)) {

$usuario_id			= $linha['usuario_id'];
$usuario_nome 		= $linha['usuario_nome'];
$usuario_login 		= $linha['usuario_login'];
$usuario_email 		= $linha['usuario_email'];
$usuario_cadastro 	= $linha['usuario_cadastro'];
$usuario_ativo 		= $linha['usuario_ativo'];
$usuario_nivel 		= $linha['usuario_nivel'];
$usuario_pai 		= $linha['usuario_pai'];
$usuario_mae 		= $linha['usuario_mae'];
$usuario_endereço	= $linha['usuario_endereço'];
$usuario_numero		= $linha['usuario_numero'];
$usuario_bairro		= $linha['usuario_bairro'];
$usuario_cep 		= $linha['usuario_cep'];
$usuario_tel_2 		= $linha['usuario_tel_1'];
$usuario_tel_2 		= $linha['usuario_tel_2'];

echo "<div id=div1>
<form id='excluir' name='excluir' method='post' action='adm_usuarios_excluir_motor.php' enctype='multipart/form-data'>
<fieldset style='border-style: solid; border-width: 1px; background-color:#FF0000'>
<table border='1' width='100%' cellspacing='0' cellpadding='3'  bordercolor='#F0F0F0' height='0' style='border-collapse: collapse'> 
	<tr>
		<td>
			<center><a href='javascript:window.history.go(-1)'><img src='img/voltar.png' border='0' width='20' height='20' title='Voltar'></a>
		</td>
		<td>
			<center><i><strong>Excluindo Usuário $usuario_nome - $usuario_id</center></i></strong>
		</td>
		<td>
			<center><img src='img/obser.png' border='0' width='20' height='20' title='Foto'>
		</td>
	</tr>
</table></fieldset>
<fieldset style='border-style: solid; border-width: 1px; background-color:#F0F0F0'>
<legend><B>Exclusão ID:$usuario_id </B></legend>
<table border='1' width='100%' cellspacing='0' cellpadding='3'  bordercolor='#FFF' height='0' style='border-collapse: collapse'> 
<tr>
	<td align='center' bgcolor='#FFF'><img src='img/checked.png' border='0' width='20' height='20' title='Selecione'></td>
	<td align='center' bgcolor='#FFF'><B>Dados da Exclusão</B></td>
</tr>
<td align='center'><input type='checkbox' name='cod[]' value=$linha[usuario_id]  required ></td>
<td><pre>
Nome:	 	<B>$usuario_nome</B>	Numero:	 <B>$usuario_id</B>
Usuário:	<B>$usuario_login</B>
email:		<B>$usuario_email</B>
Data: 		<B>$usuario_cadastro</B>	
Nivel:		<B>$usuario_nivel</B>
Ativo:	<B>$usuario_ativo</B>
	  </td>
</tr>
</table>";
}
echo"</fieldset>
<fieldset style='border-style: solid; border-width: 1px; background-color:#F0F0F0'><legend><B>Opções</B></legend>  
<table border='1' width='100%' cellspacing='0' cellpadding='3'  bordercolor='#FFFFFF' height='0' style='border-collapse: collapse'> 
	<tr>
		<td align=center bgcolor=#FFFFFF><font color='#FF0000'>Tem certeza que deseja <b>EXCLUIR o Usuário</b> $usuario_nome?</font><br></td>
	</tr>	
	<tr>
		<td align='center'>
<input type='submit' value='Excluir'>
		</td>
	</tr>
</table></form></div>";
}
else{
    echo "<div id=div2>
    <center><h1>OPA!<BR>Não era bem isso que deveria aparecer!<BR> Então algo esta errado...</h1><a href=home.php style=text-decoration: none><font color=#FF7F00>Você pode clicar na imagem para voltar</font><p><img border='0' src='img/cones.png' width='544' height='332'></a></div>";
}
?>
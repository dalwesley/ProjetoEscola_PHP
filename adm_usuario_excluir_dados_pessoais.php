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
$sql = mysql_query("SELECT *, DATE_FORMAT(usuario_data, '%d/%m/%Y') as 'usuario_data' FROM usuario_dados_pessoais where usuario_id=$id_select ORDER BY usuario_id");
$result = mysql_num_rows($sql);

if($result != 0){

while($linha = mysql_fetch_array($sql)) {
$usuario_id			= $linha['usuario_id'];
$usuario_ra			= $linha['usuario_ra'];
$usuario_nome 		= $linha['usuario_nome'];
$usuario_pai 		= $linha['usuario_pai'];
$usuario_mae 		= $linha['usuario_mae'];
$usuario_endereco	= $linha['usuario_endereco'];
$usuario_numero		= $linha['usuario_numero'];
$usuario_bairro		= $linha['usuario_bairro'];
$usuario_cep 		= $linha['usuario_cep'];

echo "<div id=div1>
<form id='excluir' name='excluir' method='post' action='adm_usuario_excluir_dados_pessoais_motor.php' enctype='multipart/form-data'>
<fieldset style='border-style: solid; border-width: 1px; background-color:#FF0000'>
<table border='1' width='100%' cellspacing='0' cellpadding='3'  bordercolor='#FFF' height='0' style='border-collapse: collapse'> 
	<tr>
		<td height='1' width='1'>
			<center><img src=\"img/voltar.png\" title=\"Voltar\" onClick=\"javascript:window.history.go(-1);\" name=\"voltar\" width=\"20'\" height=\"20\">
		</td>
		<td>
			<center>Excluindo <B><I>Dados Pessoais</B></I> para <i><strong>$usuario_nome - $usuario_ra</center></i></strong>
		</td>
		<td height='1' width='1'>
			<center><img src='img/obser.png' border='0' width='20' height='20' title='Foto'>
		</td>
	</tr>
</table></fieldset>
<fieldset style='border-style: solid; border-width: 1px; background-color:#F0F0F0'>
<legend><font color='#FF0000'><B>Exclusão R.A: $usuario_ra</B></legend>
<table border='1' width='100%' cellspacing='0' cellpadding='3'  bordercolor='#FFF' height='0' style='border-collapse: collapse'> 
<tr>
	<td align='center' bgcolor='#FFF'><img src='img/checked.png' border='0' width='20' height='20' title='Selecione'></td>
	<td align='center' bgcolor='#FFF'><B>Dados da Exclusão</B></td>
</tr>
<td align='center'><input type='checkbox' name='cod[]' value=$linha[usuario_id]  required ></td>
<td><pre>
Nome:		<B>$linha[usuario_nome]</B>
Sexo:		<B>$linha[usuario_sexo]</B>
Cor:		<B>$linha[usuario_cor]</B>
Data: 		<B>$linha[usuario_data]</B>	
Nacionalidade:	<B>$linha[usuario_nacionalidade]</B>
Nascimento:	<B>$linha[usuario_nascimento]</B>
Estado:		<B>$linha[usuario_estado]</B>
Nome do Pai:	<B>$linha[usuario_pai]</B>
Nome da Mãe:	<B>$linha[usuario_mae]</B>
	  </td>
</tr>
</table>";
}
echo"</fieldset>
<fieldset style='border-style: solid; border-width: 1px; background-color:#F0F0F0'><legend><B>Opções</B></legend>  
<table border='1' width='100%' cellspacing='0' cellpadding='3'  bordercolor='#FFFFFF' height='0' style='border-collapse: collapse'> 
	<tr>
		<td align=center bgcolor=#FFFFFF><font color='#FF0000'>Tem certeza que deseja exluir os <b>dados pessoais</b> do(a) <b>$usuario_nome</b>?</b></font><br></td>
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
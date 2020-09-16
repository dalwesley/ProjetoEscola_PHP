<?php
include "seguranca.php";
?>
<script language="JavaScript">
function abrir(URL) {
var width = 700;
var height = 680;
var left = 657;
var top = 0;
window.open(URL,'janela', 'width='+width+', height='+height+', top='+top+', left='+left+', scrollbars=no, status=no, toolbar=no, location=no, directories=no, menubar=no, resizable=no, fullscreen=no');
}
</script>
<script>
function aparece(ahhhh){
if(document.getElementById(ahhhh).style.display== "none"){
document.getElementById(ahhhh).style.display = "block";
}
else {
document.getElementById(ahhhh).style.display = "none"
}
}
</script>
<script language='javascript'>
				function imprime(text){
				text=document
				print(text) }	     
</script>
<style type="text/css">
		
	#div1 {
			width:100%; /* Tamanho da Largura da Div */
			height:100%; /* Tamanho da Altura da Div */
    		top:0; 
    		margin-top:0%; /* ou seja ele pega 50% da altura tela e sobe metade do valor da altura no caso 100 */
    		left:0%;
    		margin-left:0; /* ou seja ele pega 50% da largura tela e diminui  metade do valor da largura no caso 250 */
 
}	#div2 {
			width:100%; /* Tamanho da Largura da Div */
			height:10%; /* Tamanho da Altura da Div */
    		top:0; 
    		margin-top:40%; /* ou seja ele pega 50% da altura tela e sobe metade do valor da altura no caso 100 */
    		left:10%;
    		margin-left:0; /* ou seja ele pega 50% da largura tela e diminui  metade do valor da largura no caso 250 */
 
}

</style>
</head>
<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
$conex = mysql_connect("localhost", "root", "");
mysql_select_db("escola", $conex);
$id_select = $_GET['id']; //Recupera a variavel id para fazer o select
$sql = "SELECT * FROM usuario_dados_pessoais where usuario_id=$id_select"; //Faz o select de todos os registros
$query = mysql_query($sql) or die("<center><h1>OOOPS!<BR>Não é esta a pagina que você esperava ver?<BR> Então algo esta errado...</h1><a href='home.php' style='text-decoration: none'><font color='#FF7F00'>Você pode clicar na imagem para voltar</font><p><img border='0' src='img/cones.png' width='544' height='332'></a></p>O Erro de conexão com banco de dados esta descrito logo abaixo!<BR>".mysql_error());
$linha = mysql_fetch_assoc($query);

		$usuario_ra					= $linha['usuario_ra'];
		$usuario_id					= $linha['usuario_id'];
		$usuario_nome				= $linha['usuario_nome'];
?>
<?php

$conex = mysql_connect("localhost", "root", "");
mysql_select_db("escola", $conex);
$id_select = $_GET['id']; //Recupera a variavel id para fazer o select
$sql = "SELECT *, DATE_FORMAT(usuario_data, '%d/%m/%Y') as 'usuario_data' FROM usuario_dados_pessoais where usuario_id=$id_select"; //Faz o select de todos os registros
$query = mysql_query($sql) or die("<center><h1>OOOPS!<BR>Não é esta a pagina que você esperava ver?<BR> Então algo esta errado...</h1><a href='home.php' style='text-decoration: none'><font color='#FF7F00'>Você pode clicar na imagem para voltar</font><p><img border='0' src='img/cones.png' width='544' height='332'></a></p>O Erro de conexão com banco de dados esta descrito logo abaixo!<BR>".mysql_error());
$result = mysql_num_rows($query);

if($result>=1) {

echo"<div id=div1>
<fieldset style='border-style: solid; border-width: 1px; background-color:#32CD32'>
<table border='1' width='100%' cellspacing='0' cellpadding='3'  bordercolor='#F0F0F0' height='0' style='border-collapse: collapse'> 
	<tr>
		<td height='1' width='1'>
			<center><img src='img/voltar.png' border='0' width='20' height='20' title='Voltar'>
		</td>
		<td>
			<center><pre>$usuario_nome - $usuario_ra</pre>
		</td>
		<td height='1' width='1'>
			<center><img src='img/obser.png' border='0' width='20' height='20' title='Foto'>
		</td>
	</tr>
</table></fieldset>
<fieldset style='border-style: solid; border-width: 1px; background-color:#F0F0F0'>
<legend><B><pre>Identificação do usuario</pre></B></legend><pre>
Sexo:	    <B>$linha[usuario_sexo]</B>				
Data:	    <B>$linha[usuario_data]</B>
Cor:	    <B>$linha[usuario_cor]</B>
Nascimento: <B>$linha[usuario_nascimento]</B>
Pai:	    <B>$linha[usuario_pai]</B>
Mãe:	    <B>$linha[usuario_mae]</B>
</fieldset>
</fieldset>
<fieldset style='border-style: solid; border-width: 1px; background-color:#F0F0F0'>
<legend><B><pre>Residência</pre></B></legend><pre>
Nacionalidade:	<B>$linha[usuario_nacionalidade]</B>		Estado:<B>$linha[usuario_estado]</B>
Cidade:		<B>$linha[usuario_cidade]</B>
Endereço:	<B>$linha[usuario_endereco]</B>
Bairro:		<B>$linha[usuario_bairro]</B>
Numero:		<B>$linha[usuario_numero]</B>		CEP:	<B>$linha[usuario_cep]</B>
</fieldset>
<fieldset style='border-style: solid; border-width: 1px; background-color:#F0F0F0'>
<legend><B><pre>Contato</pre></B></legend><pre>
Telefone 1: <B>$linha[usuario_tel_1]</B>
Telefone 2: <B>$linha[usuario_tel_2]</B>
Telefone 3: <B>$linha[usuario_tel_3]</B>
Email:      <B>$linha[usuario_email]</B>
</fieldset>
<fieldset style='border-style: solid; border-width: 1px; background-color:#F0F0F0'>
<legend><B><pre>Opções</pre></B></legend>
	<table border='1' width='100%' cellspacing='0' cellpadding='3'  bordercolor='#FFFFFF' height='0' style='border-collapse: collapse'> 
	<tr>
		<td align=center bgcolor=#FFFFFF><B><pre>Editar</pre></B></td>
		<td align=center bgcolor=#FFFFFF><B><pre>Excluir</B></td>
		<td align=center bgcolor=#FFFFFF><B><pre>Imprimir</B></td>
	</tr>
	<tr>
		<td align='center'><img src=\"img/edit.png\" title=\"Editar\" onClick=\"javascript:abrir('adm_usuario_editar_dados_pessoais.php?id=$usuario_id','03');\" name=\"Cadastro\" width=\"20'\" height=\"20\">
		<td align='center'><img src=\"img/delete.png\" title=\"Deletar\" onClick=\"javascript:abrir('adm_usuario_excluir_dados_pessoais.php?id=$usuario_id','03');\" name=\"Cadastro\" width=\"20'\" height=\"20\">
		<td align='center'><img src=\"img/print.png\" title=\"imprimir\" onClick='imprime()' name=\"Cadastro\" width=\"20'\" height=\"20\">
	</tr>
</table>
</pre>
</div>";
} else {
echo"
<div id=div2>
<fieldset style='border-style: solid; border-width: 1px; background-color:#F0F0F0'>
<table border='1' width='100%' cellspacing='0' cellpadding='3'  bordercolor='#FFFFFF' height='0' style='border-collapse: collapse'> 
	<tr>
		<td align=center bgcolor=#FFFFFF>
		<br><i><strong>".$linha['usuario']."</i></strong> Sem Dados Pessoais cadastrado!<br><br>
		</td>
	</tr>
	<tr>
		<td align='center'>
			<b>Cadastrar<br>
			<a href='adm_usuario_cadastrar_dados_pessoais.php?id=$id_usuario' style='text-decoration: none'>
			<img src='img/new.png' border='0' width='24' height='24' title='Cadastrar'></a>
		</td>
	</tr></table>
</fieldset>
</div>";
}
?>
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
<style>
#tabela{
width:600px;
height:100px;
text-align:center;
}
.coluna{
width:50px;
height:20px;
}
.coluna:hover{
background-color:#FFF;
}
</style>
<style type="text/css">
		
	#div1 {
			width:100%; /* Tamanho da Largura da Div */
			height:0%; /* Tamanho da Altura da Div */
    		top:0; 
    		margin-top:0%; /* ou seja ele pega 50% da altura tela e sobe metade do valor da altura no caso 100 */
    		left:0%;
    		margin-left:0; /* ou seja ele pega 50% da largura tela e diminui  metade do valor da largura no caso 250 */
 
}
	#div2 {
			width:100%; /* Tamanho da Largura da Div */
			height:0%; /* Tamanho da Altura da Div */
    		top:0; 
    		margin-top:40%; /* ou seja ele pega 50% da altura tela e sobe metade do valor da altura no caso 100 */
    		left:0%;
    		margin-left:0; /* ou seja ele pega 50% da largura tela e diminui  metade do valor da largura no caso 250 */
 
}
</style>

<?php
include "conecta.php";
$id_select = $_GET['id']; //Recupera a variavel id para fazer o select
$sql = "SELECT * FROM responsavel where responsavel_id=$id_select"; //Faz o select de todos os registros
$query = mysql_query($sql) or die("<center><h1>OOOPS!<BR>Não é esta a pagina que você esperava ver?<BR> Então algo esta errado...</h1><a href='home.php' style='text-decoration: none'><font color='#FF7F00'>Você pode clicar na imagem para voltar</font><p><img border='0' src='img/cones.png' width='544' height='332'></a></p>O Erro de conexão com banco de dados esta descrito logo abaixo!<BR>".mysql_error());
$linha = mysql_fetch_assoc($query);

		$responsavel_id				= $linha['responsavel_id'];
		$responsavel_nome			= $linha['responsavel_nome'];
?>

<?php
include "conecta.php";
$id_select = $_GET['id']; //Recupera a variavel id para fazer o select
$sql = mysql_query("SELECT * from responsavel_obs where responsavel_obs_responsavel_id=$id_select");
$result = mysql_num_rows($sql);

if($result>=1) {
$valor = 0;	
echo"<div id=div1>
	<fieldset style='border-style: solid; border-width: 0px; background-color:#5F9F9F'>
<table border='0' width='100%' cellspacing='0' cellpadding='3'  bordercolor='#FFF' height='0' style='border-collapse: collapse'> 
	<tr>
		<td height='1' width='1'>
			<center><img src='img/voltar.png' border='0' width='20' height='20' title='Voltar'>
		</td>
		<td>
			<center>Exibindo <B><i> observação</i></B> para <i><strong>$responsavel_nome</center></i></strong>
		</td>
		<td height='1' width='1'>
			<center><img src='img/obser.png' border='0' width='20' height='20' title='Foto'>
		</td>
	</tr>
</table></fieldset>";

	   while($linha = mysql_fetch_array($sql)) {
$responsavel_obs_id							= $linha['responsavel_obs_id'];
$responsavel_obs_responsavel_nome			= $linha['responsavel_obs_responsavel_nome'];
$responsavel_obs_responsavel_id				= $linha['responsavel_obs_responsavel_id'];
$responsavel_obs_visual						= $linha['responsavel_obs_visual'];
$responsavel_obs_visual_qual				= $linha['responsavel_obs_visual_qual'];
$responsavel_obs_auditiva					= $linha['responsavel_obs_auditiva'];
$responsavel_obs_auditiva_qual      		= $linha['responsavel_obs_auditiva_qual'];
$responsavel_obs_fisica						= $linha['responsavel_obs_fisica'];
$responsavel_obs_fisica_qual          		= $linha['responsavel_obs_fisica_qual'];
$responsavel_obs_movimento					= $linha['responsavel_obs_movimento'];
$responsavel_obs_movimento_qual     		= $linha['responsavel_obs_movimento_qual'];
$responsavel_obs_comportamento     			= $linha['responsavel_obs_comportamento'];
$responsavel_obs_comportamento_qual			= $linha['responsavel_obs_comportamento_qual'];
$responsavel_obs_fraldas					= $linha['responsavel_obs_fraldas'];
$responsavel_obs_cadeira_rodas	            = $linha['responsavel_obs_cadeira_rodas'];
$responsavel_obs_mencionar_prob_import	    = $linha['responsavel_obs_mencionar_prob_import'];
$valor++;									

echo"<fieldset style='border-style: solid; border-width: 1px; background-color:#F0F0F0'>
<legend><B>$valor</B></legend>
<table border='0' width='100%' cellspacing='0' cellpadding='3'  bordercolor='#FFFFFF' height='0' style='border-collapse: collapse'> 
<tr class='coluna'>
	<td><pre>
Restrição?	<a name=\"#responsavel_obs_id\"><span id=\"$responsavel_obs_id\" style=\"display: none; \">
Visual: 		<B>$responsavel_obs_visual</B> - <B>$responsavel_obs_visual_qual</B>
Auditiva?		<B>$responsavel_obs_auditiva</B> - <B>$responsavel_obs_auditiva_qual</B>
Física?			<B>$responsavel_obs_fisica</B> - <B>$responsavel_obs_fisica_qual</B>
Nos Movimentos?		<B>$responsavel_obs_movimento</B> - <B>$responsavel_obs_movimento_qual</B>
De Comportamento?	<B>$responsavel_obs_comportamento</B> - <B>$responsavel_obs_comportamento_qual</B>
Usa Fraldas?		<B>$responsavel_obs_fraldas</B>
Usa cadeira de rodas?	<B>$responsavel_obs_cadeira_rodas</B>

Observações:
<B>$responsavel_obs_mencionar_prob_import</B>
</td>
	<td align='center' height='1' width='1'><pre><img src=\"img/ver.png\" title=\"visualizar\" onClick=\"aparece('$responsavel_obs_id');\" name=\"visualizar\" width=\"20'\" height=\"20\"> <img src=\"img/edit.png\" title=\"Editar\" onClick=\"javascript:abrir('adm_responsavel_obs_editar.php?id=$responsavel_obs_responsavel_id&&opcao=$responsavel_obs_id','03');\" name=\"Editar\" width=\"20'\" height=\"20\"> <img src=\"img/delete.png\" title=\"Deletar\" onClick=\"javascript:abrir('adm_responsavel_obs_excluir.php?id=$responsavel_obs_responsavel_id&&opcao=$responsavel_obs_id','03');\" name=\"Deletar\" width=\"20'\" height=\"20\"></pre>
	</td></tr></table></fieldset>";
    }

echo"</fieldset></fieldset>
<fieldset style='border-style: solid; border-width: 1px; background-color:#F0F0F0'>
<legend><B>Opções</B></legend>  
<table border='1' width='100%' cellspacing='0' cellpadding='3'  bordercolor='#FFFFFF' height='0' style='border-collapse: collapse'> 
	<tr>
		<td align=center bgcolor=#FFFFFF><b>Cadastrar<br></td>
		<td align=center bgcolor=#FFFFFF><b>Imprimir<br></td>
	</tr>	
	<tr>
		<td align='center'>
			<img src=\"img/new.png\" title=\"Cadastro\" onClick=\"javascript:abrir('adm_responsavel_obs_cadastrar.php?id=$responsavel_obs_responsavel_id','03');\" name=\"Cadastro\" width=\"20'\" height=\"20\">
		</td>
		<td align='center'>
			<img src=\"img/print.png\" title=\"Imprimir\" onClick='imprime()' name=\"imprimir\" width=\"20'\" height=\"20\">
		</td>
	</tr>
</table>
</fieldset>
</div>";
} else {
echo"<div id=div2>
<fieldset style='border-style: solid; border-width: 1px; background-color:#F0F0F0'>
<table border='1' width='100%' cellspacing='0' cellpadding='3'  bordercolor='#FFFFFF' height='0' style='border-collapse: collapse'> 
	<tr>
		<td align=center bgcolor=#FFFFFF>
		<br><i><strong>".$linha['responsavel_nome']."</i></strong> sem Observação cadastrada!<br><br>
		</td>
	</tr>
	<tr>
		<td align='center'>
			<b>Cadastrar<br>
			<a href='adm_responsavel_obs_cadastrar.php?id=$responsavel_id' style='text-decoration: none'>
			<img src='img/new.png' border='0' width='24' height='24' title='Cadastrar'></a>
		</td>
	</tr>
</table>
</fieldset>
</div>";
}
?>
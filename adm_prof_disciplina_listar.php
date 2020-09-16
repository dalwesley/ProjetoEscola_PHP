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
$sql = "SELECT * FROM professor_dados_pessoais where prof_id=$id_select"; //Faz o select de todos os registros
$query = mysql_query($sql) or die("<center><h1>OOOPS!<BR>Não é esta a pagina que você esperava ver?<BR> Então algo esta errado...</h1><a href='home.php' style='text-decoration: none'><font color='#FF7F00'>Você pode clicar na imagem para voltar</font><p><img border='0' src='img/cones.png' width='544' height='332'></a></p>O Erro de conexão com banco de dados esta descrito logo abaixo!<BR>".mysql_error());
$linha = mysql_fetch_assoc($query);

		$prof_ra				= $linha['prof_ra'];
		$prof_id				= $linha['prof_id'];
		$prof_nome				= $linha['prof_nome'];
?>

<?php
include "conecta.php";
$id_select = $_GET['id']; //Recupera a variavel id para fazer o select
$sql = mysql_query("SELECT *, DATE_FORMAT(prof_disciplina_data, '%d/%m/%Y') as 'prof_disciplina_data' from professor_disciplina where prof_disciplina_prof_id=$id_select ORDER BY prof_disciplina_nome, prof_disciplina_serie");
$result = mysql_num_rows($sql);

if($result>=1) {
$valor = 0;	
echo"<div id=div1>
	<fieldset style='border-style: solid; border-width: 1px; background-color:#5F9F9F'>
<table border='1' width='100%' cellspacing='0' cellpadding='3'  bordercolor='#FFF' height='0' style='border-collapse: collapse'> 
	<tr>
		<td height='1' width='1'>
			<center><img src='img/voltar.png' border='0' width='20' height='20' title='Voltar'>
		</td>
		<td>
			<center>Exibindo <B><i>disciplina(s)</i></B> para <i><strong>$prof_nome - $prof_ra</center></i></strong>
		</td>
		<td height='1' width='1'>
			<center><img src='img/obser.png' border='0' width='20' height='20' title='Foto'>
		</td>
	</tr>
</table></fieldset>";

	    while($linha = mysql_fetch_array($sql)) {
$prof_disciplina_id						= $linha['prof_disciplina_id'];
$prof_disciplina_nome					= $linha['prof_disciplina_nome'];
$prof_disciplina_prof_nome				= $linha['prof_disciplina_prof_nome'];
$prof_disciplina_prof_id				= $linha['prof_disciplina_prof_id'];
$prof_disciplina_ano_civil				= $linha['prof_disciplina_ano_civil'];
$prof_disciplina_serie					= $linha['prof_disciplina_serie'];
$prof_disciplina_turma					= $linha['prof_disciplina_turma'];
$prof_disciplina_op						= $linha['prof_disciplina_op'];
$prof_disciplina_diretor				= $linha['prof_disciplina_diretor'];
$prof_disciplina_data					= $linha['prof_disciplina_data'];
$valor++;
echo"<fieldset style='border-style: solid; border-width: 1px; background-color:#F0F0F0'>
<legend>$valor</legend>
<table border='1' width='100%' cellspacing='0' cellpadding='3'  bordercolor='#FFF' height='0' style='border-collapse: collapse'>
<tr class='coluna'>
	<td rowspan='2'><pre>
Disciplina: <B>$prof_disciplina_nome</B>   Série: <B>$linha[prof_disciplina_serie]</B>   Turma: <B>$linha[prof_disciplina_turma]</B><a name=\"#$prof_disciplina_id\"><span id=\"$prof_disciplina_id\" style=\"display: none; \">
Orientador: $prof_disciplina_op
Diretor:    $prof_disciplina_diretor
Data:	    $prof_disciplina_data
</pre>
</td>
	<td align='center' height='1' width='1'><pre><img src=\"img/ver.png\" title=\"visualizar\" onClick=\"aparece('$prof_disciplina_id');\" name=\"visualizar\" width=\"20'\" height=\"20\"> <img src=\"img/edit.png\" title=\"Editar\" onClick=\"javascript:abrir('adm_prof_disciplina_editar.php?id=$prof_disciplina_prof_id&&opcao=$prof_disciplina_id','03');\" name=\"Editar\" width=\"20'\" height=\"20\"> <img src=\"img/delete.png\" title=\"Deletar\" onClick=\"javascript:abrir('adm_prof_disciplina_excluir.php?id=$prof_disciplina_prof_id&&opcao=$prof_disciplina_id','03');\" name=\"Deletar\" width=\"20'\" height=\"20\"></pre>
	</td></tr></table></fieldset>";
    }
echo"</fieldset></fieldset>
<fieldset style='border-style: solid; border-width: 1px; background-color:#F0F0F0'><legend><B>Opções</B></legend>  
<table border='1' width='100%' cellspacing='0' cellpadding='3'  bordercolor='#FFFFFF' height='0' style='border-collapse: collapse'> 
	<tr>
		<td align=center bgcolor=#FFFFFF><b>Cadastrar<br></td>
	</tr>	
	<tr>
		<td align='center'>
			<a href='adm_prof_disciplina_cadastrar.php?id=$prof_disciplina_prof_id' style='text-decoration: none'>
			<img src='img/new.png' border='0' width='24' height='24' title='Cadastrar'></a>
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
		<br><i><strong>".$linha['prof_nome']."</i></strong> sem disciplina cadastrada!<br><br>
		</td>
	</tr>
	<tr>
		<td align='center'>
			<b>Cadastrar<br>
			<a href='adm_prof_disciplina_cadastrar.php?id=$prof_id' style='text-decoration: none'>
			<img src='img/new.png' border='0' width='24' height='24' title='Cadastrar'></a>
		</td>
	</tr>
</table>
</fieldset>
</div>";
}
?>
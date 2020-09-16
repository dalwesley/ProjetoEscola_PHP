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
include ('conecta.php');
$id_select1 = $_GET['id'];		//Recupera a variavel id para fazer o select
$id_select2 = $_GET['opcao'];	//Recupera a variavel opcao para fazer o select
$sql = "SELECT * FROM professor_dados_pessoais where prof_id=$id_select1"; //Faz o select de todos os registros
$query = mysql_query($sql) or die("<center><h1>OOOPS!<BR>Não é esta a pagina que você esperava ver?<BR> Então algo esta errado...</h1><a href='home.php' style='text-decoration: none'><font color='#FF7F00'>Você pode clicar na imagem para voltar</font><p><img border='0' src='img/cones.png' width='544' height='332'></a></p>O Erro de conexão com banco de dados esta descrito logo abaixo!<BR>".mysql_error());
$linha = mysql_fetch_assoc($query);

		$prof_ra				= $linha['prof_ra'];
		$prof_id				= $linha['prof_id'];
		$prof_nome				= $linha['prof_nome'];
?>
<?php
include "conecta.php";

$sql = mysql_query("SELECT * from professor_procedencia where prof_proced_id=$id_select2");
$result = mysql_num_rows($sql);

if($result>=1) {

while($linha = mysql_fetch_array($sql)) {
    
$prof_proced_id							= $linha['prof_proced_id'];
$prof_proced_escola						= $linha['prof_proced_escola'];
$prof_proced_ano_inicio					= $linha['prof_proced_ano_inicio'];
$prof_proced_ano_fim					= $linha['prof_proced_ano_fim'];
$prof_proced_pais						= $linha['prof_proced_pais'];
$prof_proced_estado						= $linha['prof_proced_estado'];
$prof_proced_cidade						= $linha['prof_proced_cidade'];
$prof_proced_bairro						= $linha['prof_proced_bairro'];
$prof_proced_trabalhou_na_escola		= $linha['prof_proced_trabalhou_na_escola'];
$prof_proced_secretario					= $linha['prof_proced_secretario'];
$prof_proced_diretor					= $linha['prof_proced_diretor'];
$prof_proced_prof_id					= $linha['prof_proced_prof_id'];
$prof_proced_prof_nome					= $linha['prof_proced_prof_nome'];
$prof_proced_data 						= $linha['prof_proced_data'];

echo "<div id=div1>
<form id='excluir' name='excluir' method='post' action='adm_prof_procedencia_excluir_motor.php' enctype='multipart/form-data'>
<fieldset style='border-style: solid; border-width: 1px; background-color:#FF0000'>
<table border='1' width='100%' cellspacing='0' cellpadding='3'  bordercolor='#F0F0F0' height='0' style='border-collapse: collapse'> 
	<tr>
		<td height='1' width='1'>
			<center><img src=\"img/voltar.png\" title=\"Voltar\" onClick=\"javascript:window.history.go(-1);\" name=\"voltar\" width=\"20'\" height=\"20\">
		</td>
		<td>
			<center>Excluindo <B><i>procedência</i></B> para <i><strong> $prof_nome - $prof_ra </center></i></strong>
		<td height='1' width='1'>
			<center><img src='img/obser.png' border='0' width='20' height='20' title='Foto'>
		</td>
	</tr>
</table></fieldset>
<fieldset style='border-style: solid; border-width: 1px; background-color:#F0F0F0'>
<legend><font color='#FF0000'><B>Excluir Procedência</B></font></legend>
<table border='1' width='100%' cellspacing='0' cellpadding='3'  bordercolor='#FFF' height='0' style='border-collapse: collapse'> 
<tr>
	<td align='center' bgcolor='#FFF'><img src='img/checked.png' border='0' width='20' height='20' title='Selecione'></td>
	<td align='center' bgcolor='#FFF'><B>Procedência - $prof_proced_id</B></td>
</tr>
<td align='center'><input type='checkbox' name='cod[]' value='$prof_proced_id' required/></td>
<td><pre>
Escola ou Equivalente:	<B>$prof_proced_escola</B>
Periodo:		<B>$prof_proced_ano_inicio - $prof_proced_ano_fim</B>
Cidade:			<B>$prof_proced_cidade</B>
Bairro:			<B>$prof_proced_bairro</B>
Estado:			<B>$prof_proced_estado</B>
País:			<B>$prof_proced_pais</B>
Já trabalhou nesta escola?<B>$prof_proced_trabalhou_na_escola</B>
</td>
</tr>
</table>";
}
echo"</fieldset>
<fieldset style='border-style: solid; border-width: 1px; background-color:#F0F0F0'>
<legend><B>Opções</B></legend>  
<table border='1' width='100%' cellspacing='0' cellpadding='3'  bordercolor='#FFFFFF' height='0' style='border-collapse: collapse'> 
	<tr>
		<td align=center bgcolor=#FFFFFF><font color='#FF0000'>Tem certeza que deseja exluir a <b>procedência</b> para <b>$prof_nome</b>?</b></font><br></td></tr>	
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
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

$sql = "SELECT * FROM responsavel where responsavel_id=$id_select1"; //Faz o select de todos os registros
$query = mysql_query($sql) or die("<center><h1>OOOPS!<BR>Não é esta a pagina que você esperava ver?<BR> Então algo esta errado...</h1><a href='home.php' style='text-decoration: none'><font color='#FF7F00'>Você pode clicar na imagem para voltar</font><p><img border='0' src='img/cones.png' width='544' height='332'></a></p>O Erro de conexão com banco de dados esta descrito logo abaixo!<BR>".mysql_error());
$linha = mysql_fetch_assoc($query);

		$responsavel_id				= $linha['responsavel_id'];
		$responsavel_nome			= $linha['responsavel_nome'];
?>
<?php
include "conecta.php";
$sql = mysql_query("SELECT * from responsavel_obs where responsavel_obs_id=$id_select2");
$result = mysql_num_rows($sql);

if($result>=1) {

    while($linha = mysql_fetch_array($sql)) {

$responsavel_obs_id						= $linha['responsavel_obs_id'];
$responsavel_obs_responsavel_nome		= $linha['responsavel_obs_responsavel_nome'];
$responsavel_obs_responsavel_id			= $linha['responsavel_obs_responsavel_id'];
$responsavel_obs_visual					= $linha['responsavel_obs_visual'];
$responsavel_obs_visual_qual			= $linha['responsavel_obs_visual_qual'];
$responsavel_obs_auditiva				= $linha['responsavel_obs_auditiva'];
$responsavel_obs_auditiva_qual      	= $linha['responsavel_obs_auditiva_qual'];
$responsavel_obs_fisica					= $linha['responsavel_obs_fisica'];
$responsavel_obs_fisica_qual          	= $linha['responsavel_obs_fisica_qual'];
$responsavel_obs_movimento				= $linha['responsavel_obs_movimento'];
$responsavel_obs_movimento_qual     	= $linha['responsavel_obs_movimento_qual'];
$responsavel_obs_comportamento     		= $linha['responsavel_obs_comportamento'];
$responsavel_obs_comportamento_qual		= $linha['responsavel_obs_comportamento_qual'];
$responsavel_obs_fraldas				= $linha['responsavel_obs_fraldas'];
$responsavel_obs_cadeira_rodas	        = $linha['responsavel_obs_cadeira_rodas'];
$responsavel_obs_mencionar_prob_import	= $linha['responsavel_obs_mencionar_prob_import'];
$responsavel_obs_data	 				= date('d-m-y');


echo "<div id=div1>
<form id='excluir' name='excluir' method='post' action='adm_responsavel_obs_excluir_motor.php' enctype='multipart/form-data'>
<fieldset style='border-style: solid; border-width: 1px; background-color:#FF0000'>
<table border='1' width='100%' cellspacing='0' cellpadding='3'  bordercolor='#F0F0F0' height='0' style='border-collapse: collapse'> 
	<tr>
		<td height='1' width='1'>
			<center><img src=\"img/voltar.png\" title=\"Voltar\" onClick=\"javascript:window.history.go(-1);\" name=\"voltar\" width=\"20'\" height=\"20\">
		</td>
		<td>
			<center>Excluindo <B><I>observação</B></I> para <i><strong>$responsavel_obs_responsavel_nome</center></i></strong>
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
	<td align='center' bgcolor='#FFF'><img src='img/checked.png' border='0' width='20' height='20' title='Selecione'></td>
	<td align='center' bgcolor='#FFF'><B>Dados da Exclusão</B></td>
</tr>
	<td align='center'><input type='checkbox' name='cod[]' value=$linha[responsavel_obs_id] required/>
	</td>
	<td><pre>
Def. Visual?		<B>$responsavel_obs_visual - $responsavel_obs_visual_qual</B>
Def. Auditiva?		<B>$responsavel_obs_auditiva - $responsavel_obs_auditiva_qual</B>
Def. Fisica?		<B>$responsavel_obs_fisica - $responsavel_obs_fisica_qual</B>
Def. Movimento?		<B>$responsavel_obs_movimento - $responsavel_obs_movimento_qual</B>
Def. Comportamento?	<B>$responsavel_obs_comportamento - $responsavel_obs_comportamento_qual</B>
Usa Fraldas?		<B>$responsavel_obs_fraldas</B>
Cadeirante?		<B>$responsavel_obs_cadeira_rodas</B>

Observações?	<B>$responsavel_obs_mencionar_prob_import</B>
</td>
</tr>
</table>";
}
echo"</fieldset>
<fieldset style='border-style: solid; border-width: 1px; background-color:#F0F0F0'><legend><B>Opções</B></legend>  
<table border='1' width='100%' cellspacing='0' cellpadding='3'  bordercolor='#FFFFFF' height='0' style='border-collapse: collapse'> 
	<tr>
		<td align=center bgcolor=#FFFFFF><font color='#FF0000'>Tem certeza que deseja exluir a <b>observação</b> para <b>$responsavel_nome</b>?</b></font><br></td>	
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
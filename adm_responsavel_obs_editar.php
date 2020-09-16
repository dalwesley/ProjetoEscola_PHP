<?php
include "seguranca.php";
?>
<style type="text/css">

	#div1 {
			width:100%; /* Tamanho da Largura da Div */
			height:0; /* Tamanho da Altura da Div */
	        top: 0; 
	        margin-top:0%; /* ou seja ele pega 50% da altura tela e sobe metade do valor da altura no caso 100 */
	        left:0;
	        margin-left:0; /* ou seja ele pega 50% da largura tela e diminui  metade do valor da largura no caso 250 */

}	
</style>
<?php
include "conecta.php";
$id_select1 = $_GET['id'];		//Recupera a variavel id para fazer o select
$id_select2 = $_GET['opcao'];	//Recupera a variavel opcao para fazer o select
$sql = "SELECT * FROM responsavel where responsavel_id=$id_select1"; //Faz o select de todos os registros
$query = mysql_query($sql) or die("<center><h1>OOOPS!<BR>Não é esta a pagina que você esperava ver?<BR> Então algo esta errado...</h1><a href='home.php' style='text-decoration: none'><font color='#FF7F00'>Você pode clicar na imagem para voltar</font><p><img border='0' src='img/cones.png' width='544' height='332'></a></p>O Erro de conexão com banco de dados esta descrito logo abaixo!<BR>".mysql_error());
$linha = mysql_fetch_assoc($query);

		$responsavel_id				= $linha['responsavel_id'];
		$responsavel_nome				= $linha['responsavel_nome'];
?>
<?php
include ('conecta.php');
$sql = "SELECT * FROM responsavel_obs where responsavel_obs_id=$id_select2"; //Faz o select de todos os registros
$query = mysql_query($sql) or die("<center><h1>OOOPS!<BR>Não é esta a pagina que você esperava ver?<BR> Então algo esta errado...</h1><a href='home.php' style='text-decoration: none'><font color='#FF7F00'>Você pode clicar na imagem para voltar</font><p><img border='0' src='img/cones.png' width='544' height='332'></a></p>O Erro de conexão com banco de dados esta descrito logo abaixo!<BR>".mysql_error());
$row = mysql_fetch_assoc($query);

$responsavel_obs_id						= $row['responsavel_obs_id'];
$responsavel_obs_responsavel_nome		= $row['responsavel_obs_responsavel_nome'];
$responsavel_obs_responsavel_id			= $row['responsavel_obs_responsavel_id'];
$responsavel_obs_visual					= $row['responsavel_obs_visual'];
$responsavel_obs_visual_qual			= $row['responsavel_obs_visual_qual'];
$responsavel_obs_auditiva				= $row['responsavel_obs_auditiva'];
$responsavel_obs_auditiva_qual      	= $row['responsavel_obs_auditiva_qual'];
$responsavel_obs_fisica					= $row['responsavel_obs_fisica'];
$responsavel_obs_fisica_qual          	= $row['responsavel_obs_fisica_qual'];
$responsavel_obs_movimento				= $row['responsavel_obs_movimento'];
$responsavel_obs_movimento_qual     	= $row['responsavel_obs_movimento_qual'];
$responsavel_obs_comportamento     		= $row['responsavel_obs_comportamento'];
$responsavel_obs_comportamento_qual		= $row['responsavel_obs_comportamento_qual'];
$responsavel_obs_fraldas				= $row['responsavel_obs_fraldas'];
$responsavel_obs_cadeira_rodas	        = $row['responsavel_obs_cadeira_rodas'];
$responsavel_obs_mencionar_prob_import	= $row['responsavel_obs_mencionar_prob_import'];


echo"<div id=div1>
<form id='cadastro' name='cadastro' method='post' action='adm_responsavel_obs_editar_motor.php'>
<input type='hidden' name='responsavel_obs_id' value='$responsavel_obs_id' size='3'><input type='hidden' name='responsavel_obs_responsavel_nome' value='$responsavel_obs_responsavel_nome' size='60'><input type='hidden' name='responsavel_obs_responsavel_id' value='$responsavel_obs_responsavel_id' size='3'>
<fieldset style='border-style: solid; border-width: 0px; background-color:#0000FF'>
<table border='0' width='100%' cellspacing='0' cellpadding='3'  bordercolor='#F0F0F0' height='0' style='border-collapse: collapse'> 
	<tr>
		<td height='1' width='1'>
			<center><img src=\"img/voltar.png\" title=\"Voltar\" onClick=\"javascript:window.history.go(-1);\" name=\"voltar\" width=\"20'\" height=\"20\">
		</td>
		<td>
			<center>Editando <B><I>observação</B></I> para <i><strong>$responsavel_obs_responsavel_nome</center></i></strong>
		</td>
		<td height='1' width='1'>
			<center><img src='img/obser.png' border='0' width='20' height='20' title='Foto'>
		</td>
	</tr>
</table></fieldset><br>
<fieldset style='border-style: solid; border-width: 0px; background-color:#F0F0F0'>
<center><strong><B>Você tem deficiência:</B></strong></center><pre>
Visual?			<select name='responsavel_obs_visual' id='responsavel_obs_visual'>
       			<option>$row[responsavel_obs_visual]</option>
        			<option value='Sim'>Sim</option>
        			<option value='Nao'>Não</option>
</select><input name='responsavel_obs_visual_qual' type='text' id='responsavel_obs_visual_qual' size='40' maxlength='70' value='$responsavel_obs_visual_qual' />
Auditiva?		<select name='responsavel_obs_auditiva' id='responsavel_obs_auditiva'>
       			<option>$row[responsavel_obs_auditiva]</option>
        			<option value='Sim'>Sim</option>
        			<option value='Nao'>Não</option>
</select><input name='responsavel_obs_auditiva_qual' type='text' id='responsavel_obs_auditiva_qual' size='40' maxlength='70' value='$responsavel_obs_auditiva_qual' />
Física?	 		<select name='responsavel_obs_fisica' id='responsavel_obs_fisica'>
       			<option>$row[responsavel_obs_fisica]</option>
        			<option value='Sim'>Sim</option>
        			<option value='Nao'>Não</option>
</select><input name='responsavel_obs_fisica_qual' type='text' id='responsavel_obs_fisica_qual' size='40' maxlength='70' value='$responsavel_obs_fisica_qual' />
Nos Movimentos?		<select name='responsavel_obs_movimento' id='responsavel_obs_movimento'>
       			<option>$row[responsavel_obs_movimento]</option>
        			<option value='Sim'>Sim</option>
        			<option value='Nao'>Não</option>
</select><input name='responsavel_obs_movimento_qual' type='text' id='responsavel_obs_movimento_qual' size='40' maxlength='70' value='$responsavel_obs_movimento_qual' />
De Comportamento?	<select name='responsavel_obs_comportamento' id='responsavel_obs_comportamento'>
       			<option>$row[responsavel_obs_comportamento]</option>
        			<option value='Sim'>Sim</option>
        			<option value='Nao'>Não</option>
</select><input name='responsavel_obs_comportamento_qual' type='text' id='responsavel_obs_comportamento_qual' size='40' maxlength='70' value='$responsavel_obs_comportamento_qual' />
Usa Fraldas?		<select name='responsavel_obs_fraldas' id='responsavel_obs_fraldas'>
       			<option>$row[responsavel_obs_fraldas]</option>
        			<option value='Sim'>Sim</option>
        			<option value='Nao'>Não</option>
</select>
Usa cadeira de rodas?	<select name='responsavel_obs_cadeira_rodas' id='responsavel_obs_cadeira_rodas'>
       			<option>$row[responsavel_obs_cadeira_rodas]</option>
        			<option value='Sim'>Sim</option>
        			<option value='Nao'>Não</option>
</select>
</fieldset><p>
<fieldset style='border-style: solid; border-width: 0px; background-color:#F0F0F0'>
<center><strong><B>Observações:</B></strong></center><pre>
<textarea name=responsavel_obs_mencionar_prob_import id=responsavel_obs_mencionar_prob_import rows='7' cols='89' placeholder='Ex:Outras informações referente ao responsavel' >$responsavel_obs_mencionar_prob_import</textarea>
</fieldset><p>
<fieldset style='border-style: solid; border-width: 0px; background-color:#F0F0F0'>
<center><strong><B>Opções</B></strong></center>  
<table border='0' width='100%' cellspacing='0' cellpadding='3'  bordercolor='#FFFFFF' height='0' style='border-collapse: collapse'> 
	<tr>
		<td align=center bgcolor=#FFFFFF><font color='#0000FF'>Tem certeza que deseja editar a <b>observação</b> para <b>$responsavel_nome</b>?</b></font><br></td>	
	</tr>	
	<tr>
		<td align='center'>
<input type='image' src='img/edit.png' name='Concluir Cadastro'  id='button' value='Concluir Cadastro' width='20' height='20'/>
		</td>
	</tr>
</table></form></div>";

?>
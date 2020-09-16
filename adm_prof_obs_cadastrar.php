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
$id_select = $_GET['id']; //Recupera a variavel id para fazer o select
$sql = "SELECT * FROM professor_dados_pessoais where prof_id=$id_select"; //Faz o select de todos os registros
$query = mysql_query($sql) or die("<center><h1>OOOPS!<BR>Não é esta a pagina que você esperava ver?<BR> Então algo esta errado...</h1><a href='home.php' style='text-decoration: none'><font color='#FF7F00'>Você pode clicar na imagem para voltar</font><p><img border='0' src='img/cones.png' width='544' height='332'></a></p>O Erro de conexão com banco de dados esta descrito logo abaixo!<BR>".mysql_error());
$linha = mysql_fetch_assoc($query);

		$prof_ra				= $linha['prof_ra'];
		$prof_id				= $linha['prof_id'];
		$prof_nome				= $linha['prof_nome'];
		
echo"<div id=div1>
<form id='cadastro' name='cadastro' method='post' action='adm_prof_obs_cadastrar_motor.php'>
<input type='hidden' name='prof_obs_prof_nome' value='$linha[prof_nome]' size='60'><input type='hidden' name='prof_obs_prof_id' value='$linha[prof_id]' size='3'>
<fieldset style='border-style: solid; border-width: 1px; background-color:#FFA500'>
<table border='1' width='100%' cellspacing='0' cellpadding='3'  bordercolor='#FFF' height='0' style='border-collapse: collapse'> 
	<tr>
	<td height='1' width='1'>
			<center><img src=\"img/voltar.png\" title=\"Voltar\" onClick=\"javascript:window.history.go(-1);\" name=\"voltar\" width=\"20'\" height=\"20\">
		</td>
		<td>
			<center>Cadastrando <B><i>observação</i></B> para <i><strong>$prof_nome - $prof_ra</center></i></strong>
		</td>
		<td height='1' width='1'>
			<center><img src='img/obser.png' border='0' width='20' height='20' title='Foto'>
		</td>
	</tr>
</table>
</fieldset>
<fieldset style='border-style: solid; border-width: 1px; background-color:#F0F0F0'>
<legend><B>Deficiência:</B></legend><pre>
Visual?			<select name='prof_obs_visual' id='prof_obs_visual'>
       			<option>...</option>
        			<option value='Sim'>Sim</option>
        			<option value='Nao'>Não</option>
</select><input name='prof_obs_visual_qual' type='text' id='prof_obs_visual_qual' size='40' maxlength='70' placeholder='Qual?' />
Auditiva?		<select name='prof_obs_auditiva' id='prof_obs_auditiva'>
       			<option>...</option>
        			<option value='Sim'>Sim</option>
        			<option value='Nao'>Não</option>
</select><input name='prof_obs_auditiva_qual' type='text' id='prof_obs_auditiva_qual' size='40' maxlength='70' placeholder='Qual?' />
Física?	 		<select name='prof_obs_fisica' id='prof_obs_fisica'>
       			<option>...</option>
        			<option value='Sim'>Sim</option>
        			<option value='Nao'>Não</option>
</select><input name='prof_obs_fisica_qual' type='text' id='prof_obs_fisica_qual' size='40' maxlength='70' placeholder='Qual?' />
Nos Movimentos?		<select name='prof_obs_movimento' id='prof_obs_movimento'>
       			<option>...</option>
        			<option value='Sim'>Sim</option>
        			<option value='Nao'>Não</option>
</select><input name='prof_obs_movimento_qual' type='text' id='prof_obs_movimento_qual' size='40' maxlength='70' placeholder='Qual??' />
De Comportamento?	<select name='prof_obs_comportamento' id='prof_obs_comportamento'>
       			<option>...</option>
        			<option value='Sim'>Sim</option>
        			<option value='Nao'>Não</option>
</select><input name='prof_obs_comportamento_qual' type='text' id='prof_obs_comportamento_qual' size='40' maxlength='70' placeholder='Qual?' />
Usa Fraldas?		<select name='prof_obs_fraldas' id='prof_obs_fraldas'>
       			<option>...</option>
        			<option value='Sim'>Sim</option>
        			<option value='Nao'>Não</option>
</select>
Usa cadeira de rodas?	<select name='prof_obs_cadeira_rodas' id='prof_obs_cadeira_rodas'>
       			<option>...</option>
        			<option value='Sim'>Sim</option>
        			<option value='Nao'>Não</option>
        </select>
</fieldset>
<fieldset style='border-style: solid; border-width: 1px; background-color:#F0F0F0'><legend><B>Observações:</B></legend><pre>
<textarea name=prof_obs_mencionar_prob_import id=prof_obs_mencionar_prob_import placeholder='Ex:Outras informações relevantes' rows='6' cols='80' wrap='hard'></textarea>
</fieldset>
<fieldset style='border-style: solid; border-width: 1px; background-color:#F0F0F0'>
<legend><B>Opções</B></legend><table border='1' width='100%' cellspacing='0' cellpadding='3'  bordercolor='#FFFFFF' height='0' style='border-collapse: collapse'> 
	<tr>
		<td align=center bgcolor=#FFFFFF><font color='#FFA500'>Tem certeza que deseja cadastrar a <b>observação</b> para <b>$prof_nome</b>?</b></font><br></td>		</tr>
	<tr>
		<td align='center'>
			<input type='image' src='img/new.png' name='Concluir Cadastro'  id='button' value='Concluir Cadastro' width='20' height='20'/>
		</td>
	</tr>
</table>
</div>";
?>
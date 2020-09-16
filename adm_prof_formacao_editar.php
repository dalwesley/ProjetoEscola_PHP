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
$id_select1 = $_GET['id']; //Recupera a variavel id para fazer o select
$sql = "SELECT * FROM professor_dados_pessoais where prof_id=$id_select1"; //Faz o select de todos os registros
$query = mysql_query($sql) or die("<center><h1>OOOPS!<BR>Não é esta a pagina que você esperava ver?<BR> Então algo esta errado...</h1><a href='home.php' style='text-decoration: none'><font color='#FF7F00'>Você pode clicar na imagem para voltar</font><p><img border='0' src='img/cones.png' width='544' height='332'></a></p>O Erro de conexão com banco de dados esta descrito logo abaixo!<BR>".mysql_error());
$linha = mysql_fetch_assoc($query);

		$prof_ra				= $linha['prof_ra'];
		$prof_id				= $linha['prof_id'];
		$prof_nome				= $linha['prof_nome'];
?>
<?php
include ('conecta.php');

$id_select2 = $_GET['opcao']; //Recupera a variavel id para fazer o select
$date = date('Y-m-d');

$sql = "SELECT *, DATE_FORMAT(prof_formacao_data, '%d/%m/%Y') as 'prof_formacao_data' from professor_formacao where prof_formacao_id=$id_select2 ORDER BY prof_formacao_curso_data_inicio"; //Faz o select de todos os registros
$query = mysql_query($sql) or die("<center><h1>OOOPS!<BR>Não é esta a pagina que você esperava ver?<BR> Então algo esta errado...</h1><a href='home.php' style='text-decoration: none'><font color='#FF7F00'>Você pode clicar na imagem para voltar</font><p><img border='0' src='img/cones.png' width='544' height='332'></a></p>O Erro de conexão com banco de dados esta descrito logo abaixo!<BR>".mysql_error());
$linha = mysql_fetch_assoc($query);

	$prof_formacao_id	 				= $linha['prof_formacao_id'];
	$prof_formacao_prof_id 				= $linha['prof_formacao_prof_id'];
	$prof_formacao_prof_nome 			= $linha['prof_formacao_prof_nome'];
	$prof_formacao_instituicao 			= $linha['prof_formacao_instituicao'];
	$prof_formacao_curso_tipo			= $linha['prof_formacao_curso_tipo'];
	$prof_formacao_curso				= $linha['prof_formacao_curso'];
	$prof_formacao_curso_data_inicio	= $linha['prof_formacao_curso_data_inicio'];
	$prof_formacao_curso_data_fim		= $linha['prof_formacao_curso_data_fim'];
	$prof_formacao_op 					= $linha['prof_formacao_op'];
	$prof_formacao_diretor 				= $linha['prof_formacao_diretor'];
	$prof_formacao_data					= $linha['prof_formacao_data'];


echo"<div id=div1>
<form id='cadastro' name='cadastro' method='post' action='adm_prof_formacao_editar_motor.php'>
<fieldset style='border-style: solid; border-width: 1px; background-color:#0000FF'>
<table border='0' width='100%' cellspacing='0' cellpadding='3'  bordercolor='#0000FF' height='0' style='border-collapse: collapse'> 
	<tr>
	<td height='1' width='1'>
			<center><img src=\"img/voltar.png\" title=\"Voltar\" onClick=\"javascript:window.history.go(-1);\" name=\"voltar\" width=\"20'\" height=\"20\">
		</td>
		<td>
			<center>Editando <B><i>formação</i></B> para <i><strong>$prof_nome - $prof_ra</center></i></strong>
		</td>
		<td height='1' width='1'>
			<center><img src='img/obser.png' border='0' width='20' height='20' title='Foto'>
		</td>
	</tr>
</table>
</fieldset>
<input type='hidden' name='prof_formacao_prof_id' id='prof_formacao_prof_id' value='$prof_formacao_prof_id' size='3'><input type='hidden' name='prof_formacao_id' id='prof_formacao_id' value='$prof_formacao_id' size='3'>
<fieldset style='border-style: solid; border-width: 1px; background-color:#F0F0F0'>
<legend><B>Movimentação</B></legend><pre>
Instituição:	<input type='text' name='prof_formacao_instituicao' id='prof_formacao_instituicao' size='60' value='$prof_formacao_instituicao'>
Tipo:		<select name='prof_formacao_curso_tipo' id='prof_formacao_curso_tipo'>
				<option>$prof_formacao_curso_tipo</option>
				<option value=Graduação>Graduação</option>
				<option value=Pós-Graduação>Pós-Graduação</option>
				<option value=Extensão>Extensão</option>
				<option value=Licensiatura>Licensiatura</option>
				<option value=Doutorado>Doutorado</option>
				<option value=Pós-Doutorado>Pós-Doutorado</option>
			</select>
Curso:		<select name='prof_formacao_curso' id='prof_formacao_curso'>
				<option>$prof_formacao_curso</option>
				<option value=Português>Português</option>
				<option value=Matemática>Matemática</option>
				<option value=História>História</option>
				<option value=Geografia>Geografia</option>
				<option value=Física>Física</option>
				<option value=Quimica>Quimica</option>
			</select>
Periodo:	<input type='date' name='prof_formacao_curso_data_inicio' id='prof_formacao_curso_data_inicio' value='$prof_formacao_curso_data_inicio'> à <input type='date' name='prof_formacao_curso_data_fim' id='prof_formacao_curso_data_fim' value='$prof_formacao_curso_data_inicio'>
		</pre>
</fieldset>
<fieldset style='border-style: solid; border-width: 1px; background-color:#F0F0F0'>
<legend><B>Responsáveis</B></legend><pre>
Professor :	<input type='text' name='prof_formacao_prof_nome' id='prof_formacao_prof_nome' value='$prof_formacao_prof_nome'/>
Orientador:	<input type='text' id='prof_formacao_op' name='prof_formacao_op' value='$_SESSION[UsuarioNome]' size='70' readonly>
Diretor(a):	<input name='prof_formacao_diretor' type='text' id='prof_formacao_diretor' size='70' maxlength='60' value='$prof_formacao_diretor'/>
Data Cadastro:  <input type='date' name='es_data' id='es_data' value='$date'>
</fieldset>
<fieldset style='border-style: solid; border-width: 1px; background-color:#F0F0F0'>
<legend><B>Opções</B></legend>  
<table border='1' width='100%' cellspacing='0' cellpadding='3'  bordercolor='#F0F0F0' height='0' style='border-collapse: collapse'> 
	<tr>
		<td align=center bgcolor=#FFFFFF><font color='#0000FF'><b>Tem certeza que deseja EDITAR a formação do Professor(a) $prof_nome?</b></font>
		</td>
	</tr>	
	<tr>
		<td align='center'>
<input name='editar' type='submit' id='editar' value='Editar' />
		</td>
	</tr>
</table></form></div>";

?>

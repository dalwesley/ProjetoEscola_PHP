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

$sql = "SELECT *, DATE_FORMAT(prof_disciplina_data, '%d/%m/%Y') as 'prof_disciplina_data' from professor_disciplina where prof_disciplina_prof_id=$id_select2 ORDER BY prof_disciplina_nome, prof_disciplina_serie"; //Faz o select de todos os registros
$query = mysql_query($sql) or die("<center><h1>OOOPS!<BR>Não é esta a pagina que você esperava ver?<BR> Então algo esta errado...</h1><a href='home.php' style='text-decoration: none'><font color='#FF7F00'>Você pode clicar na imagem para voltar</font><p><img border='0' src='img/cones.png' width='544' height='332'></a></p>O Erro de conexão com banco de dados esta descrito logo abaixo!<BR>".mysql_error());
$linha = mysql_fetch_assoc($query);


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

echo"<div id=div1>
<form id='cadastro' name='cadastro' method='post' action='adm_prof_disciplina_editar_motor.php'>
<fieldset style='border-style: solid; border-width: 1px; background-color:#0000FF'>
<table border='1' width='100%' cellspacing='0' cellpadding='3'  bordercolor='#FFF' height='0' style='border-collapse: collapse'> 
	<tr>
	<td height='1' width='1'>
			<center><img src=\"img/voltar.png\" title=\"Voltar\" onClick=\"javascript:window.history.go(-1);\" name=\"voltar\" width=\"20'\" height=\"20\">
		</td>
		<td>
			<center>Editando <B><i>disciplina</i></B> para <i><strong>$prof_nome - $prof_ra</center></i></strong>
		</td>
		<td height='1' width='1'>
			<center><img src='img/obser.png' border='0' width='20' height='20' title='Foto'>
		</td>
	</tr>
</table>
</fieldset>
<input type='hidden' name='prof_disciplina_prof_id' id='prof_disciplina_prof_id' value='$prof_disciplina_prof_id' size='3'><input type='hidden' name='prof_disciplina_id' id='prof_disciplina_id' value='$prof_disciplina_id' size='3'>
<fieldset style='border-style: solid; border-width: 1px; background-color:#F0F0F0'><legend><B>Movimentação</B></legend><pre>
Disciplina: <select name='prof_disciplina_nome' id='prof_disciplina_nome'>
       					<option>$linha[prof_disciplina_nome]</option>
        				<option value='Português'>Português</option>
        				<option value='Matemática'>Matemática</option>
        				<option value='História'>História</option>
        				<option value='Geografia'>Geografia</option>
        				<option value='Física'>Física</option>
        				<option value='Quimica'>Quimica</option></select>	Ano Civil:  <input type='number' min='1' max='3000' step='1' name='disciplina_ano_civil' id='disciplina_ano_civil' value='$linha[disciplina_ano_civil]'>
Série:	    <input type='number' min='1' max='9' step='1' name='disciplina_serie' id='disciplina_serie' value='$linha[disciplina_serie]'>		Turma:      <select name='disciplina_turma' id='disciplina_turma' >
       					<option>$linha[disciplina_turma]</option>
        				<option value='A'>A</option>
        				<option value='B'>B</option>
        				<option value='C'>C</option>
        				<option value='D'>D</option>
        				<option value='E'>E</option>
        				<option value='F'>F</option>
        				<option value='G'>G</option>
        				<option value='H'>H</option>
        				<option value='I'>I</option>
        			</select>
</fieldset>
<fieldset style='border-style: solid; border-width: 1px; background-color:#F0F0F0'>
<legend><B>Responsáveis</B></legend><pre>
Professor :	<input type='text' name='disciplina_prof_nome' id='disciplina_prof_nome' value='$prof_nome'/>
Orientador:	<input type='text' id='disciplina_op' name='disciplina_op' value='$_SESSION[UsuarioNome]' size='70' readonly>
Diretor(a):	<input name='disciplina_diretor' type='text' id='disciplina_diretor' size='70' maxlength='60' value='$_SESSION[UsuarioNome]'/>
Data Cadastro:  <input type='date' name='es_data' id='es_data' value='$date'>
</fieldset>
<fieldset style='border-style: solid; border-width: 1px; background-color:#F0F0F0'>
<legend><B>Opções</B></legend>  
<table border='1' width='100%' cellspacing='0' cellpadding='3'  bordercolor='#FFFFFF' height='0' style='border-collapse: collapse'> 
	<tr>
		<td align=center bgcolor=#FFFFFF><font color='#0000FF'><b>Tem certeza que deseja EDITAR a Disciplina do Professor(a) $prof_nome?</b></font>
		</td>
	</tr>	
	<tr>
		<td align='center'>
<input name='editar' type='submit' id='editar' value='Editar' />
		</td>
	</tr>
</table></form></div>";

?>

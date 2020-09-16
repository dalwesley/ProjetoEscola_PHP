<?php
include "seguranca_3.php";
?>
<script type="text/javascript">
function adicionarUsuario()
{
var local=document.getElementById('usuario');
var tblBody = local.tBodies[0];
var newRow = tblBody.insertRow(-1);
var indice = newRow.rowIndex;

var newCell0 = newRow.insertCell(0);
newCell0.innerHTML = '<td><pre>  Série:<input type=number min=1 max=9 step=1 value=0 name=prof_disciplina_serie[] id=prof_disciplina_serie></pre></td>';

var newCell2 = newRow.insertCell(1);
newCell2.innerHTML = '<td><pre>  Turma:<select name=prof_disciplina_turma[] id=prof_disciplina_turma><option>Turna</option><option value=A>A</option><option value=B>B</option><option value=C>C</option><option value=D>D</option><option value=E>E</option><option value=F>F</option><option value=G>G</option><option value=H>H</option><option value=I>I</option></select></pre></td>';

}
</script>
<style type="text/css">

#div1 {
 
        width:100%; /* Tamanho da Largura da Div */
	height:100%; /* Tamanho da Altura da Div */
        top:0; 
        margin-top:0%; /* ou seja ele pega 50% da altura tela e sobe metade do valor da altura no caso 100 */
        left:0%;
       margin-left:0%; /* ou seja ele pega 50% da largura tela e diminui  metade do valor da largura no caso 250 */
 
}
</style>

<?php
include ('conecta.php');

$date_ano = date('Y');
$date = date('Y-m-d');
$id_select = $_GET['id']; //Recupera a variavel id para fazer o select

$sql = "SELECT * FROM professor_dados_pessoais where prof_id=$id_select"; //Faz o select de todos os registros
$query = mysql_query($sql) or die("<center><h1>OOOPS!<BR>Não é esta a pagina que você esperava ver?<BR> Então algo esta errado...</h1><a href='home.php' style='text-decoration: none'><font color='#FF7F00'>Você pode clicar na imagem para voltar</font><p><img border='0' src='img/cones.png' width='544' height='332'></a></p>O Erro de conexão com banco de dados esta descrito logo abaixo!<BR>".mysql_error());
$linha = mysql_fetch_assoc($query);


		$prof_id				= $linha['prof_id'];
		$prof_nome				= $linha['prof_nome'];
		$prof_ra				= $linha['prof_ra'];

echo"<div id=div1>
<form method='post' action='adm_prof_disciplina_cadastrar_motor.php'>
<fieldset style='border-style: solid; border-width: 1px; background-color:#FFA500'>
<table border='1' width='100%' cellspacing='0' cellpadding='3'  bordercolor='#FFF' height='0' style='border-collapse: collapse'> 
	<tr>
	<td height='1' width='1'>
			<center><img src=\"img/voltar.png\" title=\"Voltar\" onClick=\"javascript:window.history.go(-1);\" name=\"voltar\" width=\"20'\" height=\"20\">
		</td>
		<td>
			<center>Cadastrando <B><i>disciplina</i></B> para <i><strong>$prof_nome - $prof_ra</center></i></strong>
		</td>
		<td height='1' width='1'>
			<center><img src='img/obser.png' border='0' width='20' height='20' title='Foto'>
		</td>
	</tr>
</table>
</fieldset>
<form method='post' action='adm_prof_disciplina_cadastrar_motor.php'>
<input type='hidden' name='prof_disciplina_prof_id'  id='prof_disciplina_prof_id' value='$prof_id'/><input type=hidden value=$date_ano name=prof_disciplina_ano_civil id=prof_disciplina_ano_civil>
<fieldset style='border-style: solid; border-width: 1px; background-color:#F0F0F0'>
<legend><B>Disciplina</B></legend>
<table id='usuario' border='1' width='100%' cellspacing='0' cellpadding='3'  bordercolor='#FFF' height='0' style='border-collapse: collapse'>
<tbody>
	<tr>
		<td colspan='4'><center>Selecione a Matéria a ser lecionada:
			<select name=prof_disciplina_nome id=prof_disciplina_nome>
				<option>Disciplina</option>
				<option value=Português>Português</option>
				<option value=Matemática>Matemática</option>
				<option value=História>História</option>
				<option value=Geografia>Geografia</option>
				<option value=Física>Física</option>
				<option value=Quimica>Quimica</option>
			</select>
		</td>
	</tr>
</tbody>
</table><br>
<table id='usuario' border='0' width='100%' cellspacing='0' cellpadding='3'  bordercolor='#FFF' height='0' style='border-collapse: collapse'>
	<tr>
		<td rowspan='100'>
					<center><img src=\"img/sinal_de_mais.png\" title=\"Voltar\" onClick=\"adicionarUsuario();\" name=\"voltar\" width=\"20'\" height=\"20\">
		</td>
	</tr>
</table>
</fieldset>
</fieldset>
<fieldset style='border-style: solid; border-width: 1px; background-color:#F0F0F0'>
<legend><B>Responsáveis</B></legend><pre>
Professor :	<input type='text' name='prof_disciplina_prof_nome' id='prof_disciplina_prof_nome' value='$prof_nome'/>
Orientador:	<input type='text' id='prof_disciplina_op' name='prof_disciplina_op' value='$_SESSION[UsuarioNome]' size='70' readonly>
Diretor(a):	<input name='prof_disciplina_diretor' type='text' id='prof_disciplina_diretor' size='70' maxlength='60' value='$_SESSION[UsuarioNome]'/>
Data Cadastro:  <input type='date' name='es_data' id='es_data' value='$date'>
</fieldset>
<fieldset style='border-style: solid; border-width: 1px; background-color:#F0F0F0'>
<legend><B>Opções</B></legend><table border='1' width='100%' cellspacing='0' cellpadding='3'  bordercolor='#FFFFFF' height='0' style='border-collapse: collapse'> 
	<tr>
		<td align=center bgcolor=#FFFFFF><font color='#FFA500'>Tem certeza que deseja cadastrar a(s) <b>disciplina(s)</b> para <b>$prof_nome</b>?</b></font><br></td>	
	</tr>
	<tr>
		<td align='center'>
			<input type='image' src='img/new.png' name='Concluir Cadastro'  id='submit' value='Enviar' width='20' height='20'/>
		</td>
	</tr>
</table>
</div>
</form>";

?>


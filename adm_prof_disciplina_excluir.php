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
include "conecta.php";
$id_select1 = $_GET['id']; //Recupera a variavel id para fazer o select
$sql = "SELECT * FROM professor_dados_pessoais where prof_id=$id_select1"; //Faz o select de todos os registros
$query = mysql_query($sql) or die("<center><h1>OOOPS!<BR>Não é esta a pagina que você esperava ver?<BR> Então algo esta errado...</h1><a href='home.php' style='text-decoration: none'><font color='#FF7F00'>Você pode clicar na imagem para voltar</font><p><img border='0' src='img/cones.png' width='544' height='332'></a></p>O Erro de conexão com banco de dados esta descrito logo abaixo!<BR>".mysql_error());
$row = mysql_fetch_assoc($query);

		$prof_ra				= $row['prof_ra'];
		$prof_id				= $row['prof_id'];
		$prof_nome				= $row['prof_nome'];
		$prof_foto				= $row['prof_foto'];
?>
<?php
include "conecta.php";
$id_select2 = $_GET['opcao']; //Recupera a variavel id para fazer o select
$sql = mysql_query("SELECT * from disciplina where disciplina_id=$id_select2");
$result = mysql_num_rows($sql);

if($result>=1) {

    while($linha = mysql_fetch_array($sql)) {

$disciplina_id						= $linha['disciplina_id'];
$disciplina_nome					= $linha['disciplina_nome'];
$disciplina_prof_nome				= $linha['disciplina_prof_nome'];
$disciplina_prof_id					= $linha['disciplina_prof_id'];
$disciplina_ano_civil				= $linha['disciplina_ano_civil'];
$disciplina_serie					= $linha['disciplina_serie'];
$disciplina_turma					= $linha['disciplina_turma'];
$disciplina_op						= $linha['disciplina_op'];
$disciplina_diretor					= $linha['disciplina_diretor'];
$disciplina_data					= $linha['disciplina_data'];

echo "<div id=div1>
		<form id='excluir' name='excluir' method='post' action='adm_prof_disciplina_excluir_motor.php' enctype='multipart/form-data'>
<fieldset style='border-style: solid; border-width: 1px; background-color:#FF0000'>
<table border='1' width='100%' cellspacing='0' cellpadding='3'  bordercolor='#FFF' height='0' style='border-collapse: collapse'> 
	<tr>
	<td height='1' width='1'>
			<center><img src=\"img/voltar.png\" title=\"Voltar\" onClick=\"javascript:window.history.go(-1);\" name=\"voltar\" width=\"20'\" height=\"20\">
		</td>
		<td>
			<center>Excluindo <B><i>disciplina</i></B> para <i><strong>$prof_nome - $prof_ra</center></i></strong>
		</td>
		<td height='1' width='1'>
			<center><img src='img/obser.png' border='0' width='20' height='20' title='Foto'>
		</td>
	</tr>
</table>
</fieldset>
<fieldset style='border-style: solid; border-width: 1px; background-color:#F0F0F0'>
<legend><B>Excluir: $disciplina_nome</B></legend>
<table border='1' width='100%' cellspacing='0' cellpadding='3'  bordercolor='#FFF' height='0' style='border-collapse: collapse'> 
<tr>
	<td align='center' bgcolor='#FFF'><img src='img/checked.png' border='0' width='20' height='20' title='Selecione'></td>
	<td align='center' bgcolor='#FFF'><B>Dados da Exclusão</B></td>
</tr>
	<td align='center'><input type='checkbox' name='cod[]' value=$linha[disciplina_id] required/>
	</td>
	<td><pre>
Disciplina:	$disciplina_nome
Ano Civil:	$linha[disciplina_ano_civil]	Série:  $linha[disciplina_serie]		Turma:  $linha[disciplina_turma]
Orientador:	$disciplina_op
Diretor(a):	$disciplina_diretor
</td>
</tr>
</table>";
}
echo"</fieldset>
<fieldset style='border-style: solid; border-width: 1px; background-color:#F0F0F0'><legend><B>Opções</B></legend>  
<table border='1' width='100%' cellspacing='0' cellpadding='3'  bordercolor='#FFFFFF' height='0' style='border-collapse: collapse'> 
	<tr>
		<td align=center bgcolor=#FFFFFF><font color='#FF0000'>Tem certeza que deseja <b>EXCLUIR a Disciplina</b> do(a) $disciplina_prof_nome?</font><br></td>
	</tr>	
	<tr>
		<td align='center'>
<input type='submit' value='Excluir'>
		</td>
	</tr>
</table></form></div>";
}
else{
    echo "<div id=div2>
    <center><h1>OPA!<BR>Não era bem isso que deveria aparecer!<BR> Então algo esta errado...</h1><a href=home.php style=text-decoration: none><font color=#FF7F00>Você pode clicar na imagem para voltar</font><p><img border='0' src='img/cones.png' width='544' height='332'></a></div>";
}
?>
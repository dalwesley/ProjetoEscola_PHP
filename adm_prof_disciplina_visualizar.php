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
 
}	#div2 {
			width:100%; /* Tamanho da Largura da Div */
			height:20%; /* Tamanho da Altura da Div */
    		top:0; 
    		margin-top:40%; /* ou seja ele pega 50% da altura tela e sobe metade do valor da altura no caso 100 */
    		left:0%;
    		margin-left:0; /* ou seja ele pega 50% da largura tela e diminui  metade do valor da largura no caso 250 */
 
}

</style>
</head>
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
$sql = mysql_query("SELECT * from disciplina where disciplina_prof_id=$id_select");
$result = mysql_num_rows($sql);

if($result>=1) {

echo"<div id=div1>
<fieldset style='border-style: solid; border-width: 1px; background-color:#32CD32'>
<table border='1' width='100%' cellspacing='0' cellpadding='3'  bordercolor='#F0F0F0' height='0' style='border-collapse: collapse'> 
	<tr><td align=center>
<center>Exibindo <B><i>Disciplina do Professor(a)</i></B> para <i><strong> $prof_nome - $prof_ra </center></i></strong>
</td></tr>
</table></fieldset>";
	
	    while($linha = mysql_fetch_array($sql)) {
$disciplina_id						= $linha['disciplina_id'];
$disciplina_nome					= $linha['disciplina_nome'];
$disciplina_prof_nome				= $linha['disciplina_prof_nome'];
$disciplina_prof_id					= $linha['disciplina_prof_id'];
$disciplina_ano_civil				= $linha['disciplina_ano_civil'];
$disciplina_serie					= $linha['disciplina_serie'];
$disciplina_turma					= $linha['disciplina_turma'];
$disciplina_secretario				= $linha['disciplina_secretario'];
$disciplina_diretor					= $linha['disciplina_diretor'];
$disciplina_data					= $linha['disciplina_data'];
	
echo"<fieldset style='border-style: solid; border-width: 1px; background-color:#F0F0F0'><legend><B>Disciplina: $disciplina_nome</B></legend>
<table border='1' width='100%' cellspacing='0' cellpadding='3'  bordercolor='#FFF' height='0' style='border-collapse: collapse'>
	<tr><td rowspan='2'><pre>
Ano Civil:  <B>$linha[disciplina_ano_civil]</B>	Série:  <B>$linha[disciplina_serie]</B>	Turma:  <B>$linha[disciplina_turma]</B>
Secretário: <B>$_SESSION[UsuarioNome]</B>
Diretor(a): <B>$linha[disciplina_diretor]</B>
</td>
		<td align='center'><pre>
<B>Editar
<a href='adm_prof_disciplina_editar.php?id=$disciplina_prof_id&&opcao=$disciplina_id' style='text-decoration: none'><img src='img/edit.png' border='0' width='24' height='24' title='Editar Matrícula'></a></td>
		</td>
	</tr>
	<tr>
		<td align='center'><pre>
<B>Excluir
<a href='adm_prof_disciplina_excluir.php?id=$disciplina_prof_id&&opcao=$disciplina_id' style='text-decoration: none'><img src='img/delete.png' border='0' width='24' height='24' title='Excluir Matrícula'></a></td>
		</td>
	</tr>
	</table>
</pre>
</fieldset>";

    }
echo"</fieldset></fieldset>
<fieldset style='border-style: solid; border-width: 1px; background-color:#F0F0F0'><legend><B>Opções</B></legend>  
<table border='1' width='100%' cellspacing='0' cellpadding='3'  bordercolor='#FFFFFF' height='0' style='border-collapse: collapse'> 
	<tr>
		<td align=center bgcolor=#FFFFFF><b>Cadastrar<br></td>
	</tr>	
	<tr>
		<td align='center'>
			<a href='adm_prof_disciplina_cadastrar.php?id=$disciplina_prof_id' style='text-decoration: none'>
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
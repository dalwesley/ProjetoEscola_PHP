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
			height:10%; /* Tamanho da Altura da Div */
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
$sql = "SELECT * FROM dados_pessoais_aluno where aluno_id=$id_select"; //Faz o select de todos os registros
$query = mysql_query($sql) or die("<center><h1>OOOPS!<BR>Não é esta a pagina que você esperava ver?<BR> Então algo esta errado...</h1><a href='home.php' style='text-decoration: none'><font color='#FF7F00'>Você pode clicar na imagem para voltar</font><p><img border='0' src='img/cones.png' width='544' height='332'></a></p>O Erro de conexão com banco de dados esta descrito logo abaixo!<BR>".mysql_error());
$linha = mysql_fetch_assoc($query);

		$aluno_ra					= $linha['aluno_ra'];
		$aluno_id					= $linha['aluno_id'];
		$aluno_nome					= $linha['aluno_nome'];
?>

<?php
include "conecta.php";
$id_select = $_GET['id']; //Recupera a variavel id para fazer o select
$sql = mysql_query("SELECT * from classificacao where class_aluno_id=$id_select");
$result = mysql_num_rows($sql);
$valor = 0;	

if($result>=1) {

echo"<div id=div1>
<fieldset style='border-style: solid; border-width: 1px; background-color:#32CD32'>
<table border='1' width='100%' cellspacing='0' cellpadding='3'  bordercolor='#F0F0F0' height='0' style='border-collapse: collapse'> 
	<tr>
		<td height='1' width='1'>
			<center><img src='img/voltar.png' border='0' width='20' height='20' title='Voltar'>
		</td>
		<td>
			<center>Exibindo <B><i>Classificação</i></B> para <i><strong> $aluno_nome - $aluno_ra </center></i></strong>
		</td>
		<td height='1' width='1'>
			<center><img src='img/obser.png' border='0' width='20' height='20' title='Foto'>
		</td>
	</tr>
</table></fieldset>";

	    while($linha = mysql_fetch_array($sql)) {

$class_id						= $linha['class_id'];	    
$class_responsavel				= $linha['class_responsavel'];
$class_secretario				= $linha['class_secretario'];
$class_diretor					= $linha['class_diretor'];
$class_pela_comp_data			= $linha['class_pela_comp_data'];
$class_pela_comp_para_o_ano		= $linha['class_pela_comp_para_o_ano'];
$reclass_pela_comp_data			= $linha['reclass_pela_comp_data'];
$reclass_pela_comp_para_ano		= $linha['reclass_pela_comp_para_ano'];
$reclass_pelo_conselho_data		= $linha['reclass_pelo_conselho_data'];
$reclass_pelo_conselho_ano		= $linha['reclass_pelo_conselho_ano'];
$class_aluno_id					= $linha['class_aluno_id'];
$class_aluno_nome				= $linha['class_aluno_nome'];

$valor++;	

echo"
<fieldset style='border-style: solid; border-width: 1px; background-color:#F0F0F0'>
<legend><B>Classificação nº: $valor</B></legend>
	<table border='1' width='100%' cellspacing='0' cellpadding='3'  bordercolor='#FFF' height='0' style='border-collapse: collapse'> 
	<tr><td rowspan='2'><pre>
Nome:	<B>$class_aluno_nome</B>	R.A:<B>$aluno_ra</B><br>
Classificação através de Avaliação de Competência em:	<B>$class_pela_comp_data</B> para o <B>$class_pela_comp_para_o_ano</B> ano.
Reclassificação através de Avaliação de Competência em:	<B>$reclass_pela_comp_data</B> para o <B>$reclass_pela_comp_para_ano</B> ano.
Reclassificação por decisão do Conselho de Classe:	<B>$reclass_pelo_conselho_data</B> para o <B>$reclass_pelo_conselho_ano</B> ano.

Responsavel:	<B>$class_responsavel</B>
Secretário: 	<B>$_SESSION[UsuarioNome]</B>
Diretor(a):	<B>$class_diretor</B>
		</td>
<td align='center'><pre><B>Editar
<a href='adm_aluno_classificacao_editar.php?id=$class_aluno_id&&opcao=$class_id' style='text-decoration: none'><img src='img/edit.png' border='0' width='24' height='24' title='Editar Matrícula'></a></td></tr>
</tr>
<tr>
<td align='center'><pre><B>Excluir
<a href='adm_aluno_classificacao_excluir.php?id=$class_aluno_id&&opcao=$class_id' style='text-decoration: none'><img src='img/delete.png' border='0' width='24' height='24' title='Excluir Matrícula'></a></td></tr>
</table>
</pre>
</fieldset>";

    }
echo"</fieldset>
<fieldset style='border-style: solid; border-width: 1px; background-color:#F0F0F0'><legend><B>Opções</B></legend>  
<table border='1' width='100%' cellspacing='0' cellpadding='3'  bordercolor='#FFFFFF' height='0' style='border-collapse: collapse'> 
	<tr>
		<td align=center bgcolor=#FFFFFF><b>Cadastrar<br></td>
	</tr>	
	<tr>
		<td align='center'>
			<a href='adm_aluno_classificacao_cadastrar.php?id=$class_aluno_id' style='text-decoration: none'>
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
		<br><i><strong>".$linha['aluno_nome']."</i></strong> sem Classificação cadastrada!<br><br>
		</td>
	</tr>
	<tr>
		<td align='center'>
			<b>Cadastrar<br>
			<a href='adm_aluno_classificacao_cadastrar.php?id=$aluno_id' style='text-decoration: none'>
			<img src='img/new.png' border='0' width='24' height='24' title='Cadastrar'></a>
		</td>
	</tr>
</table>
</fieldset>
</div>";
}
?>
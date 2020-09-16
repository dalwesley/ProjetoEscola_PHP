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
$sql = "SELECT * FROM dados_pessoais_aluno where aluno_id=$id_select"; //Faz o select de todos os registros
$query = mysql_query($sql) or die("<center><h1>OOOPS!<BR>Não é esta a pagina que você esperava ver?<BR> Então algo esta errado...</h1><a href='home.php' style='text-decoration: none'><font color='#FF7F00'>Você pode clicar na imagem para voltar</font><p><img border='0' src='img/cones.png' width='544' height='332'></a></p>O Erro de conexão com banco de dados esta descrito logo abaixo!<BR>".mysql_error());
$linha = mysql_fetch_assoc($query);

		$aluno_ra				= $linha['aluno_ra'];
		$aluno_id				= $linha['aluno_id'];
		$aluno_nome				= $linha['aluno_nome'];
?>

<?php
include "conecta.php";
$id_select = $_GET['id']; //Recupera a variavel id para fazer o select
$sql = mysql_query("SELECT * from matricula where matricula_aluno_id=$id_select");
$result = mysql_num_rows($sql);

if($result>=1) {

echo"<div id=div1>
<fieldset style='border-style: solid; border-width: 1px; background-color:#32CD32'>
<table border='1' width='100%' cellspacing='0' cellpadding='3'  bordercolor='#F0F0F0' height='0' style='border-collapse: collapse'> 
	<tr>
		<td height='1' width='1'>
			<center><a href='javascript:window.history.go(-1)'><img src='img/voltar.png' border='0' width='20' height='20' title='Voltar'></a>		</td>
		</td>
		<td>
			<center>Exibindo <B><i>Matricula</i></B> para <i><strong> $aluno_nome - $aluno_ra </center></i></strong>
		</td>
		<td height='1' width='1'>
			<center><img src='img/obser.png' border='0' width='20' height='20' title='Foto'>
		</td>
	</tr>
</table></fieldset>";

	    while($linha = mysql_fetch_array($sql)) {
$matricula_id	    		= $linha['matricula_id'];
$matricula_aluno_id			= $linha['matricula_aluno_id'];
$matricula_aluno_nome		= $linha['matricula_aluno_nome'];
$matricula_aceito_normas	= $linha['matricula_aceito_normas'];
$matricula_ano_civil		= $linha['matricula_ano_civil'];
$matricula_ano_letivo		= $linha['matricula_ano_letivo'];
$matricula_tipo_ensino		= $linha['matricula_tipo_ensino'];
$matricula_data				= $linha['matricula_data'];
$matricula_turno_ano		= $linha['matricula_turno_ano'];
$matricula_turno_turma		= $linha['matricula_turno_turma'];
$matricula_numero_chamada	= $linha['matricula_numero_chamada'];
$matricula_idade			= $linha['matricula_idade'];
$matricula_situacao_aluno	= $linha['matricula_situacao_aluno'];
$matricula_situacao_data	= $linha['matricula_situacao_data'];	
$matricula_responsavel		= $linha['matricula_responsavel'];
$matricula_secretario		= $linha['matricula_secretario'];
$matricula_diretor			= $linha['matricula_diretor'];

	
echo"<fieldset style='border-style: solid; border-width: 1px; background-color:#F0F0F0'>
<legend><B>Ano Civil: $matricula_ano_civil</B></legend>
<table border='1' width='100%' cellspacing='0' cellpadding='3'  bordercolor='#FFF' height='0' style='border-collapse: collapse'> 
<tr><td rowspan='2'><pre>
Solicitou matricula no: <B>$matricula_ano_letivo</B> do Ensino: <B>$matricula_tipo_ensino</B> em <B>$matricula_data</B>

Série: <B>$matricula_turno_ano</B>    Turma: <B>$matricula_turno_turma</B>    Nº Chamada: <B>$matricula_numero_chamada</B>    Idade: <B>$matricula_idade</B>
		
Situação do aluno na Escola: <B>$matricula_situacao_aluno</B> em <B>$matricula_situacao_data</B>

Declarou acatar as normas desse Estabelecimento de Ensino: <B>$matricula_aceito_normas</B>

Responsável:	<B>$matricula_responsavel</B>
Secretario:	<B>$matricula_secretario</B>
Diretor:	<B>$matricula_diretor</B></td>
<td align='center'><B><pre>Editar
<a href='adm_aluno_matricula_editar.php?id=$matricula_aluno_id&&opcao=$matricula_id' style='text-decoration: none'><img src='img/edit.png' border='0' width='24' height='24' title='Editar Matrícula'></a></td>
</tr>
<tr>
<td align='center'><B><pre>Excluir
<a href='adm_aluno_matricula_excluir.php?id=$matricula_aluno_id&&opcao=$matricula_id' style='text-decoration: none'><img src='img/delete.png' border='0' width='24' height='24' title='Excluir Matrícula'></a></td>
</tr>
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
			<a href='adm_aluno_matricula_cadastrar.php?id=$matricula_aluno_id' style='text-decoration: none'>
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
		<br><i><strong>".$linha['aluno_nome']."</i></strong> sem Matrícula cadastrada!<br><br>
		</td>
	</tr>
	<tr>
		<td align='center'>
			<b>Cadastrar<br>
			<a href='adm_aluno_matricula_cadastrar.php?id=$aluno_id' style='text-decoration: none'>
			<img src='img/new.png' border='0' width='24' height='24' title='Cadastrar'></a>
		</td>
	</tr>
</table>
</fieldset>
</div>";
}
?>
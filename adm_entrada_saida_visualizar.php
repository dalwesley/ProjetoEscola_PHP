<?php

// A sessão precisa ser iniciada em cada página diferente
if (!isset($_SESSION)) session_start();

$nivel_necessario = 2;

// Verifica se não há a variável da sessão que identifica o usuário
if (!isset($_SESSION['UsuarioID']) OR ($_SESSION['UsuarioNivel'] < $nivel_necessario)) {
	// Destrói a sessão por segurança
	session_destroy();
	// Redireciona o visitante de volta pro login
	header("Location: acesso_negado.htm"); exit;
}
?>

<style type="text/css">
		
	#div1 {
			width:100%; /* Tamanho da Largura da Div */
			height:0%; /* Tamanho da Altura da Div */
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
</head>

<?php
include ('conecta.php');
$id_select1 = $_GET['id'];		//Recupera a variavel id para fazer o select
$sql = "SELECT * FROM dados_pessoais_aluno where aluno_id=$id_select1"; //Faz o select de todos os registros
$query = mysql_query($sql) or die("<center><h1>OOOPS!<BR>Não é esta a pagina que você esperava ver?<BR> Então algo esta errado...</h1><a href='home.php' style='text-decoration: none'><font color='#FF7F00'>Você pode clicar na imagem para voltar</font><p><img border='0' src='img/cones.png' width='544' height='332'></a></p>O Erro de conexão com banco de dados esta descrito logo abaixo!<BR>".mysql_error());
$linha = mysql_fetch_assoc($query);

		$aluno_ra				= $linha['aluno_ra'];
		$aluno_id				= $linha['aluno_id'];
		$aluno_nome				= $linha['aluno_nome'];
?>
<?php
include "conecta.php";
$es_date = date('d-m-Y - H:i');
$id_select = $_GET['opcao']; //Recupera a variavel id para fazer o select
$sql = mysql_query("SELECT * from entrada_saida where es_id=$id_select");
$row = mysql_fetch_assoc($sql);

		$es_aluno_id				= $row['es_aluno_id'];
		$es_aluno_nome				= $row['es_aluno_nome'];
		$es_turno_ano				= $row['es_turno_ano'];
		$es_turno_turma				= $row['es_turno_turma'];
		$es_motivo					= $row['es_motivo'];
		$es_outros_motivos			= $row['es_outros_motivos'];
		$es_data					= $row['es_data'];
		$es_responsavel				= $row['es_responsavel'];
		$es_secretaria				= $row['es_secretaria'];
		$es_hora 					= $row['es_hora'];
		$es_id						= $row['es_id'];

echo"<div id=div1>
<fieldset style='border-style: solid; border-width: 1px; background-color:#32CD32'>
<table border='1' width='100%' cellspacing='0' cellpadding='3'  bordercolor='#F0F0F0' height='0' style='border-collapse: collapse'> 
	<tr>
		<td height='1' width='1'>
			<center><a href='javascript:window.history.go(-1)'><img src='img/voltar.png' border='0' width='20' height='20' title='Voltar'></a>		</td>
		<td>
			<center>Exibindo <B><i>Entrada e Saída</i></B> para <i><strong> $es_aluno_nome - $aluno_ra </center></i></strong>
		</td>
		<td height='1' width='1'>
			<center><img src='img/obser.png' border='0' width='20' height='20' title='Foto'>
		</td>
	</tr>
</table></fieldset>
<fieldset style='border-style: solid; border-width: 1px; background-color:#F0F0F0'>
<legend><B>Entrada e Saída numero: $es_id</B></legend>
<table border='1' width='100%' cellspacing='0' cellpadding='3'  bordercolor='#FFFFFF' height='0' style='border-collapse: collapse'> 
<tr><td rowspan='2'><pre>
Data/Hora:		<B>$row[es_data] - $row[es_hora]</B>
Ocorrências:   		<B>$es_motivo</B>
Outras Ocorrências:	<B>$es_outros_motivos</B>
Responsável:		<B>$es_responsavel</B></pre>
		</td>
</tr>
</table>
</fieldset>
<fieldset style='border-style: solid; border-width: 1px; background-color:#F0F0F0'><legend><B>Opções</B></legend>  
<table border='1' width='100%' cellspacing='0' cellpadding='3'  bordercolor='#FFFFFF' height='0' style='border-collapse: collapse'> 
	<tr>
		<td align=center bgcolor=#FFFFFF><b>Editar<br></td>
		<td align=center bgcolor=#FFFFFF><b>Excluir<br></td>
	</tr>	
	<tr>
		<td align='center'><B><pre><a href='adm_entrada_saida_editar.php?id=$es_aluno_id&&opcao=$es_id' style='text-decoration: none'><img src='img/edit.png' border='0' width='24' height='24' title='Editar Matrícula'></a></td>
		<td align='center'><B><pre><a href='adm_entrada_saida_excluir.php?id=$es_aluno_id&&opcao=$es_id' style='text-decoration: none'><img src='img/delete.png' border='0' width='24' height='24' title='Excluir Matrícula'></a></td>
	</tr>
</table>
</fieldset>
</div>";

?>
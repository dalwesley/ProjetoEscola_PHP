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
$id_select = $_GET['opcao']; //Recupera a variavel id para fazer o select
$sql = mysql_query("SELECT * from procedencia where proced_id=$id_select");
$row = mysql_fetch_assoc($sql);

$proced_id							= $row['proced_id'];
$proced_escola						= $row['proced_escola'];
$proced_serie_ano					= $row['proced_serie_ano'];
$proced_país						= $row['proced_país'];
$proced_estado						= $row['proced_estado'];
$proced_cidade						= $row['proced_cidade'];
$proced_bairro						= $row['proced_bairro'];
$proced_estudou_na_escola			= $row['proced_estudou_na_escola'];
$proced_secretario					= $row['proced_secretario'];
$proced_aluno_id					= $row['proced_aluno_id'];
$proced_aluno_nome					= $row['proced_aluno_nome'];

echo"<div id=div1>
<fieldset style='border-style: solid; border-width: 1px; background-color:#32CD32'>
<table border='1' width='100%' cellspacing='0' cellpadding='3'  bordercolor='#F0F0F0' height='0' style='border-collapse: collapse'> 
	<tr>
		<td>
			<center><a href='javascript:window.history.go(-1)'><img src='img/voltar.png' border='0' width='20' height='20' title='Voltar'></a>		</td>
		</td>
		<td>
			<center>Exibindo <i><strong>Procedência</i></strong> para <i><strong> $aluno_nome - $aluno_ra </center></i></strong>
		</td>
		<td>
			<center><img src='img/obser.png' border='0' width='20' height='20' title='Foto'>
		</td>
	</tr>
</table></fieldset>
<fieldset style='border-style: solid; border-width: 1px; background-color:#F0F0F0'>
<legend><B>Procedência nº: $proced_id</B></legend>
<table border='1' width='100%' cellspacing='0' cellpadding='3'  bordercolor='#FFF' height='0' style='border-collapse: collapse'> 
	<tr><td rowspan='2'><pre>
Escola ou Equivalente:	 <B>$proced_escola</B>
Série/Ano:		 <B>$proced_serie_ano</B>
Cidade:			 <B>$proced_cidade</B>
Bairro:			 <B>$proced_bairro</B>
Estado:			 <B>$proced_estado</B>
País:			 <B>$proced_país</B>
Já estudou nesta escola? <B>$proced_estudou_na_escola</B></pre>
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
			<td align='center'><B><pre><a href='adm_aluno_procedencia_editar.php?id=$proced_aluno_id&&opcao=$proced_id' style='text-decoration: none'><img src='img/edit.png' border='0' width='24' height='24' title='Editar Matrícula'></a></td>
			<td align='center'><B><pre><a href='adm_aluno_procedencia_excluir.php?id=$proced_aluno_id&&opcao=$proced_id' style='text-decoration: none'><img src='img/delete.png' border='0' width='24' height='24' title='Excluir Matrícula'></a></td>
		</tr>
	</table>
	</fieldset>
	</div>";

	?>
<?php
include "seguranca.php";
?>
<script language="JavaScript">
function abrir(URL) {
var width = 700;
var height = 680;
var left = 657;
var top = 0;
window.open(URL,'janela', 'width='+width+', height='+height+', top='+top+', left='+left+', scrollbars=no, status=no, toolbar=no, location=no, directories=no, menubar=no, resizable=no, fullscreen=no');
}
</script>
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
			height:10%; /* Tamanho da Altura da Div */
    		top:0; 
    		margin-top:40%; /* ou seja ele pega 50% da altura tela e sobe metade do valor da altura no caso 100 */
    		left:0%;
    		margin-left:0; /* ou seja ele pega 50% da largura tela e diminui  metade do valor da largura no caso 250 */
 
}

</style>
</head>
<?php
$conex = mysql_connect("localhost", "root", "");
mysql_select_db("escola", $conex);
$id_select = $_GET['id1']; //Recupera a variavel id para fazer o select
$sql = "SELECT * FROM dados_pessoais_aluno where aluno_id=$id_select"; //Faz o select de todos os registros
$query = mysql_query($sql) or die("<center><h1>OOOPS!<BR>Não é esta a pagina que você esperava ver?<BR> Então algo esta errado...</h1><a href='home.php' style='text-decoration: none'><font color='#FF7F00'>Você pode clicar na imagem para voltar</font><p><img border='0' src='img/cones.png' width='544' height='332'></a></p>O Erro de conexão com banco de dados esta descrito logo abaixo!<BR>".mysql_error());
$linha = mysql_fetch_assoc($query);


		$aluno_id		= $linha['aluno_id'];
		$aluno_nome		= $linha['aluno_nome'];
?>
<?php
include "conecta.php";
$id_select = $_GET['id1']; //Recupera a variavel id para fazer o select
$sql = mysql_query("SELECT * from responsavel where responsavel_aluno_id=$id_select");
$row = mysql_fetch_assoc($sql);

		$responsavel_aluno_id	= $row['responsavel_aluno_id'];
		$responsavel_nome		= $row['responsavel_nome'];
		$responsavel_id			= $row['responsavel_id'];
		$responsavel_doc		= $row['responsavel_doc'];
		$responsavel_parentesco	= $row['responsavel_parentesco'];
		$responsavel_sexo		= $row['responsavel_sexo'];
		$responsavel_data		= $row['responsavel_data'];
		$responsavel_endereço	= $row['responsavel_endereço'];
		$responsavel_numero		= $row['responsavel_numero'];
		$responsavel_bairro		= $row['responsavel_bairro'];
		$responsavel_cep		= $row['responsavel_cep'];
		$responsavel_tel_1		= $row['responsavel_tel_1'];
		$responsavel_tel_2		= $row['responsavel_tel_2'];
		$responsavel_cidade		= $row['responsavel_cidade'];

echo"<div id=div1>
<fieldset style='border-style: solid; border-width: 1px; background-color:#32CD32'>
<table border='1' width='100%' cellspacing='0' cellpadding='3'  bordercolor='#F0F0F0' height='0' style='border-collapse: collapse'> 
	<tr>
		<td height='1' width='1'>
			<center><a href='javascript:window.history.go(-1)'><img src='img/voltar.png' border='0' width='20' height='20' title='Voltar'></a>		</td>
		</td>
		<td>
			<center>Exibindo responsável para <i><strong>".$linha['aluno_nome']." - ".$linha['aluno_ra']."</center></i></strong>
		</td>
		<td height='1' width='1'>
			<center><img src='img/obser.png' border='0' width='20' height='20' title='Foto'>
		</td>
	</tr>
</table></fieldset>
<fieldset style='border-style: solid; border-width: 1px; background-color:#F0F0F0'>
<legend><B>Identificação do Responsavel</B></legend>
<table border='1' width='100%' cellspacing='0' cellpadding='3'  bordercolor='#FFFFFF' height='0' style='border-collapse: collapse'> 
<tr>
	<td rowspan='2'><pre>
Nome:		<B>$responsavel_nome</B> - <B>$responsavel_parentesco</B>
Sexo:		<B>$responsavel_sexo</B>
R.G:	 	<B>$responsavel_doc</B>
Endereço:	<B>$responsavel_endereço</B>
Numero:		<B>$responsavel_numero</B>
Bairro:		<B>$responsavel_bairro</B>
CEP:		<B>$responsavel_cep</B>
Cidade:		<B>$responsavel_cidade</B>
Telefone:	<B>$responsavel_tel_1</B>
Telefone:	<B>$responsavel_tel_2</B></pre>
	</td>	
</tr>
</table>
</fieldset>
<fieldset style='border-style: solid; border-width: 1px; background-color:#F0F0F0'><legend><B>Opções</B></legend>  
<table border='1' width='100%' cellspacing='0' cellpadding='3'  bordercolor='#FFFFFF' height='0' style='border-collapse: collapse'> 
	<tr>
		<td align=center bgcolor=#FFFFFF><b>Editar<br></td>
		<td align=center bgcolor=#FFFFFF><b>Imprimir<br></td>
		<td align=center bgcolor=#FFFFFF><b>Excluir<br></td>
	</tr>	
	<tr>
		<td align='center'><pre><a href='adm_responsaveis_editar.php?id=$responsavel_id' style='text-decoration: none'><img src='img/edit.png' border='0' width='24' height='24' title='Editar dados do Responsável'></a></pre>
		</td>
		<td align='center'>
			<script language='javascript'>
				function imprime(text){
				text=document
				print(text) }	     
			</script>
			<input type='image' src='img/print.png' name='imprimir' value='Imprimir' onclick='imprime()' width='24' height='24' />
		</td>
		<td align='center'><pre><a href='adm_responsaveis_excluir.php?id=$responsavel_id' style='text-decoration: none'><img src='img/delete.png' border='0' width='24' height='24' title='Excluir dados do Responsável'></a></pre>
		</td>
	</tr>
</table>
</fieldset>
</div>";

?>

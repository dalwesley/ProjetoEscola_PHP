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
<script>
function aparece(ahhhh){
if(document.getElementById(ahhhh).style.display== "none"){
document.getElementById(ahhhh).style.display = "block";
}
else {
document.getElementById(ahhhh).style.display = "none"
}
}
</script>
<script language='javascript'>
				function imprime(text){
				text=document
				print(text) }	     
</script>
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
    		left:10%;
    		margin-left:0; /* ou seja ele pega 50% da largura tela e diminui  metade do valor da largura no caso 250 */
 
}

</style>
</head>
<?php
include "conecta.php";
$id_select = $_GET['id']; //Recupera a variavel id para fazer o select
$sql = "SELECT * FROM responsavel where responsavel_id=$id_select"; //Faz o select de todos os registros
$query = mysql_query($sql) or die("<center><h1>OOOPS!<BR>Não é esta a pagina que você esperava ver?<BR> Então algo esta errado...</h1><a href='home.php' style='text-decoration: none'><font color='#FF7F00'>Você pode clicar na imagem para voltar</font><p><img border='0' src='img/cones.png' width='544' height='332'></a></p>O Erro de conexão com banco de dados esta descrito logo abaixo!<BR>".mysql_error());
$result = mysql_num_rows($query);

if($result>=1) {

    while($linha = mysql_fetch_array($query)) {

		$responsavel_aluno_id		= $linha['responsavel_aluno_id'];
		$responsavel_nome			= $linha['responsavel_nome'];
		$responsavel_id				= $linha['responsavel_id'];
		$responsavel_doc			= $linha['responsavel_doc'];
		$responsavel_sexo			= $linha['responsavel_sexo'];
		$responsavel_cor			= $linha['responsavel_cor'];
		$responsavel_data			= $linha['responsavel_data'];
		$responsavel_endereco		= $linha['responsavel_endereco'];
		$responsavel_nascimento		= $linha['responsavel_nascimento'];
		$responsavel_numero			= $linha['responsavel_numero'];
		$responsavel_bairro			= $linha['responsavel_bairro'];
		$responsavel_cep			= $linha['responsavel_cep'];
		$responsavel_tel_1			= $linha['responsavel_tel_1'];
		$responsavel_tel_2			= $linha['responsavel_tel_2'];
		$responsavel_tel_3			= $linha['responsavel_tel_3'];
		$responsavel_email			= $linha['responsavel_email'];
		$responsavel_cidade			= $linha['responsavel_cidade'];
		$responsavel_nacionalidade	= $linha['responsavel_nacionalidade'];
		$responsavel_estado			= $linha['responsavel_estado'];

echo"<div id=div1>
<fieldset style='border-style: solid; border-width: 1px; background-color:#32CD32'>
<table border='1' width='100%' cellspacing='0' cellpadding='3'  bordercolor='#F0F0F0' height='0' style='border-collapse: collapse'> 
	<tr>
		<td height='1' width='1'>
			<center><img src='img/voltar.png' border='0' width='20' height='20' title='Voltar'>
		</td>
		<td>
			<center>Exibindo <B><I>Dados Pessoais</B></I> para <i><strong>$responsavel_nome - $responsavel_doc</center></i></strong>
		</td>
		<td height='1' width='1'>
			<center><img src='img/obser.png' border='0' width='20' height='20' title='Foto'>
		</td>
	</tr>
</table></fieldset>
<fieldset style='border-style: solid; border-width: 1px; background-color:#F0F0F0'>
<legend><B>Identificação do Responsavel</B></legend><pre>
Nome:	    $linha[responsavel_nome]
DOC:	    $linha[responsavel_doc]
Sexo:	    $linha[responsavel_sexo]
Data:	    $linha[responsavel_data]
Cor:	    $linha[responsavel_cor]
Nascimento: $linha[responsavel_nascimento]
</fieldset>
<fieldset style='border-style: solid; border-width: 1px; background-color:#F0F0F0'>
<legend><B>Residência</B></legend><pre>
Nacionalidade:	$responsavel_nacionalidade
Estado:	        $responsavel_estado
Cidade:		$responsavel_cidade
Endereço:	$responsavel_endereco
Bairro:		$responsavel_bairro
Numero:		$responsavel_numero		
CEP:		$responsavel_cep
</fieldset>
<fieldset style='border-style: solid; border-width: 1px; background-color:#F0F0F0'>
			<legend><B>Contato</B></legend><pre>
Telefone 1: $responsavel_tel_1
Telefone 2: $responsavel_tel_2
Telefone 3: $responsavel_tel_3
Email:      $responsavel_email
</fieldset>
<fieldset style='border-style: solid; border-width: 1px; background-color:#F0F0F0'><legend><B>Opções</B></legend>
	<table border='1' width='100%' cellspacing='0' cellpadding='3'  bordercolor='#FFFFFF' height='0' style='border-collapse: collapse'> 
	<tr>
		<td align=center bgcolor=#FFFFFF><B><pre>Editar</pre></B></td>
		<td align=center bgcolor=#FFFFFF><B>Excluir</B></td>
		<td align=center bgcolor=#FFFFFF><B>Imprimir</B></td>
	</tr>
	<tr>
		<td align='center'><img src=\"img/edit.png\" title=\"Cadastro\" onClick=\"javascript:abrir('adm_responsavel_editar.php?id=$responsavel_id','03');\" name=\"Cadastro\" width=\"20'\" height=\"20\">
		<td align='center'><img src=\"img/delete.png\" title=\"Cadastro\" onClick=\"javascript:abrir('adm_responsavel_excluir.php?id=$responsavel_id','03');\" name=\"Cadastro\" width=\"20'\" height=\"20\">
		<td align='center'><img src=\"img/print.png\" title=\"Cadastro\" onClick='imprime()' name=\"Cadastro\" width=\"20'\" height=\"20\">
	</tr>
</table>
</pre>
</div>";
    }
} else {
echo"<div id=div2>
<fieldset style='border-style: solid; border-width: 1px; background-color:#F0F0F0'>
<table border='1' width='100%' cellspacing='0' cellpadding='3'  bordercolor='#FFFFFF' height='0' style='border-collapse: collapse'> 
	<tr>
		<td align=center bgcolor=#FFFFFF>
		<br><i><strong>".$linha['responsavel_nome']."</i></strong> Sem Dados Pessoais cadastrado!<br><br>
		</td>
	</tr>
	<tr>
		<td align='center'>
			<b>Cadastrar<br>
			<a href='adm_responsavel_cadastrar_dados_pessoais.php?id=$id_aluno' style='text-decoration: none'>
			<img src='img/new.png' border='0' width='24' height='24' title='Cadastrar'></a>
		</td>
	</tr></table>
</fieldset>
</div>";
}
?>
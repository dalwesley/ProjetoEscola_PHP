<?php
/* Carrega a classe DOMPdf */
require_once("dompdf/dompdf_config.inc.php");
 
/* Cria a instância */
$dompdf = new DOMPDF();
 
/* Carrega seu HTML */
$dompdf->load_html('<!doctype html>
<html>
 
<?php

$conex = mysql_connect("localhost", "root", "");
mysql_select_db("escola", $conex);
$id_select = $_GET['id']; //Recupera a variavel id para fazer o select
$sql = "SELECT * FROM dados_pessoais_aluno where aluno_id=$id_select"; //Faz o select de todos os registros
$query = mysql_query($sql) or die("<center><h1>OOOPS!<BR>Não é esta a pagina que você esperava ver?<BR> Então algo esta errado...</h1><a href='home.php' style='text-decoration: none'><font color='#FF7F00'>Você pode clicar na imagem para voltar</font><p><img border='0' src='img/cones.png' width='544' height='332'></a></p>O Erro de conexão com banco de dados esta descrito logo abaixo!<BR>".mysql_error());
$result = mysql_num_rows($query);

if($result>=1) {

echo"<div id=div1>
<fieldset style='border-style: solid; border-width: 1px; background-color:#32CD32'>
<table border='1' width='100%' cellspacing='0' cellpadding='3'  bordercolor='#F0F0F0' height='0' style='border-collapse: collapse'> 
	<tr><td align=center>
		<center>Exibindo <B><i>dados pessoais</i></B> para <i><strong>$aluno_nome - $aluno_ra</center></i></strong>
		</td>
		<td align=center>
		<a href='javascript:abrir(\"adm_aluno_visualizar_foto.php?id=$aluno_id\");' style='text-decoration: none' title='Cadastrar foto do Aluno'>
		<center><img src='getImagem.php?id=$linha[aluno_id]' border='0' width='50' height='50'></a>
		</td>	
	</tr>
</table></fieldset>";

	    while($linha = mysql_fetch_array($query)) {

$aluno_id			= $linha['aluno_id'];
$aluno_ra			= $linha['aluno_ra'];
$aluno_nome 		= $linha['aluno_nome'];
$aluno_foto 		= $linha['aluno_foto'];
$aluno_pai 			= $linha['aluno_pai'];
$aluno_mae 			= $linha['aluno_mae'];
$aluno_endereço		= $linha['aluno_endereço'];
$aluno_numero		= $linha['aluno_numero'];
$aluno_bairro		= $linha['aluno_bairro'];
$aluno_cep 			= $linha['aluno_cep'];
$aluno_tel_2 		= $linha['aluno_tel_1'];
$aluno_tel_2 		= $linha['aluno_tel_2'];

echo"<fieldset style='border-style: solid; border-width: 1px; background-color:#F0F0F0'>
<legend><B>Identificação do Aluno</B></legend><pre>
Nome:	    <B>$linha[aluno_nome]</B>	R.A: <B>$linha[aluno_ra]</B>
Sexo:	    <B>$linha[aluno_sexo]</B>				
Data:	    <B>$linha[aluno_data]</B>
Cor:	    <B>$linha[aluno_cor]</B>
Nascimento: <B>$linha[aluno_nascimento]</B>
Pai:	    <B>$linha[aluno_pai]</B>
Mãe:	    <B>$linha[aluno_pai]</B>
</fieldset>
</fieldset>
<fieldset style='border-style: solid; border-width: 1px; background-color:#F0F0F0'>
			<legend><B>Residência</B></legend><pre>
Nacionalidade:	<B>$linha[aluno_nacionalidade]</B>		Estado:<B>$linha[aluno_bairro]</B>
Cidade:		<B>$linha[aluno_cidade]</B>
Endereço:	<B>$linha[aluno_endereço]</B>
Bairro:		<B>$linha[aluno_bairro]</B>
Numero:		<B>$linha[aluno_numero]</B>		CEP:	<B>$linha[aluno_cep]</B>
</fieldset>
<fieldset style='border-style: solid; border-width: 1px; background-color:#F0F0F0'>
			<legend><B>Contato</B></legend><pre>
Telefone 1: <B>$linha[aluno_tel_1]</B>
Telefone 2: <B>$linha[aluno_tel_2]</B>
Email:      <B>$linha[aluno_email]</B>
</fieldset>
<fieldset style='border-style: solid; border-width: 1px; background-color:#F0F0F0'><legend><B>Opções</B></legend>
<table border='1' width='100%' cellspacing='0' cellpadding='3'  bordercolor='#FFFFFF' height='0' style='border-collapse: collapse'> 
	<table border='1' width='100%' cellspacing='0' cellpadding='3'  bordercolor='#FFFFFF' height='0' style='border-collapse: collapse'> 
	<tr>
		<td align=center bgcolor=#FFFFFF><B>Editar</B></td>
		<td align=center bgcolor=#FFFFFF><B>Excluir</B></td>
	</tr>
	<tr>
		<td align='center'><a href='adm_aluno_editar_dados_pessoais.php?id=$aluno_id' style='text-decoration: none'><img src='img/edit.png' border='0' width='24' height='24' title='Editar dados pessoais'></a></td>
		<td align='center'><a href='adm_aluno_excluir_dados_pessoais.php?id=$aluno_id' style='text-decoration: none'><img src='img/delete.png' border='0' width='24' height='24' title='Excluir dados pessoais'></a></td>
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
		<br><i><strong>".$linha['aluno']."</i></strong> Sem Dados Pessoais cadastrado!<br><br>
		</td>
	</tr>
	<tr>
		<td align='center'>
			<b>Cadastrar<br>
			<a href='adm_aluno_cadastrar_dados_pessoais.php?id=$id_aluno' style='text-decoration: none'>
			<img src='img/new.png' border='0' width='24' height='24' title='Cadastrar'></a>
		</td>
	</tr></table>
</fieldset>
</div>";
}
?>

</html>');
 
/* Renderiza */
$dompdf->render();
 
/* Exibe */
$dompdf->stream(
    "saida.pdf", /* Nome do arquivo de saída */
    array(
        "Attachment" => false /* Para download, altere para true */
    )
);
?>
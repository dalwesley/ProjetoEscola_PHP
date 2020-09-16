<?php
include "seguranca.php";
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
$conex = mysql_connect("localhost", "root", "");
mysql_select_db("escola", $conex);
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
$sql = mysql_query("SELECT * from obs where obs_aluno_id=$id_select");
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
			<center>Exibindo <B><I>Observação</B></I> para <i><strong>$aluno_nome - $aluno_ra</center></i></strong>
		</td>
		<td height='1' width='1'>
			<center><img src='img/obser.png' border='0' width='20' height='20' title='Foto'>
		</td>
	</tr>
</table></fieldset>";

    while($linha = mysql_fetch_array($sql)) {	

$obs_id							= $linha['obs_id'];
$obs_aluno_nome					= $linha['obs_aluno_nome'];
$obs_aluno_id					= $linha['obs_aluno_id'];
$obs_visual						= $linha['obs_visual'];
$obs_visual_qual				= $linha['obs_visual_qual'];
$obs_auditiva					= $linha['obs_auditiva'];
$obs_auditiva_qual      		= $linha['obs_auditiva_qual'];
$obs_fisica						= $linha['obs_fisica'];
$obs_fisica_qual          		= $linha['obs_fisica_qual'];
$obs_movimento					= $linha['obs_movimento'];
$obs_movimento_qual     		= $linha['obs_movimento_qual'];
$obs_comportamento     			= $linha['obs_comportamento'];
$obs_comportamento_qual			= $linha['obs_comportamento_qual'];
$obs_fraldas					= $linha['obs_fraldas'];
$obs_cadeira_rodas	            = $linha['obs_cadeira_rodas'];
$obs_mencionar_prob_import	    = $linha['obs_mencionar_prob_import'];

$valor++;

echo"
<fieldset style='border-style: solid; border-width: 1px; background-color:#F0F0F0'>
<legend><B>Observação nº:$valor</B></legend>
<table border='1' width='100%' cellspacing='0' cellpadding='3'  bordercolor='#FFFFFF' height='0' style='border-collapse: collapse'> 
<tr><td rowspan='2'><pre>
Visual: 		<B>$obs_visual</B> - <B>$obs_visual_qual</B>
Auditiva?		<B>$obs_auditiva</B> - <B>$obs_auditiva_qual</B>
Física?			<B>$obs_fisica</B> - <B>$obs_fisica_qual</B>
Nos Movimentos?		<B>$obs_movimento</B> - <B>$obs_movimento_qual</B>
De Comportamento?	<B>$obs_comportamento</B> - <B>$obs_comportamento_qual</B>
Usa Fraldas?		<B>$obs_fraldas</B>
Usa cadeira de rodas?	<B>$obs_cadeira_rodas</B>

Observações:
<B>$obs_mencionar_prob_import</B></fieldset>
<td align='center'><pre><B>Editar
<a href='adm_aluno_obs_editar.php?id=$obs_aluno_id&&opcao=$obs_id' style='text-decoration: none'><img src='img/edit.png' border='0' width='24' height='24' title='Editar Entrada e Saída'></a></td>
</tr>
<tr>
<td align='center'><pre><B>Excluir
<a href='adm_aluno_obs_excluir.php?id=$obs_aluno_id&&opcao=$obs_id' style='text-decoration: none'><img src='img/delete.png' border='0' width='24' height='24' title='Excluir Entrada e Saída'></a></td>
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
			<a href='adm_aluno_obs_cadastrar.php?id=$aluno_id' style='text-decoration: none'>
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
		<br><i><strong>".$linha['aluno_nome']."</i></strong> sem Observações cadastradas!<br><br>
		</td>
	</tr>
 
	<tr>
		<td align='center'>
			<b>Cadastrar<br>
			<a href='adm_aluno_obs_cadastrar.php?id=$aluno_id' style='text-decoration: none'>
			<img src='img/new.png' border='0' width='24' height='24' title='Cadastrar'></a>
		</td>
	</tr></table>
</fieldset>
</div>";
}
?>
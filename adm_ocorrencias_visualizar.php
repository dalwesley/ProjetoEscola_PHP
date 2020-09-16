<?php
include "seguranca.php";
?>
<style type="text/css">
		
	#div1 {
			width:100%; /* Tamanho da Largura da Div */
			height:10%; /* Tamanho da Altura da Div */
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

$conex = mysql_connect("localhost", "root", "");
mysql_select_db("escola", $conex);
$id_select = $_GET['id']; //Recupera a variavel id para fazer o select
$sql = "SELECT * FROM dados_pessoais_aluno where aluno_id=$id_select"; //Faz o select de todos os registros
$query = mysql_query($sql) or die("<center><h1>OOOPS!<BR>Não é esta a pagina que você esperava ver?<BR> Então algo esta errado...</h1><a href='home.php' style='text-decoration: none'><font color='#FF7F00'>Você pode clicar na imagem para voltar</font><p><img border='0' src='img/cones.png' width='544' height='332'></a></p>O Erro de conexão com banco de dados esta descrito logo abaixo!<BR>".mysql_error());
$linha = mysql_fetch_assoc($query);


		$aluno_id				= $linha['aluno_id'];
		$aluno_nome				= $linha['aluno_nome'];
		$aluno_ra				= $linha['aluno_ra'];

?>
<?php
include "conecta.php";
$id_select = $_GET['id']; //Recupera a variavel id para fazer o select
$sql = mysql_query("SELECT * from ocorrencias where ocorrencias_aluno_id=$id_select");
$result = mysql_num_rows($sql);
$valor = 0;	

if($result>=1) {

echo"<div id=div1>
<fieldset style='border-style: solid; border-width: 1px; background-color:#32CD32'>
<table border='1' width='100%' cellspacing='0' cellpadding='3'  bordercolor='#F0F0F0' height='0' style='border-collapse: collapse'> 
	<tr>
		<td>
			<center><img src='img/voltar.png' border='0' width='20' height='20' title='Voltar'>
		</td>
		<td>
			<center>Exibindo <B><i>Ocorrências</i></B> para <i><strong> $aluno_nome - $aluno_ra </center></i></strong>
		</td>
		<td>
			<center><img src='img/obser.png' border='0' width='20' height='20' title='Foto'>
		</td>
	</tr>
</table></fieldset>";

    while($linha = mysql_fetch_array($sql)) {	
$ocorrencias_id							=  $linha['ocorrencias_id'];
$ocorrencias_aluno_id					=  $linha['ocorrencias_aluno_id'];
$ocorrencias_aluno_nome					=  $linha['ocorrencias_aluno_nome'];
$ocorrencias_serie						=  $linha['ocorrencias_serie'];
$ocorrencias_turma						=  $linha['ocorrencias_turma'];
$ocorrencias_professor_nome				=  $linha['ocorrencias_professor_nome'];
$ocorrencias							=  $linha['ocorrencias'];
$ocorrencias_outros						=  $linha['ocorrencias_outros'];
$ocorrencias_data						=  $linha['ocorrencias_data'];
$ocorrencias_data_responsavel_ciente	=  $linha['ocorrencias_data_responsavel_ciente'];
$ocorrencias_responsavel_ciente			=  $linha['ocorrencias_responsavel_ciente'];
$ocorrencias_responsavel            	=  $linha['ocorrencias_responsavel'];
$ocorrencias_professor_providencia		=  $linha['ocorrencias_professor_providencia'];
$ocorrencias_direcao_providencia		=  $linha['ocorrencias_direcao_providencia'];
$ocorrencias_data						=  $linha['ocorrencias_data'];

$valor++;

echo"
<fieldset style='border-style: solid; border-width: 1px; background-color:#F0F0F0'>
	<legend><B>Ocorrência numero:$valor</B></legend>
<table border='1' width='100%' cellspacing='0' cellpadding='3'  bordercolor='#FFF' height='0' style='border-collapse: collapse'> 
<tr><td rowspan='2'><pre>
Nome:	 			<B>$ocorrencias_aluno_nome</B>	R.A: <B>$aluno_ra</B>
Professor(a):			<B>$ocorrencias_professor_nome</B>
Ocorrências:   			<B>$ocorrencias</B>
Outras Ocorrências:		<B>$ocorrencias_outros</B>
Data da Ocorrência:		<B>$ocorrencias_data</B>
Providencia do(a) Professor:	<B>$ocorrencias_professor_providencia</B>
Providencia da Direção:		<B>$ocorrencias_direcao_providencia</B></td>
<td align='center'><B><pre>Editar
<a href='adm_ocorrencias_editar.php?id=$ocorrencias_aluno_id&&opcao=$ocorrencias_id' style='text-decoration: none'><img src='img/edit.png' border='0' width='24' height='24' title='Entrada e Saída'></a></td>
</tr>
<tr>
<td align='center'><B><pre>Excluir
<a href='adm_ocorrencias_excluir.php?id=$ocorrencias_aluno_id&&opcao=$ocorrencias_id' style='text-decoration: none'><img src='img/delete.png' border='0' width='24' height='24' title='Visualizar Responsaveis'></a></td>
</tr></table></pre></fieldset>";
    }
echo"</fieldset>
<fieldset style='border-style: solid; border-width: 1px; background-color:#F0F0F0'><legend><B>Opções</B></legend>  
<table border='1' width='100%' cellspacing='0' cellpadding='3'  bordercolor='#FFFFFF' height='0' style='border-collapse: collapse'> 
	<tr>
		<td align=center bgcolor=#FFFFFF><b>Cadastrar<br></td>
	</tr>	
	<tr>
		<td align='center'>
			<a href='adm_ocorrencias_cadastrar.php?id=$ocorrencias_aluno_id' style='text-decoration: none'>
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
		<br><i><strong>".$linha['aluno_nome']."</i></strong> sem Ocorrência cadastrada!<br><br>
		</td>
	</tr>
	<tr>
		<td align='center'>
			<b>Cadastrar<br>
			<a href='adm_ocorrencias_cadastrar.php?id=$aluno_id' style='text-decoration: none'>
			<img src='img/new.png' border='0' width='24' height='24' title='Cadastrar'></a>
		</td>
	</tr>
</table>
</fieldset>
</div>";
}
?>
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
<body link="#000000" vlink="#000000" alink="#000000">
<?php

$conex = mysql_connect("localhost", "root", "");
mysql_select_db("escola", $conex);
$id_select = $_GET['id']; //Recupera a variavel id para fazer o select
$sql = "SELECT * FROM dados_pessoais_aluno where aluno_id=$id_select"; //Faz o select de todos os registros
$query = mysql_query($sql) or die("<center><h1>OOOPS!<BR>Não é esta a pagina que você esperava ver?<BR> Então algo esta errado...</h1><a href='home.php' style='text-decoration: none'><font color='#FF7F00'>Você pode clicar na imagem para voltar</font><p><img border='0' src='img/cones.png' width='544' height='332'></a></p>O Erro de conexão com banco de dados esta descrito logo abaixo!<BR>".mysql_error());
$linha = mysql_fetch_assoc($query);


		$aluno_id				= $linha['aluno_id'];
		$aluno_ra				= $linha['aluno_ra'];
		$aluno_nome				= $linha['aluno_nome'];
?>
<?php
include "conecta.php";
$id_select = $_GET['id']; //Recupera a variavel id para fazer o select
$sql = mysql_query("SELECT * from ocorrencias where ocorrencias_aluno_id=$id_select");
$result = mysql_num_rows($sql);

if($result>=1) {

echo"<div id=div1>
<fieldset style='border-style: solid; border-width: 1px; background-color:#32CD32'>
<table border='1' width='100%' cellspacing='0' cellpadding='3'  bordercolor='#FFF' height='0' style='border-collapse: collapse'> 
	<tr><td align=center>
		<center>Exibindo <B><i>S.O.E</i></B> para <i><strong>$aluno_nome - $aluno_ra</center></i></strong>
		</td>
		<td align=center>
		<a href='javascript:abrir(\"adm_aluno_visualizar_foto.php?id=$aluno_id\");' style='text-decoration: none' title='Cadastrar foto do Aluno'>
		<center><img src='getImagem.php?id=$linha[aluno_id]' border='0' width='50' height='50'></a>
		</td>
	</tr>
</table></fieldset>
<fieldset style='border-style: solid; border-width: 1px; background-color:#F0F0F0'>
	<legend><B><B><i>".$result."</i></B> Ocorrência(s)</B></legend>";

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

echo"<table border='1' width='100%' cellspacing='0' cellpadding='3'  bordercolor='#FFF' height='0' style='border-collapse: collapse'>
<tr><td rowspan='2'><a href='adm_ocorrencias_visualizar.php?id=$ocorrencias_id' style='text-decoration: none'><pre>
id:$ocorrencias_id
Data:<B>$ocorrencias_data</B> - Ocorrências:<B>$ocorrencias</B></a>
</td></tr></table>";
    }
echo"
</fieldset>
</fieldset>";

$sql = mysql_query("SELECT * from entrada_saida where es_aluno_id=$id_select");
$result = mysql_num_rows($sql);

if($result>=1) {
echo"<fieldset style='border-style: solid; border-width: 1px; background-color:#F0F0F0'>
	<legend><B><B><i>".$result."</i></B> Entrada e Saída(s)</B></legend>";

    while($linha = mysql_fetch_array($sql)) {	
		$es_aluno_id				= $linha['es_aluno_id'];
		$es_aluno_nome				= $linha['es_aluno_nome'];
		$es_turno_ano				= $linha['es_turno_ano'];
		$es_motivo					= $linha['es_motivo'];
		$es_outros_motivos			= $linha['es_outros_motivos'];
		$es_data					= $linha['es_data'];
		$es_responsavel				= $linha['es_responsavel'];
		$es_secretaria				= $linha['es_secretaria'];
		$es_data 					= $linha['es_data'];
		$es_id						= $linha['es_id'];

echo"<table border='1' width='100%' cellspacing='0' cellpadding='3'  bordercolor='#FFF' height='0' style='border-collapse: collapse'>
<tr><td rowspan='2'><a href='adm_entrada_saida_visualizar.php?id=$es_id' style='text-decoration: none'><pre>
id:<B>$es_id</B>
Data:<B>$es_data</B> - Ocorrências:<B>$es_motivo</B></a>
</td></tr></table>";
    }
echo"
</fieldset>
</fieldset>";
}
}
echo"<fieldset style='border-style: solid; border-width: 1px; background-color:#F0F0F0'><legend><B>Opções</B></legend>  
<table border='1' width='100%' cellspacing='0' cellpadding='3'  bordercolor='#FFFFFF' height='0' style='border-collapse: collapse'> 
	<tr>
		<td align=center bgcolor=#FFFFFF><b>Cadastrar<br></td>
	</tr>	
	<tr>
		<td align='center'>
			<a href='adm_s.o.e_cadastrar.php?id=$aluno_id' style='text-decoration: none'>
			<img src='img/new.png' border='0' width='24' height='24' title='Cadastrar'></a>
		</td>
	</tr>
</table>
</fieldset>
</div>";
?>
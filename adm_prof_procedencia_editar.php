<?php
include "seguranca.php";
?>
<style type="text/css">

	#div1 {
			width:100%; /* Tamanho da Largura da Div */
			height:0; /* Tamanho da Altura da Div */
	        top: 0; 
	        margin-top:0%; /* ou seja ele pega 50% da altura tela e sobe metade do valor da altura no caso 100 */
	        left:0;
	        margin-left:0; /* ou seja ele pega 50% da largura tela e diminui  metade do valor da largura no caso 250 */

}
</style>
<?php
include ('conecta.php');

$id_select1 = $_GET['id'];		//Recupera a variavel id para fazer o select
$id_select2 = $_GET['opcao'];	//Recupera a variavel opcao para fazer o select

$sql = "SELECT * FROM professor_dados_pessoais where prof_id=$id_select1"; //Faz o select de todos os registros
$query = mysql_query($sql) or die("<center><h1>OOOPS!<BR>Não é esta a pagina que você esperava ver?<BR> Então algo esta errado...</h1><a href='home.php' style='text-decoration: none'><font color='#FF7F00'>Você pode clicar na imagem para voltar</font><p><img border='0' src='img/cones.png' width='544' height='332'></a></p>O Erro de conexão com banco de dados esta descrito logo abaixo!<BR>".mysql_error());
$row = mysql_fetch_assoc($query);

		$prof_ra				= $row['prof_ra'];
		$prof_id				= $row['prof_id'];
		$prof_nome				= $row['prof_nome'];
?>
<?php
include ('conecta.php');
$sql = "SELECT * FROM professor_procedencia where prof_proced_id=$id_select2"; //Faz o select de todos os registros
$query = mysql_query($sql) or die("<center><h1>OOOPS!<BR>Não é esta a pagina que você esperava ver?<BR> Então algo esta errado...</h1><a href='home.php' style='text-decoration: none'><font color='#FF7F00'>Você pode clicar na imagem para voltar</font><p><img border='0' src='img/cones.png' width='544' height='332'></a></p>O Erro de conexão com banco de dados esta descrito logo abaixo!<BR>".mysql_error());
$linha = mysql_fetch_assoc($query);

$prof_proced_id							= $linha['prof_proced_id'];
$prof_proced_escola						= $linha['prof_proced_escola'];
$prof_proced_ano_inicio					= $linha['prof_proced_ano_inicio'];
$prof_proced_ano_fim					= $linha['prof_proced_ano_fim'];
$prof_proced_pais						= $linha['prof_proced_pais'];
$prof_proced_estado						= $linha['prof_proced_estado'];
$prof_proced_cidade						= $linha['prof_proced_cidade'];
$prof_proced_bairro						= $linha['prof_proced_bairro'];
$prof_proced_trabalhou_na_escola		= $linha['prof_proced_trabalhou_na_escola'];
$prof_proced_secretario					= $linha['prof_proced_secretario'];
$prof_proced_diretor					= $linha['prof_proced_diretor'];
$prof_proced_prof_id					= $linha['prof_proced_prof_id'];
$prof_proced_prof_nome					= $linha['prof_proced_prof_nome'];
$prof_proced_data 						= $linha['prof_proced_data'];

echo"<div id=div1>
<form id='cadastro' name='cadastro' method='post' action='adm_prof_procedencia_editar_motor.php' enctype='multipart/form-data'>
<input type='hidden' name='prof_proced_prof_id' value='$prof_proced_prof_id' size='2'><input name='prof_proced_id' type='hidden' id='proced_id' value='$prof_proced_id' size='70' maxlength='60'/>
<fieldset style='border-style: solid; border-width: 1px; background-color:#0000FF'>
<table border='1' width='100%' cellspacing='0' cellpadding='3'  bordercolor='#F0F0F0' height='0' style='border-collapse: collapse'> 
	<tr>
		<td height='1' width='1'>
			<center><img src=\"img/voltar.png\" title=\"Voltar\" onClick=\"javascript:window.history.go(-1);\" name=\"voltar\" width=\"20'\" height=\"20\">
		</td>
		<td>
			<center>Editando <i><strong>procedência</i></strong> para <i><strong> $prof_nome - $prof_ra </center></i></strong>
		</td>
		<td height='1' width='1'>
			<center><img src='img/obser.png' border='0' width='20' height='20' title='Foto'>
		</td>
	</tr>
</table></fieldset>
<fieldset style='border-style: solid; border-width: 1px; background-color:#F0F0F0'>
<legend><font color='#0000FF'><B>Editar Procedência</B></legend></font><pre>
Escola:	  <input type='text' name='prof_proced_escola' id='prof_proced_escola' size='70' value='$prof_proced_escola' autofocus required />
Cidade:	  <input type='text' name='prof_proced_cidade' id='prof_proced_cidade' size='70' value='$prof_proced_cidade' required />
Bairro:	  <input type='text' name='prof_proced_bairro' id='prof_proced_bairro' size='70' value='$prof_proced_bairro' required />
País:	  <input type='text' name='prof_proced_pais' id='prof_proced_pais' size='40' value='$prof_proced_pais' required />	      Estado: <select name='prof_proced_estado' id='prof_proced_estado' required />
       			 <option>$prof_proced_estado</option>
        			<option value='AC'>AC</option>
        			<option value='AL'>AL</option>
        			<option value='AP'>AP</option>
        			<option value='AM'>AM</option>
        			<option value='BA'>BA</option>
        			<option value='CE'>CE</option>
        			<option value='ES'>ES</option>
        			<option value='DF'>DF</option>
        			<option value='MA'>MA</option>
        			<option value='MT'>MT</option>
        			<option value='MS'>MS</option>
        			<option value='MG'>MG</option>
        			<option value='PA'>PA</option>
        			<option value='PB'>PB</option>
        			<option value='PR'>PR</option>
        			<option value='PE'>PE</option>
        			<option value='PI'>PI</option>
        			<option value='RJ'>RJ</option>
        			<option value='RN'>RN</option>
        			<option value='RS'>RS</option>
        			<option value='RO'>RO</option>
        			<option value='RR'>RR</option>
        			<option value='SC'>SC</option>
        			<option value='SP'>SP</option>
        			<option value='SE'>SE</option>
        			<option value='TO'>TO</option>
        	</select>
Data inicio:<input type='date' id='prof_proced_ano_inicio' name='prof_proced_ano_inicio' value='$prof_proced_ano_inicio'>	Data final:<input type='date' id='prof_proced_ano_fim' name='prof_proced_ano_fim' value='$prof_proced_ano_fim'>
Já trabalhou nesta escola? <select name='prof_proced_trabalhou_na_escola' id='prof_proced_trabalhou_na_escola' />
       					<option>$prof_proced_trabalhou_na_escola</option>
        				<option value='Sim'>Sim</option>
        				<option value='Não'>Não</option>
        			</select>
</fieldset>
<fieldset style='border-style: solid; border-width: 1px; background-color:#F0F0F0'>
<legend><B>Responsáveis</B></legend><pre>
Professor:	<input type='text' name='prof_proced_prof_nome' id='prof_nome' value='$prof_proced_prof_nome' size='70'>
Secretário:	<input type='text' name='prof_proced_secretario' id='prof_proced_secretario' value='$_SESSION[UsuarioNome]' size='70' readonly>
Diretor(a):	<input type='text' name='prof_proced_diretor' id='prof_proced_diretor' size='70' value='$prof_proced_diretor'/>
</fieldset>
<fieldset style='border-style: solid; border-width: 1px; background-color:#F0F0F0'><legend><B>Opções</B></legend>  
<table border='1' width='100%' cellspacing='0' cellpadding='3'  bordercolor='#FFFFFF' height='0' style='border-collapse: collapse'> 
	<tr>
		<td align=center bgcolor=#FFFFFF><font color='#0000FF'>Tem certeza que deseja editar a <b>procedência</b> para <b>$prof_nome</b>?</b></font><br></td>	
	</tr>	
	<tr>
		<td align='center'>
<input type='image' src='img/edit.png' name='Concluir Cadastro'  id='button' value='Concluir Cadastro' width='20' height='20'/>
		</td>
	</tr>
</table></form></div>";

?>
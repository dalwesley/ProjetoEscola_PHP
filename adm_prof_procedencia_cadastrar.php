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
		margin-left:0%; /* ou seja ele pega 50% da largura tela e diminui  metade do valor da largura no caso 250 */
		background-color:#FFFFFF;
 
}
</style>
 
<?php
include ('conecta.php');
$id_select1 = $_GET['id'];		//Recupera a variavel id para fazer o select
$sql = "SELECT * FROM professor_dados_pessoais where prof_id=$id_select1"; //Faz o select de todos os registros
$query = mysql_query($sql) or die("<center><h1>OOOPS!<BR>Não é esta a pagina que você esperava ver?<BR> Então algo esta errado...</h1><a href='home.php' style='text-decoration: none'><font color='#FF7F00'>Você pode clicar na imagem para voltar</font><p><img border='0' src='img/cones.png' width='544' height='332'></a></p>O Erro de conexão com banco de dados esta descrito logo abaixo!<BR>".mysql_error());
$linha = mysql_fetch_assoc($query);

		$prof_ra				= $linha['prof_ra'];
		$prof_id				= $linha['prof_id'];
		$prof_nome				= $linha['prof_nome'];

echo"<div id=div1>
<fieldset style='border-style: solid; border-width: 1px; background-color:#FF7F00'>
<table border='1' width='100%' cellspacing='0' cellpadding='3'  bordercolor='#FFF' height='0' style='border-collapse: collapse'> 
	<tr>
		<td height='1' width='1'>
			<center><a href='javascript:window.history.go(-1)'><img src='img/voltar.png' border='0' width='20' height='20' title='Voltar'></a>
		</td>
		<td>
			<center>Cadastrando <B><i>procedência</i></B> para <i><strong> $prof_nome - $prof_ra </center></i></strong>
		</td>
		<td height='1' width='1'>
			<center><img src='img/obser.png' border='0' width='20' height='20' title='Foto'>
		</td>
	</tr>
</table></fieldset>
<form id='cadastro' name='cadastro' method='post' action='adm_prof_procedencia_cadastrar_motor.php'>
<input type='hidden' name='prof_proced_prof_nome' value='$prof_nome' size='60'><input type='hidden' name='prof_proced_prof_id' value='$prof_id' size='3' >
<fieldset style='border-style: solid; border-width: 1px; background-color:#F0F0F0'>
<legend><B>Procedência</B></legend><pre>
Escola:	  <input type='text' name='prof_proced_escola' id='prof_proced_escola' size='70' maxlength='60' autofocus required />
Cidade:	  <input type='text' name='prof_proced_cidade' id='prof_proced_cidade' size='70' maxlength='60' required />
Bairro:	  <input type='text' name='prof_proced_bairro' id='prof_proced_bairro' size='70' maxlength='60' required />
País:	  <input type='text' name='prof_proced_pais' id='prof_proced_pais' size='40' maxlength='60' required />	      Estado: <select name='prof_proced_estado' id='prof_proced_estado' required />
       			 <option>Selecione...</option>
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
Data inicio:<input type='date' id='prof_proced_ano_inicio' name='prof_proced_ano_inicio'>	Data final:<input type='date' id='prof_proced_ano_fim' name='prof_proced_ano_fim'>
Já trabalhou nesta escola? <select name='prof_proced_trabalhou_na_escola' id='prof_proced_trabalhou_na_escola' />
       					<option>Selecione...</option>
        				<option value='Sim'>Sim</option>
        				<option value='Não'>Não</option>
        			</select>
</fieldset>
<fieldset style='border-style: solid; border-width: 1px; background-color:#F0F0F0'>
<legend><B>Responsáveis</B></legend><pre>
Secretário:	<input type='text' name='prof_proced_secretario' id='prof_proced_secretario' value='$_SESSION[UsuarioNome]' size='70' readonly>
Diretor(a):	<input type='text' name='prof_proced_diretor' id='prof_proced_diretor' size='70'/>
</fieldset>
<fieldset style='border-style: solid; border-width: 1px; background-color:#F0F0F0'>
<legend><B>Opções</B></legend><table border='1' width='100%' cellspacing='0' cellpadding='3'  bordercolor='#FFFFFF' height='0' style='border-collapse: collapse'> 
	<tr>
		<td align=center bgcolor=#FFFFFF><font color='#FFA500'>Tem certeza que deseja cadastrar a <b>procedência</b> para <b>$prof_nome</b>?</b></font><br></td>	
	</tr>
	<tr>
		<td align='center'>
			<input type='submit' value='cadastrar'/> 
		</td>
	</tr>
</table>
</div>
<form>";
?>

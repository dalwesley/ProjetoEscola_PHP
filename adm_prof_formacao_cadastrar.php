<?php
include "seguranca.php";
?>
<style type="text/css">

	#div1 {
			width:100%; /* Tamanho da Largura da Div */
			height:100%; /* Tamanho da Altura da Div */
	        top: 0; 
	        margin-top:0%; /* ou seja ele pega 50% da altura tela e sobe metade do valor da altura no caso 100 */
	        left:0;
	        margin-left:0; /* ou seja ele pega 50% da largura tela e diminui  metade do valor da largura no caso 250 */

}

</style>
</head>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
<script type="text/javascript">
$(function () {
  function removeCampo() {
	$(".removerCampo").unbind("click");
	$(".removerCampo").bind("click", function () {
	   if($("tr.linhas").length > 1){
		$(this).parent().parent().remove();
	   }
	});
  }
 
  $(".adicionarCampo").click(function () {
	novoCampo = $("tr.linhas:first").clone();
	novoCampo.find("input").val("");
	novoCampo.insertAfter("tr.linhas:last");
	removeCampo();
  });
});
</script>
</head>
<?php
$conex = mysql_connect("localhost", "root", "");
mysql_select_db("escola", $conex);
$id_select = $_GET['id']; //Recupera a variavel id para fazer o select
$sql = "SELECT * FROM professor_dados_pessoais where prof_id=$id_select"; //Faz o select de todos os registros
$query = mysql_query($sql) or die("<center><h1>OOOPS!<BR>Não é esta a pagina que você esperava ver?<BR> Então algo esta errado...</h1><a href='home.php' style='text-decoration: none'><font color='#FF7F00'>Você pode clicar na imagem para voltar</font><p><img border='0' src='img/cones.png' width='544' height='332'></a></p>O Erro de conexão com banco de dados esta descrito logo abaixo!<BR>".mysql_error());
$linha = mysql_fetch_assoc($query);


		$prof_id				= $linha['prof_id'];
		$prof_nome				= $linha['prof_nome'];
		$prof_ra				= $linha['prof_ra'];

echo"<div id=div1>
<form id='cadastro' name='cadastro' method='post' action='adm_prof_formacao_cadastrar_motor.php'>
<input type='hidden' name='prof_formacao_prof_nome' value='$linha[prof_nome]' size='70'> <input type='hidden' name='prof_formacao_prof_id' value='$linha[prof_id]' size='3'>
<fieldset style='border-style: solid; border-width: 1px; background-color:#FFA500'>
<table border='1' width='100%' cellspacing='0' cellpadding='3'  bordercolor='#FFF' height='0' style='border-collapse: collapse'> 
	<tr>
	<td height='1' width='1'>
			<center><img src='img/voltar.png' title='Voltar' onClick='javascript:window.history.go(-1);' name='voltar' width='20' height='20'>
		</td>
		<td>
			<center>Cadastrando <i><B>formação</B></i> para <i><strong>$prof_ra</center></i></strong>
		</td>
		<td height='1' width='1'>
			<center><img src='img/obser.png' border='0' width='20' height='20' title='Foto'>
		</td>
	</tr>
</table>
</fieldset>
<fieldset style='border-style: solid; border-width: 1px; background-color:#F0F0F0'>
<legend><B>Formação</B></legend>
<table border='0' id='usuario' width='100%' cellspacing='0' cellpadding='3'  bordercolor='#FFFFFF' height='0' style='border-collapse: collapse'>
	<tr class='linhas'>
		<td><pre>
Instituição:	<input type='text' name='prof_formacao_instituicao[]' id='prof_formacao_instituicao[]' size='60'>
Tipo:		<select name='prof_formacao_curso_tipo[]' id='prof_formacao_curso_tipo[]'>
				<option>Selecione</option>
				<option value=Graduação>Graduação</option>
				<option value=Pós-Graduação>Pós-Graduação</option>
				<option value=Extensão>Extensão</option>
				<option value=Licensiatura>Licensiatura</option>
				<option value=Doutorado>Doutorado</option>
				<option value=Pós-Doutorado>Pós-Doutorado</option>
			</select>
Curso:		<select name='prof_formacao_curso[]' id='prof_formacao_curso[]'>
				<option>Disciplina</option>
				<option value=Português>Português</option>
				<option value=Matemática>Matemática</option>
				<option value=História>História</option>
				<option value=Geografia>Geografia</option>
				<option value=Física>Física</option>
				<option value=Quimica>Quimica</option>
			</select>
Periodo:	<input type='date' name='prof_formacao_curso_data_inicio[]' id='prof_formacao_curso_data_inicio[]'> à <input type='date' name='prof_formacao_curso_data_fim[]' id='prof_formacao_curso_data_fim[]'>
		</pre>
		</td>
		<td colspan='2'>
			<a href='#' class='removerCampo' title='Remover linha'><img src='img/Sinal_de_menos.png' border='0' width=20' height='20' /></a>
		</td>
	</tr>
  <tr>
    <td colspan='2'><center><pre>
<a href='#' class='adicionarCampo' title='Adicionar item'><img src='img/Sinal_de_mais.png' border='0' width=20' height='20' /></a></pre>
	</td>
  </tr> 
</table>
</fieldset>
<fieldset style='border-style: solid; border-width: 1px; background-color:#F0F0F0'>
<legend><B>Responsáveis</B></legend><pre>
Orient.Ped:	<input type='text' id='prof_formacao_op' name='prof_formacao_op' value='$_SESSION[UsuarioNome]' size='70' readonly>
Diretor(a):	<input type='text' id='prof_formacao_diretor' name='prof_formacao_diretor'  size='70' maxlength='60' placeholder='Preenchido pela Direção'/></pre>
</fieldset>
<fieldset style='border-style: solid; border-width: 1px; background-color:#F0F0F0'>
<legend><B>Opções</B></legend><table border='1' width='100%' cellspacing='0' cellpadding='3'  bordercolor='#FFFFFF' height='0' style='border-collapse: collapse'> 
	<tr>
		<td align=center bgcolor=#FFFFFF><font color='#FFA500'>Tem certeza que deseja cadastrar a <b>formação</b> para <b>$prof_nome</b>?</b></font><br></td>	
	</tr>
	<tr>
		<td align='center'>
			<input type='image' src='img/new.png' name='Concluir Cadastro'  id='button' value='Concluir Cadastro' width='20' height='20'/>
		</td>
	</tr>
</table>
</form>
</div>";
?>
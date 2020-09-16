<?php
include "seguranca.php";
?>
<style type="text/css">

	#div1 {
			width:100%; /* Tamanho da Largura da Div */
			height:100%; /* Tamanho da Altura da Div */
	        position:absolute; 
	        top: 0; 
	        margin-top:0%; /* ou seja ele pega 50% da altura tela e sobe metade do valor da altura no caso 100 */
	        left:0;
	        margin-left:0; /* ou seja ele pega 50% da largura tela e diminui  metade do valor da largura no caso 250 */

}

</style>
</head>
<?php
$conex = mysql_connect("localhost", "root", "");
mysql_select_db("escola", $conex);
$id_select = $_GET['nome']; //Recupera a variavel id para fazer o select

echo"<div id=div1>
<form id='cadastro' name='cadastro' method='post' action='adm_prof_cadastrar_dados_pessoais_motor.php' enctype='multipart/form-data'>
<fieldset style='border-style: solid; border-width: 1px; background-color:#FFA500'>
<table border='1' width='100%' cellspacing='0' cellpadding='3'  bordercolor='#FFF' height='0' style='border-collapse: collapse'> 
	<tr>
	<td height='1' width='1'>
			<center><img src='img/voltar.png' title='Voltar' onClick='javascript:window.history.go(-1);' name='voltar' width='20' height='20'>
		</td>
		<td>
			<center>Cadastrando <i><strong>$id_select</i></strong> como novo Professor(a)</strong>
		</td>
		<td height='1' width='1'>
			<center><img src='img/obser.png' border='0' width='20' height='20' title='Foto'>
		</td>
	</tr>
</table>
</fieldset>
<fieldset style='border-style: solid; border-width: 1px; background-color:#F0F0F0'>
<legend><B>Identificação do Aluno</B></legend><pre>
Nome:	    <input type='text' name='prof_nome' id='prof_nome' size='60' value='$id_select' placeholder='Nome Completo' required autofocus/>
Matricula:  <input type='number' name='prof_ra' id='prof_ra' required autofocus/>	     Categoria: <select type='text' name='prof_cat' id='prof_cat'/>
       			<option>Selecione...</option>
        			<option value='Efetivo'>Efetivo</option>
        			<option value='Tempo Determinado'>Tempo Determinado</option>
        			<option value='Substituto'>Substituto</option>
        		</select>
Formação:   <select type='text' name='prof_formacao' id='prof_formacao'/>
       			<option>Selecione...</option>
        			<option value='Licenciatura em Português'>Licenciatura em Português</option>
        			<option value='Licenciatura em Português'>Licenciatura em Português</option>
        			<option value='Licenciatura em Português'>Licenciatura em Português</option>
        		</select>
Sexo:	    <select name='prof_sexo' id='prof_sexo' required />
       			<option>Selecione...</option>
        			<option value='M'>Masculino</option>
        			<option value='F'>Feminino</option>
        	</select>	Data:   <input type='date' name='prof_data'>	Cor: <select name='prof_cor' id='prof_cor'>
       			<option>Selecione...</option>
        			<option value='branca'>Branca</option>
        			<option value='preta'>Preta</option>
        			<option value='parda'>Parda</option>
        			<option value='Amarela'>Amarela</option>
        			<option value='indigena'>Indígena</option>
        			<option value='não_declarada'>Não Declarada
        		</option>
        		</select>
Nascimento: <input name='prof_nascimento' type='text' id='prof_nascimento' size='70' maxlength='60' placeholder='Nascimento' required />
Nome do Pai:<input name='prof_pai' type='text' id='prof_pai' size='70' maxlength='60' placeholder='Nome Completo do Pai' required/>
Nome da Mãe:<input name='prof_mae' type='text' id='prof_mae' size='70' maxlength='60' placeholder='Nome Completo da Mãe' required/>
</fieldset>
<fieldset style='border-style: solid; border-width: 1px; background-color:#F0F0F0'>
			<legend><B>Residência</B></legend><pre>
Nacionalidade:	<input name='prof_nacionalidade' type='text' id='prof_nacionalidade' size='34' maxlength='60' placeholder='Nacionalidade' required />		Estado:	   <select name='prof_estado' id='prof_estado'>
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
Cidade:		<input name='prof_cidade' type='text' id='prof_cidade' size='70' maxlength='70' placeholder='Cidade' required />
Endereço:	<input name='prof_endereco' type='text' id='prof_endereco' size='70' maxlength='70' placeholder='Endereço' required/>
Bairro:		<input name='prof_bairro' type='text' id='prof_bairro' size='70' maxlength='70' placeholder='Bairro' required/>
Numero:		<input name='prof_numero' type='text' id='prof_numero' size='10' maxlength='70' placeholder='Numero' required/>		CEP:	<input name='prof_cep' id='prof_cep' required pattern='\d{5}-?\d{3}' placeholder='Ex:12345-678' required/>
</fieldset>
<fieldset style='border-style: solid; border-width: 1px; background-color:#F0F0F0'>
			<legend><B>Contato</B></legend><pre>
Telefone 1: <input type='prof_tel_1' maxlength='15' name='prof_tel_1' pattern='\([0-9]{2}\)[0-9]{4,5}-[0-9]{4}$' placeholder='(12)3456-7890' required/>
Telefone 2: <input type='prof_tel_2' maxlength='15' name='prof_tel_2' pattern='\([0-9]{2}\)[0-9]{4,5}-[0-9]{4}$' placeholder='(12)34567-8910' required/>
Email:      <input type='prof_email' class='input-text' name='prof_email' pattern='[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$' placeholder='seunome@provedor' size='70' maxlength='70' required/>
</pre></fieldset>
<fieldset style='border-style: solid; border-width: 1px; background-color:#F0F0F0'>
<legend><B>Opções</B></legend><table border='1' width='100%' cellspacing='0' cellpadding='3'  bordercolor='#FFFFFF' height='0' style='border-collapse: collapse'> 
	<tr>
	<td align=center bgcolor=#FFFFFF><B>Cadastrar</B></td>
	</tr>
	<tr>
		<td align='center'>
			<input type='image' src='img/new.png' name='Concluir Cadastro'  id='button' value='Concluir Cadastro' width='20' height='20'/>
		</td>
	</tr>
</table>
</fieldset>
</div>
</form>";
?>

<?php
include "seguranca.php";
?>
<script type="text/javascript">
<!--
function abreJanela(URL) {
location.href = URL; // se for popup utiliza o window.open
}
//-->
</script>

<style type="text/css">

	#div1 {
			width:100%; /* Tamanho da Largura da Div */
			height:10%; /* Tamanho da Altura da Div */
	        top: 0; 
	        margin-top:33%; /* ou seja ele pega 50% da altura tela e sobe metade do valor da altura no caso 100 */
	        left:0%;
	        margin-left:0; /* ou seja ele pega 50% da largura tela e diminui  metade do valor da largura no caso 250 */

}

</style>
</head>
<div id=div1><pre><center>
<fieldset style='border-style: solid; border-width: 1px; background-color:#F0F0F0'><legend><B>Selecione uma opção para cadastro</B></legend>
<select name='cadastro' id='cadastro' style='height: 40px; font-size:15pt' onchange='javascript: abreJanela(this.value)'>
       			<option>Selecione...</option>
       			<option value="adm_entrada_saida_cadastrar.php?id=$aluno_id">Cadastrar Entrada e Saída</option>
       			<option value="adm_ocorrencias_cadastrar.php?id=$aluno_id">Cadastrar Ocorrências</option>
</select>

</fieldset>
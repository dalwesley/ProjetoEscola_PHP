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
<body background="img/wallpaper.jpg">
<div id=div1><pre><center>
<fieldset style='border-style: solid; border-width: 1px; background-color:#F0F0F0'>
<legend><B><pre>Selecione um setor para acessar</pre></B></legend>
<table border='0' height='0' width='0' cellspacing='0' cellpadding='3'  bordercolor='#FFF' style='border-collapse: collapse'>
	<tr>
		<td height='1' width='1'>
		<center><pre><B>Aluno</B></pre>
		</td>

		<td height='1' width='1'>
		<center><pre><B>Professor</B></pre>
		</td>
		<td height='1' width='1'>
		<center><pre><B>Usuário</B></pre>
		</td>
	</tr>
	<tr>
		<td height='10%' width='10%'>
<center><a href='home_plublic.php' style='text-decoration: none'><img src="img/img_aluno.png" name="Acessar Aluno" width="40" height="40"></a>
		<td height='10%' width='10%'>
<center><a href='home_professor.php' style='text-decoration: none'><img src="img/img_prof.png" name="Acessar Professor" width="40" height="40"></a>
		</td>
		<td height='10%' width='10%'>
<center><a href='home_adm.php' style='text-decoration: none'><img src="img/perfil.png" name="Acessar Usuário" width="40" height="40"></a>
		</td>
	</tr>
</table>
</fieldset>
</div>
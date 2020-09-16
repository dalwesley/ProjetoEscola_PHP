<?php
include "seguranca_1.php";
?>
<link href="css/bootstrap.min.css" rel="stylesheet">
<script language="JavaScript">
function abrir(URL) {
var width = 700;
var height = 680;
var left = 657;
var top = 0;
window.open(URL,'janela', 'width='+width+', height='+height+', top='+top+', left='+left+', scrollbars=no, status=no, toolbar=no, location=no, directories=no, menubar=no, resizable=no, fullscreen=no');
}
</script>
<center><input type="text" name='busca' id='busca' class="botao" size="40" style="height: 25px; font-size:10pt" placeholder='O que deseja buscar?' autofocus/><select name="categorias" id="categorias" style="height: 31px; font-size:10pt"> 
<option value="Selecione o tipo..." selected="selected">Seleciona a Categoria</option> 
<?php 
include "conecta.php"; 
$pega_tipos = mysql_query("SELECT * FROM categorias"); 
if(mysql_num_rows($pega_tipos) == 0){ 
echo '<option value="x">Não foram encontrados tipos</option>'; 
} else { 
while ($linhatipo = mysql_fetch_array($pega_tipos)){ 
echo '<option value="'.$linhatipo['id_cat'].'">'.$linhatipo['id_cat'].' - '.$linhatipo['cat'].'</option>'; 
} 
} 
?> 
</select> <input type="submit" size="40" style="height: 31px; font-size:10pt" value="Buscar" /></form></center>
<img src="img/home-256.png" title="Home do Sistema" onClick="window.open('adm_home.php','03');" name="home" width="25" height="25"> <img src="img/Calendar.png" title="Home do Sistema" onClick="window.open('adm_home.php','03');" name="home" width="25" height="25"> <img src="img/Sinal_de_mais.png" title="Cadastro" onClick="javascript:abrir('cadastro.php','03');" name="Cadastro" width="25" height="25"> <img src="img/exit.png" title="Sair do Sistema" onClick="window.open('logout.php','_parent','');" name="Sair" width="25" height="25">
</div>
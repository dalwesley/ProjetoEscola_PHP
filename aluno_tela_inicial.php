<?php
include "seguranca_1.php";
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
<script language="JavaScript">
function mudar_cor_over(celula){ 
   celula.style.backgroundColor="#FF8C00" 
} 
function mudar_cor_out(celula){ 
   celula.style.backgroundColor="#FFA500" 
} 
</script>
<style type='text/css'>

	#div1 {
	        width:100%; /* Tamanho da Largura da Div */
			height:10%; /* Tamanho da Altura da Div */
	        position:absolute; 
	        top:0; 
	        margin-top:3%; /* ou seja ele pega 50% da altura tela e sobe metade do valor da altura no caso 100 */
	        left:0;
 	        margin-left:%; /* ou seja ele pega 50% da largura tela e diminui  metade do valor da largura no caso 250 */
 
}
	#div3 {
			width:100%; /* Tamanho da Largura da Div */
			height:100%; /* Tamanho da Altura da Div */
	        position:absolute; 
	        top:0; 
	        margin-top:-8px; /* ou seja ele pega 50% da altura tela e sobe metade do valor da altura no caso 100 */
	        left:98%;
 	        margin-left:%; /* ou seja ele pega 50% da largura tela e diminui  metade do valor da largura no caso 250 */
  
}
</style>
<?php
$conex = mysql_connect("localhost", "root", "");
mysql_select_db("escola", $conex);

$id_select = ($_SESSION['UsuarioNivel']);

$sql = "SELECT *, DATE_FORMAT(usuario_data, '%d/%m/%Y') as 'usuario_data', DATE_FORMAT(usuario_cadastro, '%d/%m/%Y') as 'usuario_cadastro' FROM usuario where usuario_id=$id_select"; //Faz o select de todos os registros
$query = mysql_query($sql) or die("<center><h1>OOOPS!<BR>Não é esta a pagina que você esperava ver?<BR> Então algo esta errado...</h1><a href='home.php' style='text-decoration: none'><font color='#FF7F00'>Você pode clicar na imagem para voltar</font><p><img border='0' src='img/cones.png' width='544' height='332'></a></p>O Erro de conexão com banco de dados esta descrito logo abaixo!<BR>".mysql_error());
$result = mysql_num_rows($query);

if($result>=1) {
	    while($linha = mysql_fetch_array($query)) {

$usuario_id			= $linha['usuario_id'];
$usuario_nome 		= $linha['usuario_nome'];
$usuario_pai 		= $linha['usuario_pai'];
$usuario_mae 		= $linha['usuario_mae'];
@$usuario_endereço	= $linha['usuario_endereço'];
$usuario_numero		= $linha['usuario_numero'];
$usuario_bairro		= $linha['usuario_bairro'];
$usuario_cep 		= $linha['usuario_cep'];
$usuario_tel_2 		= $linha['usuario_tel_1'];
$usuario_tel_2 		= $linha['usuario_tel_2'];

echo"<div id=div1><center>
<legend><B>Bem Vindo(a)</B></legend><pre>
<B>$linha[usuario_nome]</B> - <B>$linha[usuario_id]</B></pre>
</fieldset>
</div>";
    }
} else {
echo"<div id=div2>
<fieldset style='border-style: solid; border-width: 1px; background-color:#F0F0F0'>
<table border='1' width='100%' cellspacing='0' cellpadding='3'  bordercolor='#FFFFFF' height='0' style='border-collapse: collapse'> 
	<tr>
		<td align=center bgcolor=#FFFFFF>
		<br><i><strong>".$linha['usuario']."</i></strong> Sem Dados Pessoais cadastrado!<br><br>
		</td>
	</tr>
	<tr>
		<td align='center'>
			<b>Cadastrar<br>
			<a href='adm_usuario_cadastrar_dados_pessoais.php?id=$id_usuario' style='text-decoration: none'>
			<img src='img/new.png' border='0' width='24' height='24' title='Cadastrar'></a>
		</td>
	</tr>
</table>
</fieldset>
</div>";
}
?>
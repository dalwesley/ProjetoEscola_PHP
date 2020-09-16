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
			height:100%; /* Tamanho da Altura da Div */
	        position:absolute; 
	        top:0; 
	        margin-top:1px; /* ou seja ele pega 50% da altura tela e sobe metade do valor da altura no caso 100 */
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
<body bgcolor='#FFA500'>
<body link="#000000" vlink="#000000" alink="#000000">
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
$usuario_endereço	= $linha['usuario_endereço'];
$usuario_numero		= $linha['usuario_numero'];
$usuario_bairro		= $linha['usuario_bairro'];
$usuario_cep 		= $linha['usuario_cep'];
$usuario_tel_2 		= $linha['usuario_tel_1'];
$usuario_tel_2 		= $linha['usuario_tel_2'];

echo"<div id=div1><center>
<table border='0' width='100%' height='%' cellspacing=00' cellpadding='5'  bordercolor='#FFFFFF'> 	
	<tr>
		<td align='center' width='1%' height='1%' onmouseover='mudar_cor_over(this)' onmouseout='mudar_cor_out(this)'><a href=aluno_home.php?id=$usuario_id target='03' style='text-decoration: none' title='Home do Aluno'>Home</B></a>
		</td>
		<td align='center' width='1%' height='1%' onmouseover='mudar_cor_over(this)' onmouseout='mudar_cor_out(this)'><a href=aluno_buscador.php?id=$usuario_id target='03' style='text-decoration: none'>aluno</a>
		</td>
		<td align='center' width='1%' height='1%' onmouseover='mudar_cor_over(this)' onmouseout='mudar_cor_out(this)'><a href='javascript:abrir(\"adm_aluno_matricula_listar.php?id=$usuario_id\");' style='text-decoration: none'>Professor</a>
		</td>
		<td align='center' width='1%' height='1%' onmouseover='mudar_cor_over(this)' onmouseout='mudar_cor_out(this)'><a href='javascript:abrir(\"adm_aluno_classificacao_listar.php?id=$usuario_id\");' style='text-decoration: none'>Responsáveis</a>
		</td>
		<td align='center' width='1%' height='1%' onmouseover='mudar_cor_over(this)' onmouseout='mudar_cor_out(this)'><a href='javascript:abrir(\"adm_aluno_obs_listar.php?id=$usuario_id\");' style='text-decoration: none'>Usuário</a>
		</td>
		<td align='center' width='1%' height='1%' onmouseover='mudar_cor_over(this)' onmouseout='mudar_cor_out(this)'><a href='javascript:abrir(\"adm_entrada_saida_listar.php?id=$usuario_id\");' style='text-decoration: none'>S.O.E</a>
		</td>
		<td align='center' width='1%' height='1%' onmouseover='mudar_cor_over(this)' onmouseout='mudar_cor_out(this)'><a href='javascript:abrir(\"adm_ocorrencias_listar.php?id=$usuario_id\");' style='text-decoration: none'>Estatistica</a>
		</td>
		<td align='center' width='1%' height='1%' onmouseover='mudar_cor_over(this)' onmouseout='mudar_cor_out(this)'><a href='javascript:abrir(\"adm_prof_listar.php?id=$usuario_id\");' style='text-decoration: none'>Calendario</a>
		</td>
		<td align='center' width='1%' height='1%' onmouseover='mudar_cor_over(this)' onmouseout='mudar_cor_out(this)'><a href='javascript:abrir(\"adm_prof_listar.php?id=$usuario_id\");' style='text-decoration: none'>Classe</a>
		</td>
		<td align='center' width='1%' height='1%' onmouseover='mudar_cor_over(this)' onmouseout='mudar_cor_out(this)'><img src='img/exit.png' title='Sair do Sistema' onClick=\"window.open('logout.php','_parent','');\" name='Sair' width='25' height='25'>
		</td>
	</tr>
</table>
</div>";
    }
} else {
echo"<div id=div2>
<fieldset style='border-style: solid; border-width: 1px; background-color:#F0F0F0'>
Não Cadastro!
</fieldset>
</div>";
}
?>

<?php
include "seguranca.php";
?>
<style>
#tabela{
width:600px;
height:100px;
text-align:center;
}

.coluna{
width:50px;
height:20px;
}
.coluna:hover{
background-color:#F0F0F0;


}

</style>

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
			height:100%; /* Tamanho da Altura da Div */
	        position:absolute; 
	        top:0; 
	        margin-top:-7px; /* ou seja ele pega 50% da altura tela e sobe metade do valor da altura no caso 100 */
	        left:0;
	        margin-left:0%; /* ou seja ele pega 50% da largura tela e diminui  metade do valor da largura no caso 250 */
}
	#div2 {
			width:100%; /* Tamanho da Largura da Div */
			height:96%; /* Tamanho da Altura da Div */
	        position:absolute; 
	        top:0; 
	        margin-top:25px; /* ou seja ele pega 50% da altura tela e sobe metade do valor da altura no caso 100 */
	        left:0;
	        margin-left:0; /* ou seja ele pega 50% da largura tela e diminui  metade do valor da largura no caso 250 */
			overflow:auto;
}

</style>
<body link="#000000" vlink="#000000" alink="#000000">
<?php
include "conecta.php";
$id_select = $_GET['id']; //Recupera a variavel id para fazer o select

$sql = mysql_query("SELECT *,DATE_FORMAT(usuario_data, '%d/%m/%y') as 'usuario_data' FROM usuario left join dados_pessoais_aluno ON usuario.usuario_id=dados_pessoais_aluno.aluno_id WHERE 
usuario_id=$id_select")or die(mysql_error());
$result = mysql_num_rows($sql);

if($result>=1)  {
echo"<div id='div1'><center><pre>
<center>Exibindo <B><i>".$result."</i></B> resultado(s) para <i><strong></i></strong> na categoria <i><strong>Aluno!</i></strong></center>
</div>
<div id='div2'>
<table border='1' width='100%' height='%' cellspacing='0' cellpadding='1'  bordercolor='#FFFFFF'> 
		<tr>
			<td align=center bgcolor=#F0F0F0><B><pre>Foto</pre></td>  
			<td align=center bgcolor=#F0F0F0><B><pre>R.A</pre></td>  
			<td align=center bgcolor=#F0F0F0><B><pre>Nome do Aluno</pre></td>
			<td align=center bgcolor=#F0F0F0><B><pre>D/Nasc.</pre></td>
			<td align=center bgcolor=#F0F0F0><B><pre>Pai/Mãe</pre></td>
			<td align=center bgcolor=#F0F0F0><B><pre>Situação</pre></td>
			<td align=center bgcolor=#F0F0F0><B><pre>Série/Turma</pre></td>
			<td align=center bgcolor=#F0F0F0 width='10%'><B><pre>Opções</pre></td>
		</tr>";

while ($linha = mysql_fetch_assoc($sql)){        

$aluno_id			= $linha['aluno_id'];
$aluno_ra			= $linha['aluno_ra'];
$aluno_nome			= $linha['aluno_nome'];
$aluno_sexo			= $linha['aluno_sexo'];
$aluno_data			= $linha['aluno_data'];
$aluno_nascimento	= $linha['aluno_nascimento'];
$aluno_estado		= $linha['aluno_estado'];
$aluno_nacionalidade= $linha['aluno_nacionalidade'];
$aluno_cor			= $linha['aluno_cor'];
$aluno_pai			= $linha['aluno_pai'];
$aluno_mae			= $linha['aluno_mae'];
$aluno_cidade		= $linha['aluno_cidade'];
$aluno_endereço		= $linha['aluno_endereço'];
$aluno_bairro 		= $linha['aluno_bairro'];
$aluno_numero		= $linha['aluno_numero'];
$aluno_cep			= $linha['aluno_cep'];
$aluno_email		= $linha['aluno_email'];
$aluno_tel_1		= $linha['aluno_tel_1'];
$aluno_tel_2		= $linha['aluno_tel_2'];

echo"<tr class='coluna'>
			<td align=center>
			<a href='javascript:abrir(\"adm_foto_visualizar.php?id=$aluno_id\");' style='text-decoration: none' title='Cadastrar foto do Aluno'>";
	$id_select = $aluno_id; //Recupera a variavel id para fazer o select
$sql_foto = "SELECT * FROM foto where foto_aluno_id=$id_select"; //Faz o select de todos os registros
$query = mysql_query($sql_foto) or die("<center><h1>OOOPS!<BR>Não é esta a pagina que você esperava ver?<BR> Então algo esta errado...</h1><a href='home.php' style='text-decoration: none'><font color='#FF7F00'>Você pode clicar na imagem para voltar</font><p><img border='0' src='img/cones.png' width='544' height='332'></a></p>O Erro de conexão com banco de dados esta descrito logo abaixo!<BR>".mysql_error());
$result = mysql_num_rows($query);
if($result != NULL) {
	    while($linha = mysql_fetch_assoc($query)) {
		$foto	 				= $linha['foto'];
		$foto_aluno_nome		= $linha['foto_aluno_nome'];
header("Content-type: image/png", true);
echo"$foto";
    }
}else {
echo"<img border='0' src='img/camera.png' width='25' height='25'>
</a>";
}	
			echo"</td>
			<td align=center>
			<a href='javascript:abrir(\"adm_aluno_dados_pessoais.php?id=$aluno_id\");' style='text-decoration: none' title='Dados do Aluno'>
			$aluno_ra</a>
			</td>
			<td align=center>
			<a href='javascript:abrir(\"adm_aluno_dados_pessoais.php?id=$aluno_id\");' style='text-decoration: none' title='Dados do Aluno'>
			$aluno_nome</a>
			</td>
			<td align=center>
			$aluno_data
			</td>
			<td align=center width='%'>
			<a href='javascript:abrir(\"adm_aluno_responsavel_listar.php?id=$aluno_id\");' style='text-decoration: none' title='Responsaveis pelo Aluno'>
			$aluno_pai<BR>$aluno_mae</a>
			</td>
			<td align=center>
			add codigo
			</td>
			<td align=center>
			add codigo
			</td>
			<td align=center width='13%'>
				<a href='javascript:abrir(\"adm_aluno_procedencia_listar.php?id=$aluno_id\");' style='text-decoration: none'>
				<img src='img/proc.png' border='0' width='19' height='19' title='Procedência do Aluno'></a>

				<a href='javascript:abrir(\"adm_aluno_matricula_listar.php?id=$aluno_id\");' style='text-decoration: none'>
				<img src='img/matricula.png' border='0' width='19' height='19' title='Matrícula do Aluno'></a>

				<a href='javascript:abrir(\"adm_aluno_classificacao_listar.php?id=$aluno_id\");' style='text-decoration: none'>
				<img src='img/classifi.png' border='0' width='19' height='19' title='Classificação do Aluno'></a>

				<a href='javascript:abrir(\"adm_aluno_obs_listar.php?id=$aluno_id\");' style='text-decoration: none'>
				<img src='img/obser.png' border='0' width='19' height='19' title='Observações'></a>

				<a href='javascript:abrir(\"adm_entrada_saida_listar.php?id=$aluno_id\");' style='text-decoration: none'>
				<img src='img/relogio.png' border='0' width='19' height='19' title='Entrada e Saida'></a>

				<a href='javascript:abrir(\"adm_ocorrencias_listar.php?id=$aluno_id\");' style='text-decoration: none'>
				<img src='img/ocorre.png' border='0' width='19' height='19' title='Visualizar Ocorrência'></a>
			</td>
		</tr>";
    }
	echo"</table></div>";
}
else {
    echo "<div id='div2'><center><pre>
<a href=javascript:abrir('adm_aluno_cadastrar_dados_pessoais.php'); style='text-decoration: none'>
Não encontramos nenhum <i><strong>$busca</i></strong> na categoria <i><strong>aluno</i></strong> no nosso banco de dados!
Verifique se o nome foi digitado corretamente ou, se precisar, cadastre!<br>
<img src='img/nervousface.jpg' border='0' width='50' height='50' title='Cadastrar Aluno'></a></div>";
}

?>
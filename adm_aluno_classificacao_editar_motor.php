<script language="javascript">setTimeout("window.history.go(-2);",1000)</script>
<style type="text/css">

#div1 {
 
        width:100%; /* Tamanho da Largura da Div */
		height:0%; /* Tamanho da Altura da Div */
        position:absolute; 
        top:0; 
        margin-top:35%; /* ou seja ele pega 50% da altura tela e sobe metade do valor da altura no caso 100 */
        left:0%;
       margin-left:0%; /* ou seja ele pega 50% da largura tela e diminui  metade do valor da largura no caso 250 */
		background-color:#FFFFFF;
 
}
</style>
<?php 
  
$host= '127.0.0.1';
$bd= 'escola';
$senhabd= '';
$userbd = 'root';
 
 
// RECEBENDO OS DADOS PREENCHIDOS DO FORMULÁRIO !

$class_responsavel				= $_POST ["class_responsavel"];
$class_secretario				= $_POST ["class_secretario"];
$class_diretor					= $_POST ["class_diretor"];
$class_pela_comp_data			= $_POST ["class_pela_comp_data"];
$class_pela_comp_para_o_ano		= $_POST ["class_pela_comp_para_o_ano"];
$reclass_pela_comp_data			= $_POST ["reclass_pela_comp_data"];
$reclass_pela_comp_para_ano		= $_POST ["reclass_pela_comp_para_ano"];
$reclass_pelo_conselho_data		= $_POST ["reclass_pelo_conselho_data"];
$reclass_pelo_conselho_ano		= $_POST ["reclass_pelo_conselho_ano"];
$class_aluno_id					= $_POST ["class_aluno_id"];
$class_aluno_nome				= $_POST ["class_aluno_nome"];
$class_id						= $_POST ["class_id"];
$data							= date("d/m/y");	

//Gravando no banco de dados !
//conectando com o localhost - mysql

$conexao = mysql_connect($host, $userbd, $senhabd);
if (!$conexao)
	die ("Erro de conexão com localhost, o seguinte erro ocorreu -> ".mysql_error());

//conectando com a tabela do banco de dados
$banco = mysql_select_db($bd,$conexao);
if (!$banco)
	die ("<center><h1>OOOPS!<BR>Não é esta a pagina que você esperava ver?<BR> Então algo esta errado...</h1><a href='home.php' style='text-decoration: none'><font color='#FF7F00'>Você pode clicar na imagem para voltar</font><p><img border='0' src='img/cones.png' width='544' height='332'></a></p>O Erro de conexão com banco de dados esta descrito logo abaixo!<BR>".mysql_error());
 
$atu = "UPDATE classificacao SET

class_responsavel			= '$class_responsavel',
class_secretario			= '$class_secretario',
class_diretor				= '$class_diretor',
class_pela_comp_data		= '$class_pela_comp_data',
class_pela_comp_para_o_ano	= '$class_pela_comp_para_o_ano',
reclass_pela_comp_data		= '$reclass_pela_comp_data',
reclass_pela_comp_para_ano	= '$reclass_pela_comp_para_ano',
reclass_pelo_conselho_data	= '$reclass_pelo_conselho_data',
reclass_pelo_conselho_ano	= '$reclass_pelo_conselho_ano',
class_aluno_id				= '$class_aluno_id',
class_id					= '$class_id',
class_aluno_nome			= '$class_aluno_nome'

WHERE class_id=$class_id";



$sucesso = mysql_query($atu);

if ($sucesso){
echo '<div id=div1>
<h1><center>Atualização realizada com sucesso!</h1></center>';
}else{
   die (mysql_error());
}
 
mysql_close($conexao);
?>
<script language="javascript">setTimeout("window.history.go(-2);",1000)</script>
<style type="text/css">

#div1 {
 
        width:100%; /* Tamanho da Largura da Div */
		height:0%; /* Tamanho da Altura da Div */
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

$es_aluno_id				= $_POST ["es_aluno_id"];
$es_aluno_nome				= $_POST ["es_aluno_nome"];
$es_turno_ano				= $_POST ["es_turno_ano"];
$es_turno_turma				= $_POST ["es_turno_turma"];
$es_motivo					= $_POST ["es_motivo"];
$es_outros_motivos			= $_POST ["es_outros_motivos"];
$es_responsavel				= $_POST ["es_responsavel"];
$es_secretaria				= $_POST ["es_secretaria"];
$es_id						= $_POST ['es_id'];
$es_data 					= $_POST ['es_data'];
$es_tipo 					= $_POST ['es_tipo'];

//Gravando no banco de dados !
//conectando com o localhost - mysql

$conexao = mysql_connect($host, $userbd, $senhabd);
if (!$conexao)
	die ("Erro de conexão com localhost, o seguinte erro ocorreu -> ".mysql_error());
//conectando com a tabela do banco de dados
$banco = mysql_select_db($bd,$conexao);
if (!$banco)
	die ("<center><h1>OOOPS!<BR>Não é esta a pagina que você esperava ver?<BR> Então algo esta errado...</h1><a href='home.php' style='text-decoration: none'><font color='#FF7F00'>Você pode clicar na imagem para voltar</font><p><img border='0' src='img/cones.png' width='544' height='332'></a></p>O Erro de conexão com banco de dados esta descrito logo abaixo!<BR>".mysql_error());
 
$atu = "UPDATE entrada_saida SET

es_id				= '$es_id',
es_aluno_nome		= '$es_aluno_nome',
es_aluno_id			= '$es_aluno_id',
es_turno_ano		= '$es_turno_ano',
es_turno_turma		= '$es_turno_turma',
es_motivo			= '$es_motivo',
es_outros_motivos	= '$es_outros_motivos',
es_responsavel		= '$es_responsavel',
es_secretaria		= '$es_secretaria',
es_data				= '$es_data',
es_tipo				= '$es_tipo'

WHERE es_id=$es_id";



$sucesso = mysql_query($atu);

if ($sucesso){
   echo '<div id=div1><h1><center>Atualização realizada com sucesso!</h1></center>';
}else{
   die (mysql_error());
}
 
mysql_close($conexao);
?>

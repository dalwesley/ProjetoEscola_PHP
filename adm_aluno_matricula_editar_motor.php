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

$matricula_id				= $_POST ["matricula_id"];
$matricula_aluno_nome		= $_POST ["matricula_aluno_nome"];
$matricula_aluno_id			= $_POST ["matricula_aluno_id"];
$matricula_aceito_normas	= $_POST ["matricula_aceito_normas"];
$matricula_ano_civil		= $_POST ["matricula_ano_civil"];
$matricula_ano_letivo		= $_POST ["matricula_ano_letivo"];
$matricula_tipo_ensino		= $_POST ["matricula_tipo_ensino"];
$matricula_data				= $_POST ["matricula_data"];
$matricula_turno_turma		= $_POST ["matricula_turno_turma"];
$matricula_turno_ano		= $_POST ["matricula_turno_ano"];
$matricula_numero_chamada	= $_POST ["matricula_numero_chamada"];
$matricula_idade			= $_POST ["matricula_idade"];
$matricula_situacao_aluno	= $_POST ["matricula_situacao_aluno"];
$matricula_situacao_data	= $_POST ["matricula_situacao_data"];
$matricula_responsavel		= $_POST ["matricula_responsavel"];
$matricula_secretario		= $_POST ["matricula_secretario"];
$matricula_diretor			= $_POST ["matricula_diretor"];
$matricula_data 			= $_POST ["matricula_data"];



//Gravando no banco de dados !
//conectando com o localhost - mysql

$conexao = mysql_connect($host, $userbd, $senhabd);
if (!$conexao)
	die ("Erro de conexão com localhost, o seguinte erro ocorreu -> ".mysql_error());

//conectando com a tabela do banco de dados
$banco = mysql_select_db($bd,$conexao);
if (!$banco)
	die ("<center><h1>OOOPS!<BR>Não é esta a pagina que você esperava ver?<BR> Então algo esta errado...</h1><a href='home.php' style='text-decoration: none'><font color='#FF7F00'>Você pode clicar na imagem para voltar</font><p><img border='0' src='img/cones.png' width='544' height='332'></a></p>O Erro de conexão com banco de dados esta descrito logo abaixo!<BR>".mysql_error());
 
$atu = "UPDATE matricula SET


matricula_id				= '$matricula_id',
matricula_aluno_nome		= '$matricula_aluno_nome',
matricula_aluno_id			= '$matricula_aluno_id',
matricula_aceito_normas		= '$matricula_aceito_normas',
matricula_ano_civil			= '$matricula_ano_civil',
matricula_ano_letivo		= '$matricula_ano_letivo',
matricula_tipo_ensino		= '$matricula_tipo_ensino',
matricula_data				= '$matricula_data',
matricula_turno_turma		= '$matricula_turno_turma',
matricula_turno_ano			= '$matricula_turno_ano',
matricula_numero_chamada	= '$matricula_numero_chamada',
matricula_idade				= '$matricula_idade',
matricula_situacao_aluno	= '$matricula_situacao_aluno',
matricula_situacao_data		= '$matricula_situacao_data',
matricula_responsavel		= '$matricula_responsavel',
matricula_secretario		= '$matricula_secretario',
matricula_diretor			= '$matricula_diretor'

WHERE matricula_id=$matricula_id";



$sucesso = mysql_query($atu);

if ($sucesso){
echo '<div id=div1><h1><center>atualização realizada com sucesso!</h1></center>';
}else{
   die (mysql_error());
}
 
mysql_close($conexao);
?>
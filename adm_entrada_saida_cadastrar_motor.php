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

date_default_timezone_set('America/Sao_Paulo');

//PREENCHA OS DADOS DE CONEX�O A SEGUIR:
  
 
$host= '127.0.0.1';
$bd= 'escola';
$senhabd= '';
$userbd = 'root';
 
 
// RECEBENDO OS DADOS PREENCHIDOS DO FORMUL�RIO !

$es_aluno_id			= isset($_POST ["es_aluno_id"]) 		? $_POST['es_aluno_id'] : '';				//atribui��o do campo "nome" vindo do formul�rio para variavel	
$es_aluno_nome			= isset($_POST ["es_aluno_nome"]) 		? $_POST['es_aluno_nome'] : '';					//atribui��o do campo "nome" vindo do formul�rio para variavel	
$es_turno_ano			= isset($_POST ["es_turno_ano"])		? $_POST['es_turno_ano'] : '';					//atribui��o do campo "email" vindo do formul�rio para variavel
$es_turno_turma			= isset($_POST ["es_turno_turma"]) 		? $_POST['es_turno_turma'] : '';					//atribui��o do campo "email" vindo do formul�rio para variavel
$es_motivo				= isset($_POST ["es_motivo"]) 			? $_POST['es_motivo'] : '';					//atribui��o do campo "nome" vindo do formul�rio para variavel	
$es_outros_motivos		= isset($_POST ["es_outros_motivos"]) 	? $_POST['es_outros_motivos'] : '';	//atribui��o do campo "nome" vindo do formul�rio para variavel	
$es_responsavel			= isset($_POST ["es_responsavel"]) 		? $_POST['es_responsavel'] : '';		//atribui��o do campo "pais" vindo do formul�rio p
$es_secretaria			= isset($_POST ["es_secretaria"]) 		? $_POST['es_secretaria'] : '';			//atribui��o do campo "pais" vindo do formul�rio p
$es_tipo				= isset($_POST ["es_tipo"]) 			? $_POST['es_tipo'] : '';			//atribui��o do campo "pais" vindo do formul�rio p
$es_data 				= isset($_POST ["es_data"]) 			? $_POST['es_data'] : '';			//atribui��o do campo "pais" vindo do formul�rio p
$es_hora 				= isset($_POST ["es_hora"]) 			? $_POST['es_hora'] : '';			//atribui��o do campo "pais" vindo do formul�rio p

//Gravando no banco de dados !
//conectando com o localhost - mysql

$conexao = mysql_connect($host, $userbd, $senhabd);
if (!$conexao)
	die ("Erro de conex�o com localhost, o seguinte erro ocorreu -> ".mysql_error());
//conectando com a tabela do banco de dados
$banco = mysql_select_db($bd,$conexao);
if (!$banco)
	die ("<center><h1>OOOPS!<BR>N�o � esta a pagina que voc� esperava ver?<BR> Ent�o algo esta errado...</h1><a href='home.php' style='text-decoration: none'><font color='#FF7F00'>Voc� pode clicar na imagem para voltar</font><p><img border='0' src='img/cones.png' width='544' height='332'></a></p>O Erro de conex�o com banco de dados esta descrito logo abaixo!<BR>".mysql_error());
 
// faz inser��o
$query = "INSERT INTO `entrada_saida` ( `es_aluno_id` , `es_aluno_nome` , `es_turno_ano` , `es_turno_turma` , `es_motivo` , `es_outros_motivos` , `es_data`, `es_hora` , `es_tipo` , `es_responsavel` , `es_secretaria` )
VALUES 				   				  ('$es_aluno_id', '$es_aluno_nome', '$es_turno_ano', '$es_turno_turma', '$es_motivo', '$es_outros_motivos', '$es_data', '$es_hora' , '$es_tipo' , '$es_responsavel', '$es_secretaria' )";
 
mysql_query($query,$conexao);
 
echo "<div id=div1>
<B><center><h1>Cadastrado com sucesso!";
?>

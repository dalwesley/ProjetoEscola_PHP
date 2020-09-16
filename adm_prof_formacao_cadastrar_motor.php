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

date_default_timezone_set('America/Sao_Paulo');

//PREENCHA OS DADOS DE CONEXÃO A SEGUIR:
  
 
$host= '127.0.0.1';
$bd= 'escola';
$senhabd= '';
$userbd = 'root';

//dados do formulario

	$prof_formacao_prof_id 				= isset($_POST ["prof_formacao_prof_id"]) 				? $_POST['prof_formacao_prof_id'] : '';
	$prof_formacao_prof_nome 			= isset($_POST ["prof_formacao_prof_nome"]) 			? $_POST['prof_formacao_prof_nome'] : '';
	$prof_formacao_instituicao 			= isset($_POST ["prof_formacao_instituicao"]) 			? $_POST['prof_formacao_instituicao'] : '';
	$prof_formacao_curso_tipo			= isset($_POST ["prof_formacao_curso_tipo"]) 			? $_POST['prof_formacao_curso_tipo'] : '';
	$prof_formacao_curso				= isset($_POST ["prof_formacao_curso"]) 				? $_POST['prof_formacao_curso'] : '';
	$prof_formacao_curso_data_inicio	= isset($_POST ["prof_formacao_curso_data_inicio"]) 	? $_POST['prof_formacao_curso_data_inicio'] : '';
	$prof_formacao_curso_data_fim		= isset($_POST ["prof_formacao_curso_data_fim"]) 		? $_POST['prof_formacao_curso_data_fim'] : '';
	$prof_formacao_op 					= isset($_POST ["prof_formacao_op"]) 					? $_POST['prof_formacao_op'] : '';
	$prof_formacao_diretor 				= isset($_POST ["prof_formacao_diretor"]) 				? $_POST['prof_formacao_diretor'] : '';
	$prof_formacao_data					= date('d-m-y');

	$conexao = mysql_connect($host, $userbd, $senhabd);
if (!$conexao)
	die ("Erro de conexão com localhost, o seguinte erro ocorreu -> ".mysql_error());
//conectando com a tabela do banco de dados
$banco = mysql_select_db($bd,$conexao);
if (!$banco)
	die ("<center><h1>OOOPS!<BR>Não é esta a pagina que você esperava ver?<BR> Então algo esta errado...</h1><a href='home.php' style='text-decoration: none'><font color='#FF7F00'>Você pode clicar na imagem para voltar</font><p><img border='0' src='img/cones.png' width='544' height='332'></a></p>O Erro de conexão com banco de dados esta descrito logo abaixo!<BR>".mysql_error());
 
// indice, contando apartir da quantide de campos 'numero' 
$indice = count($prof_formacao_instituicao)-0;

// Código do for para inserir os dados do formulario no BD MySQL.
for($i=0; $i<$indice; $i++){
    $sql = "INSERT INTO `professor_formacao`(`prof_formacao_prof_id`, `prof_formacao_prof_nome`, `prof_formacao_instituicao`, `prof_formacao_curso_tipo`, `prof_formacao_curso`, `prof_formacao_curso_data_inicio`, `prof_formacao_curso_data_fim`, `prof_formacao_op`, `prof_formacao_diretor`, `prof_formacao_data`)
	values 									('$prof_formacao_prof_id', '$prof_formacao_prof_nome', '$prof_formacao_instituicao[$i]', '$prof_formacao_curso_tipo[$i]', '$prof_formacao_curso[$i]', '$prof_formacao_curso_data_inicio[$i]', '$prof_formacao_curso_data_fim[$i]', '$prof_formacao_op', '$prof_formacao_diretor', '$prof_formacao_data')";
    mysql_query($sql);
	
}
echo "<div id=div1>
<B><center><h1>Cadastrado com sucesso!";
?>
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

$imagem 					= $_FILES["imagem"];
$foto_aluno_nome			= isset($_POST ["foto_aluno_nome"]) 		? $_POST['foto_aluno_nome'] : '';
$foto_aluno_id				= isset($_POST ["foto_aluno_id"])			? $_POST['foto_aluno_id'] : '';
$data = date("Y/m/d");

if($imagem != NULL) { 
	$nomeFinal = time().'.jpg';
	if (move_uploaded_file($imagem['tmp_name'], $nomeFinal)) {
		$tamanhoImg = filesize($nomeFinal); 
		$mysqlImg = addslashes(fread(fopen($nomeFinal, "r"), $tamanhoImg));

$conexao = mysql_connect($host, $userbd, $senhabd);
if (!$conexao)
	die ("Erro de conexão com localhost, o seguinte erro ocorreu -> ".mysql_error());
//conectando com a tabela do banco de dados
$banco = mysql_select_db($bd,$conexao);
if (!$banco)
	die ("Erro de conexão com banco de dados, o seguinte erro ocorreu -> ".mysql_error());
 
$query = "INSERT INTO `foto` (`foto_aluno_id` , `foto` , `foto_aluno_nome`) 
VALUES 						 ('$foto_aluno_id', '$mysqlImg', '$foto_aluno_nome')";
 
mysql_query($query,$conexao);
 
echo "<div id=div1>
<B><center><h1>$foto_aluno_nome</B> foi cadastrado com sucesso!";
} 
	} 
else { 

echo "<div id=div1>Você não realizou o upload de forma satisfatória."; 
	} 
?>
<?php
include "seguranca.php";
?>
<style type="text/css">

	#div1 {
			width:100%; /* Tamanho da Largura da Div */
			height:0; /* Tamanho da Altura da Div */
	        top: 0; 
	        margin-top:0%; /* ou seja ele pega 50% da altura tela e sobe metade do valor da altura no caso 100 */
	        left:0;
	        margin-left:0; /* ou seja ele pega 50% da largura tela e diminui  metade do valor da largura no caso 250 */

}	
</style>

<?php

include ('conecta.php');

$date = date('Y-m-d');
$hora = date('H:i:s');

$serie_select = $_GET['serie']; //Recupera a variavel id para fazer o select
$turma_select = $_GET['turma']; //Recupera a variavel id para fazer o select

$sql = "SELECT * FROM matricula where matricula_turno_ano=$serie_select"; //Faz o select de todos os registros
$query = mysql_query($sql) or die("<center><h1>OOOPS!<BR>Não é esta a pagina que você esperava ver?<BR> Então algo esta errado...</h1><a href='home.php' style='text-decoration: none'><font color='#FF7F00'>Você pode clicar na imagem para voltar</font><p><img border='0' src='img/cones.png' width='544' height='332'></a></p>O Erro de conexão com banco de dados esta descrito logo abaixo!<BR>".mysql_error());
$result = mysql_num_rows($query);	

if($result>=1) {

		while($linha = mysql_fetch_array($query)) {
		$matricula_turno_ano					= $linha['matricula_turno_ano'];
		$matricula_turno_turma					= $linha['matricula_turno_turma'];
		$matricula_aluno_nome					= $linha['matricula_aluno_nome'];

echo"$matricula_aluno_nome<br>";
		}
} else {
echo"erro";
}
?>

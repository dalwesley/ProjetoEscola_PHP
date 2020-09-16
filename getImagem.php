<?php

include "conecta.php";
$id_select = $_GET['id']; //Recupera a variavel id para fazer o select
$sql = "SELECT * FROM foto where foto_aluno_id=$id_select"; //Faz o select de todos os registros
$query = mysql_query($sql) or die("<center><h1>OOOPS!<BR>Não é esta a pagina que você esperava ver?<BR> Então algo esta errado...</h1><a href='home.php' style='text-decoration: none'><font color='#FF7F00'>Você pode clicar na imagem para voltar</font><p><img border='0' src='img/cones.png' width='544' height='332'></a></p>O Erro de conexão com banco de dados esta descrito logo abaixo!<BR>".mysql_error());
$result = mysql_num_rows($query);

if($result != NULL) {

	    while($linha = mysql_fetch_assoc($query)) {

		$foto	 				= $linha['foto'];
		$foto_aluno_nome		= $linha['foto_aluno_nome'];


header("Content-type: image/png", true);

echo"$foto";
    }
}else {
echo"Sem foto!
</a>";
}
?>
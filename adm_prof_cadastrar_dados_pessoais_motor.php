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
	
$prof_id						= isset($_POST ["prof_id"])						? $_POST['prof_id'] : '';
$prof_ra						= isset($_POST ["prof_ra"])						? $_POST['prof_ra'] : '';
$prof_situação_funcional		= isset($_POST ["prof_situação_funcional"])		? $_POST['prof_situação_funcional'] : '';
$prof_nome						= isset($_POST ["prof_nome"]) 					? $_POST['prof_nome'] : '';
$prof_sexo						= isset($_POST ["prof_sexo"]) 					? $_POST['prof_sexo'] : '';
$prof_data						= isset($_POST ["prof_data"]) 					? $_POST['prof_data'] : '';
$prof_nascimento				= isset($_POST ["prof_nascimento"])				? $_POST['prof_nascimento'] : '';
$prof_estado					= isset($_POST ["prof_estado"]) 				? $_POST['prof_estado'] : '';
$prof_nacionalidade        		= isset($_POST ["prof_nacionalidade"]) 			? $_POST['prof_nacionalidade'] : '';
$prof_cor						= isset($_POST ["prof_cor"]) 					? $_POST['prof_cor'] : '';
$prof_pai						= isset($_POST ["prof_pai"]) 					? $_POST['prof_pai'] : '';
$prof_mae						= isset($_POST ["prof_mae"]) 					? $_POST['prof_mae'] : '';
$prof_cidade					= isset($_POST ["prof_cidade"]) 				? $_POST['prof_cidade'] : '';
$prof_endereco					= isset($_POST ["prof_endereco"]) 				? $_POST['prof_endereco'] : '';
$prof_numero					= isset($_POST ["prof_numero"]) 				? $_POST['prof_numero'] : '';
$prof_bairro 					= isset($_POST ["prof_bairro"]) 				? $_POST['prof_bairro'] : '';
$prof_cep						= isset($_POST ["prof_cep"]) 					? $_POST['prof_cep'] : '';
$prof_email						= isset($_POST ["prof_email"]) 					? $_POST['prof_email'] : '';
$prof_tel_1						= isset($_POST ["prof_tel_1"]) 					? $_POST['prof_tel_1'] : '';
$prof_tel_2						= isset($_POST ["prof_tel_2"]) 					? $_POST['prof_tel_2'] : '';
$prof_tel_3						= isset($_POST ["prof_tel_3"]) 					? $_POST['prof_tel_3'] : '';
$prof_data_cadastro				= isset($_POST ["prof_data_cadastro"]) 			? $_POST['prof_data_cadastro'] : '';
$prof_cadastrado_por			= isset($_POST ["prof_cadastrado_por"]) 		? $_POST['prof_cadastrado_por'] : '';

//Gravando no banco de dados !
 
//conectando com o localhost - mysql
$conexao = mysql_connect($host, $userbd, $senhabd);
if (!$conexao)
	die ("Erro de conexão com localhost, o seguinte erro ocorreu -> ".mysql_error());
//conectando com a tabela do banco de dados
$banco = mysql_select_db($bd,$conexao);
if (!$banco)
	die ("Erro de conexão com banco de dados, o seguinte erro ocorreu -> ".mysql_error());
//Verificando se algo foi digitado:
if ($prof_ra>"1" && $prof_nome>"1"){
$query = mysql_query("SELECT * FROM professor_dados_pessoais WHERE prof_ra='$prof_ra'");
$numeros = mysql_num_rows ($query);
if ($numeros>"0"){
echo"<div id=div1>
<fieldset style='border-style: solid; border-width: 1px; background-color:#FFF'>
<table border='1' width='100%' cellspacing='0' cellpadding='3'  bordercolor='#FFF' height='0' style='border-collapse: collapse'> 
	<tr>
		<td height='1' width='1'>
			<center><img src=\"img/voltar.png\" title=\"Voltar\" onClick=\"javascript:window.history.go(-1);\" name=\"voltar\" width=\"20'\" height=\"20\">
		</td>
		<td><center><i><strong><h2>Opa!</h2></i></strong><pre>
<i><strong>$prof_nome - $prof_ra</i></strong><BR>
Este nome já está cadastrado em nosso banco de dados!
Verifique se o nome e/ou R.A foram digitados corretamente!<BR><BR>
<img src='img/nervousface.jpg' border='0' width='50' height='50' title='Cadastrar prof'></pre>
		</td>
		<td height='1' width='1'>
			<center><img src='img/fechar.png' title=\"Fechar\" onclick='self.close()' name=\"Fechar\" width=\"20'\" height=\"20\">
		</td>
	</tr>
</table></fieldset>";

}
else{
//conectando com o BD para gravar os dados
$query = "INSERT INTO `professor_dados_pessoais`(`prof_id`, `prof_ra`, `prof_situação_funcional`, `prof_nome`, `prof_sexo`, `prof_data`, `prof_nascimento`, `prof_estado`, `prof_nacionalidade`, `prof_cor`, `prof_pai`, `prof_mae`, `prof_cidade`, `prof_endereco`, `prof_numero`, `prof_bairro`, `prof_cep`, `prof_email`, `prof_tel_1`, `prof_tel_2`, `prof_tel_3`, `prof_data_cadastro`, `prof_cadastrado_por`)
VALUES 								   	   		('$prof_id', '$prof_ra', '$prof_situação_funcional', '$prof_nome', '$prof_sexo', '$prof_data', '$prof_nascimento', '$prof_estado', '$prof_nacionalidade', '$prof_cor', '$prof_pai', '$prof_mae', '$prof_cidade', '$prof_endereco', '$prof_numero', '$prof_bairro', '$prof_cep', '$prof_email', '$prof_tel_1', '$prof_tel_2', '$prof_tel_3', '$prof_data_cadastro', '$prof_cadastrado_por')";
 $inserir = mysql_query($query);
if ($inserir) {
echo "Notícia inserida com sucesso!";
} else {
echo "Não foi possível inserir a notícia, tente novamente.<br>";
// Exibe dados sobre o erro:
echo "Dados sobre o erro:" . mysql_error();
}
}
}

?>
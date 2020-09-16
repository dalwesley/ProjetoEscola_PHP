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

$proced_id							= $_POST ["proced_id"];
$proced_escola						= $_POST ["proced_escola"];
$proced_serie_ano					= $_POST ["proced_serie_ano"];
$proced_data_saida					= $_POST ["proced_data_saida"];
$proced_país						= $_POST ["proced_país"];
$proced_estado						= $_POST ["proced_estado"];
$proced_cidade						= $_POST ["proced_cidade"];
$proced_bairro						= $_POST ["proced_bairro"];
$proced_estudou_na_escola			= $_POST ["proced_estudou_na_escola"];
$proced_secretario					= $_POST ["proced_secretario"];
$proced_aluno_id					= $_POST ["proced_aluno_id"];
$proced_aluno_nome					= $_POST ["proced_aluno_nome"];
$proced_responsavel					= $_POST ["proced_responsavel"];


//Gravando no banco de dados !
//conectando com o localhost - mysql

$conexao = mysql_connect($host, $userbd, $senhabd);
if (!$conexao)
	die ("Erro de conexão com localhost, o seguinte erro ocorreu -> ".mysql_error());

//conectando com a tabela do banco de dados
$banco = mysql_select_db($bd,$conexao);
if (!$banco)
	die ("<center><h1>OOOPS!<BR>Não é esta a pagina que você esperava ver?<BR> Então algo esta errado...</h1><a href='home.php' style='text-decoration: none'><font color='#FF7F00'>Você pode clicar na imagem para voltar</font><p><img border='0' src='img/cones.png' width='544' height='332'></a></p>O Erro de conexão com banco de dados esta descrito logo abaixo!<BR>".mysql_error());
 
$atu = "UPDATE procedencia SET

proced_id					= '$proced_id',
proced_escola				= '$proced_escola',
proced_serie_ano			= '$proced_serie_ano',
proced_data_saida			= '$proced_data_saida',
proced_país					= '$proced_país',
proced_estado				= '$proced_estado',
proced_cidade				= '$proced_cidade',
proced_bairro				= '$proced_bairro',
proced_estudou_na_escola	= '$proced_estudou_na_escola',
proced_secretario			= '$proced_secretario',
proced_aluno_id				= '$proced_aluno_id',
proced_aluno_nome			= '$proced_aluno_nome',
proced_responsavel			= '$proced_responsavel'

WHERE proced_id=$proced_id";



$sucesso = mysql_query($atu);

if ($sucesso){
echo '<div id=div1><h1><center>Atualização realizada com sucesso!</h1></center>';
}else{
   die (mysql_error());
}
 
mysql_close($conexao);
?>
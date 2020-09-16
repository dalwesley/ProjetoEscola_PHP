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

//PREENCHA OS DADOS DE CONEXÃO A SEGUIR:
  
$host= '127.0.0.1';
$bd= 'escola';
$senhabd= '';
$userbd = 'root';
 
 
// RECEBENDO OS DADOS PREENCHIDOS DO FORMULÁRIO !

$responsavel_id				= $_POST ["responsavel_id"];
$responsavel_nome			= $_POST ["responsavel_nome"];
$responsavel_doc			= $_POST ["responsavel_doc"];
$responsavel_parentesco		= $_POST ["responsavel_parentesco"];
$responsavel_sexo			= $_POST ["responsavel_sexo"];
$responsavel_data			= $_POST ["responsavel_data"];
$responsavel_nascimento		= $_POST ["responsavel_nascimento"];
$responsavel_estado			= $_POST ["responsavel_estado"];
$responsavel_nacionalidade  = $_POST ["responsavel_nacionalidade"];
$responsavel_cor			= $_POST ["responsavel_cor"];
$responsavel_cidade			= $_POST ["responsavel_cidade"];
$responsavel_endereco		= $_POST ["responsavel_endereco"];
$responsavel_numero			= $_POST ["responsavel_numero"];
$responsavel_bairro 		= $_POST ["responsavel_bairro"];
$responsavel_cep			= $_POST ["responsavel_cep"];
$responsavel_tel_1			= $_POST ["responsavel_tel_1"];
$responsavel_tel_2			= $_POST ["responsavel_tel_2"];
$responsavel_tel_3			= $_POST ["responsavel_tel_3"];
$responsavel_email			= $_POST ["responsavel_email"];
$data = date("Y/m/d");

//Gravando no banco de dados !
//conectando com o localhost - mysql

$conexao = mysql_connect($host, $userbd, $senhabd);
if (!$conexao)
	die ("Erro de conexão com localhost, o seguinte erro ocorreu -> ".mysql_error());
//conectando com a tabela do banco de dados
$banco = mysql_select_db($bd,$conexao);
if (!$banco)
	die ("<center><h1>OOOPS!<BR>Não é esta a pagina que você esperava ver?<BR> Então algo esta errado...</h1><a href='home.php' style='text-decoration: none'><font color='#FF7F00'>Você pode clicar na imagem para voltar</font><p><img border='0' src='img/cones.png' width='544' height='332'></a></p>O Erro de conexão com banco de dados esta descrito logo abaixo!<BR>".mysql_error());
 
$atu = "UPDATE responsavel SET

responsavel_id				= '$responsavel_id',
responsavel_nome			= '$responsavel_nome',
responsavel_sexo			= '$responsavel_sexo',
responsavel_doc				= '$responsavel_doc',
responsavel_parentesco		= '$responsavel_parentesco',
responsavel_data			= '$responsavel_data',
responsavel_nascimento		= '$responsavel_nascimento',
responsavel_estado			= '$responsavel_estado',
responsavel_nacionalidade   = '$responsavel_nacionalidade',
responsavel_cor				= '$responsavel_cor',
responsavel_cidade			= '$responsavel_cidade',
responsavel_endereco		= '$responsavel_endereco',
responsavel_numero			= '$responsavel_numero',
responsavel_bairro 			= '$responsavel_bairro',
responsavel_cep				= '$responsavel_cep',
responsavel_tel_1			= '$responsavel_tel_1',
responsavel_tel_2			= '$responsavel_tel_2',
responsavel_tel_3			= '$responsavel_tel_3',
responsavel_email			= '$responsavel_email'

WHERE responsavel_id=$responsavel_id";



$sucesso = mysql_query($atu);

if ($sucesso){
   echo '<div id=div1><h1><center>Atualização realizada com sucesso!</h1></center>';
}else{
   die (mysql_error());
}
 
mysql_close($conexao);
?>

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

$prof_id					= $_POST ["prof_id"];
$prof_ra					= $_POST ["prof_ra"];
$prof_nome					= $_POST ["prof_nome"];
$prof_sexo					= $_POST ["prof_sexo"];
$prof_data					= $_POST ["prof_data"];
$prof_nascimento			= $_POST ["prof_nascimento"];
$prof_estado				= $_POST ["prof_estado"];
$prof_nacionalidade  	  	= $_POST ["prof_nacionalidade"];
$prof_cor					= $_POST ["prof_cor"];
$prof_pai					= $_POST ["prof_pai"];
$prof_mae					= $_POST ["prof_mae"];
$prof_cidade				= $_POST ["prof_cidade"];
$prof_endereco				= $_POST ["prof_endereco"];
$prof_bairro 				= $_POST ["prof_bairro"];
$prof_numero				= $_POST ["prof_numero"];
$prof_cep					= $_POST ["prof_cep"];
$prof_email					= $_POST ["prof_email"];
$prof_tel_1					= $_POST ["prof_tel_1"];
$prof_tel_2					= $_POST ["prof_tel_2"];
$prof_tel_3					= $_POST ["prof_tel_3"];

//Gravando no banco de dados !
//conectando com o localhost - mysql

$conexao = mysql_connect($host, $userbd, $senhabd);
if (!$conexao)
	die ("Erro de conexão com localhost, o seguinte erro ocorreu -> ".mysql_error());

//conectando com a tabela do banco de dados
$banco = mysql_select_db($bd,$conexao);
if (!$banco)
	die ("<center><h1>OOOPS!<BR>Não é esta a pagina que você esperava ver?<BR> Então algo esta errado...</h1><a href='home.php' style='text-decoration: none'><font color='#FF7F00'>Você pode clicar na imagem para voltar</font><p><img border='0' src='img/cones.png' width='544' height='332'></a></p>O Erro de conexão com banco de dados esta descrito logo abaixo!<BR>".mysql_error());
 
$atu = "UPDATE professor_dados_pessoais SET

prof_id					= '$prof_id',
prof_ra					= '$prof_ra',
prof_nome				= '$prof_nome',
prof_sexo				= '$prof_sexo',
prof_data				= '$prof_data',
prof_nascimento			= '$prof_nascimento',
prof_estado				= '$prof_estado',
prof_nacionalidade 		= '$prof_nacionalidade',
prof_cor				= '$prof_cor',
prof_pai				= '$prof_pai',
prof_mae				= '$prof_mae',
prof_cidade				= '$prof_cidade',
prof_endereco			= '$prof_endereco',
prof_bairro 			= '$prof_bairro',
prof_numero				= '$prof_numero',
prof_cep				= '$prof_cep',
prof_email				= '$prof_email',
prof_tel_1				= '$prof_tel_1',
prof_tel_2				= '$prof_tel_2',
prof_tel_3				= '$prof_tel_3'	

WHERE prof_id=$prof_id";

$sucesso = mysql_query($atu);

if ($sucesso){
   echo '<div id=div1><h1><center>Atualização realizada com sucesso!</h1></center>';
}else{
   die (mysql_error());
}
 
mysql_close($conexao);
?>
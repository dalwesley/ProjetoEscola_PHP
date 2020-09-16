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


$login_nome						= $_POST ["login_nome"];
$login_usuario_ra				= $_POST ["login_usuario_ra"];
$login_usuario_id				= $_POST ["login_usuario_id"];
$login_senha					= $_POST ["login_senha"];
$login_nivel					= $_POST ["login_nivel"];
$login_ativo					= $_POST ["login_ativo"];
$login_email					= $_POST ["login_email"];
$login_tel_1					= $_POST ["login_tel_1"];
$login_tel_2					= $_POST ["login_tel_2"];
$login_cadastrado_por			= $_POST ["login_cadastrado_por"];
$login_data_cadastro			= date('Y-m-d');

//Gravando no banco de dados !
//conectando com o localhost - mysql

$conexao = mysql_connect($host, $userbd, $senhabd);
if (!$conexao)
	die ("Erro de conexão com localhost, o seguinte erro ocorreu -> ".mysql_error());

//conectando com a tabela do banco de dados
$banco = mysql_select_db($bd,$conexao);
if (!$banco)
	die ("<center><h1>OOOPS!<BR>Não é esta a pagina que você esperava ver?<BR> Então algo esta errado...</h1><a href='home.php' style='text-decoration: none'><font color='#FF7F00'>Você pode clicar na imagem para voltar</font><p><img border='0' src='img/cones.png' width='544' height='332'></a></p>O Erro de conexão com banco de dados esta descrito logo abaixo!<BR>".mysql_error());
 
$atu = "UPDATE usuario_dados_login SET

login_nome					= '$login_nome',
login_usuario_ra			= '$login_usuario_ra',
login_usuario_id			= '$login_usuario_id',
login_senha					= '$login_senha',
login_nivel					= '$login_nivel',
login_ativo					= '$login_ativo',
login_email					= '$login_email',
login_tel_1					= '$login_tel_1',
login_tel_2					= '$login_tel_2',
login_cadastrado_por		= '$login_cadastrado_por',
login_data_cadastro			= date('Y-m-d')

WHERE login_usuario_id=$login_usuario_id";

$sucesso = mysql_query($atu);

if ($sucesso){
   echo '<div id=div1><h1><center>Atualização realizada com sucesso!</h1></center>';
}else{
   die (mysql_error());
}
 
mysql_close($conexao);
?>
<script language="javascript">setTimeout("window.history.go(-2);",1000)</script>
<?php 

//PREENCHA OS DADOS DE CONEXÃO A SEGUIR:
  
$host= '127.0.0.1';
$bd= 'escola';
$senhabd= '';
$userbd = 'root';
 
 
// RECEBENDO OS DADOS PREENCHIDOS DO FORMULÁRIO !

$usuario_id				= $_POST ["usuario_id"];
$usuario_nome			= $_POST ["usuario_nome"];
$usuario_login			= $_POST ["usuario_login"];
$usuario_senha			= $_POST ["usuario_senha"];
$usuario_nivel			= $_POST ["usuario_nivel"];
$usuario_sexo			= $_POST ["usuario_sexo"];
$usuario_data			= $_POST ["usuario_data"];
$usuario_nascimento		= $_POST ["usuario_nascimento"];
$usuario_estado			= $_POST ["usuario_estado"];
$usuario_nacionalidade	= $_POST ["usuario_nacionalidade"];
$usuario_cor			= $_POST ["usuario_cor"];
$usuario_pai			= $_POST ["usuario_pai"];
$usuario_mae			= $_POST ["usuario_mae"];
$usuario_cidade			= $_POST ["usuario_cidade"];
$usuario_endereço		= $_POST ["usuario_endereço"];
$usuario_bairro 		= $_POST ["usuario_bairro"];
$usuario_numero			= $_POST ["usuario_numero"];
$usuario_cep			= $_POST ["usuario_cep"];
$usuario_email			= $_POST ["usuario_email"];
$usuario_tel_1			= $_POST ["usuario_tel_1"];
$usuario_tel_2			= $_POST ["usuario_tel_2"];
$usuario_ativo			= $_POST ["usuario_ativo"];
$usuario_cadastro		= $_POST ["usuario_cadastro"];

//Gravando no banco de dados !
//conectando com o localhost - mysql

$conexao = mysql_connect($host, $userbd, $senhabd);
if (!$conexao)
	die ("Erro de conexão com localhost, o seguinte erro ocorreu -> ".mysql_error());
//conectando com a tabela do banco de dados
$banco = mysql_select_db($bd,$conexao);
if (!$banco)
	die ("<center><h1>OOOPS!<BR>Não é esta a pagina que você esperava ver?<BR> Então algo esta errado...</h1><a href='home.php' style='text-decoration: none'><font color='#FF7F00'>Você pode clicar na imagem para voltar</font><p><img border='0' src='img/cones.png' width='544' height='332'></a></p>O Erro de conexão com banco de dados esta descrito logo abaixo!<BR>".mysql_error());
 
$atu = "UPDATE usuario SET

usuario_id				= '$usuario_id',
usuario_nome			= '$usuario_nome',
usuario_login			= '$usuario_login',
usuario_senha			= '$usuario_senha',
usuario_nivel			= '$usuario_nivel',
usuario_sexo			= '$usuario_sexo',
usuario_data			= '$usuario_data',
usuario_nascimento		= '$usuario_nascimento',
usuario_estado			= '$usuario_estado',
usuario_nacionalidade	= '$usuario_nacionalidade',
usuario_cor				= '$usuario_cor',
usuario_pai				= '$usuario_pai',
usuario_mae				= '$usuario_mae',
usuario_cidade			= '$usuario_cidade',
usuario_endereço		= '$usuario_endereço',
usuario_bairro 			= '$usuario_bairro',
usuario_numero			= '$usuario_numero',
usuario_cep				= '$usuario_cep',
usuario_email			= '$usuario_email',
usuario_tel_1			= '$usuario_tel_1',
usuario_tel_2			= '$usuario_tel_2',
usuario_cadastro		= '$usuario_cadastro',
usuario_ativo			= '$usuario_ativo'

WHERE usuario_id=$usuario_id";

$sucesso = mysql_query($atu);

if ($sucesso){
   echo '<h1><center>Atualização realizada com sucesso!</h1></center>';
}else{
   die (mysql_error());
}
 
mysql_close($conexao);
?>
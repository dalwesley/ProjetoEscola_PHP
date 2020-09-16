<script language="javascript">

setTimeout( 'fechar(); ',2000); //fecha a janela em 5 segundos

function fechar(){

if(document.all){

window.opener = window

window.close("#")

}else{

self.close();

}

}

</script>
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

$aluno_id				= $_POST ["aluno_id"];
$aluno_ra				= $_POST ["aluno_ra"];
$aluno_nome				= $_POST ["aluno_nome"];
$aluno_sexo				= $_POST ["aluno_sexo"];
$aluno_data				= $_POST ["aluno_data"];
$aluno_nascimento		= $_POST ["aluno_nascimento"];
$aluno_estado			= $_POST ["aluno_estado"];
$aluno_nacionalidade    = $_POST ["aluno_nacionalidade"];
$aluno_cor				= $_POST ["aluno_cor"];
$aluno_pai				= $_POST ["aluno_pai"];
$aluno_mae				= $_POST ["aluno_mae"];
$aluno_cidade			= $_POST ["aluno_cidade"];
$aluno_endereço			= $_POST ["aluno_endereço"];
$aluno_bairro 			= $_POST ["aluno_bairro"];
$aluno_numero			= $_POST ["aluno_numero"];
$aluno_cep				= $_POST ["aluno_cep"];
$aluno_email			= $_POST ["aluno_email"];
$aluno_tel_1			= $_POST ["aluno_tel_1"];
$aluno_tel_2			= $_POST ["aluno_tel_2"];
$aluno_tel_3			= $_POST ["aluno_tel_3"];

//Gravando no banco de dados !
//conectando com o localhost - mysql

$conexao = mysql_connect($host, $userbd, $senhabd);
if (!$conexao)
	die ("Erro de conexão com localhost, o seguinte erro ocorreu -> ".mysql_error());

//conectando com a tabela do banco de dados
$banco = mysql_select_db($bd,$conexao);
if (!$banco)
	die ("<center><h1>OOOPS!<BR>Não é esta a pagina que você esperava ver?<BR> Então algo esta errado...</h1><a href='home.php' style='text-decoration: none'><font color='#FF7F00'>Você pode clicar na imagem para voltar</font><p><img border='0' src='img/cones.png' width='544' height='332'></a></p>O Erro de conexão com banco de dados esta descrito logo abaixo!<BR>".mysql_error());
 
$atu = "UPDATE dados_pessoais_aluno SET

aluno_id			= '$aluno_id',
aluno_ra			= '$aluno_ra',
aluno_nome			= '$aluno_nome',
aluno_sexo			= '$aluno_sexo',
aluno_data			= '$aluno_data',
aluno_nascimento	= '$aluno_nascimento',
aluno_estado		= '$aluno_estado',
aluno_nacionalidade = '$aluno_nacionalidade',
aluno_cor			= '$aluno_cor',
aluno_pai			= '$aluno_pai',
aluno_mae			= '$aluno_mae',
aluno_cidade		= '$aluno_cidade',
aluno_endereço		= '$aluno_endereço',
aluno_bairro 		= '$aluno_bairro',
aluno_numero		= '$aluno_numero',
aluno_cep			= '$aluno_cep',
aluno_email			= '$aluno_email',
aluno_tel_1			= '$aluno_tel_1',
aluno_tel_2			= '$aluno_tel_2',
aluno_tel_3			= '$aluno_tel_3'

WHERE aluno_id=$aluno_id";

$sucesso = mysql_query($atu);

if ($sucesso){
   echo '<div id=div1><h1><center>Atualização realizada com sucesso!</h1></center>';
}else{
   die (mysql_error());
}
 
mysql_close($conexao);
?>
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
$prof_proced_id							= $_POST ["prof_proced_id"];
$prof_proced_escola						= $_POST ["prof_proced_escola"];
$prof_proced_ano_inicio					= $_POST ["prof_proced_ano_inicio"];
$prof_proced_ano_fim					= $_POST ["prof_proced_ano_fim"];
$prof_proced_pais						= $_POST ["prof_proced_pais"];
$prof_proced_estado						= $_POST ["prof_proced_estado"];
$prof_proced_cidade						= $_POST ["prof_proced_cidade"];
$prof_proced_bairro						= $_POST ["prof_proced_bairro"];
$prof_proced_trabalhou_na_escola		= $_POST ["prof_proced_trabalhou_na_escola"];
$prof_proced_secretario					= $_POST ["prof_proced_secretario"];
$prof_proced_diretor					= $_POST ["prof_proced_diretor"];
$prof_proced_prof_id					= $_POST ["prof_proced_prof_id"];
$prof_proced_prof_nome					= $_POST ["prof_proced_prof_nome"];


//Gravando no banco de dados !
//conectando com o localhost - mysql

$conexao = mysql_connect($host, $userbd, $senhabd);
if (!$conexao)
	die ("Erro de conexão com localhost, o seguinte erro ocorreu -> ".mysql_error());

//conectando com a tabela do banco de dados
$banco = mysql_select_db($bd,$conexao);
if (!$banco)
	die ("<center><h1>OOOPS!<BR>Não é esta a pagina que você esperava ver?<BR> Então algo esta errado...</h1><a href='home.php' style='text-decoration: none'><font color='#FF7F00'>Você pode clicar na imagem para voltar</font><p><img border='0' src='img/cones.png' width='544' height='332'></a></p>O Erro de conexão com banco de dados esta descrito logo abaixo!<BR>".mysql_error());
 
$atu = "UPDATE professor_procedencia SET

prof_proced_id						= '$prof_proced_id',
prof_proced_escola					= '$prof_proced_escola',
prof_proced_ano_inicio				= '$prof_proced_ano_inicio',
prof_proced_ano_fim					= '$prof_proced_ano_fim',
prof_proced_pais					= '$prof_proced_pais',
prof_proced_estado					= '$prof_proced_estado',
prof_proced_cidade					= '$prof_proced_cidade',
prof_proced_bairro					= '$prof_proced_bairro',
prof_proced_trabalhou_na_escola		= '$prof_proced_trabalhou_na_escola',
prof_proced_secretario				= '$prof_proced_secretario',
prof_proced_diretor					= '$prof_proced_diretor',
prof_proced_prof_id					= '$prof_proced_prof_id',
prof_proced_prof_nome				= '$prof_proced_prof_nome'

WHERE prof_proced_id=$prof_proced_id";



$sucesso = mysql_query($atu);

if ($sucesso){
echo '<div id=div1><h1><center>Atualização realizada com sucesso!</h1></center>';
}else{
   die (mysql_error());
}
 
mysql_close($conexao);
?>
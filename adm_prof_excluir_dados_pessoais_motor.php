<script language="javascript">setTimeout("self.close();",1000)</script>
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
$opcoes = $_POST['cod'];
$opcoes_text = implode(", ", $opcoes);
$conex = mysql_connect("localhost", "root", "");
mysql_select_db("escola", $conex);
$excluir = "DELETE FROM professor_dados_pessoais WHERE prof_id in (" . $opcoes_text . ")";
mysql_query($excluir, $conex) or die("<center><h1>OOOPS!<BR>N�o � esta a pagina que voc� esperava ver?<BR> Ent�o algo esta errado...
</h1><a href='home.php' style='text-decoration: none'><font color='#FF7F00'>Voc� pode clicar na imagem para voltar</font><p><img border='0' src='img/cones.png' width='544' height='332'></a></p>O Erro de conex�o com banco de dados esta descrito logo abaixo!<BR>".mysql_error());
if ($excluir){
   echo "<div id=div1><h1><center>Exclus�o realizada com sucesso!</h1>";
}else{
   die (mysql_error());
}
?>
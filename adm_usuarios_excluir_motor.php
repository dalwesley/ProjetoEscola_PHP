<script language="javascript">setTimeout("window.history.go(-2);",1000)</script>
<?php
$opcoes = $_POST['cod'];
$opcoes_text = implode(", ", $opcoes);
$conex = mysql_connect("localhost", "root", "");
mysql_select_db("escola", $conex);
$excluir = "DELETE FROM usuario WHERE usuario_id in (" . $opcoes_text . ")";
mysql_query($excluir, $conex) or die("<center><h1>OOOPS!<BR>N�o � esta a pagina que voc� esperava ver?<BR> Ent�o algo esta errado...</h1><a href='home.php' style='text-decoration: none'><font color='#FF7F00'>Voc� pode clicar na imagem para voltar</font><p><img border='0' src='img/cones.png' width='544' height='332'></a></p>O Erro de conex�o com banco de dados esta descrito logo abaixo!<BR>".mysql_error());
if ($excluir){
   echo "<h1><center>Exclus�o realizada com sucesso!</h1>";
}else{
   die (mysql_error());
}
?>
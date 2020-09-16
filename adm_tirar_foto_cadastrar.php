<?php
include "seguranca.php";
?>
<style type="text/css">

	#div1 {
			width:100%; /* Tamanho da Largura da Div */
			height:100%; /* Tamanho da Altura da Div */
	        top: 0; 
	        margin-top:0%; /* ou seja ele pega 50% da altura tela e sobe metade do valor da altura no caso 100 */
	        left:0;
	        margin-left:0; /* ou seja ele pega 50% da largura tela e diminui  metade do valor da largura no caso 250 */

}

</style>
</head>
<meta charset="utf-8">
<title>Cadastrar Foto</title>
<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<?php
$conex = mysql_connect("localhost", "root", "");
mysql_select_db("escola", $conex);
$id_select = $_GET['id']; //Recupera a variavel id para fazer o select
$sql = "SELECT * FROM dados_pessoais_aluno where aluno_id=$id_select"; //Faz o select de todos os registros
$query = mysql_query($sql) or die("<center><h1>OOOPS!<BR>Não é esta a pagina que você esperava ver?<BR> Então algo esta errado...</h1><a href='home.php' style='text-decoration: none'><font color='#FF7F00'>Você pode clicar na imagem para voltar</font><p><img border='0' src='img/cones.png' width='544' height='332'></a></p>O Erro de conexão com banco de dados esta descrito logo abaixo!<BR>".mysql_error());
$linha = mysql_fetch_assoc($query);

		$aluno_id		= $linha['aluno_id'];
		$aluno_ra		= $linha['aluno_ra'];				
		$aluno_nome		= $linha['aluno_nome'];

echo"<form id='cadastro' name='cadastro' method='post' action='adm_foto_cadastrar_motor.php' enctype='multipart/form-data'>
<div id=div1>
<fieldset style='border-style: solid; border-width: 1px; background-color:#F0F0F0'>
<table border='1' width='100%' cellspacing='0' cellpadding='3'  bordercolor='#FFF' height='0' style='border-collapse: collapse'> 
	<tr><td align=center>
			<center>Cadastrando foto para <i><strong>$aluno_nome - $aluno_ra</center></i></strong>
		</td>
	</tr>
</table>
</fieldset>
<input type='hidden' name='foto_aluno_nome' value='$linha[aluno_nome]' size='70'> <input type='hidden' name='foto_aluno_id' value='$linha[aluno_id]' size='3'>
<fieldset style='border-style: solid; border-width: 1px; background-color:#F0F0F0'>
<legend><B>Identificação</B></legend>
	<pre><video id='video' width='340' height='240' autoplay></video><canvas id='canvas' width='340' height='240'></canvas></pre>
</fieldset>
<fieldset style='border-style: solid; border-width: 1px; background-color:#F0F0F0'>
<legend><B>Opções</B></legend>
<table border='1' width='100%' cellspacing='0' cellpadding='3'  bordercolor='#FFFFFF' height='0' style='border-collapse: collapse'> 
	<tr>
		<td align=center bgcolor=#FFFFFF><B>Cadastrar</B>
		</td>
		<td align=center bgcolor=#FFFFFF><B>Limpar</B>
		</td>
	</tr>
	<tr>
		<td align='center'>
			<button id='snap'>Tirar Foto</button>
		</td>
		<td align='center'>		
			<button id='save'>Salvar Foto</button>
		</td>
	</tr>
</table>
</div>
</form>";
?>
<script>
    window.addEventListener("DOMContentLoaded", function() {
        var canvas = document.getElementById("canvas"),
        context = canvas.getContext("2d"),
        video = document.getElementById("video"),
        videoObj = { "video": true },
        errBack = function(error) {
                console.log("Video capture error: ", error.code); 
        };  
        if(navigator.getUserMedia) {
            navigator.getUserMedia(videoObj, function(stream) {
                video.src = stream;
                video.play();
            }, errBack);
        } else if(navigator.webkitGetUserMedia) {
            navigator.webkitGetUserMedia(videoObj, function(stream){
                video.src = window.webkitURL.createObjectURL(stream);
                video.play();
            }, errBack);
        }
        else if(navigator.mozGetUserMedia) {
            navigator.mozGetUserMedia(videoObj, function(stream){
                video.src = window.URL.createObjectURL(stream);
                video.play();
            }, errBack);
        }
    }, false);
    document.getElementById("snap").addEventListener("click", function() {      
        canvas.getContext("2d").drawImage(video, 0, 0, 340, 240);       
        //alert(canvas.toDataURL());
    });
    document.getElementById("save").addEventListener("click", function() {      
        $.post('fotossalvar.php', {imagem:canvas.toDataURL()}, function(data){
        },'json');
    });
</script>    
</body>
</html>
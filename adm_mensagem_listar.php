<?php
include "seguranca_1.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
	<title>A+ - Sistema Integrado</title>
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- As 3 meta tags acima *devem* vir em primeiro lugar dentro do `head`; qualquer outro conteúdo deve vir *após* essas tags -->
    
    <link href="css/bootstrap.min.css" rel="stylesheet">								<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">					<!-- Incluindo o CSS do Bootstrap -->
	<script src="http://code.jquery.com/jquery-latest.js"></script>						<!-- Incluindo o jQuery que é requisito do JavaScript do Bootstrap -->
	<script src="js/bootstrap.min.js"></script>											<!-- Incluindo o JavaScript do Bootstrap -->
<style type="text/css">

	#div1 {
			width:100%; /* Tamanho da Largura da Div */
			height:0; /* Tamanho da Altura da Div */
	        top: 0%; 
	        margin-top:0%; /* ou seja ele pega 50% da altura tela e sobe metade do valor da altura no caso 100 */
	        left:0;
	        margin-left:0; /* ou seja ele pega 50% da largura tela e diminui  metade do valor da largura no caso 250 */

}
	#div2 {
			width:100%; /* Tamanho da Largura da Div */
			height:0; /* Tamanho da Altura da Div */
	        top: 0%; 
	        margin-top:30%; /* ou seja ele pega 50% da altura tela e sobe metade do valor da altura no caso 100 */
	        left:0;
	        margin-left:0; /* ou seja ele pega 50% da largura tela e diminui  metade do valor da largura no caso 250 */

}
</style>
<?php
date_default_timezone_set('America/Sao_Paulo');
include "conecta.php";

$dia_select = date('d'); //Recupera a variavel id para fazer o select
$mes_select = date('m'); //Recupera a variavel id para fazer o select

$sql = "SELECT *, DATE_FORMAT(mural_data_cadastro, '%d/%m/%Y') as 'mural_data_cadastro' FROM mural where mural.mural_mes='$mes_select' AND mural.mural_dia='$dia_select' ORDER BY mural_dia ASC"; //Faz o select de todos os registros
$query = mysql_query($sql) or die("<center><h1>OOOPS!<BR>Não é esta a pagina que você esperava ver?<BR> Então algo esta errado...</h1><a href='home.php' style='text-decoration: none'><font color='#FF7F00'>Você pode clicar na imagem para voltar</font><p><img border='0' src='img/cones.png' width='544' height='332'></a></p>O Erro de conexão com banco de dados esta descrito logo abaixo!<BR>".mysql_error());
$result = mysql_num_rows($query);

if($result>0) {

echo"
<center>
	<div class='container-fluid'>
		<div class='row'>
			<div class='col-sm-12'>
				<div class='well well-sm'>
					<a href='adm_mensagem_cadastrar.php?m=$mes_select&&d=$dia_select','mural' title='cadastrar mensagem para o dia $dia_select do mês $mes_select' class='alert-link'>
						<table border='0' width='100%' cellspacing='0' cellpadding='3'  bordercolor='#FFF' height='0' style='border-collapse: collapse'> 
							<tr>
								<td height='1' width='1'>
									<span class='glyphicon glyphicon-envelope' aria-hidden='true' style='font-size: 17px'></span>
								</td>
								<td>
									<center>Exibindo <B><i>".$result."</i></B> resultado(s) para o mês $mes_select </center></i></strong>
								</td>
							</tr>
						</table>
					</a>
				</div>
			</div>
		</div></center>";

    while($linha = mysql_fetch_array($query)) {

$mural_id				= $linha ['mural_id'];
$mural_remetente		= $linha ['mural_remetente'];
$mural_assunto			= $linha ['mural_assunto'];
$mural_mensagem			= $linha ['mural_mensagem'];
$mural_prioridade		= $linha ['mural_prioridade'];
$mural_data_cadastro	= $linha ['mural_data_cadastro'];
$mural_dia				= $linha ['mural_dia'];
$mural_mes				= $linha ['mural_mes'];

echo"
		<div class='row-fluid'>
			<div class='col-sm-12'>
				<div class='alert alert-$mural_prioridade' role='alert'>
					<table border='0' height='1' width='%'> 
						<tr>
							<td height='5%' width='5%'>
								<a href='adm_mensagem_visualizar.php?id=$mural_id' class='alert-link' title='Visualizar Mensagem'>
									<span class='glyphicon glyphicon-zoom-in' aria-hidden='true' style='font-size: 17px'></span>
								</a>
							</td>
							<td>
								<blockquote>
									<p>$mural_assunto</p>
									<footer><em>$mural_remetente em $mural_dia/$mural_mes</em></footer>
								</blockquote>
							</td>
							<td height='5%' width='5%'>
								<center><span class='badge'>";
$id_select = $mural_id; //Recupera a variavel id para fazer o select
$sql2 = "SELECT * FROM mural_resposta where mural_mensagem_original_id='$mural_id'"; //Faz o select de todos os registros
$query2 = mysql_query($sql2) or die ("Erro de conexão com localhost, o seguinte erro ocorreu -> ".mysql_error());
$result = mysql_num_rows($query2);

if($result>=1) {

   echo"$result";
    }
 else {
echo"0";
}
							echo"</span>
								</td>
							</tr>
						</table>
					</a>
				</div>
			</div>";
    }
} else {
echo"
<div id=div2>
		<div class='row-fluid'>
			<div class='col-sm-12'>
				<div class='panel panel-default'>
					<div class='panel-heading'>
						<h3 class='panel-title'><center>
							<B>$dia_select</B>/<B>$mes_select</B> Sem Mensagem cadastrada!
						</h3>
					</div>
					<div class='panel-body'><center>
						<b>Cadastrar<br>
						<a href='adm_mensagem_cadastrar.php?m=$mes_select&&d=$dia_select' style='text-decoration: none'>
						<img src='img/new.png' border='0' width='24' height='24' title='Cadastrar'></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>";
}
?>
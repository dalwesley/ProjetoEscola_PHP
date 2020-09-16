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
	<script language="JavaScript">
function abrir(URL) {
var width = 700;
var height = 680;
var left = 657;
var top = 0;
window.open(URL,'janela', 'width='+width+', height='+height+', top='+top+', left='+left+', scrollbars=no, status=no, toolbar=no, location=no, directories=no, menubar=no, resizable=no, fullscreen=no');
}
</script>
</head>
<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
$conex = mysql_connect("localhost", "root", "");
mysql_select_db("escola", $conex);
$id_select = $_SESSION['UsuarioID']; //Recupera a variavel id para fazer o select
$sql = "SELECT * FROM usuario_dados_pessoais where usuario_id=$id_select"; //Faz o select de todos os registros
$query = mysql_query($sql) or die("<center><h1>OOOPS!<BR>Não é esta a pagina que você esperava ver?<BR> Então algo esta errado...</h1><a href='home.php' style='text-decoration: none'><font color='#FF7F00'>Você pode clicar na imagem para voltar</font><p><img border='0' src='img/cones.png' width='544' height='332'></a></p>O Erro de conexão com banco de dados esta descrito logo abaixo!<BR>".mysql_error());
$linha = mysql_fetch_assoc($query);

		$usuario_ra					= $linha['usuario_ra'];
		$usuario_id					= $linha['usuario_id'];
		$usuario_nome				= $linha['usuario_nome'];
?>
<body>
<nav class="navbar navbar-default">
	<div class="container-fluid">
	<div class='row'>
		<form class="navbar-form" role="search" action='buscador_resultado.php' target='03' method="post" name="form1" id="form1">
			<div class="col-md-3 col-xs-1">
				<div class="btn-group" role="group" aria-label="...">
					<button type="button" class="btn btn-default" aria-label="usuario">
						<span class="glyphicon glyphicon-user" aria-hidden="true" title="<?php echo $_SESSION['UsuarioNome'];?> - <?php echo $_SESSION['UsuarioNivel'];?>" onClick="window.open('logout.php','_parent','');"></span>
					</button>
					<button type="button" class="btn btn-default">
						<span class="glyphicon glyphicon-home" aria-hidden="true" onClick="window.open('adm_home.php','03');"></span>
					</button>
					<button type="button" class="btn btn-default">
						<span class="glyphicon glyphicon-plus" aria-hidden="true" onClick="window.open('cadastro.php','03');"></span>
					</button>
				</div>
			</div>
			<div class="col-md-4">
			</div>
			<div class="col-md-5 col-xs-8">
				<div class="input-group">
					<div class="input-group">
						<input type="text" class="form-control" name='busca' id='busca' aria-label="...">
						<div class="input-group-btn">
							<select name="categorias" id="categorias" class="form-control"> 
								<option value="Selecione o tipo..." selected="selected">
									Selecione
								</option> 
								<?php 
									include "conecta.php"; 
									$pega_tipos = mysql_query("SELECT * FROM categorias"); 
									if(mysql_num_rows($pega_tipos) == 0){ 
									echo '<option value="x">Não foram encontrados tipos</option>'; 
									} else { 
									while ($linhatipo = mysql_fetch_array($pega_tipos)){ 
									echo '<option value="'.$linhatipo['id_cat'].'">'.$linhatipo['id_cat'].' - '.$linhatipo['cat'].'</option>'; 
									} 
									} 
								?> 
							</select>
							<button class="btn btn-default" type="submit" value="Buscar">
								<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
							</button>
						</div><!-- /btn-group -->
					</div><!-- /input-group -->
				</div><!-- /input-group -->	
			</div><!-- /.col-md-9 -->
		</form>
	</div><!-- /.container-fluid -->
</nav>
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

</head>

<?php
include ('conecta.php');
$id_select1 = $_GET['id'];		//Recupera a variavel id para fazer o select
$sql = "SELECT * FROM professor_dados_pessoais where prof_id=$id_select1"; //Faz o select de todos os registros
$query = mysql_query($sql) or die("<center><h1>OOOPS!<BR>Não é esta a pagina que você esperava ver?<BR> Então algo esta errado...</h1><a href='home.php' style='text-decoration: none'><font color='#FF7F00'>Você pode clicar na imagem para voltar</font><p><img border='0' src='img/cones.png' width='544' height='332'></a></p>O Erro de conexão com banco de dados esta descrito logo abaixo!<BR>".mysql_error());
$linha = mysql_fetch_assoc($query);

		$prof_ra				= $linha['prof_ra'];
		$prof_id				= $linha['prof_id'];
		$prof_nome				= $linha['prof_nome'];
?>
<?php
include "conecta.php";
$es_date = date('d-m-Y - H:i');
$id_select = $_GET['id']; //Recupera a variavel id para fazer o select
$sql = mysql_query("SELECT * from professor_procedencia where prof_proced_prof_id=$id_select");
$result = mysql_num_rows($sql);
$valor = 0;

if($result>=1) {

echo"
<div class='container-fluid'>
	<div class='row'>
		<div class='col-sm-12'>
			<div class='alert alert-success' role='alert'>
				<table border='0' width='100%' cellspacing='0' cellpadding='3'  bordercolor='#FFF' height='0' style='border-collapse: collapse'> 
					<tr>
						<td height='1' width='1'>
							<span class='glyphicon glyphicon-map-marker' aria-hidden='true' style='font-size: 19px' title='Procedência do professor'></span>
						</td>
						<td>
							<center>Exibindo <B><i>procedência</i></B>  para <i><strong>$prof_nome - $prof_ra</center></i></strong>
						</td>
					</tr>
				</table>
			</div>
		</div>
	</div>";

	   while($linha = mysql_fetch_array($sql)) {

$prof_proced_id							= $linha['prof_proced_id'];
$prof_proced_escola						= $linha['prof_proced_escola'];
$prof_proced_ano_inicio					= $linha['prof_proced_ano_inicio'];
$prof_proced_ano_fim					= $linha['prof_proced_ano_fim'];
$prof_proced_pais						= $linha['prof_proced_pais'];
$prof_proced_estado						= $linha['prof_proced_estado'];
$prof_proced_cidade						= $linha['prof_proced_cidade'];
$prof_proced_bairro						= $linha['prof_proced_bairro'];
$prof_proced_trabalhou_na_escola		= $linha['prof_proced_trabalhou_na_escola'];
$prof_proced_secretario					= $linha['prof_proced_secretario'];
$prof_proced_diretor					= $linha['prof_proced_diretor'];
$prof_proced_prof_id					= $linha['prof_proced_prof_id'];
$prof_proced_prof_nome					= $linha['prof_proced_prof_nome'];
$prof_proced_data 						= $linha['prof_proced_data'];
$valor++;

echo"
		<div class='row'>
			<div class='col-sm-12'>
				<div class='panel-group' id='accordion' role='tablist' aria-multiselectable='false'>
					<div class='panel panel-default'>
						<div class='panel-heading' role='tab' id='heading$valor'>
							<h4 class='panel-title'>
								<a role='button' data-toggle='collapse' data-parent='#accordion' href='#collapse$valor' aria-expanded='true' aria-controls='collapseOne' title='Clique para comentar essa mensagem!'>
									$valor - $prof_proced_escola
								</a>
							</h4>
						</div>
						<div id='collapse$valor' class='panel-collapse collapse' role='tabpanel' aria-labelledby='heading$valor'>
							<div class='panel-body'>
								Escola ou Equivalente:	 <B>$prof_proced_escola</B> - Periodo: <B>$prof_proced_ano_inicio - $prof_proced_ano_fim</B>
								<BR>Cidade:		<B>$prof_proced_cidade</B>
								<BR>Bairro:		<B>$prof_proced_bairro</B>
								<BR>Estado:		<B>$prof_proced_estado</B>
								<BR>
								<BR>Secretario:	<B>$prof_proced_secretario</B>
								<BR>Direção:	<B>$prof_proced_diretor</B>
								<BR>
								<BR>Já trabalhou nesta escola? <B>$prof_proced_trabalhou_na_escola</B></td></pre>
							<div class='panel-body'>
								<div class='btn-group btn-group-justified' role='group' aria-label='...'>
									<div class='btn-group' role='group'>
										<a href='adm_prof_procedencia_editar.php?id=$prof_proced_prof_id&&opcao=$prof_proced_id' class='alert-link' title='Editar'>
											<button type='image' name='Editar'  id='button' value='Editar' class='btn btn-default btn-sm'>
												Editar <span class='glyphicon glyphicon-pencil' aria-hidden='true'></span>
											</button>
										</a>
									</div>
									<div class='btn-group' role='group'>
										<a href='adm_prof_procedencia_excluir.php?id=$prof_proced_prof_id&&opcao=$prof_proced_id' class='alert-link' title='Excluir'>
											<button type='image' name='Excluir'  id='button' value='Excluir' class='btn btn-default btn-sm'>
												Excluir <span class='glyphicon glyphicon-trash' aria-hidden='true'></span>
											</button>
										</a>
									</div>
									<div class='btn-group' role='group'>
										<a href=onClick='imprime()' class='alert-link' title=''>
											<button type='image' name='Excluir'  id='button' value='Excluir' class='btn btn-default btn-sm'>
												Imprimir <span class='glyphicon glyphicon-print' aria-hidden='true' ></span>
											</button>
										</a>
									</div>
								</div>				
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>";
    }
echo"	<div class='row'>
			<div class='col-sm-12'>
				<div class='panel panel-default'>
					<div class='panel-heading'>
						<center><i><strong>Opções</i></strong></center>
					</div>
					<div class='panel-body'>
						<div class='btn-group btn-group-justified' role='group' aria-label='...'>
							<div class='btn-group' role='group'>
								<a href='adm_prof_procedencia_cadastrar.php?id=$prof_proced_prof_id' class='alert-link' title='Cadastrar Procedencia'>
									<button type='image' name='Cadastrar'  id='button' value='Cadastrar' class='btn btn-default btn-sm'>
										Cadastrar Entrada <span class='glyphicon glyphicon-map-marker' aria-hidden='true' title='Procedência do professor'></span>
									</button>
								</a>
							</div>
							<div class='btn-group' role='group'>
								<a href=onClick='imprime()' class='alert-link' title='Imprimir Procedencia'>
									<button type='image' name='Imprimir'  id='button' value='Imprimir' class='btn btn-default btn-sm'>
										Imprimir <span class='glyphicon glyphicon-print' aria-hidden='true' ></span>
									</button>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>";

} else {
echo"<div id=div2>
		<div class='row-fluid'>
			<div class='col-sm-12'>
				<div class='panel panel-default'>
					<div class='panel-heading'>
						<center><i><strong>".$linha['aluno_nome']."</i></strong> sem ocorrência cadastrada!
					</div>
					<div class='panel-body'>
						<div class='btn-group btn-group-justified' role='group' aria-label='...'>
							<div class='btn-group' role='group'>
								<a href='adm_prof_procedencia_cadastrar.php?id=$aluno_id' class='alert-link' title='Cadastrar procedencia'>
									<button type='image' name='Cadastrar'  id='button' value='Cadastrar' class='btn btn-default btn-sm'>
										Cadastrar ocorrência <span class='glyphicon glyphicon-map-marker' aria-hidden='true' style='font-size: 19px' title='Procedência do Professor'></span>
									</button>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>";
}
?>
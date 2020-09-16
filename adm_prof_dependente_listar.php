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
<script language="JavaScript">
function abrir(URL) {
var width = 700;
var height = 680;
var left = 657;
var top = 0;
window.open(URL,'janela', 'width='+width+', height='+height+', top='+top+', left='+left+', scrollbars=no, status=no, toolbar=no, location=no, directories=no, menubar=no, resizable=no, fullscreen=no');
}
</script>

<script language='javascript'>
				function imprime(text){
				text=document
				print(text) }	     
</script>
</head>
<?php
include "conecta.php";
$id_select = $_GET['id']; //Recupera a variavel id para fazer o select
$sql = "SELECT * FROM professor_dados_pessoais where prof_id=$id_select"; //Faz o select de todos os registros
$query = mysql_query($sql) or die("<center><h1>OOOPS!<BR>Não é esta a pagina que você esperava ver?<BR> Então algo esta errado...</h1><a href='home.php' style='text-decoration: none'><font color='#FF7F00'>Você pode clicar na imagem para voltar</font><p><img border='0' src='img/cones.png' width='544' height='332'></a></p>O Erro de conexão com banco de dados esta descrito logo abaixo!<BR>".mysql_error());
$linha = mysql_fetch_assoc($query);


		$prof_id		= $linha['prof_id'];
		$prof_nome		= $linha['prof_nome'];
		$prof_ra		= $linha['prof_ra'];
?>
<?php
include "conecta.php";
$id_select = $_GET['id']; //Recupera a variavel id para fazer o select
$sql = mysql_query("SELECT * FROM professor_dependentes left join professor_dados_pessoais ON professor_dependentes.prof_dependente_id=professor_dados_pessoais.prof_id WHERE professor_dados_pessoais.prof_id=$id_select")or die(mysql_error());
$result = mysql_num_rows($sql);
$valor = 0;	

if($result>=1)  {
echo"
	<div class='container-fluid'>
		<div class='row'>
			<div class='col-sm-12'>
				<div class='alert alert-success' role='alert'>
					<table border='0' width='100%' cellspacing='0' cellpadding='3'  bordercolor='#FFF' height='0' style='border-collapse: collapse'> 
						<tr>
							<td height='1' width='1'>
								<span class='glyphicon glyphicon-user' aria-hidden='true' style='font-size: 17px'></span>
							</td>
							<td>
								<center>Exibindo responsável para <i><strong>$prof_nome - $prof_ra</center></i></strong>
							</td>
						</tr>
					</table>
				</div>
			</div>
		</div>";

        while($linha = mysql_fetch_array($sql)) {
		$prof_dependente_id				= $linha['prof_dependente_id'];
		$prof_dependente_id				= $linha['prof_dependente_id'];
		$prof_dependente_parentesco		= $linha['prof_dependente_parentesco'];
		$prof_dependente_parentesco		= $linha['prof_dependente_parentesco'];
		$prof_dependente_rg				= $linha['prof_dependente_rg'];
		$prof_dependente_sexo			= $linha['prof_dependente_sexo'];
		$prof_dependente_data			= $linha['prof_dependente_data'];
		$prof_dependente_nascimento		= $linha['prof_dependente_nascimento'];
		$prof_dependente_estado			= $linha['prof_dependente_estado'];
		$prof_dependente_nacionalidade	= $linha['prof_dependente_nacionalidade'];
		$prof_dependente_cor			= $linha['prof_dependente_cor'];
		$prof_dependente_pai			= $linha['prof_dependente_pai'];
		$prof_dependente_mae			= $linha['prof_dependente_mae'];
		$prof_dependente_cidade			= $linha['prof_dependente_cidade'];
		$prof_dependente_endereco		= $linha['prof_dependente_endereco'];
		$prof_dependente_numero			= $linha['prof_dependente_numero'];
		$prof_dependente_bairro			= $linha['prof_dependente_bairro'];
		$prof_dependente_cep			= $linha['prof_dependente_cep'];
		$prof_dependente_tel_1			= $linha['prof_dependente_tel_1'];
		$prof_dependente_tel_2			= $linha['prof_dependente_tel_2'];
		$prof_dependente_tel_3			= $linha['prof_dependente_tel_3'];
		$prof_dependente_data_cadastro	= $linha['prof_dependente_data_cadastro'];
		$prof_dependente_cadastrado_por	= $linha['prof_dependente_cadastrado_por'];
		$valor++;
		
echo "	<div class='row'>
			<div class='col-sm-12'>
				<div class='panel-group' id='accordion' role='tablist' aria-multiselectable='false'>
					<div class='panel panel-default'>
						<div class='panel-heading' role='tab' id='heading$valor'>
							<h4 class='panel-title'>
								<a role='button' data-toggle='collapse' data-parent='#accordion' href='#collapse$valor' aria-expanded='true' aria-controls='collapseOne' title='Clique para comentar essa mensagem!'>
									$valor - $prof_dependente_id - $prof_dependente_parentesco - $prof_dependente_rg
								</a>
							</h4>
						</div>
						<div id='collapse$valor' class='panel-collapse collapse' role='tabpanel' aria-labelledby='heading$valor'>
							<div class='panel-body'>
								Nome:		<B>$prof_dependente_id</B>
								<BR>Doc:		<B>$prof_dependente_parentesco</B>	
								<BR>Parentesco:	<B>$prof_dependente_rg</B>
								<BR>Sexo:		<B>$prof_dependente_sexo</B>
								<BR>Data:		<B>$prof_dependente_data</B>
								<BR>Cidade:		<B>$prof_dependente_numero</B>
								<BR>Bairro:		<B>$prof_dependente_nacionalidade</B>
								<BR>CEP:		<B>$prof_dependente_cor</B>
								<BR>Endereço:	<B>$prof_dependente_nascimento</B>
								<BR>Numero:		<B>$prof_dependente_estado</B>
								<BR>Telefone:	<B>$prof_dependente_pai</B>
								<BR>Telefone:	<B>$prof_dependente_mae</B>
								<BR>Telefone:	<B>$prof_dependente_cidade</B>
								<BR>Email:		<B>$prof_dependente_endereco</B>
								<div class='panel-body'>
									<div class='btn-group btn-group-justified' role='group' aria-label='...'>
										<div class='btn-group' role='group'>
											<a href='adm_responsavel_editar.php?id=$prof_dependente_parentesco' class='alert-link' title='Editar dados pessoais'>
												<button type='image' name='Editar'  id='button' value='Editar' class='btn btn-default btn-sm'>
													Editar <span class='glyphicon glyphicon-edit' aria-hidden='true'></span>
												</button>
											</a>
										</div>
										<div class='btn-group' role='group'>
											<a href='adm_responsavel_excluir.php?id=$prof_dependente_parentesco' class='alert-link' title='Excluir dados pessoais'>
												<button type='image' name='Excluir'  id='button' value='Excluir' class='btn btn-default btn-sm'>
													Excluir <span class='glyphicon glyphicon-trash' aria-hidden='true' onClick=\"javascript:abrir('adm_prof_excluir_dados_pessoais.php?id=$prof_id','03');\"></span>
												</button>
											</a>
										</div>
										<div class='btn-group' role='group'>
											<a href=onClick='imprime()' class='alert-link' title='Excluir dados pessoais'>
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
								<a href='adm_responsavel_cadastrar.php?id=$prof_id' class='alert-link' title='Cadastrar Responsavel'>
									<button type='image' name='Cadastrar'  id='button' value='Cadastrar' class='btn btn-default btn-sm'>
										Cadastrar <span class='glyphicon glyphicon-edit' aria-hidden='true'></span>
									</button>
								</a>
							</div>
							<div class='btn-group' role='group'>
								<a href=onClick='imprime()' class='alert-link' title='Imprimir Responsavel'>
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
						<center>Professor(a) <i><strong>".$linha['prof_nome']."</i></strong> sem dependentes cadastrado!
					</div>
					<div class='panel-body'>
						<table border='1' width='100%' cellspacing='0' cellpadding='3'  bordercolor='#FFFFFF' height='0' style='border-collapse: collapse'> 
							<tr>
								<td align='center'>
									<a href='adm_prof_dependente_cadastrar.php?id=$prof_id' style='text-decoration: none'>
										<b>Cadastrar<br>
										<span class='glyphicon glyphicon-ok-circle' aria-hidden='true' style='font-size: 17px'></span>
									</a>
								</td>
							</tr>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>";
}
?>
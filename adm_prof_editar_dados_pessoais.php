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
	<script src="js/bootstrap.min.js"></script>	

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
<script type="text/javascript" src="mtel.js"></script>
    <script type="text/javascript" >
    
    function limpa_formulário_cep() {
            //Limpa valores do formulário de cep.
            document.getElementById('rua').value=("");
            document.getElementById('bairro').value=("");
            document.getElementById('cidade').value=("");
            document.getElementById('uf').value=("");
            document.getElementById('ibge').value=("");
    }

    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.
            document.getElementById('rua').value=(conteudo.logradouro);
            document.getElementById('bairro').value=(conteudo.bairro);
            document.getElementById('cidade').value=(conteudo.localidade);
            document.getElementById('uf').value=(conteudo.uf);
            document.getElementById('ibge').value=(conteudo.ibge);
        } //end if.
        else {
            //CEP não Encontrado.
            limpa_formulário_cep();
            alert("CEP não encontrado.");
        }
    }
        
    function pesquisacep(valor) {

        //Nova variável "cep" somente com dígitos.
        var cep = valor.replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                document.getElementById('rua').value="...";
                document.getElementById('bairro').value="...";
                document.getElementById('cidade').value="...";
                document.getElementById('uf').value="...";
                document.getElementById('ibge').value="...";

                //Cria um elemento javascript.
                var script = document.createElement('script');

                //Sincroniza com o callback.
                script.src = '//viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

                //Insere script no documento e carrega o conteúdo.
                document.body.appendChild(script);

            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    };

    </script>
<?php
include ('conecta.php');

$id_select = $_GET['id']; //Recupera a variavel id para fazer o select
$sql = "SELECT * FROM professor_dados_pessoais where prof_id=$id_select"; //Faz o select de todos os registros
$query = mysql_query($sql) or die("<center><h1>OOOPS!<BR>Não é esta a pagina que você esperava ver?<BR> Então algo esta errado...</h1><a href='home.php' style='text-decoration: none'><font color='#FF7F00'>Você pode clicar na imagem para voltar</font><p><img border='0' src='img/cones.png' width='544' height='332'></a></p>O Erro de conexão com banco de dados esta descrito logo abaixo!<BR>".mysql_error());
$row = mysql_fetch_assoc($query);



$prof_id					= $row['prof_id'];
$prof_ra					= $row['prof_ra'];
$prof_nome					= $row['prof_nome'];
$prof_sexo					= $row['prof_sexo'];
$prof_data					= $row['prof_data'];
$prof_nascimento			= $row['prof_nascimento'];
$prof_estado				= $row['prof_estado'];
$prof_nacionalidade			= $row['prof_nacionalidade'];
$prof_cor					= $row['prof_cor'];
$prof_pai					= $row['prof_pai'];
$prof_mae					= $row['prof_mae'];
$prof_cidade				= $row['prof_cidade'];
$prof_endereco				= $row['prof_endereco'];
$prof_bairro 				= $row['prof_bairro'];
$prof_numero				= $row['prof_numero'];
$prof_cep					= $row['prof_cep'];
$prof_email					= $row['prof_email'];
$prof_tel_1					= $row['prof_tel_1'];
$prof_tel_2					= $row['prof_tel_2'];
$data 						= date("Y/m/d");

echo"<center>
<form id='cadastro' name='cadastro' method='post' action='adm_prof_editar_dados_pessoais_motor.php' enctype='multipart/form-data'>
<div class='container-fluid'>
		<div class='row'>
			<div class='col-sm-12'>
				<div class='alert alert-warning' role='alert'>
					<a href='#' class='alert-link'>
						<table border='0' width='100%' height='0'> 
							<tr>
							<td height='1' width='1'>
									<span class='glyphicon glyphicon-circle-arrow-left' aria-hidden='true' style='font-size: 17px' onClick='javascript:window.history.go(-1);'></span>
								</td>
								<td>
									<center>Editando <B><I>Dados Pessoais</B></I> para <i><strong>$prof_nome - $prof_ra</center></i></strong>
								</td>
								<td height='1' width='1'>
									<span class='glyphicon glyphicon-info-sign' aria-hidden='true' style='font-size: 17px'></span>
								</td>
							</tr>
						</table>
					</a>
				</div>
			</div>
		</div>
		<div class='row'>
			<div class='col-sm-12'>
				<div class='panel panel-default'>
					<div class='panel-heading'>
						<B>Editando Identificação</B>
					</div>
					<div class='panel-body'>
						<div class='col-xs-12'>
							<div class='input-group input-group-sm'>
								<span class='input-group-addon' id='sizing-addon3'>
								</span>
								<input type='hidden' name='prof_id' id='prof_id' size='58' value='$row[prof_id]'/>
								<input type='text' class='form-control' name='prof_nome' id='prof_nome' value='$row[prof_nome]' size='70' placeholder='Nome Completo' aria-describedby='sizing-addon3'>
							</div>
						</div>
						<div class='col-xs-6'>
							<div class='input-group input-group-sm'>
								<span class='input-group-addon' id='sizing-addon3'>
								</span>
								<input type='number' class='form-control' name='prof_ra' id='prof_ra' value='$row[prof_ra]' placeholder='R.A do prof' aria-describedby='sizing-addon3'>
							</div>
						</div>
						<div class='col-xs-6'>
							<div class='input-group input-group-sm'>
								<span class='input-group-addon' id='sizing-addon3'>
								</span>
								<input type='date' class='form-control' id='campoData' name='prof_data' value='$row[prof_data]' aria-describedby='sizing-addon3'>
							</div>
						</div>
						<div class='col-xs-6'>
							<div class='input-group input-group-sm'>
								<span class='input-group-addon' id='sizing-addon3'>
								</span>
								<select class='form-control' name='prof_sexo' id='prof_sexo' aria-describedby='sizing-addon3'/>
									<option>$prof_sexo</option>
									<option value='M'>Masculino</option>
									<option value='F'>Feminino</option>
								</select>
							</div>
						</div>
						<div class='col-xs-6'>
							<div class='input-group input-group-sm'>
								<span class='input-group-addon' id='sizing-addon3'>
								</span>
								<select class='form-control' name='prof_cor' id='prof_cor' aria-describedby='sizing-addon3'>
									<option>$prof_cor</option>
									<option value='branca'>Branca</option>
									<option value='preta'>Preta</option>
									<option value='parda'>Parda</option>
									<option value='Amarela'>Amarela</option>
									<option value='indigena'>Indígena</option>
									<option value='não_declarada'>Não Declarada
								</select>
							</div>
						</div>
						<div class='col-xs-12'>
							<div class='input-group input-group-sm'>
								<span class='input-group-addon' id='sizing-addon3'>
								</span>
								<input type='text' name='prof_nascimento' id='prof_nascimento' value='$row[prof_nascimento]' placeholder='Local de Nascimento' class='form-control' aria-describedby='sizing-addon3'>
							</div>
						</div>
						<div class='col-xs-12'>
							<div class='input-group input-group-sm'>
								<span class='input-group-addon' id='sizing-addon3'>
								</span>
								<input type='text' name='prof_pai' id='prof_pai' value='$row[prof_pai]' placeholder='Nome Completo do Pai' class='form-control' aria-describedby='sizing-addon3'>
							</div>
						</div>
						<div class='col-xs-12'>
							<div class='input-group input-group-sm'>
								<span class='input-group-addon' id='sizing-addon3'>
								</span>
								<input type='text' name='prof_mae' id='prof_mae' placeholder='Nome Completo da Mãe' value='$row[prof_mae]' class='form-control' aria-describedby='sizing-addon3'>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class='row'>
			<div class='col-sm-12'>
				<div class='panel panel-default'>
					<div class='panel-heading'>
						<center><B>Editando Residência</B></center>
					</div>
					<div class='panel-body'>
						<div class='col-xs-12'>
							<div class='input-group input-group-sm'>
								<span class='input-group-addon' id='sizing-addon3'>
								</span>
								<input type='text' name='prof_nacionalidade' id='prof_nacionalidade' value='$row[prof_nacionalidade]' placeholder='Brasileiro'  class='form-control' aria-describedby='sizing-addon3'>
							</div>
						</div>
						<div class='col-xs-6'>
							<div class='input-group input-group-sm'>
								<span class='input-group-addon' id='sizing-addon3'>
								</span>
								<input type='text' name='prof_cep' id='cep' placeholder='CEP' value='$row[prof_cep]'  onblur='pesquisacep(this.value);' class='form-control' aria-describedby='sizing-addon3' maxlength='9'>
							</div>
						</div>
						<div class='col-xs-6'>
							<div class='input-group input-group-sm'>
								<span class='input-group-addon' id='sizing-addon3'>
								</span>
								<input type='number' name='prof_numero' id='prof_numero' value='$row[prof_numero]' placeholder='Numero' class='form-control' aria-describedby='sizing-addon3'>
							</div>
						</div>
						<div class='col-xs-12'>
							<div class='input-group input-group-sm'>
								<span class='input-group-addon' id='sizing-addon3'>
								</span>
								<input type='text' name='prof_endereco' id='rua' value='$row[prof_endereco]' placeholder='Endereço' class='form-control' aria-describedby='sizing-addon3'>
							</div>
						</div>
						<div class='col-xs-12'>
							<div class='input-group input-group-sm'>
								<span class='input-group-addon' id='sizing-addon3'>
								</span>
								<input type='text' name='prof_bairro' id='bairro' value='$row[prof_bairro]' placeholder='Bairro' class='form-control' aria-describedby='sizing-addon3'>
							</div>
						</div>
						<div class='col-xs-8'>
							<div class='input-group input-group-sm'>
								<span class='input-group-addon' id='sizing-addon3'>
								</span>
								<input type='text' name='prof_cidade' id='cidade' value='$row[prof_cidade]' placeholder='Cidade' class='form-control' aria-describedby='sizing-addon3'>
							</div>
						</div>
						<div class='col-xs-4'>
							<div class='input-group input-group-sm'>
								<span class='input-group-addon' id='sizing-addon3'>
								</span>
								<input type='text' name='prof_estado' id='uf' value='$row[prof_estado]' placeholder='Estado' class='form-control' aria-describedby='sizing-addon3'>
							</div>
						</div><input name='ibge' type='hidden' id='ibge' size='8' />
					</div>
				</div>
			</div>
		</div>
		<div class='row'>
			<div class='col-sm-12'>
				<div class='panel panel-default'>
					<div class='panel-heading'>
						<B>Editando Contato</B>
					</div>
					<div class='panel-body'>
						<div class='col-xs-8'>
							<div class='input-group input-group-sm'>
								<span class='input-group-addon' id='sizing-addon3'>
								</span>
								<input type='text' name='prof_tel_1' type='prof_tel_1' value='$row[prof_tel_1]' placeholder='Fixo ou Celular' onkeyup='mascara( this, mtel );' class='form-control' aria-describedby='sizing-addon3' maxlength='15'>
							</div>
						</div>
						<div class='col-xs-8'>
							<div class='input-group input-group-sm'>
								<span class='input-group-addon' id='sizing-addon3'>
								</span>
								<input type='text' name='prof_tel_2' type='prof_tel_2' value='$row[prof_tel_2]' placeholder='Fixo ou Celular' onkeyup='mascara( this, mtel );' class='form-control' aria-describedby='sizing-addon3' maxlength='15'>
							</div>
						</div>
						<div class='col-xs-8'>
							<div class='input-group input-group-sm'>
								<span class='input-group-addon' id='sizing-addon3'>
								</span>
								<input type='text' name='prof_tel_3' id='prof_tel_3' value='$row[prof_tel_3]' placeholder='Fixo ou Celular' onkeyup='mascara( this, mtel );' class='form-control' aria-describedby='sizing-addon3' maxlength='15'>
							</div>
						</div>
						<div class='col-xs-12'>
							<div class='input-group input-group-sm'>
								<span class='input-group-addon' id='sizing-addon3'>
								</span>
								<input type='text' id='prof_email' name='prof_email' value='$row[prof_email]' placeholder='seu_email@email.com.br' pattern='[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$' placeholder='seunome@provedor' class='form-control' aria-describedby='sizing-addon3'>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class='row'>
				<div class='col-xs-12'>
					<div class='panel panel-default'>
						<div class='panel-heading'>
							<center><B>Opções</B></center>
						</div>
						<div class='panel-body'><center>
							Tem certeza que deseja Editar os <b>dados pessoais</b> do(a) <b>$prof_nome</b>?</b><br>
							 <button type='image' name='Editar'  id='button' value='Editar' class='btn btn-default btn-sm'>
							 	Editar <span class='glyphicon glyphicon-edit' aria-hidden='true'></span>
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>";

?>
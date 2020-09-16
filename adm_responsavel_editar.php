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

$id_select1 = $_GET['id'];		//Recupera a variavel id para fazer o select
$sql = "SELECT * FROM responsavel where responsavel_id=$id_select1"; //Faz o select de todos os registros
$query = mysql_query($sql) or die("<center><h1>OOOPS!<BR>Não é esta a pagina que você esperava ver?<BR> Então algo esta errado...</h1><a href='home.php' style='text-decoration: none'><font color='#FF7F00'>Você pode clicar na imagem para voltar</font><p><img border='0' src='img/cones.png' width='544' height='332'></a></p>O Erro de conexão com banco de dados esta descrito logo abaixo!<BR>".mysql_error());
$row = mysql_fetch_assoc($query);


$responsavel_aluno_id		= $row['responsavel_aluno_id'];
$responsavel_aluno			= $row['responsavel_aluno'];
$responsavel_doc			= $row['responsavel_doc'];
$responsavel_parentesco		= $row['responsavel_parentesco'];
$responsavel_nome			= $row['responsavel_nome'];
$responsavel_sexo			= $row['responsavel_sexo'];
$responsavel_data			= $row['responsavel_data'];
$responsavel_nascimento		= $row['responsavel_nascimento'];
$responsavel_estado			= $row['responsavel_estado'];
$responsavel_nacionalidade  = $row['responsavel_nacionalidade'];
$responsavel_cor			= $row['responsavel_cor'];
$responsavel_cidade			= $row['responsavel_cidade'];
$responsavel_endereco		= $row['responsavel_endereco'];
$responsavel_numero			= $row['responsavel_numero'];
$responsavel_bairro 		= $row['responsavel_bairro'];
$responsavel_cep			= $row['responsavel_cep'];
$responsavel_tel_1			= $row['responsavel_tel_1'];
$responsavel_tel_2			= $row['responsavel_tel_2'];
$responsavel_tel_3			= $row['responsavel_tel_3'];
$responsavel_email			= $row['responsavel_email'];
$data = date("Y/m/d");

echo"
<form id='cadastro' name='cadastro' method='post' action='adm_responsavel_editar_motor.php' enctype='multipart/form-data'>
<input type='hidden' name='responsavel_id' id='responsavel_id' size='58' value='$row[responsavel_id]'/>
	<div class='container-fluid'>
		<div class='row'>
			<div class='col-sm-12'>
				<div class='alert alert-warning' role='alert'>
					<a href='#' class='alert-link'>
						<table border='0' width='100%' height='0'> 
							<tr>
							<td height='1' width='1'>
									<center><img src='img/voltar.png' title='Voltar' onClick='javascript:window.history.go(-1);' name='voltar' width='20'' height='20'>
								</td>
								<td>
									<center>Editando <B><i>responsável</i></B> para <i><strong>$responsavel_aluno</center></i></strong>
								</td>
								<td height='1' width='1'>
									<center><img src='img/obser.png' border='0' width='20' height='20' title='Foto'>
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
						<center><B>Identificação do Responsável</B></center>
					</div>
					<div class='panel-body'>
						<div class='col-xs-12'>
							<div class='input-group input-group-sm'>
								<span class='input-group-addon' id='sizing-addon3'>
								</span>
								<input type='text' class='form-control' name='responsavel_nome' id='responsavel_nome' value='$row[responsavel_nome]' size='70' placeholder='Nome Completo' aria-describedby='sizing-addon3'>
							</div>
						</div>
						<div class='col-xs-6'>
							<div class='input-group input-group-sm'>
								<span class='input-group-addon' id='sizing-addon3'>
								</span>
								<input type='number' class='form-control' name='responsavel_doc' id='responsavel_doc' value='$row[responsavel_doc]' placeholder='Doc do responsavel' aria-describedby='sizing-addon3'>
							</div>
						</div>
						<div class='col-xs-6'>
							<div class='input-group input-group-sm'>
								<span class='input-group-addon' id='sizing-addon3'>
								</span>
								<select class='form-control' name='responsavel_parentesco' id='responsavel_parentesco' aria-describedby='sizing-addon3'/>
									<option>$responsavel_parentesco</option>
									<option value='Pai/Mãe'>Pai/Mãe</option>
									<option value='Irmão/Irmã'>Irmão/Irmã</option>
									<option value='Tio/Tia'>Tio/Tia</option>
									<option value='Avô/Avó'>Avô/Avó</option>
									<option value='Outros'>Outros</option>
								</select>
							</div>
						</div>					
						<div class='col-xs-6'>
							<div class='input-group input-group-sm'>
								<span class='input-group-addon' id='sizing-addon3'>
								</span>
								<select class='form-control' name='responsavel_sexo' id='responsavel_sexo' aria-describedby='sizing-addon3'/>
									<option>$responsavel_sexo</option>
									<option value='M'>Masculino</option>
									<option value='F'>Feminino</option>
								</select>
							</div>
						</div>
						<div class='col-xs-6'>
							<div class='input-group input-group-sm'>
								<span class='input-group-addon' id='sizing-addon3'>
								</span>
								<input type='date' class='form-control' id='campoData' name='responsavel_data' value='$row[responsavel_data]' aria-describedby='sizing-addon3'>
							</div>
						</div>
						<div class='col-xs-6'>
							<div class='input-group input-group-sm'>
								<span class='input-group-addon' id='sizing-addon3'>
								</span>
								<select class='form-control' name='responsavel_cor' id='responsavel_cor' aria-describedby='sizing-addon3'>
									<option>$responsavel_cor</option>
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
								<input type='text' name='responsavel_nascimento' id='responsavel_nascimento' value='$row[responsavel_nascimento]' placeholder='Local de Nascimento' class='form-control' aria-describedby='sizing-addon3'>
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
						<center><B>Residência do Responsável</B></center>
					</div>
					<div class='panel-body'>
						<div class='col-xs-12'>
							<div class='input-group input-group-sm'>
								<span class='input-group-addon' id='sizing-addon3'>
								</span>
								<input type='text' name='responsavel_nacionalidade' id='responsavel_nacionalidade' value='$row[responsavel_nacionalidade]' placeholder='Brasileiro' value='Brasileiro'  class='form-control' aria-describedby='sizing-addon3'>
							</div>
						</div>
						<div class='col-xs-6'>
							<div class='input-group input-group-sm'>
								<span class='input-group-addon' id='sizing-addon3'>
								</span>
								<input type='text' name='responsavel_cep' id='cep' placeholder='CEP' value='$row[responsavel_cep]'  onblur='pesquisacep(this.value);' class='form-control' aria-describedby='sizing-addon3' maxlength='9'>
							</div>
						</div>
						<div class='col-xs-6'>
							<div class='input-group input-group-sm'>
								<span class='input-group-addon' id='sizing-addon3'>
								</span>
								<input type='number' name='responsavel_numero' id='responsavel_numero' value='$row[responsavel_numero]'  placeholder='Numero' class='form-control' aria-describedby='sizing-addon3'>
							</div>
						</div>
						<div class='col-xs-12'>
							<div class='input-group input-group-sm'>
								<span class='input-group-addon' id='sizing-addon3'>
								</span>
								<input type='text' name='responsavel_endereco' id='rua' placeholder='Endereço' value='$row[responsavel_endereco]' class='form-control' aria-describedby='sizing-addon3'>
							</div>
						</div>
						<div class='col-xs-12'>
							<div class='input-group input-group-sm'>
								<span class='input-group-addon' id='sizing-addon3'>
								</span>
								<input type='text' name='responsavel_bairro' id='bairro' placeholder='Bairro' value='$row[responsavel_bairro]' class='form-control' aria-describedby='sizing-addon3'>
							</div>
						</div>
						<div class='col-xs-8'>
							<div class='input-group input-group-sm'>
								<span class='input-group-addon' id='sizing-addon3'>
								</span>
								<input type='text' name='responsavel_cidade' id='cidade' placeholder='Cidade' value='$row[responsavel_cidade]' class='form-control' aria-describedby='sizing-addon3'>
							</div>
						</div>
						<div class='col-xs-4'>
							<div class='input-group input-group-sm'>
								<span class='input-group-addon' id='sizing-addon3'>
								</span>
								<input type='text' name='responsavel_estado' id='uf' value='$row[responsavel_estado]' placeholder='Estado' class='form-control' aria-describedby='sizing-addon3'>
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
						<center><B>Contato do Responsável</B></center>
					</div>
					<div class='panel-body'>
						<div class='col-xs-8'>
							<div class='input-group input-group-sm'>
								<span class='input-group-addon' id='sizing-addon3'>
								</span>
								<input type='text' name='responsavel_tel_1' type='responsavel_tel_1' value='$row[responsavel_tel_1]' placeholder='Fixo ou Celular' onkeyup='mascara( this, mtel );' class='form-control' aria-describedby='sizing-addon3' maxlength='15'>
							</div>
						</div>
						<div class='col-xs-8'>
							<div class='input-group input-group-sm'>
								<span class='input-group-addon' id='sizing-addon3'>
								</span>
								<input type='text' name='responsavel_tel_2' type='responsavel_tel_2' value='$row[responsavel_tel_2]' placeholder='Fixo ou Celular' onkeyup='mascara( this, mtel );' class='form-control' aria-describedby='sizing-addon3' maxlength='15'>
							</div>
						</div>
						<div class='col-xs-8'>
							<div class='input-group input-group-sm'>
								<span class='input-group-addon' id='sizing-addon3'>
								</span>
								<input type='text' name='responsavel_tel_3' id='responsavel_tel_3' value='$row[responsavel_tel_3]' placeholder='Fixo ou Celular' onkeyup='mascara( this, mtel );' class='form-control' aria-describedby='sizing-addon3' maxlength='15'>
							</div>
						</div>
						<div class='col-xs-12'>
							<div class='input-group input-group-sm'>
								<span class='input-group-addon' id='sizing-addon3'>
								</span>
								<input type='text' id='responsavel_email' name='responsavel_email' value='$row[responsavel_email]' placeholder='seu_email@email.com.br' pattern='[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$' placeholder='seunome@provedor' class='form-control' aria-describedby='sizing-addon3'>
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
							Tem certeza que deseja Editar <b>$responsavel_nome</b>?</b><br>
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
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
        
    function pesquisacep3(valor) {

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
<form id='cadastro' name='cadastro' method='post' action='adm_usuario_cadastrar_dados_pessoais_motor.php' enctype='multipart/form-data'>
	<div class='container-fluid'>
		<div class='row'>
			<div class='col-sm-12'>
				<div class='alert alert-info' role='alert'>
					<a href='#' class='alert-link'>
						<table border='0' width='100%' height='0'> 
							<tr>
							<td height='1' width='1'>
									<center><img src="img/voltar.png" title="Voltar" onClick="javascript:window.history.go(-1);" name="voltar" width="20'" height="20">
								</td>
								<td>
									<center>Cadastrando novo <i><strong>Usuário</center></i></strong>
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
	</div>
	<div class='row'>
			<div class='col-sm-12'>
				<div class='panel panel-default'>
					<div class='panel-heading'>
						<center><B>Identificação</B></center>
					</div>
					<div class='panel-body'>
						<div class='col-xs-12'>
							<div class='input-group input-group-sm'>
								<span class='input-group-addon' id='sizing-addon3'>
								</span>
								<input type='text' class='form-control' name='usuario_nome' id='usuario_nome' size='70' placeholder='Nome Completo' aria-describedby='sizing-addon3'>
							</div>
						</div>
						<div class='col-xs-6'>
							<div class='input-group input-group-sm'>
								<span class='input-group-addon' id='sizing-addon3'>
								</span>
								<input type='number' class='form-control' name='usuario_ra' id='usuario_ra' placeholder='R.A do usuario' aria-describedby='sizing-addon3'>
							</div>
						</div>
						<div class='col-xs-6'>
							<div class='input-group input-group-sm'>
								<span class='input-group-addon' id='sizing-addon3'>
								</span>
								<select class='form-control' name='usuario_sexo' id='usuario_sexo' aria-describedby='sizing-addon3'/>
									<option>Sexo</option>
									<option value='M'>Masculino</option>
									<option value='F'>Feminino</option>
								</select>
							</div>
						</div>
						<div class='col-xs-6'>
							<div class='input-group input-group-sm'>
								<span class='input-group-addon' id='sizing-addon3'>
								</span>
								<input type='date' class='form-control' id='campoData' name='usuario_data' aria-describedby='sizing-addon3'>
							</div>
						</div>
						<div class='col-xs-6'>
							<div class='input-group input-group-sm'>
								<span class='input-group-addon' id='sizing-addon3'>
								</span>
								<select class='form-control' name='usuario_cor' id='usuario_cor' aria-describedby='sizing-addon3'>
									<option>Cor</option>
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
								<input type='text' name='usuario_nascimento' id='usuario_nascimento' placeholder='Local de Nascimento' class='form-control' aria-describedby='sizing-addon3'>
							</div>
						</div>
						<div class='col-xs-12'>
							<div class='input-group input-group-sm'>
								<span class='input-group-addon' id='sizing-addon3'>
								</span>
								<input type='text' name='usuario_pai' id='usuario_pai' placeholder='Nome Completo do Pai' class='form-control' aria-describedby='sizing-addon3'>
							</div>
						</div>
						<div class='col-xs-12'>
							<div class='input-group input-group-sm'>
								<span class='input-group-addon' id='sizing-addon3'>
								</span>
								<input type='text' name='usuario_mae' id='usuario_mae' placeholder='Nome Completo da Mãe' class='form-control' aria-describedby='sizing-addon3'>
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
						<center><B>Residência</B></center>
					</div>
					<div class='panel-body'>
						<div class='col-xs-12'>
							<div class='input-group input-group-sm'>
								<span class='input-group-addon' id='sizing-addon3'>
								</span>
								<input type='text' name='usuario_nacionalidade' id='usuario_nacionalidade' placeholder='Brasileiro'  class='form-control' aria-describedby='sizing-addon3'>
							</div>
						</div>
						<div class='col-xs-6'>
							<div class='input-group input-group-sm'>
								<span class='input-group-addon' id='sizing-addon3'>
								</span>
								<input type='text' name="usuario_cep" id="cep" placeholder='CEP' value=""  onblur="pesquisacep3(this.value);" class='form-control' aria-describedby='sizing-addon3' maxlength="9">
							</div>
						</div>
						<div class='col-xs-6'>
							<div class='input-group input-group-sm'>
								<span class='input-group-addon' id='sizing-addon3'>
								</span>
								<input type='number' name="usuario_numero" id="usuario_numero" placeholder='Numero' class='form-control' aria-describedby='sizing-addon3'>
							</div>
						</div>
						<div class='col-xs-12'>
							<div class='input-group input-group-sm'>
								<span class='input-group-addon' id='sizing-addon3'>
								</span>
								<input type="text" name="usuario_endereco" id="rua" placeholder='Endereço' class='form-control' aria-describedby='sizing-addon3'>
							</div>
						</div>
						<div class='col-xs-12'>
							<div class='input-group input-group-sm'>
								<span class='input-group-addon' id='sizing-addon3'>
								</span>
								<input type="text" name="usuario_bairro" id="bairro" placeholder='Bairro' class='form-control' aria-describedby='sizing-addon3'>
							</div>
						</div>
						<div class='col-xs-8'>
							<div class='input-group input-group-sm'>
								<span class='input-group-addon' id='sizing-addon3'>
								</span>
								<input type="text" name="usuario_cidade" id="cidade" placeholder='Cidade' class='form-control' aria-describedby='sizing-addon3'>
							</div>
						</div>
						<div class='col-xs-4'>
							<div class='input-group input-group-sm'>
								<span class='input-group-addon' id='sizing-addon3'>
								</span>
								<input type="text" name="usuario_estado" id="uf" placeholder='Estado' class='form-control' aria-describedby='sizing-addon3'>
							</div>
						</div><input name="ibge" type="hidden" id="ibge" size="8" />
					</div>
				</div>
			</div>
		</div>
		<div class='row'>
			<div class='col-sm-12'>
				<div class='panel panel-default'>
					<div class='panel-heading'>
						<B>Contato</B>
					</div>
					<div class='panel-body'>
						<div class='col-xs-8'>
							<div class='input-group input-group-sm'>
								<span class='input-group-addon' id='sizing-addon3'>
								</span>
								<input type="text" name="usuario_tel_1" type="usuario_tel_1" placeholder='Fixo ou Celular' onkeyup="mascara( this, mtel );" class='form-control' aria-describedby='sizing-addon3' maxlength="15">
							</div>
						</div>
						<div class='col-xs-8'>
							<div class='input-group input-group-sm'>
								<span class='input-group-addon' id='sizing-addon3'>
								</span>
								<input type="text" name="usuario_tel_2" type="usuario_tel_2" placeholder='Fixo ou Celular' onkeyup="mascara( this, mtel );" class='form-control' aria-describedby='sizing-addon3' maxlength="15">
							</div>
						</div>
						<div class='col-xs-8'>
							<div class='input-group input-group-sm'>
								<span class='input-group-addon' id='sizing-addon3'>
								</span>
								<input type="text" name="usuario_tel_3" id="usuario_tel_3" placeholder='Fixo ou Celular' onkeyup="mascara( this, mtel );" class='form-control' aria-describedby='sizing-addon3' maxlength="15">
							</div>
						</div>
						<div class='col-xs-12'>
							<div class='input-group input-group-sm'>
								<span class='input-group-addon' id='sizing-addon3'>
								</span>
								<input type="text" id="usuario_email" name="usuario_email" placeholder='seu_email@email.com.br' pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" placeholder='seunome@provedor' class='form-control' aria-describedby='sizing-addon3'>
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
						<B>Opções</B>
					</div>
					<div class='panel-body'>
						<table border='1' width='100%' cellspacing='0' cellpadding='3'  bordercolor='#FFFFFF' height='0' style='border-collapse: collapse'> 
							<tr>
							<td align=center bgcolor=#FFFFFF><B>Cadastrar</B></td>
							</tr>
							<tr>
								<td align='center'>
									<input type='image' src='img/new.png' name='Concluir Cadastro'  id='button' value='Concluir Cadastro' width='20' height='20'/>
								</td>
							</tr>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>
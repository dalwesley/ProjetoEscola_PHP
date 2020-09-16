<?php
include "seguranca_4.php";
?>
<style type="text/css">

	#div1 {
			width:100%; /* Tamanho da Largura da Div */
			height:0; /* Tamanho da Altura da Div */
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
$sql = "SELECT * FROM usuario_dados_login where login_usuario_id=$id_select"; //Faz o select de todos os registros
$query = mysql_query($sql) or die("<center><h1>OOOPS!<BR>Não é esta a pagina que você esperava ver?<BR> Então algo esta errado...</h1><a href='home.php' style='text-decoration: none'><font color='#FF7F00'>Você pode clicar na imagem para voltar</font><p><img border='0' src='img/cones.png' width='544' height='332'></a></p>O Erro de conexão com banco de dados esta descrito logo abaixo!<BR>".mysql_error());
$row = mysql_fetch_assoc($query);

$login_nome						= $row['login_nome'];
$login_nome_ra					= $row['login_usuario_ra'];
$login_usuario_id				= $row['login_usuario_id'];
$login_senha					= $row['login_senha'];
$login_nivel					= $row['login_nivel'];
$login_ativo					= $row['login_ativo'];
$login_email					= $row['login_email'];
$login_tel_1					= $row['login_tel_1'];
$login_tel_2					= $row['login_tel_2'];
$login_cadastrado_por			= $row['login_cadastrado_por'];
$login_data_cadastro			= date('Y-m-d');


echo"<div id=div1>
<form id='cadastro' name='cadastro' method='post' action='adm_usuario_editar_login_motor.php' enctype='multipart/form-data'>
<input type='hidden' name='login_usuario_id' id='login_usuario_id' size='58' value='$row[login_usuario_id]'/>
<input type='hidden' name='login_usuario_ra' id='login_usuario_ra' size='58' value='$row[login_usuario_ra]'/>
<input type='hidden' name='login_nome' id='login_nome' size='58' value='$row[login_nome]'/>
<input type='hidden' name='login_cadastrado_por' id='login_cadastrado_por' size='58' value='$_SESSION[UsuarioNome]'/>
<fieldset style='border-style: solid; border-width: 1px; background-color:#0000FF'>
<table border='1' width='100%' cellspacing='0' cellpadding='3'  bordercolor='#FFF' height='0' style='border-collapse: collapse'> 
	<tr>
		<td height='1' width='1'>
			<center><img src=\"img/voltar.png\" title=\"Voltar\" onClick=\"javascript:window.history.go(-1);\" name=\"voltar\" width=\"20'\" height=\"20\">
		</td>
		<td>
			<center>Editando <B><I>login</B></I> para <i><strong>$login_nome - $login_nome_ra</center></i></strong>
		</td>
		<td height='1' width='1'>
			<center><img src='img/obser.png' border='0' width='20' height='20' title='Foto'>
		</td>
	</tr>
</table></fieldset>
<fieldset style='border-style: solid; border-width: 1px; background-color:#F0F0F0'>
			<legend><B>Dados de Login</B></legend><pre>
login:	<input name='login_nome' type='text' id='login_nome' size='70' maxlength='60' value='$login_nome' />
Senha:	<input name='login_senha' type='password' id='login_senha' size='70' maxlength='60' value='$login_senha' />
Nível:	<select name='login_nivel' id='login_nivel'>
       			<option>$login_nivel</option>
        			<option value='01'>01</option>
        			<option value='02'>02</option>
					<option value='03'>03</option>
					<option value='04'>04</option>
					<option value='05'>05</option>
					<option value='06'>06</option>
        	</select>		Ativo:<input type='checkbox' name='login_ativo' value='1' checked>
</fieldset>
<fieldset style='border-style: solid; border-width: 1px; background-color:#F0F0F0'>
			<legend><B>Contato de Trabalho</B></legend><pre>
Telefone 1: <input type='login_tel_1' maxlength='15' name='login_tel_1' value='$login_tel_1' onkeyup='mascara( this, mtel );' />
Telefone 2: <input type='login_tel_2' maxlength='15' name='login_tel_2' value='$login_tel_2' onkeyup='mascara( this, mtel );'/>
Email:      <input type='login_email' class='input-text' name='login_email' value='$login_email' pattern='[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$' placeholder='seunome@provedor' size='70' maxlength='70'/>
</fieldset>
<fieldset style='border-style: solid; border-width: 1px; background-color:#F0F0F0'><legend><B>Opções</B></legend>  
<table border='1' width='100%' cellspacing='0' cellpadding='3'  bordercolor='#FFFFFF' height='0' style='border-collapse: collapse'> 
	<tr>
		<td align=center bgcolor=#FFFFFF><font color='#0000FF'>Tem certeza que deseja editar os <b>dados pessoais</b> do(a) <b>$login_nome</b>?</b></font><br></td>
		</td>
	</tr>	
	<tr>
		<td align='center'>
<input type='image' src='img/edit.png' name='Editar'  id='button' value='Editar' width='20' height='20'/>
		</td>
	</tr>
</table></form></div>";

?>
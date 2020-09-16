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
$sql = "SELECT * FROM usuario_dados_pessoais where usuario_id=$id_select"; //Faz o select de todos os registros
$query = mysql_query($sql) or die("<center><h1>OOOPS!<BR>Não é esta a pagina que você esperava ver?<BR> Então algo esta errado...</h1><a href='home.php' style='text-decoration: none'><font color='#FF7F00'>Você pode clicar na imagem para voltar</font><p><img border='0' src='img/cones.png' width='544' height='332'></a></p>O Erro de conexão com banco de dados esta descrito logo abaixo!<BR>".mysql_error());
$row = mysql_fetch_assoc($query);

$usuario_id				= $row['usuario_id'];
$usuario_ra				= $row['usuario_ra'];
$usuario_nome			= $row['usuario_nome'];
$usuario_sexo			= $row['usuario_sexo'];
$usuario_data			= $row['usuario_data'];
$usuario_nascimento		= $row['usuario_nascimento'];
$usuario_estado			= $row['usuario_estado'];
$usuario_nacionalidade	= $row['usuario_nacionalidade'];
$usuario_cor			= $row['usuario_cor'];
$usuario_pai			= $row['usuario_pai'];
$usuario_mae			= $row['usuario_mae'];
$usuario_cidade			= $row['usuario_cidade'];
$usuario_endereco		= $row['usuario_endereco'];
$usuario_bairro 		= $row['usuario_bairro'];
$usuario_numero			= $row['usuario_numero'];
$usuario_cep			= $row['usuario_cep'];
$usuario_email			= $row['usuario_email'];
$usuario_tel_1			= $row['usuario_tel_1'];
$usuario_tel_2			= $row['usuario_tel_2'];
$data					= date("Y/m/d");

echo"<div id=div1>
<form id='cadastro' name='cadastro' method='post' action='adm_usuario_editar_dados_pessoais_motor.php' enctype='multipart/form-data'>
<input type='hidden' name='usuario_id' id='usuario_id' size='58' value='$row[usuario_id]'/>
<fieldset style='border-style: solid; border-width: 1px; background-color:#0000FF'>
<table border='1' width='100%' cellspacing='0' cellpadding='3'  bordercolor='#FFF' height='0' style='border-collapse: collapse'> 
	<tr>
		<td height='1' width='1'>
			<center><img src=\"img/voltar.png\" title=\"Voltar\" onClick=\"javascript:window.history.go(-1);\" name=\"voltar\" width=\"20'\" height=\"20\">
		</td>
		<td>
			<center>Editando <B><I>Dados Pessoais</B></I> para <i><strong>$usuario_nome - $usuario_ra</center></i></strong>
		</td>
		<td height='1' width='1'>
			<center><img src='img/obser.png' border='0' width='20' height='20' title='Foto'>
		</td>
	</tr>
</table></fieldset>
<fieldset style='border-style: solid; border-width: 1px; background-color:#F0F0F0'>
<legend><font color='#0000FF'><B>Editar Identificação</B></legend></font><pre>
Nome:	    <input type='text' name='usuario_nome' id='usuario_nome' size='70' placeholder='Nome Completo' value='$row[usuario_nome]' autofocus/>
R.A:	    <input type='text' name='usuario_ra' id='usuario_ra' size='10' value='$row[usuario_ra]'/>
Sexo:	    <select name='usuario_sexo' id='usuario_sexo' />
       			<option>$usuario_sexo</option>
        			<option value='M'>Masculino</option>
        			<option value='F'>Feminino</option>
        	</select>	Data:   <input type='date' name='usuario_data' id='usuario_data' value='$row[usuario_data]'>	Cor:   <select name='usuario_cor' id='usuario_cor'>
       			<option>$usuario_cor</option>
        			<option value='branca'>Branca</option>
        			<option value='preta'>Preta</option>
        			<option value='parda'>Parda</option>
        			<option value='Amarela'>Amarela</option>
        			<option value='indigena'>Indígena</option>
        			<option value='não_declarada'>Não Declarada
        		</option>
        		</select>
Nascimento: <input name='usuario_nascimento' type='text' id='usuario_nascimento' size='70' maxlength='60' placeholder='Nascimento' value='$row[usuario_nascimento]' />
Nome do Pai:<input name='usuario_pai' type='text' id='usuario_pai' size='70' maxlength='60' placeholder='Nome Completo do Pai' value='$row[usuario_pai]'/>
Nome da Mãe:<input name='usuario_mae' type='text' id='usuario_mae' size='70' maxlength='60' placeholder='Nome Completo da Mãe' value='$row[usuario_mae]'/>
</fieldset>
<fieldset style='border-style: solid; border-width: 1px; background-color:#F0F0F0'>
<legend><font color='#0000FF'><B>Editar Residência</B></legend></font><pre>
Nacionalidade:	<input name='usuario_nacionalidade' type='text' id='usuario_nacionalidade' size='34' maxlength='60' value='$row[usuario_nacionalidade]' />
Cep:	   	<input name='usuario_cep' type='text' id='cep' value='$row[usuario_cep]' size='10' maxlength='9' onblur='pesquisacep(this.value);' /></label>
<label>Endereço:	<input name='usuario_endereco' type='text' id='rua' size='59' value='$row[usuario_endereco]'/></label> Nº:<input name='usuario_numero' type='text' id='usuario_numero' size='2' maxlength='70' value='$row[usuario_numero]' />
<label>Bairro:	   	<input name='usuario_bairro' type='text' id='bairro' size='70' value='$row[usuario_bairro]'/></label>
<label>Cidade:	   	<input name='usuario_cidade' type='text' id='cidade' size='59' value='$row[usuario_cidade]'/></label> UF:<input name='usuario_estado' type='text' id='uf' size='2' value='$row[usuario_estado]'/></label><input name='ibge' type='hidden' id='ibge' size='8' />
</fieldset>
<fieldset style='border-style: solid; border-width: 1px; background-color:#F0F0F0'>
<legend><font color='#0000FF'><B>Editar Contato</B></legend></font><pre>
Telefone 1: <input type='usuario_tel_1' maxlength='15' name='usuario_tel_1' onkeyup='mascara( this, mtel )' value='$row[usuario_tel_1]'/>
Telefone 2: <input type='usuario_tel_2' maxlength='15' name='usuario_tel_2' onkeyup='mascara( this, mtel )' value='$row[usuario_tel_2]'/>
Telefone 3: <input type='usuario_tel_3' maxlength='15' name='usuario_tel_3' onkeyup='mascara( this, mtel )' value='$row[usuario_tel_3]'/>
Email:      <input type='usuario_email' class='input-text' name='usuario_email' pattern='[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$' placeholder='seunome@provedor' size='70' maxlength='70' value='$row[usuario_email]'/>
</fieldset>
<fieldset style='border-style: solid; border-width: 1px; background-color:#F0F0F0'><legend><B>Opções</B></legend>  
<table border='1' width='100%' cellspacing='0' cellpadding='3'  bordercolor='#FFFFFF' height='0' style='border-collapse: collapse'> 
	<tr>
		<td align=center bgcolor=#FFFFFF><font color='#0000FF'>Tem certeza que deseja editar os <b>dados pessoais</b> do(a) <b>$usuario_nome</b>?</b></font><br></td>
		</td>
	</tr>	
	<tr>
		<td align='center'>
<input type='image' src='img/edit.png' name='Editar'  id='button' value='Editar' width='20' height='20'/>
		</td>
	</tr>
</table></form></div>";

?>
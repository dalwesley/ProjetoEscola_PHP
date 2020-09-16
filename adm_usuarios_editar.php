	<?php
include "seguranca.php";
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
    <script type="text/javascript" >
    
    function limpa_formul�rio_cep() {
            //Limpa valores do formul�rio de cep.
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
            //CEP n�o Encontrado.
            limpa_formul�rio_cep();
            alert("CEP n�o encontrado.");
        }
    }
        
    function pesquisacep(valor) {

        //Nova vari�vel "cep" somente com d�gitos.
        var cep = valor.replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Express�o regular para validar o CEP.
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

                //Insere script no documento e carrega o conte�do.
                document.body.appendChild(script);

            } //end if.
            else {
                //cep � inv�lido.
                limpa_formul�rio_cep();
                alert("Formato de CEP inv�lido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formul�rio.
            limpa_formul�rio_cep();
        }
    };

    </script>
<?php
include ('conecta.php');

date_default_timezone_set('America/Sao_Paulo');
$date = date('Y-m-d');
$date = implode("-",array_reverse(explode("/",$date)));
$hora = date('H:i:s');

$id_select = $_GET['id']; //Recupera a variavel id para fazer o select
$sql = "SELECT * FROM usuario where usuario_id=$id_select"; //Faz o select de todos os registros
$query = mysql_query($sql) or die("<center><h1>OOOPS!<BR>N�o � esta a pagina que voc� esperava ver?<BR> Ent�o algo esta errado...</h1><a href='home.php' style='text-decoration: none'><font color='#FF7F00'>Voc� pode clicar na imagem para voltar</font><p><img border='0' src='img/cones.png' width='544' height='332'></a></p>O Erro de conex�o com banco de dados esta descrito logo abaixo!<BR>".mysql_error());
$row = mysql_fetch_assoc($query);

$usuario_id				= $row['usuario_id'];
$usuario_nome			= $row['usuario_nome'];
$usuario_login			= $row['usuario_login'];
$usuario_senha			= $row['usuario_senha'];
$usuario_nivel			= $row['usuario_nivel'];
$usuario_sexo			= $row['usuario_sexo'];
$usuario_data			= $row['usuario_data'];
$usuario_nascimento		= $row['usuario_nascimento'];
$usuario_estado			= $row['usuario_estado'];
$usuario_nacionalidade	= $row['usuario_nacionalidade'];
$usuario_cor			= $row['usuario_cor'];
$usuario_pai			= $row['usuario_pai'];
$usuario_mae			= $row['usuario_mae'];
$usuario_cidade			= $row['usuario_cidade'];
$usuario_endere�o		= $row['usuario_endere�o'];
$usuario_bairro 		= $row['usuario_bairro'];
$usuario_numero			= $row['usuario_numero'];
$usuario_cep			= $row['usuario_cep'];
$usuario_email			= $row['usuario_email'];
$usuario_tel_1			= $row['usuario_tel_1'];
$usuario_tel_2			= $row['usuario_tel_2'];
$usuario_cadastro		= $row['usuario_cadastro'];

echo"<form id='cadastro' name='cadastro' method='post' action='adm_usuarios_editar_motor.php' enctype='multipart/form-data'>
<input type='hidden' name='usuario_id' id='usuario_id' size='58' value='$row[usuario_id]'/>
<div id=div1>
<fieldset style='border-style: solid; border-width: 1px; background-color:#0000FF'>
<table border='1' width='100%' cellspacing='0' cellpadding='3'  bordercolor='#F0F0F0' height='0' style='border-collapse: collapse'> 
	<tr>
		<td>
			<center><a href='javascript:window.history.go(-1)'><img src='img/voltar.png' border='0' width='20' height='20' title='Voltar'></a>
		</td>
		<td>
			<center>Editando <B><I>Dados  de usu�rio</B></I> para <i><strong>$usuario_nome - $usuario_id</center></i></strong>
		</td>
		<td>
			<center><img src='img/obser.png' border='0' width='20' height='20' title='Foto'>
		</td>
	</tr>
</table></fieldset>
<fieldset style='border-style: solid; border-width: 1px; background-color:#F0F0F0'>
<legend><font color='#0000FF'><B>Editar Identifica��o</B></legend></font><pre>
Nome:	    <input type='text' name='usuario_nome' id='usuario_nome' size='70' placeholder='Nome Completo' value='$usuario_nome' autofocus/>
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
        			<option value='indigena'>Ind�gena</option>
        			<option value='n�o_declarada'>N�o Declarada
        		</option>
        		</select>
Nascimento: <input name='usuario_nascimento' type='text' id='usuario_nascimento' size='70' maxlength='60' placeholder='Nascimento' value='$row[usuario_nascimento]' />
Nome do Pai:<input name='usuario_pai' type='text' id='usuario_pai' size='70' maxlength='60' placeholder='Nome Completo do Pai' value='$row[usuario_pai]'/>
Nome da M�e:<input name='usuario_mae' type='text' id='usuario_mae' size='70' maxlength='60' placeholder='Nome Completo da M�e' value='$row[usuario_mae]'/>
</fieldset>
<fieldset style='border-style: solid; border-width: 1px; background-color:#F0F0F0'>
<legend><font color='#0000FF'><B>Editar Resid�ncia</B></legend></font><pre>
Nacionalidade:	<input name='usuario_nacionalidade' type='text' id='usuario_nacionalidade' size='34' maxlength='60' value='$row[usuario_nacionalidade]' />
Cep:	   	<input name='usuario_cep' type='text' id='cep' value='$row[usuario_cep]' size='10' maxlength='9' onblur='pesquisacep(this.value);' /></label>
<label>Endere�o:	<input name='usuario_endere�o' type='text' id='rua' size='59' value='$row[usuario_endere�o]'/></label> N�:<input name='usuario_numero' type='text' id='usuario_numero' size='2' maxlength='70' value='$row[usuario_numero]' />
<label>Bairro:	   	<input name='usuario_bairro' type='text' id='bairro' size='70' value='$row[usuario_bairro]'/></label>
<label>Cidade:	   	<input name='usuario_cidade' type='text' id='cidade' size='59' value='$row[usuario_cidade]'/></label> UF:<input name='usuario_estado' type='text' id='uf' size='2' value='$row[usuario_estado]'/></label><input name='ibge' type='hidden' id='ibge' size='8' />
</fieldset>
<fieldset style='border-style: solid; border-width: 1px; background-color:#F0F0F0'>
<legend><font color='#0000FF'><B>Editar Contato</B></legend></font><pre>
Telefone 1: <input type='usuario_tel_1' maxlength='15' name='usuario_tel_1' pattern='\([0-9]{2}\)[0-9]{4,5}-[0-9]{4}$' placeholder='(12)3456-7890' value='$row[usuario_tel_1]'/>
Telefone 2: <input type='usuario_tel_2' maxlength='15' name='usuario_tel_2' pattern='\([0-9]{2}\)[0-9]{4,5}-[0-9]{4}$' placeholder='(12)34567-8910' value='$row[usuario_tel_2]'/>
Email:      <input type='usuario_email' class='input-text' name='usuario_email' pattern='[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$' placeholder='seunome@provedor' size='70' maxlength='70' value='$row[usuario_email]'/>
</fieldset>
<fieldset style='border-style: solid; border-width: 1px; background-color:#F0F0F0'>
<legend><font color='#0000FF'><B>Editar Usu�rio</B></font></legend><pre>
Nome de Usuario:<input name='usuario_login' value='$row[usuario_login]' type='text' id='usuario_login' size='70' maxlength='60' placeholder='informe um nome de usuario' />
Senha:		<input name='usuario_senha' value='$row[usuario_senha]' type='password' id='usuario_senha' size='70' maxlength='60' placeholder='informe uma senha de usuario' />
N�vel:		<select name='usuario_nivel' id='usuario_nivel'>
       			<option>$row[usuario_nivel]</option>
        		<option value='01'>01</option>
        		<option value='02'>02</option>
				<option value='03'>03</option>
				<option value='04'>04</option>
				<option value='05'>05</option>
				<option value='06'>06</option>
        	</select>		Data de Cadastro:<input type='date' name='usuario_cadastro' id='usuario_cadastro' value='$date'>		Ativo: <input type='checkbox' name='usuario_ativo' value='$row[usuario_ativo]' checked>
</pre>
</fieldset>
<fieldset style='border-style: solid; border-width: 1px; background-color:#F0F0F0'><legend><B>Op��es</B></legend>  
<table border='1' width='100%' cellspacing='0' cellpadding='3'  bordercolor='#FFFFFF' height='0' style='border-collapse: collapse'> 
	<tr>
		<td align=center bgcolor=#FFFFFF><font color='#0000FF'>Tem certeza que deseja editar os <b>dados de usu�rio</b> do(a) <b>$usuario_nome</b>?</b></font><br></td>
		</td>
	</tr>	
	<tr>
		<td align='center'>
<input type='image' src='img/edit.png' name='Editar'  id='button' value='Editar' width='20' height='20'/>
		</td>
	</tr>
</table></form></div>";
?>
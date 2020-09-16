<?php
include 'seguranca_1.php';
?>
<!DOCTYPE html>
<html lang='pt-br'>
  <head>
	<title>A+ - Sistema Integrado</title>
    
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <!-- As 3 meta tags acima *devem* vir em primeiro lugar dentro do `head`; qualquer outro conteúdo deve vir *após* essas tags -->
    
    <link href='css/bootstrap.min.css' rel='stylesheet'>								<!-- Bootstrap -->
	<link href='css/bootstrap.min.css' rel='stylesheet' media='screen'>					<!-- Incluindo o CSS do Bootstrap -->
	<script src='http://code.jquery.com/jquery-latest.js'></script>						<!-- Incluindo o jQuery que é requisito do JavaScript do Bootstrap -->
	<script src='js/bootstrap.min.js'></script>											<!-- Incluindo o JavaScript do Bootstrap -->
	<script language='JavaScript'>
function abrir(URL) {
var width = 700;
var height = 680;
var left = 657;
var top = 0;
window.open(URL,'janela', 'width='+width+', height='+height+', top='+top+', left='+left+', scrollbars=no, status=no, toolbar=no, location=no, directories=no, menubar=no, resizable=no, fullscreen=no');
}
</script>
</head>

<body link="#000000" vlink="#000000" alink="#000000">
<div id="01">

<?php

function MostreSemanas()
{
	$semanas = "DSTQQSS";
 
	for( $i = 0; $i < 7; $i++ )
	 echo "<td><center><h3>".$semanas{$i}."</td>";
 
}
 
function GetNumeroDias( $mes )
{
	$numero_dias = array( 
			'01' => 31, '02' => 28, '03' => 31, '04' =>30, '05' => 31, '06' => 30,
			'07' => 31, '08' =>31, '09' => 30, '10' => 31, '11' => 30, '12' => 31
	);
 
	if (((date('Y') % 4) == 0 and (date('Y') % 100)!=0) or (date('Y') % 400)==0)
	{
	    $numero_dias['02'] = 29;	// altera o numero de dias de fevereiro se o ano for bissexto
	}
 
	return $numero_dias[$mes];
}
 
function GetNomeMes( $mes )
{
     $meses = array( '01' => "Janeiro", '02' => "Fevereiro", '03' => "Março",
                     '04' => "Abril",   '05' => "Maio",      '06' => "Junho",
                     '07' => "Julho",   '08' => "Agosto",    '09' => "Setembro",
                     '10' => "Outubro", '11' => "Novembro",  '12' => "Dezembro"
                     );
 
      if( $mes >= 01 && $mes <= 12)
        return $meses[$mes];
 
        return "Mês deconhecido";
 
}
 
 
 
function MostreCalendario( $mes  )
{
 
	$numero_dias 		= GetNumeroDias( $mes );	// retorna o número de dias que tem o mês desejado
	$nome_mes 			= GetNomeMes( $mes );
	$diacorrente 		= 0;	
	$dia_select 		= date('d');

	$diasemana = jddayofweek( cal_to_jd(CAL_GREGORIAN, $mes,"01",date('Y')) , 0 );	// função que descobre o dia da semana
 
echo"
<center>
	<div class='container-fluid'>
		<div class='row'>
			<div class='col-sm-12'>
				<div class='well well-sm'>
					<table border='0' width='100%' cellspacing='0' cellpadding='3'  bordercolor='#FFF' height='0' style='border-collapse: collapse'> 
						<tr>
							<td width='1' height='1'><center>
								<a href='adm_mensagem_listar_mes.php?m=".($mes-1)."' target='mural' style='text-decoration: none' title='Listar Eventos do mes de ".($mes-1)."' class='alert-link'>
									<span class='glyphicon glyphicon-circle-arrow-left' aria-hidden='true' style='font-size: 17px'></span>
								</a>
							</td>
							<td colspan='5' width='100%' height='100%'><center>
								<a href='adm_mensagem_listar_mes.php?m=$mes' target='mural' style='text-decoration: none' title='Listar Eventos do mes de ".$nome_mes."' class='alert-link'>
									<B>".$nome_mes."
								</a>
							</td>
							<td width='1' height='1'><center>
								<a href='adm_mensagem_listar_mes.php?m=".($mes+1)."' target='mural' style='text-decoration: none' title='Listar Eventos do mes de ".($mes+1)."' class='alert-link'>
									<span class='glyphicon glyphicon-circle-arrow-right' aria-hidden='true' style='font-size: 17px'></span>
								</a>	
							</td>
						</tr>
					</table>
				</div>
			</div>
		</div></center>
		<div class='row-fluid'>
			<div class='col-sm-12'>
				<table border='0' width='100%' cellspacing='0' cellpadding='3'  bordercolor='#FFF' height='0' style='border-collapse: collapse'>";
	   MostreSemanas();	// função que mostra as semanas aqui
	for( $linha = 0; $linha < 6; $linha++ )
	{
 
 
	   echo "<tr>";
 
	   for( $coluna = 0; $coluna < 7; $coluna++ )
	   {
		echo "<td width = 72 height = 70 ";
 
		  if( ($diacorrente == ( date('d') - 1) && date('m') == $mes) )
		  {	
			   echo " id = 'dia_atual' ";
		  }
		  else
		  {
			     if(($diacorrente + 1) <= $numero_dias )
			     {
			         if( $coluna < $diasemana && $linha == 0)
				 {
					echo " id = 'dia_branco' ";
				 }
				 else
				 {
				  	echo " id = 'dia_comum' ";
				 }
			     }
			     else
			     {
				echo " ";
			     }
		  }
		echo "align = 'center' valign = 'center'>";
 
 
		   /* TRECHO IMPORTANTE: A PARTIR DESTE TRECHO É MOSTRADO UM DIA DO CALENDÁRIO (MUITA ATENÇÃO NA HORA DA MANUTENÇÃO) */
 
		      if( $diacorrente + 1 <= $numero_dias )
		      {
			 if( $coluna < $diasemana && $linha == 0)
			 {
			  	 echo " ";
			 }
			 else
			 {
			  	// echo "<input type = 'button' id = 'dia_comum' name = 'dia".($diacorrente+1)."'  value = '".++$diacorrente."' onclick = "acao(this.value)">";
				   echo "<a href=adm_mensagem_listar_select.php?m=$mes&d=".($diacorrente+1)." target='mural' style='text-decoration: none' title='Cadastrar'>";
				   if ($diacorrente==$dia_select-1) {
						echo"<span class='badge'>".++$diacorrente."</span>";
					} else {
						echo"".++$diacorrente."</a>";
								
					}
			 }
		      }
		      else
		      {
			break;
		      }
 
		   /* FIM DO TRECHO MUITO IMPORTANTE */
 
 
 
		echo "</td>";
	   }
	   echo "</tr>";
	}
 
	echo "</table>";
}
 
function MostreCalendarioCompleto()
{
	    echo "<table align = 'center'>";
	    $cont = 1;
	    for( $j = 0; $j < 4; $j++ )
	    {
		  echo "<tr>";
		for( $i = 0; $i < 3; $i++ )
		{
		 
		  echo "<td>";
			MostreCalendario( ($cont < 10 ) ? "0".$cont : $cont );  
 
		        $cont++;
		  echo "</td>";
 
	 	}
		echo "</tr>";
	   }
	   echo "</table>";
}
 
MostreCalendario(date('m'));
?></TD></TR></TABLE></TABLE>
</div>
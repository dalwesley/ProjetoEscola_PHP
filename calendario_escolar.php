<?php
include "seguranca_1.php";
?>
<script language="JavaScript">
function abrir(URL) {
var width = 700;
var height = 680;
var left = 657;
var top = 0;
window.open(URL,'janela', 'width='+width+', height='+height+', top='+top+', left='+left+', scrollbars=no, status=no, toolbar=no, location=no, directories=no, menubar=no, resizable=no, fullscreen=no');
}
</script>
<style type="text/css">
	#01 {

			width:60%; /* Tamanho da Largura da Div */
			height:65%; /* Tamanho da Altura da Div */
	        top:0; 
	        margin-top:0%; /* ou seja ele pega 50% da altura tela e sobe metade do valor da altura no caso 100 */
	        left:0;
	        margin-left:0%; /* ou seja ele pega 50% da largura tela e diminui  metade do valor da largura no caso 250 */
			overflow:auto;

}
	#02 {
			width:100%; /* Tamanho da Largura da Div */
			height:100%; /* Tamanho da Altura da Div */
	        top:0; 
	        margin-top:%; /* ou seja ele pega 50% da altura tela e sobe metade do valor da altura no caso 100 */
	        left:0;
	        margin-left:10%; /* ou seja ele pega 50% da largura tela e diminui  metade do valor da largura no caso 250 */

}

</style>
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
 
	$numero_dias = GetNumeroDias( $mes );	// retorna o número de dias que tem o mês desejado
	$nome_mes = GetNomeMes( $mes );
	$diacorrente = 0;	
 
	$diasemana = jddayofweek( cal_to_jd(CAL_GREGORIAN, $mes,"01",date('Y')) , 0 );	// função que descobre o dia da semana
 
	echo "<table border = 0 cellspacing = '30' align = 'center'>";
	 echo "<tr>";
         echo "<td colspan = 20 ><h3><center><pre><a href='adm_mensagem_listar_mes.php?m=".($mes-1)."' target='mural' style='text-decoration: none' title='Listar Eventos do mes de ".($mes-1)."' >-</a>          <a href='adm_mensagem_listar_mes.php?m=$mes' target='mural' style='text-decoration: none' title='Listar Eventos do mes de ".$nome_mes."' >".$nome_mes."</a>          <a href='adm_mensagem_listar_mes.php?m=".($mes+1)."' target='mural' style='text-decoration: none' title='Listar Eventos do mes de ".($mes+1)."' >+</a></h3></td>";
	 echo "</tr>";
	 echo "<tr>";
	   MostreSemanas();	// função que mostra as semanas aqui
	 echo "</tr>";
	for( $linha = 0; $linha < 6; $linha++ )
	{
 
 
	   echo "<tr>";
 
	   for( $coluna = 0; $coluna < 7; $coluna++ )
	   {
		echo "<td width = 50 height = 50 ";
 
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
				   echo "<a href=adm_mensagem_listar_select.php?m=$mes&d=".($diacorrente+1)." target='mural' style='text-decoration: none' title='Cadastrar'>".++$diacorrente . "</a>";
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
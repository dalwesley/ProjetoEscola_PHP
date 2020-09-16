<?php 
 
$host= '127.0.0.1';
$bd= 'escola';
$senhabd= '';
$userbd = 'root';
 
$disciplina_nome			=urldecode($_POST ["disciplina_nome"]);
$disciplina_ano_civil		=urldecode($_POST ["disciplina_ano_civil"]);
$disciplina_serie			=urldecode($_POST ["disciplina_serie"]);
$disciplina_prof_nome		=urldecode($_POST ["disciplina_prof_nome"]);
$disciplina_prof_id			=urldecode($_POST ["disciplina_prof_id"]);
$disciplina_turma			=urldecode($_POST ["disciplina_turma"]);
$disciplina_op				=urldecode($_POST ["disciplina_secretario"]);
$disciplina_diretor			=urldecode($_POST ["disciplina_diretor"]);
$disciplina_data			= date("Y/m/d");

//explodimos os itens da variavel pela vírgula
$valoresdisciplina_nome			= explode(",",$disciplina_nome);
$valoresdisciplina_ano_civil	= explode(",",$disciplina_ano_civil);
$valoresdisciplina_serie		= explode(",",$disciplina_serie);
$valoresdisciplina_prof_nome	= explode(",",$disciplina_prof_nome);
$valoresdisciplina_prof_id		= explode(",",$disciplina_prof_id);
$valoresdisciplina_turma		= explode(",",$disciplina_turma);
$valoresdisciplina_op			= explode(",",$disciplina_secretario);
$valoresdisciplina_diretor		= explode(",",$disciplina_diretor);
$valoresdisciplina_data			= date("Y/m/d");


$unir = 'INSERT INTO disciplina (disciplina_nome, disciplina_ano_civil, disciplina_serie, disciplina_prof_nome, disciplina_prof_id, disciplina_turma, disciplina_secretario, disciplina_diretor, disciplina_data)
 VALUES (';
for ($i = 0; $i < count($valoresdisciplina_nome); $i++) {
	if ($i == count($valoresdisciplina_nome) - 1) {
		$unir .= "'" . $valoresdisciplina_nome[$i] . "','" . $valoresdisciplina_ano_civil[$i] . "','" . $valoresdisciplina_serie[$i] . "','" . $valoresdisciplina_prof_nome[$i] . "','" . $valoresdisciplina_prof_id[$i] . "','" . $valoresdisciplina_turma[$i] . "','" . $valoresdisciplina_secretario[$i] . "','" . $valoresdisciplina_diretor[$i] . "','" . $valoresdisciplina_data[$i] . "')";
	}
	else {
		$unir .= "'" . $valoresdisciplina_nome[$i] . "','" . $valoresdisciplina_ano_civil[$i] . "','" . $valoresdisciplina_serie[$i] . "','" . $valoresdisciplina_prof_nome[$i] . "','" . $valoresdisciplina_prof_id[$i] . "','" . $valoresdisciplina_turma[$i] . "','" . $valoresdisciplina_secretario[$i] . "','" . $valoresdisciplina_diretor[$i] . "','" . $valoresdisciplina_data[$i] . "'), (";
	}
}



  $resultado = mysql_query($unir) or die ("Erro: " . mysql_error());
  
  if($resultado)
		  echo "ok";
   else
          echo "0";
		  
?>
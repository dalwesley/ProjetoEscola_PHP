<?php
// Nesse arquivo passamos as configura��es para nosso servidor MySQL
// Configura��o endere�o MySQL
$hostname ="127.0.0.1";

// Configura��o do nome da base de dados MySQL
$database="escola"; 

// Configura��o do nome do usu�rio de acesso a base de dados MySQL
$usuario="root"; 

// Configura��o da senha para acesso a base de dados MySQL
$senha=""; 

// Conectamos ao nosso servidor MySQL
if(!($conect = mysql_connect($hostname,$usuario,$senha))) 
{
   echo "Erro ao conectar ao MySQL.";
   exit;
}
// Selecionamos nossa base de dados MySQL
if(!($con = mysql_select_db($database,$conect))) 
{
   echo "Erro ao selecionar ao MySQL.";
   exit;
}
?>
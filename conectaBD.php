<?php 
 $mysqli_connection = new MySQLi('localhost', 352950, trabalhoquedas12, 352950);
 if($mysqli_connection->connect_error){
   echo "Desconectado! Erro: ". $mysqli_connection->connect_error;
 }else{
   //echo "Conectado";
   session_start();
 }

?>
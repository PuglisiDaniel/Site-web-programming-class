<?php 
   
   require('conectaBD.php');


   $senhaMD5 = md5($_POST['Senha']);

   $stmt = $mysqli_connection->prepare("INSERT INTO Cuidador(Nome, Telefone, Email, Senha) VALUES(?,?,?,?)");
   $stmt->bind_param('ssss', $_POST['Nome'], $_POST['Telefone'], $_POST['Email'], $senhaMD5);
   //echo " ". $_POST['Telefone'];
   $stmt->execute();

   $mysqli_connection->close();
   
   if($_SESSION['tipo']==0){
     header('location: index.php');
   }else{
     header('location: InicioAdm.php');
   }
?>		
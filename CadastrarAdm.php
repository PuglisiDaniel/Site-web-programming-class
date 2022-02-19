<?php 
   
   require('conectaBD.php');

  if($_SESSION['tipo']==1){

    $senhaMD5 = md5($_POST['Senha']);

    $stmt = $mysqli_connection->prepare("INSERT INTO Administrador(Nome, Telefone, Email, Senha) VALUES(?,?,?,?)");
    $stmt->bind_param('ssss', $_POST['Nome'], $_POST['Telefone'], $_POST['Email'], $senhaMD5);
  
    $stmt->execute();

   $mysqli_connection->close();

   header('location: InicioAdm.php');

   }else{
      header('location: index.php');
   }

  
   
   
?>
		
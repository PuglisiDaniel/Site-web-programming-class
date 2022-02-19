<?php 
   
   require('conectaBD.php');

  if($_SESSION['tipo']==2){
   $aux=0;
   $stmt = $mysqli_connection->prepare("INSERT INTO Paciente(Nome, Telefone, Idade, Enfermidade, QTD_Cameras, Endereco, ID_Cuidador) VALUES(?,?,?,?,?,?,?)");
   $stmt->bind_param('ssssisi', $_POST['Nome'], $_POST['Telefone'], $_POST['Idade'], $_POST['Enfermidade'], $aux, $_POST['Endereco'], $_SESSION['id']);
  
   $stmt->execute();

   $mysqli_connection->close();

   header('location: InicioCuidador.php');

   }else if($_SESSION['tipo']==1){

    $aux=0;
    $stmt = $mysqli_connection->prepare("INSERT INTO Paciente(Nome, Telefone, Idade, Enfermidade, QTD_Cameras, Endereco, ID_Cuidador) VALUES(?,?,?,?,?,?,?)");
    $stmt->bind_param('ssssssi', $_POST['Nome'], $_POST['Telefone'], $_POST['Idade'], $_POST['Enfermidade'], $aux, $_POST['Endereco'], $_POST['ID_Cuidador']);
  
    $stmt->execute();

    $mysqli_connection->close();
    header('location: InicioAdm.php');
   }else{
      header('location: index.php');
   }

  
   
   
?>		
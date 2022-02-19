<?php 

    require('conectaBD.php');
    if($_SESSION['tipo'] == 1){
  
         $results = $mysqli_connection->prepare("UPDATE Paciente SET Nome= ?, Telefone = ?, Idade= ?, Enfermidade = ?, Endereco =? WHERE ID_Paciente=?");
         $results->bind_param('ssissi', $_POST['Nome'], $_POST['Telefone'], $_POST['Idade'], $_POST['Enfermidade'], $_POST['Endereco'], $_POST['ID_Paciente']);
        
         $results->execute();       

         $mysqli_connection->close();
         header('location: ConsultaPac.php');


  }else if ($_SESSION['tipo'] == 2){
         $id = $_SESSION['id'];

         $results = $mysqli_connection->prepare("UPDATE Paciente SET Nome= ?, Telefone = ?, Idade= ?, Enfermidade = ?, Endereco =? WHERE ID_Paciente=?");
         $results->bind_param('ssissi', $_POST['Nome'], $_POST['Telefone'], $_POST['Idade'], $_POST['Enfermidade'], $_POST['Endereco'], $_POST['ID_Paciente']);
        
         $results->execute();       

         $mysqli_connection->close();
         header('location: ConsultaPac.php');

  }else{
     header('location: index.php');
  }
 ?>
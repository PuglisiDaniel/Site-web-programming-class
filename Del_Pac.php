<?php 

    require('conectaBD.php');
    if($_SESSION['tipo'] == 1){
  
         $results = $mysqli_connection->prepare("DELETE FROM Paciente WHERE ID_Paciente=? ");
         $results->bind_param('i', $_POST['ID_Paciente']);//, $_POST['ID_Cuidador']
        
         $results->execute();       

         $mysqli_connection->close();
         header('location: ConsultaPac.php');


  }else if ($_SESSION['tipo'] == 2){
         $id = $_SESSION['id'];

         $results = $mysqli_connection->prepare("DELETE FROM Paciente WHERE ID_Paciente=? AND ID_Cuidador=? ");
         $results->bind_param('ii', $_POST['ID_Paciente'], $id);//
        
         $results->execute();       

         $mysqli_connection->close();
         header('location: ConsultaPac.php');

  }else{
     header('location: index.php');
  }
 ?>
<?php 

    require('conectaBD.php');
    if($_SESSION['tipo'] == 1){
  
         $results = $mysqli_connection->prepare("DELETE FROM Cuidador WHERE ID_Cuidador=? ");
         $results->bind_param('i', $_POST['ID_Cuidador']);
        
         $results->execute();       

         $mysqli_connection->close();
         header('location: ConsultaCui.php');

   }else{
       header('location: index.php');
   }
?>
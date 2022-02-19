<?php 

    require('conectaBD.php');
    if($_SESSION['tipo'] == 1 or $_SESSION['tipo'] == 2){
  
         $results = $mysqli_connection->prepare("UPDATE Camera SET Local= ? WHERE ID_Camera=?");
         $results->bind_param('si', $_POST['Local'],  $_POST['ID_Camera']);
        
         $results->execute();       

         $mysqli_connection->close();
         header('location: ConsultaCam.php');


  }else{
    header('location: index.php');
  }


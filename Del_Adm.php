<?php 

    require('conectaBD.php');
    if($_SESSION['tipo'] == 1){

       if($_SESSION['id'] != $_POST['ID_Adm']){
         $results = $mysqli_connection->prepare("DELETE FROM Administrador WHERE ID_Adm=?");
         $results->bind_param('i', $_POST['ID_Adm']);
        
         $results->execute();       

         $mysqli_connection->close();
         header('location: ConsultaAdm.php');
      }else{
            header('location: ConsultaAdm.php?msg=impossivel deletar a si mesmo');
          }
   }else{
       header('location: index.php');
   }
?>
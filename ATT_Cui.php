<?php 

    require('conectaBD.php');
    if($_SESSION['tipo'] == 1){
         $senhaMD5 = md5($_POST['Senha']);

         $results = $mysqli_connection->prepare("UPDATE Cuidador SET Nome= ?, Telefone = ?, Email= ?, Senha = ? WHERE ID_Cuidador=?");
         $results->bind_param('ssssi', $_POST['Nome'], $_POST['Telefone'], $_POST['Email'], $senhaMD5, $_POST['ID_Cuidador']);
        
         $results->execute();       

         $mysqli_connection->close();
         header('location: ConsultaCui.php');
   


  }else{
    header('location: index.php');
  }


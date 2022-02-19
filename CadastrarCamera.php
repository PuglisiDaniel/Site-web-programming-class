<?php 
   
   require('conectaBD.php');

  if($_SESSION['tipo']==2){
   $stmt = $mysqli_connection->prepare("INSERT INTO Camera(Local, ID_Paciente, ID_Cuidador) VALUES(?,?,?)");
   $stmt->bind_param('sii', $_POST['Local'], $_POST['ID_Paciente'], $_SESSION['id']);
   

   $stmt->execute();


   $id = $_SESSION['id'];

   $qtd=0;
   $resultsCon = $mysqli_connection->query("SELECT ID_Paciente, Nome, Telefone, Idade, Enfermidade, QTD_Cameras, Endereco, ID_Cuidador FROM Paciente");

       while($row = $resultsCon->fetch_assoc()){
       

          if($_POST['ID_Paciente']==$row['ID_Paciente'] && $id == $row['ID_Cuidador']){
             $qtd = $row['QTD_Cameras'] + 1;
             break;
            

       }
    }



   $results = $mysqli_connection->prepare("UPDATE Paciente SET Nome = ?, Telefone = ?, Idade = ?, Enfermidade= ?, QTD_Cameras = ?, Endereco = ?, 
   ID_Cuidador = ? WHERE ID_Paciente=?");
   $results->bind_param('ssssisii',$row['Nome'], $row['Telefone'], $row['Idade'], $row['Enfermidade'], $qtd, $row['Endereco'], $id, $_POST['ID_Paciente']);
        
   $results->execute();       

   $mysqli_connection->close();


   header('location: InicioCuidador.php');

   }else if($_SESSION['tipo']==1){
     $id_cui;
     $resultsCon = $mysqli_connection->query("SELECT ID_Paciente, Nome, Telefone, Idade, Enfermidade, QTD_Cameras, Endereco, ID_Cuidador FROM Paciente");

       while($row = $resultsCon->fetch_assoc()){
       

          if($_POST['ID_Paciente']==$row['ID_Paciente']){
             $id_cui = $row['ID_Cuidador'];
             break;            

       }
    }


   $stmt = $mysqli_connection->prepare("INSERT INTO Camera(Local, ID_Paciente, ID_Cuidador) VALUES(?,?,?)");
   $stmt->bind_param('sii', $_POST['Local'], $_POST['ID_Paciente'], $id_cui);
  
   $stmt->execute();



   $qtd=0;
   $resultsCon = $mysqli_connection->query("SELECT ID_Paciente, Nome, Telefone, Idade, Enfermidade, QTD_Cameras, Endereco, ID_Cuidador FROM Paciente");

       while($row = $resultsCon->fetch_assoc()){
       

          if($_POST['ID_Paciente']==$row['ID_Paciente'] && $id_cui == $row['ID_Cuidador']){
             $qtd = $row['QTD_Cameras'] + 1;
             break;            

       }
    }




   $results = $mysqli_connection->prepare("UPDATE Paciente SET Nome = ?, Telefone = ?, Idade = ?, Enfermidade= ?, QTD_Cameras = ?, Endereco = ?, 
   ID_Cuidador = ? WHERE ID_Paciente=?");
   $results->bind_param('ssssisii',$row['Nome'], $row['Telefone'], $row['Idade'], $row['Enfermidade'], $qtd, $row['Endereco'], 
   $id_cui, $_POST['ID_Paciente']);
        
   $results->execute();       

   $mysqli_connection->close();


   header('location: InicioAdm.php');

   }else{
      header('location: index.php');
   }

  
   
   
?>		
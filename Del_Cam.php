<?php 

    require('conectaBD.php');

    if ($_SESSION['tipo'] == 2 || $_SESSION['tipo'] == 1  ){
        
         $filtro= $mysqli_connection->query("SELECT ID_Paciente, ID_Camera FROM Camera");
         $test=0;
         $id_pac;
                   while($row = $filtro->fetch_assoc()){
       

                        if($_POST['ID_Camera']==$row['ID_Camera']){
                                 $id_pac= $row['ID_Paciente'];
                                 break;
                        }
                   }
                   
                  $results = $mysqli_connection->prepare("DELETE FROM Camera WHERE ID_Camera=? AND ID_Paciente=?");
                  $results->bind_param('ii', $_POST['ID_Camera'], $id_pac);
        
                  $results->execute();  

                            
                  $qtd=0;
                  $resultsCon = $mysqli_connection->query("SELECT ID_Paciente, Nome, Telefone, Idade, Enfermidade, QTD_Cameras, Endereco, 
                  ID_Cuidador FROM Paciente");

                  while($row = $resultsCon->fetch_assoc()){
       

                         if($id_pac==$row['ID_Paciente']){
                                  $qtd = $row['QTD_Cameras'] - 1;
                                  break;
            

                         }
                  }



                  $results = $mysqli_connection->prepare("UPDATE Paciente SET Nome = ?, Telefone = ?, Idade = ?, Enfermidade= ?, 
                  QTD_Cameras = ?, Endereco = ?, ID_Cuidador = ? WHERE ID_Paciente=?");
       
                  $results->bind_param('ssssisii',$row['Nome'], $row['Telefone'], $row['Idade'], $row['Enfermidade'], $qtd, 
                  $row['Endereco'], $row['ID_Cuidador'], $id_pac);
        
                  $results->execute();       
    
                    
                  $mysqli_connection->close();
                  header('location: ConsultaCam.php');
               


  }else{
     header('location: index.php');
  }
 ?>
<?php 

   require('conectaBD.php');

if($_SESSION['tipo'] == 1){
      echo'<h1>Cameras Cadastradas</h1>';
      $results = $mysqli_connection->query("SELECT ID_Camera, Local, ID_Paciente, ID_Cuidador FROM Camera ORDER BY ID_Camera ASC");
  if ($results->num_rows >0){
    echo "<table border=1>";
       echo'<tr>';
          echo'<th><b>ID_Camera</b></th>';
          echo'<th><b>Local</b></th>';
          echo'<th><b>ID_Paciente</b></th>';
          echo'<th><b>ID_Cuidador</b></th>';
       echo'</tr>';


    while($row = $results->fetch_assoc()){
        
         echo '<tr>';
         echo '  <td>'.$row["ID_Camera"].'</td>';
         echo '  <td>'.$row["Local"].'</td>';  
         echo '  <td>'.$row["ID_Paciente"].'</td>';  
         echo '  <td>'.$row["ID_Cuidador"].'</td>';
         echo '</tr>';  
       

    }
   echo "</table>";
   $results->free();

   $mysqli_connection->close();

        }else{
        echo '<br><br><p style="color: red"><b>Nao existem Cameras cadastradas</b></p>';
        echo '<img src = old2.jpg  class="side" >';
        $mysqli_connection->close();
        }
}else if($_SESSION['tipo'] == 2){

         echo'<h1>Cameras dos Pacientes do Cuidador(a) ', $_SESSION['remeber'],'</h1>';
         $id = $_SESSION['id'];

         $results = $mysqli_connection->query("SELECT ID_Camera, Local, ID_Paciente, ID_Cuidador 
         FROM Camera WHERE ID_Cuidador = $id");

         if ($results->num_rows >0){
          echo "<table border=1>";
           echo'<tr>';
             echo'<th><b> ID_Camera </b></th>';
             echo'<th><b> Local </b></th>';
             echo'<th><b> ID_Paciente </b></th>';
             echo'<th><b> ID_Cuidador </b></th>';
          echo'</tr>';


          while($row = $results->fetch_assoc()){
        
           echo '<tr>';
            echo '  <td>'.$row["ID_Camera"].'</td>';
            echo '  <td>'.$row["Local"].'</td>';  
            echo '  <td>'.$row["ID_Paciente"].'</td>';  
            echo '  <td>'.$row["ID_Cuidador"].'</td>';
            echo '</tr>';  
         }
         echo "</table>";
         $results->free();

         $mysqli_connection->close();


       }else{
          echo'<br><p style = "color: red"><b>Voce nao possui cameras cadastradas em seus pacientes</b></p>';
          echo '<img src = old2.jpg  class="side" >';
       }

}else{
      header('location: index.php');
     }
    
?>

<html>
<head> 
     <title>Consulta de Cameras</title>
     <meta name = "viewport" content= width=device-width, inicial-scale=1.0, maximum-scale=1.0">
     <link = rel = "stylesheet" type = "text/css" href="style.css">
</head>
<body>


  <a href="FormATT_Cam.php" id= "botao">Atualizar</a>



  <a href="FormDel_Cam.php" id= "botao">Excluir</a>



  <a href="InicioAdm.php" id= "botao">Retornar</a>

			
</body>
</html>	
<?php 

    require('conectaBD.php');
    if($_SESSION['tipo'] == 1){
    echo'<h1>Pacientes Cadastrados</h1>';
         $results = $mysqli_connection->query("SELECT ID_Paciente, Nome, Telefone, Idade, Enfermidade, QTD_Cameras, Endereco, ID_Cuidador 
         FROM Paciente ORDER BY ID_Paciente ASC");
      if ($results->num_rows >0){
         echo "<table border=1>";
          echo'<tr>';
            echo'<th><b> ID_Paciente </b></th>';
            echo'<th><b> Nome </b></th>';
            echo'<th><b> Telefone </b></th>';
            echo'<th><b> Idade </b></th>';
            echo'<th><b> Enfermidade </b></th>';
            echo'<th><b> QTD_Cameras </b></th>';
            echo'<th><b> Endereco </b></th>';
            echo'<th><b> ID_Cuidador </b></th>';
         echo'</tr>';


        while($row = $results->fetch_assoc()){
        
          echo '<tr>';
           echo '  <td>'.$row["ID_Paciente"].'</td>';
           echo '  <td>'.$row["Nome"].'</td>';  
           echo '  <td>'.$row["Telefone"].'</td>';  
           echo '  <td>'.$row["Idade"].'</td>';
           echo '  <td>'.$row["Enfermidade"].'</td>';
           echo '  <td>'.$row["QTD_Cameras"].'</td>';
           echo '  <td>'.$row["Endereco"].'</td>';
           echo '  <td>'.$row["ID_Cuidador"].'</td>';
           echo '</tr>';  
       }
       echo "</table>";
       $results->free();

       $mysqli_connection->close();
        }else{
        echo '<br><br><p style="color: red"><b>Nao existem pacientes cadastrados</b></p>';
        echo '<img src = old1.jpg  class="side" >';
        $mysqli_connection->close();
        }
  }else if ($_SESSION['tipo'] == 2){

         echo'<h1>Pacientes do Cuidador(a) ', $_SESSION['remeber'],'</h1>';
         $id = $_SESSION['id'];

         $results = $mysqli_connection->query("SELECT ID_Paciente, Nome, Telefone, Idade, Enfermidade, QTD_Cameras, Endereco, ID_Cuidador 
         FROM Paciente WHERE ID_Cuidador = $id");
         if ($results->num_rows >0){
          echo "<table border=1>";
           echo'<tr>';
             echo'<th><b> ID_Paciente </b></th>';
             echo'<th><b> Nome </b></th>';
             echo'<th><b> Telefone </b></th>';
             echo'<th><b> Idade </b></th>';
             echo'<th><b> Enfermidade </b></th>';
             echo'<th><b> QTD_Cameras </b></th>';
             echo'<th><b> Endereco </b></th>';
             echo'<th><b> ID_Cuidador </b></th>';
          echo'</tr>';


          while($row = $results->fetch_assoc()){
        
           echo '<tr>';
            echo '  <td>'.$row["ID_Paciente"].'</td>';
            echo '  <td>'.$row["Nome"].'</td>';  
            echo '  <td>'.$row["Telefone"].'</td>';  
            echo '  <td>'.$row["Idade"].'</td>';
            echo '  <td>'.$row["Enfermidade"].'</td>';
            echo '  <td>'.$row["QTD_Cameras"].'</td>';
            echo '  <td>'.$row["Endereco"].'</td>';
            echo '  <td>'.$row["ID_Cuidador"].'</td>';
            echo '</tr>';  
         }
         echo "</table>";
         $results->free();

         $mysqli_connection->close();
       }else{
        echo '<br><br><p style="color: red"><b>Voce nao possui pacientes cadastrados</b></p>';
        echo '<img src = old1.jpg  class="side" >';
        $mysqli_connection->close();
}

  }else{
     header('location: index.php');
  }
 ?>

<html>
<head>
     <title>Consulta de Pacientes</title>
     <meta name = "viewport" content= width=device-width, inicial-scale=1.0, maximum-scale=1.0">
     <link = rel = "stylesheet" type = "text/css" href="style.css">
</head>
<body>
  
  <a  href="FormATT_Pac.php"  id= "botao">Atualizar</a>

  <a href="FormDel_Pac.php" id= "botao">Excluir</a>

  <a href="InicioAdm.php"  id= "botao">Retornar</a>



		
			
</body>
</html>	

<?php 

    require('conectaBD.php');
    if($_SESSION['tipo'] != 1){
      header('location: index.php');
   }
    echo'<h1>Cuidadores Cadastrados</h1>';
    $results = $mysqli_connection->query("SELECT ID_Cuidador, Nome, Telefone, Email, Senha FROM Cuidador ORDER BY ID_Cuidador ASC");
  if ($results->num_rows >0){
    echo "<table border=1>";
       echo'<tr>';
          echo'<th><b>ID_Cuidador</b></th>';
          echo'<th><b>Nome</b></th>';
          echo'<th><b>Telefone</b></th>';
          echo'<th><b>Email</b></th>';
          echo'<th><b>Senha</b></th>';
       echo'</tr>';


    while($row = $results->fetch_assoc()){
        
         echo '<tr>';
         echo '  <td>'.$row["ID_Cuidador"].'</td>';
         echo '  <td>'.$row["Nome"].'</td>';  
         echo '  <td>'.$row["Telefone"].'</td>';  
         echo '  <td>'.$row["Email"].'</td>';
         echo '  <td>'.$row["Senha"].'</td>';
         echo '</tr>';  
       

    }
   echo "</table>";
   $results->free();

   $mysqli_connection->close();
        }else{
        echo '<br><br><p style="color: red"><b>Nao existem Cuidadores cadastrados</b></p>';
        echo '<img src = old2.jpg  class="side" >';
        $mysqli_connection->close();
        }
 ?>


<html>
<head>
     <title>Menu Inicial</title>
     <meta name = "viewport" content= width=device-width, inicial-scale=1.0, maximum-scale=1.0">
     <link = rel = "stylesheet" type = "text/css" href="style.css">
</head>
<body>



  <a href="FormATT_Cui.php" id= "botao">Atualizar</a>



  <a href="FormDel_Cui.php" id= "botao">Excluir</a>



  <a href="InicioAdm.php" id= "botao">Retornar</a>

		
			
</body>
</html>	
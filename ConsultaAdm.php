<?php 

    require('conectaBD.php');
    if($_SESSION['tipo'] != 1 ){
      header('location: index.php');
   }
   echo'<h1>Administradores Cadastrados</h1>';
    $results = $mysqli_connection->query("SELECT ID_Adm, Nome, Telefone, Email FROM Administrador ORDER BY ID_Adm ASC");
    if ($results->num_rows >0){
    echo "<table border=1>";
       echo'<tr>';
          echo'<th><b> ID </b></th>';
          echo'<th><b> Nome </b></th>';
          echo'<th><b> Telefone </b></th>';
          echo'<th><b> Email </b></th>';
       echo'</tr>';


    while($row = $results->fetch_assoc()){
        
         echo '<tr>';
         echo '  <td>'.$row["ID_Adm"].'</td>';
         echo '  <td>'.$row["Nome"].'</td>';  
         echo '  <td>'.$row["Telefone"].'</td>';  
         echo '  <td>'.$row["Email"].'</td>';
         echo '</tr>';  
       

    }
   echo "</table>";
   $results->free();

   $mysqli_connection->close();
        }else{
        echo '<br><br><p style="color: red"><b>Nao existem Administradores cadastrados</b></p>';
        echo '<img src = old1.jpg  class="side" >';
        $mysqli_connection->close();
        }
 ?>

<html>
<head>
     <title>Consulta de Administradores</title>
     <meta name = "viewport" content= width=device-width, inicial-scale=1.0, maximum-scale=1.0">
     <link = rel = "stylesheet" type = "text/css" href="style.css">
</head>
<body>

<?php     if(isset($_REQUEST['msg'])){

         echo '<br><p style="color: red"><b>',$_REQUEST['msg'],'</b></p>';

         
    }
?>
  <a href="FormATT_Adm.php" id= "botao">Atualizar</a>



  <a href="FormDel_Adm.php" id= "botao">Excluir</a>



  <a href="InicioAdm.php" id= "botao">Retornar</a>

		
			
</body>
</html>	
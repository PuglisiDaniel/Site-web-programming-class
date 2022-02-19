<?php 
    
    require('conectaBD.php');

   if($_SESSION['tipo'] == 1 ){
      $resultsCon = $mysqli_connection->query("SELECT * FROM `Camera`");

   }else if($_SESSION['tipo'] == 2 ){
      $id = $_SESSION['id'];
      $resultsCon = $mysqli_connection->query("SELECT * FROM `Camera` WHERE `ID_Cuidador`= ".$id);
   }else{
       header('location: index.php');
   }


 ?>


<html>
<head>
     <title>Atualizacao de Camera</title>
     <meta name = "viewport" content= width=device-width, inicial-scale=1.0, maximum-scale=1.0">
     <link = rel = "stylesheet" type = "text/css" href="style.css">
</head>
<body>

			
			
			<h1>Excluir a Camera</h1>
			<form action = "ATT_Cam.php" method ="post">

                             <label class="login" for="ID_Camera">ID da Camera que deseja alterar:</label><br>
                             <select name="ID_Camera" class="login" id="ID_Camera" required>
                             <option value="" selected disabled>Selecione uma Opcao</option> 
<?php 


                         while($row = $resultsCon->fetch_assoc()){
                             
                              echo'<option value='.$row['ID_Camera'].'>'.$row['ID_Camera'].'</option>';


                         }
                        $mysqli_connection->close();

?>
                             </select>
                             <br>
                             <label class="login" for="Local">Novo local da camera:</label><br>
		             <input class="login" type="text" id="Local" name="Local" required><br>
                                                        
			     <br><br><input id="botao" type="submit" value="Atualizar">
				

                             <a href="ConsultaCam.php" id= "botao">    Retornar</a>

                        </form>
</body>
</html>
<?php 
    
    require('conectaBD.php');

   
   if($_SESSION['tipo'] == 1 ){
      $resultsCon = $mysqli_connection->query("SELECT * FROM `Paciente`");

   }else if($_SESSION['tipo'] == 2 ){
      $id = $_SESSION['id'];
      $resultsCon = $mysqli_connection->query("SELECT * FROM `Paciente` WHERE `ID_Cuidador`= ".$id);
   }else{
       header('location: index.php');
   }

 ?>


<html>
<head>
     <title>Exclusao de Pacientes</title>
     <meta name = "viewport" content= width=device-width, inicial-scale=1.0, maximum-scale=1.0">
     <link = rel = "stylesheet" type = "text/css" href="style.css">
</head>
<body>

			
			
			<h1>Excluir o Paciente</h1>
			<form action = "Del_Pac.php" method ="post">

                                <label class="login" for="ID_Paciente">ID do Paciente que deseja excluir:</label><br>
				
                                <select name="ID_Paciente" class="login" id="ID_Paciente" required>
                                <option value="" selected disabled>Selecione uma Opcao</option> 
<?php 


                         while($row = $resultsCon->fetch_assoc()){
                             
                              echo'<option value='.$row['ID_Paciente'].'>'.$row['ID_Paciente'].'</option>';


                         }
                         $mysqli_connection->close();

?>
                             </select>
		
                                  
				<br><br><input id="botao" type="submit" value="Excluir">
				

                               <a href="ConsultaPac.php" id= "botao">    Retornar</a>
                        </form>
</body>
</html>
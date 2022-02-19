<?php 
    
    require('conectaBD.php');

   if($_SESSION['tipo'] != 1 ){
      header('location: index.php');
   }

   $resultsCon = $mysqli_connection->query("SELECT * FROM `Cuidador`");
 ?>


<html>
<head>
     <title>Exclusao de Cuidadores</title>
     <meta name = "viewport" content= width=device-width, inicial-scale=1.0, maximum-scale=1.0">
     <link = rel = "stylesheet" type = "text/css" href="style.css">
</head>
<body>

			
			
			<h1>Excluir o Cuidador</h1>
			<form action = "Del_Cui.php" method ="post">

                                <label class="login" for="ID_Cuidador">ID do Cuidador que deseja excluir:</label><br>
				
				<select name="ID_Cuidador" id="ID_Cuidador" class="login" required>
                                <option value="" selected disabled>Selecione uma Opcao</option>
                                
 <?php 


                         while($row = $resultsCon->fetch_assoc()){
                             
                              echo'<option value='.$row['ID_Cuidador'].'>'.$row['ID_Cuidador'].'</option>';


                         }

                         $mysqli_connection->close();
?>              
                                </select> 
                                  
				<br><br><input id="botao" type="submit" value="Excluir">
				
                               <a href="ConsultaCui.php" id= "botao">    Retornar</a>
                        </form>
</body>
</html>
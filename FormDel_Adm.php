<?php 
    
    require('conectaBD.php');

   if($_SESSION['tipo'] != 1 ){
      header('location: index.php');
   }
   $resultsCon = $mysqli_connection->query("SELECT * FROM `Administrador`");

 ?>


<html>
<head>
     <title>Exclusao de Administradores</title>
     <meta name = "viewport" content= width=device-width, inicial-scale=1.0, maximum-scale=1.0">
     <link = rel = "stylesheet" type = "text/css" href="style.css">
</head>
<body>

			
			
			<h1>Excluir o Cuidador</h1>
			<form action = "Del_Adm.php" method ="post">

                                <label class="login" for="ID_Adm">ID do Administrador que deseja excluir:</label><br>
		                <select name="ID_Adm" id="ID_Adm" class="login" required>
                                <option value="" selected disabled>Selecione uma Opcao</option>
                                
 <?php 


                         while($row = $resultsCon->fetch_assoc()){
                             
                              echo'<option value='.$row['ID_Adm'].'>'.$row['ID_Adm'].'</option>';


                         }

                         $mysqli_connection->close();

?>              
                                </select>                                 
				<br><br><input id="botao" type="submit" value="Excluir">
				
		
                               <a href="ConsultaAdm.php" id= "botao">    Retornar</a>
                        </form>
</body>
</html>
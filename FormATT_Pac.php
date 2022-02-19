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
     <title>Atualizacao de Pacientes</title>
     <meta name = "viewport" content= width=device-width, inicial-scale=1.0, maximum-scale=1.0">
     <link = rel = "stylesheet" type = "text/css" href="style.css">
</head>
<body>

			
			
			<h1>Atualize o Paciente</h1>
			<form action = "ATT_Pac.php" method ="post">

                                <label class="login" for="ID_Paciente">ID do Paciente que deseja atualizar:</label><br>
				
				<select name="ID_Paciente" id="ID_Paciente" class="login" required>
                                <option value="" selected disabled>Selecione uma Opcao</option>
                                
 <?php 


                         while($row = $resultsCon->fetch_assoc()){
                             
                              echo'<option value='.$row['ID_Paciente'].'>'.$row['ID_Paciente'].'</option>';


                         }

                  $mysqli_connection->close();      
?>              
                                </select> 
                                  
<br><br>
				<label class="login" for="Nome">Nome:</label><br>
				<input class="login" type="text" id="Nome" name="Nome" required><br>
				
				<label class="login" for="Telefone">Telefone:</label><br>
				<input class="login" type="text" id="Telefone" name="Telefone" required><br>

                                <label class="login" for="Idade">Idade:</label><br>
				<input class="login" type="number" id="Idade" name="Idade" required><br>

                                <label class="login" for="Enfermidade">Enfermidade:</label><br>
				<input class="login" type="text" id="Enfermidade" name="Enfermidade"><br>

                             
                                <label class="login" for="Endereco">Endereco:</label><br>
				<input class="login" type="text" id="Endereco" name="Endereco" required><br>

                               
                                  
				<br><br><input id="botao" type="submit" value="Atualizar">
				
	
                               <a href="ConsultaPac.php" id= "botao">    Retornar</a>
                        </form>
</body>
</html>
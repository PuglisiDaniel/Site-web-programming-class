		
 <?php 
    
    require('conectaBD.php');

   if($_SESSION['tipo'] != 1){
      header('location: index.php');
   }
   $resultsCon = $mysqli_connection->query("SELECT * FROM `Cuidador`");
 ?>


<html>
<head>
     <title>Cadastro de Pacientes</title>
     <meta name = "viewport" content= width=device-width, inicial-scale=1.0, maximum-scale=1.0">
      <link = rel = "stylesheet" type = "text/css" href="style.css">
</head>
<body>

			
			
			<h1>Cadastre seu Paciente</h1>
			<form action = "CadastrarPacientes.php" method ="post">
				<label class="login" for="Nome">Nome:</label><br>
				<input class="login" type="text" id="Nome" name="Nome" required><br>
				
				<label class="login" for="Telefone">Telefone:</label><br>
				<input class="login" type="text" id="Telefone" name="Telefone" required><br>

                                <label class="login" for="Idade">Idade:</label><br>
				<input class="login" type="text" id="Idade" name="Idade" required><br>

                                <label class="login" for="Enfermidade">Enfermidade:</label><br>
				<input class="login" type="text" id="Enfermidade" name="Enfermidade"><br>

                                
                                <label class="login" for="Endereco">Endereco:</label><br>
				<input class="login" type="text" id="Endereco" name="Endereco" required><br>
                      
                                <label class="login" for="ID_Cuidador">ID do Cuidador:</label><br>
				
                                <select name="ID_Cuidador" class="login" id="ID_Cuidador" required>
                                <option value="" selected disabled>Selecione uma Opcao</option> 
<?php 


                         while($row = $resultsCon->fetch_assoc()){
                             
                              echo'<option value='.$row['ID_Cuidador'].'>'.$row['ID_Cuidador'].'</option>';


                         }
                         

?>
                                </select>  
				<br><br><input id="botao" type="submit" value="Cadastrar">
				
                               <a href="InicioAdm.php" id= "botao">    Retornar</a>
                        </form>
</body>
</html>
<?php 
    
    require('conectaBD.php');

    if($_SESSION['tipo'] != 1){
      header('location: index.php');
    }

    $resultsCon = $mysqli_connection->query("SELECT * FROM `Administrador`");

 ?>

<html>
<head>
     <title>Atualizacao de Administradores</title>
     <meta name = "viewport" content= width=device-width, inicial-scale=1.0, maximum-scale=1.0">
     <link = rel = "stylesheet" type = "text/css" href="style.css">
</head>
<body>

			
			
			<h1>Atualize o Cuidador</h1>
			<form action = "ATT_Adm.php" method ="post">

                                <label class="login" for="ID_Adm">ID do Administrador que deseja atualizar:</label><br>
                                <select name="ID_Adm" class="login" id="ID_Adm" required>
                                <option value="" selected disabled>Selecione uma Opcao</option> 
<?php 


                         while($row = $resultsCon->fetch_assoc()){
                             
                              echo'<option value='.$row['ID_Adm'].'>'.$row['ID_Adm'].'</option>';


                         }

                        $mysqli_connection->close();

?>
                             </select>
<br><br>
				<label class="login" for="Nome">Nome:</label><br>
				<input class="login" type="text" id="Nome" name="Nome" required><br>

                                <label class="login" for="Telefone">Telefone:</label><br>
				<input class="login" type="text" id="Telefone" name="Telefone" required><br>
				
				<label class="login" for="Email">Email:</label><br>
				<input class="login" type="text" id="Email" name="Email" required><br>

                                <label class="login" for="Senha">Senha:</label><br>
				<input class="login" type="text" id="Senha" name="Senha" required><br>
                      
                                  
				<br><br><input id="botao" type="submit" value="Atualizar">
				
			
                               <a href="ConsultaAdm.php" id= "botao">    Retornar</a>
                        </form>
</body>
</html>
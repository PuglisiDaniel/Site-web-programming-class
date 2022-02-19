 <?php 
    
    require('conectaBD.php');
    if($_SESSION['tipo'] != 1){
      header('location: index.php');
   }
   

 ?>

<html>
<head>
     <title>Cadastro de Administradores</title>
     <meta name = "viewport" content= width=device-width, inicial-scale=1.0, maximum-scale=1.0">
     <link = rel = "stylesheet" type = "text/css" href="style.css">
</head>
<body>
			
			
			<h1>Cadastrar Administrador</h1>
			<form action = "CadastrarAdm.php" method ="post">
				<label class="login" for="Nome">Nome:</label><br>
				<input class="login" type="text" id="Nome" name="Nome" required><br>
				
				<label class="login" for="Telefone">Telefone:</label><br>
				<input class="login" type="text" id="Telefone" name="Telefone" required><br>

                                <label class="login" for="Email">Email:</label><br>
				<input class="login" type="text" id="Email" name="Email" required><br>

                                <label class="login" for="Senha">Senha:</label><br>
				<input class="login" type="text" id="Senha" name="Senha" required><br>

				
				<br><br><input id="botao" type="submit" value="Cadastrar">
				
				
	
                               <a href="InicioAdm.php" id= "botao">    Retornar</a>
                        </form>
</body>
</html>
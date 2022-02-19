 <?php 
    
  require('conectaBD.php');
  session_destroy();
  session_start();
  $_SESSION['id'] = x;
  $_SESSION['remeber'] = y;
  $_SESSION['tipo']=0;


 ?>


<html>
<head>
      <title>Monitora Quedas</title>
      <meta name = "viewport" content= width=device-width, inicial-scale=1.0, maximum-scale=1.0">
      <link = rel = "stylesheet" type = "text/css" href="style.css">
</head>
<body>

			<h1>Software de Monitoramento Remoto de Queda de Pacientes</h1>
			<img src = inicio.jpg  class="container" >
			<form action = login.php method ="post" class = "field">
				<label class="login" for="login">Email:</label><br>
				<input class="login" type="text" id="login" name="login" required><br>
				
				<label class="login" for="psw">Senha:</label><br>
				<input class="login" type="password" id="psw" name="psw" required><br>
<?php
    
     if(isset($_REQUEST['msg'])){

         echo '<br><p style="color: red"><b>',$_REQUEST['msg'],'</b></p>';

         
    }

?>			
				<br><br><input id="botao" type="submit" value="Entrar">
                           
            
                            

				<a href="FormCuidador.php" id= "botao">    Cadastrar</a>
				<br><br>
				<p class="contato"><br>(12)5555-5555<br>softwarequeda@gmail.com</p><br>
			     
			</form>
                     		


</body>
</html>	

		
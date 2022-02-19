<?php 

    require('conectaBD.php');
    if($_SESSION['tipo'] == 2){
      header('location: InicioCuidador.php');
   }else if($_SESSION['tipo'] == 0){
      header('location: index.php'); 
   }
  echo'<h1>Ola Administrador ', $_SESSION['remeber'],'</h1>';

 ?>

<html>
<head>
     <title>Menu Inicial</title>
     <meta name = "viewport" content= width=device-width, inicial-scale=1.0, maximum-scale=1.0">
     <link = rel = "stylesheet" type = "text/css" href="style.css">
</head>
<body>
<div class = "lista">
 
 <ul>
    <li><a href="FormAdm.php" style="color: black">Cadastrar Administrador</a></li>
    <li><a href="FormCuidador.php" style="color: black">Cadastrar Cuidador</a></li>
    <li><a href="FormPaciente.php" style="color: black">Cadastrar Paciente</a></li>
    <li><a href="FormCamera.php" style="color: black">Cadastrar Camera</a></li>
    
 </ul>
<br><br>



 <ul>
    <li><a href="ConsultaAdm.php" style="color: black">Consultar Administradores</a></li>
    <li><a href="ConsultaCui.php" style="color: black">Consultar Cuidadores</a></li>
    <li><a href="ConsultaPac.php" style="color: black">Consultar Pacientes</a></li>
    <li><a href="ConsultaCam.php" style="color: black">Consultar Cameras</a></li>
    
 </ul>
<br><br>
    <a href="logout.php" id= "botao">    Logout</a>	



	
</div>
     		
</body>
</html>	
		
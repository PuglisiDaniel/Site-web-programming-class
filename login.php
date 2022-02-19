<?php 

    
  require('conectaBD.php');
  session_destroy();
  session_start();
  $_SESSION['id'] = 'x';
  $_SESSION['remeber'] = y;
  $_SESSION['tipo']=0;


    $senhaMD5 = md5($_POST['psw']);

    $resultsA = $mysqli_connection->query("SELECT ID_Adm, Nome, Email, Senha FROM Administrador");

    while($row = $resultsA->fetch_assoc()){
       

       if($_POST['login']==$row['Email'] && $senhaMD5 == $row['Senha']){
           $_SESSION['id'] = $row['ID_Adm'];
           $_SESSION['remeber'] = $row['Nome'];
           $_SESSION['tipo'] = 1;
           header('location: InicioAdm.php');
           exit();

       }

    }


    $resultsC = $mysqli_connection->query("SELECT ID_Cuidador, Nome, Email, Senha FROM Cuidador");

    while($row = $resultsC->fetch_assoc()){
       

       if($_POST['login']==$row['Email'] &&  $senhaMD5 == $row['Senha']){
           $_SESSION['id'] = $row['ID_Cuidador'];
           $_SESSION['remeber'] = $row['Nome'];
           $_SESSION['tipo'] = 2;
           header('location: InicioCuidador.php');
           exit();

       }

    }
    $resultsA->free();
    $resultsC->free();

    header('location: index.php?msg=Usuario e/ou Senha Invalido(s)');


   $mysqli_connection->close();

 ?>
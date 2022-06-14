<?php

var_dump($_POST);
$nome =  trim($_POST['nome']) ?  trim($_POST['nome']) : "";
$cognome =  trim($_POST['cognome']) ?  trim($_POST['cognome']) : "";
$eta =  trim($_POST['eta']) ?  trim($_POST['eta']) : "";
$mail =  trim($_POST ['E-mail']) ?  trim($_POST['E-mail']) : "";
$confermamail =  trim($_POST ['confermamail']) ?  trim($_POST['confermamail']) : "";
$username =  trim($_POST ['username']) ?  trim($_POST['username']) : "";
$password =  trim($_POST ['password']) ?  trim($_POST['password']) : "";
$confermapassword =  trim($_POST ['confermapassword']) ?  trim($_POST['confermapassword']) : "";

$message="";

if ($eta < 16) {
      $message=urlencode('La tua età non è idonea alla registrazione');
      header('Location: registrazione.php?error=true&message='.$message);
 }


if ($mail != $confermamail) {
      $message=urlencode('Le due email non corrispondono, riprovi');
      header('Location: registrazione.php?error=true&message='.$message);
} ;






/*  forse l'età??
controllare che le due mail siano uguali
      e che non ci siano username uguali 
      controllare con switch che siano rispettati gli 8 caratteri
      con 2 numeri e un simbolo speciale e poi controllo che le
      password siano uguali */

?>
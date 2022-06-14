<?php
$nome = $_POST['nome'] ;
$cognome = $_POST['cognome'] ;
$eta = $_POST['eta'] ;
$mail = $_POST ['mail'] ;
$confermamail = $_POST ['confermamail'];
$username = $_POST ['username'] ;
$password = $_POST ['password'] ;
$confermapassword = $_POST ['confermapassword'] ;

if ($mail == $confermamail) {
      if ($eta >16) {echo "Benvenuto/a" . $nome ;
      } else {echo "non puoi entrare" ; } 

} else { echo "le due email non corrispondono, riprovi." ; 
} ;

switch ($password) 




/*  forse l'età??
controllare che le due mail siano uguali
      e che non ci siano username uguali 
      controllare con switch che siano rispettati gli 8 caratteri
      con 2 numeri e un simbolo speciale e poi controllo che le
      password siano uguali */

?>
<?php
session_start();

if (isset($_POST)) {
    require_once('functions.php');

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

      if ($nome =="" OR $cognome=="" OR $eta=="" OR $mail=="" OR $username=="" OR $password=="") {
            $message=urlencode('Compilare tutti i campi');
            header('Location: registrazione.php?error=true&message='.$message);
            exit;
      }else{

            //BLOCCA SE ETA INFERIORE 16 ANNI
            if ($eta < 16) {
                  $message=urlencode('La tua età non è idonea alla registrazione');
                  header('Location: registrazione.php?error=true&message='.$message);
                  exit;
            }
            
            //BLOCCA SE MAIL <>
            if ($mail != $confermamail) {
                  $message=urlencode('Le due email non corrispondono, riprova');
                  header('Location: registrazione.php?error=true&message='.$message);
                  exit;
            } 
            
            //BLOCCA SE PASSWORD <>
            if ($password != $confermapassword) {
                  $message=urlencode('Le due password non corrispondono, riprova');
                  header('Location: registrazione.php?error=true&message='.$message);
                  exit;
            }

            if ( strlen($password) < 8) {
                  $message=urlencode('La password inserita è troppo corta, riprova');
                  header('Location: registrazione.php?error=true&message='.$message);
                  exit;
            }

            //CONTROLLA ESISTENZA USERNAME
            $conto_utenze_con_stessa_user = check_username($username);
            if ($conto_utenze_con_stessa_user>0) {
                  $message=urlencode('L\'utenza è già presente a sistema, inserirne un\'altra');
                  header('Location: registrazione.php?error=true&message='.$message);
                  exit;
            } ;

            //QUINDI TUTTO OK CREIAMO UTENZA E RESTITUIAMO L'ID DELLA NUOVA UTENZA
            $id_newUser = new_user($cognome, $nome, $mail, $eta, $username, $password);
            if ( is_numeric($id_newUser) ) {
                  $res = get_user_byID($id_newUser);

                  unset($res['user']['user_password']);
                  unset($res['user']['user_creationTimestamp']);

                  $_SESSION['auth_login']=true;
                  $_SESSION['user']=$res;

                  //var_dump($_SESSION);
                  Header('Location: home.php');
            exit;
            }else {
                  $message=urlencode('Problema nella registrazione contattare l\'amministratore di sistema');
                  header('Location: registrazione.php?error=true&message='.$message);
                  exit;
            }
      }

}






/*  forse l'età??
controllare che le due mail siano uguali
      e che non ci siano username uguali 
      controllare con switch che siano rispettati gli 8 caratteri
      con 2 numeri e un simbolo speciale e poi controllo che le
      password siano uguali */

?>
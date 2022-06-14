<?php
session_start();

?>
<!DOCTYPE html>
<html lang="it">

<head>
  <meta charset="UTF-8" />

  <title>
    Area Riservata
  </title>

  <meta name="keywords" content=" assignment finale grafica, html, css" />
  <meta name="description" content="assignment finale" />
  <meta name="author" content=" Manuela Ferri e Giorgia Canova" />

  <link rel="stylesheet" type="text/css" href="style.css" />

</head>

<body>

  <?php include('header.php');?>
<?php include ('connection.php'); ?>
  <h2>ACCEDI</h2>
  <hr>


  <article>
    <p class="testo">Qui potrà accedere al suo profilo, se dovesse rinscontrare problemi ci <a href="contatti.html"> contatti.</a></p>
    <section>
      <form action="login_action.php" method="post">
       <input style=" margin-left: 50%" id="username" type="text" name="username" value="_"   /> 
      
      Username: <input style=" margin-left: 50%"style=" margin-left: 50%" id="password" type="password" name="password" value="_"   />
      Password: <input style=" margin-left: 50%" type="submit" name="invia" value="invia" />
</form>
    </section>

    <span>Non ricordi Username o Password? </span>
        <span> Non sei registrato? <a href="registrazione.php">Registrati</a> </span>
  </article>





  <br>
  <br>
  <aside>
    <div class="mto">
      MOVE inTO S.p.A Corso Regina Margherita, 10124 Torino TO
      - tel. 011.57.641 e-mail: MoveTo@Info.to.it <br /> R.I. di Torino e Codice Fiscale 08555172966 - P. IVA 08556488532 - Pec: mto@pec.into.to.it<br /> Info sul sito: Informazioni e Telecomunicazioni mTO- Redazione, Via Oropa, 96, 10153 Torino TO
    </div>
  </aside>
  <br><br>

  <br>
  <footer>
    <div class="footerhome">
      <ul>
        <li><a href="contatti.html">Contatti</a></li>
        <li> Lavora con noi </li>
      </ul>

      <br>
      Copyright © 2021 Manuela Ferri & Giorgia Canova
    </div>

  </footer>

</body>

</html>
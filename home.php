<?php session_start();?>
<!DOCTYPE html>
<html lang="it">

<head>

  <meta charset="UTF-8">

  <title>Home </title>

  <meta name="keywords" content="assignment finale, html, css" />
  <meta name="description" content="assignment finale" />
  <meta name="author" content="giorgia canova manuela ferri" />

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" type="text/css" href="style.css">

</head>

<body>
  <?php include 'header.php';?>
  <article>
    <?php //var_dump($_SESSION);?>
    <?php
      if (isset($_SESSION['auth_login'])) {
        echo"<h1>Benvenuto ".$_SESSION['user']['user_name']." in Moving in Turin!</h1>";
    }else{
      echo "<h2>Benvenuto in Moving in Turin! </h2>";
    }
    ?>
    
    <p class="testo">Qui avrete sempre a portata di mano informazioni, avvisi e molto altro sulla città di Torino! <br>
      La nostra è una società nata nel 1990: entrata sul mercato in tempi relativamente recenti,<br>
      l’azienda si è trovata a fronteggiare giganti del settore, ma è comunque riuscita in pochissimo <br>
      tempo a raggiungere un enorme successo. Come? <br>
      Grazie alla nostra determinazione, efficienza e solida innovazione continua!</p>
    <section>




      <div id="relativehome">
        <p>Sapevi che è possibile calcolare il proprio percorso? <br>
          Se sei curioso, allora sei sulla pagina giusta: iniziamo!</p>
        <div id="maps">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d52459.77789455406!2d7.664980512017614!3d45.07667672516535!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47886d126418be25%3A0x8903f803d69c77bf!2sTorino%20TO!5e0!3m2!1sit!2sit!4v1642935807972!5m2!1sit!2sit" allowfullscreen="" loading="lazy">
          </iframe>
        </div>
      </div>




      <br>


      <img src="immagini/impatto.png" id="immagine" alt="torino" title="Torino-avvisi" />

      <div id="impatto">
        <a href="avvisi.html">INFO</a>
      </div>
      <br>
  </article>
  </section>
  <aside>
    <div class="mto">
      MOVE inTO S.p.A Corso Regina Margherita, 10124 Torino TO
      - tel. 011.57.641 e-mail: MoveTo@Info.to.it <br /> R.I. di Torino e Codice Fiscale 08555172966 - P. IVA 08556488532 - Pec: mto@pec.into.to.it<br /> Info sul sito: Informazioni e Telecomunicazioni mTO- Redazione, Via Oropa, 96, 10153 Torino TO
    </div>
  </aside>



  <br>
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
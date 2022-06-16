<!DOCTYPE html>
<html lang="it">

<head>
  <meta charset="UTF-8">
  <title>Registrazione </title>

  <meta name="keywords" content=" assignment finale, grafica, html, css" />
  <meta name="description" content="assignment finale" />
  <meta name="author" content=" Manuela Ferri e Giorgia Canova" />

  <meta name="viewport" content="width=device-width, initial scale 1.0">

  <link rel="stylesheet" type="text/css" href="style.css" />

</head>

<body>
  <?php include 'header.php'; ?>

  <h2>REGISTRATI</h2>
  <hr>


  <article>




    <p class="testo"> Benvenuto in Move in Turin, <br></br>
      qui può effettuare la registrazione.</p>
    <section>

      <?php if (isset($_GET['error'])) : ?>
        <div class="div_errore">
          <?= $_GET['message']; ?>
        </div>
      <?php endif; ?>

      <form action="signup.php" method="post">
        <label for="nome">Nome:</label><br /> <input id="nome" type="text" name="nome" value="" /> <br>
        <label for="cognome">Cognome:</label><br /> <input id="cognome" type="text" name="cognome" value="" /><br>
        <label for="eta">Età::</label><br /> <input id="cognome" type="text" name="eta" value="" /><br>
        <label for="mail">E-mail</label><br /> <input id="mail" type="text" name="E-mail" value="" /><br>
        <label for="confermamail">Conferma l'E-mail</label><br /> <input id="confermamail" type="text" name="confermamail" value="" /><br>
        <p class="testo">Scegli un username!</p>
        <label for="username">Username</label><br /> <input id="username" type="text" name="username" value="" size="45" maxlength="45" /> <br>
        <br />
        <p class="testo"> La password deve contenere almeno:</p>
        <ul>
          <li>8 caratteri</li>
          <li>almeno due cifre (comprese tra 0 e 9)</li>
          <li> un simbolo speciale </li>
        </ul>
        <label for="password">Password</label><br /> <input id="password" type="password" name="password" value="" size="45" maxlength="45" /><br>
        <label for="confermapassword">Conferma la tua Password</label><br /> <input id="confermapassword" type="password" name="confermapassword" value="" size="45" maxlength="45" /><br>
        <br />
        <input type="submit" name="invia" value="invia" />
      </form>
    </section>
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




</html>
<!DOCTYPE html>
<html lang="it">

<head>

  <meta charset="UTF-8">

  <title>Home </title>

  <meta name="keywords" content="assignment finale, html, css" />
  <meta name="description" content="assignment finale" />
  <meta name="author" content="giorgia canova manuela ferri" />

  <meta name="viewport" content="width=device-width, initial scale 1.0">

  <link rel="stylesheet" type="text/css" href="style.css">

</head>

<body>
  <?php include('menu.php'); ?>

  <article>
    <h1> Pagamento Sanzioni </h1>

    <section>

      <div id="relative">

        <div> Accedi per poter completare il pagamento: </div>
        <br><br>

        <label for="username1">Username:</label><input id="username1" type="text" name="username" value="_" size="30" maxlength="30" />

        <br><br>

        <label for="password2">Password:</label> <input id="password2" type="text" name="password" value="_" size="30" maxlength="30" />

        <br>
        <br>
        <input type="submit" name="invia" value="invia" />

        <br>
        <br>
        <span>Non ricordi Username o Password? </span>
        <span> Non sei registrato? <a href="registrazione.html">Registrati</a> </span>
      </div>


      <div id="relative2">

        <h2> Pagamento rapido </h2>
        <p class="testo">
          inserire numero di verbale e
          scegliere il metodo di pagamento
        </p>

        <br>

        <label for="verbale">N° Verbale:</label><input id="verbale" type="text" name="N° Verbale" value="_" required />
        <br>


        <input id="carta1" type="radio" name="metodo di pagamento" value="carta di credito/debito" />
        <label for="carta1">carta di credito/debito</label>
        <br>
        <input id="Paypal" type="radio" name="metodo di pagamento" value="Paypal" />
        <label for="Paypal"> Paypal</label>

        <br>
        <br>
        <input type="submit" name="invia" value="invia" />
      </div>
      <img src="immagini/cartee.png" alt="carte" title="carte" id="carte">

    </section>
  </article>

  <aside>
    <div class="mto">
      MOVE inTO S.p.A Corso Regina Margherita, 10124 Torino TO
      - tel. 011.57.641 e-mail: MoveTo@Info.to.it <br /> R.I. di Torino e Codice Fiscale 08555172966 - P. IVA 08556488532 - Pec: mto@pec.into.to.it<br /> Info sul sito: Informazioni e Telecomunicazioni MTO- Redazione, Via Oropa, 96, 10153 Torino TO
    </div>
  </aside>
  <br><br>
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
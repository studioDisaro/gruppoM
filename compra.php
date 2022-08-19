<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    
    <title>Compra il biglietto</title>
    <meta name="keywords" content="assignment finale, html, css" />
    <meta name="description" content="assignment finale" />
    <meta name="author" content="giorgia canova manuela ferri" />
  
    <meta name="viewport" content="width=device-width, initial-scale=1">
  
    <link rel="stylesheet" type="text/css" href="style.css">

    
</head>
<body>
    <?php 
    include ('header.php');
    include ('connections.php'); 
    
    include ('login_action.php') ; ?>

    <?php echo "Benvenuto $username" . "<h2> che biglietto vorresti acquistare? </h2>" ; ?>

    <form action = "comprato.php" method ="get">
    lite  <input type = "radio" name ="biglietto" value="lite">
    extended <input type="radio" name ="biglietto" value="extended">
    pro <input type="radio" name="biglietto" value="pro">
    </form>

    <h3> Come preferisce pagare? </h3>
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
        <li><a href="contatti.php">Contatti</a></li>
        <li> Lavora con noi </li>
      </ul>

      <br>
      Copyright © 2021 Manuela Ferri & Giorgia Canova
    </div>

  </footer>
</body>
</html>
<?php session_start();?>

<!DOCTYPE html>
<html lang="it">

<head>

  <meta charset="Utf-8">
  <title> Reclami
  </title>

  <meta name="keywords" content=" assignment finale grafica, html, css" />
  <meta name="description" content="assignment finale" />
  <meta name="author" content="Manuela ferri e Giorgia Canova" />


  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="style.css" />

</head>

<body>

  <?php include('header.php');?>


  <article>
    <br>

    <div>Benvenuto nella pagina Reclami, per poter inviare un reclamo è necessario effettuare il login:</div>
    <br>
    <section>

      <br>
      <label for="username"> Username: </label><input id="username" type="text" name="username" value="_" required />
      <label for="password"> Password: </label><input id="password" type="text" name="password" value="_" required />
      <br>
      <br>
      <input type="submit" name="invia" value="invia" />





      <fieldset>
        <legend>
          <h2> Selezionare il tipo di reclamo:</h2>
        </legend>
        <div class="domande">
          <input id="sicurezza" type="radio" name="tipo di reclamo" value="sicurezza_e_pulizia" />
          <label for="sicurezza">Sicurezza e pulizia </label>
          <input id="servizio" type="radio" name="tipo di reclamo" value="servizio_clienti_e_personale" />
          <label for="servizio"> servizio clienti e personale </label>
          <input id="mezzi" type="radio" name="tipo di reclamo" value="mezzi di trasporto" />
          <label for="mezzi">mezzi di trasporto</label>
        </div>
      </fieldset>
      <br><br>

      <label for="reclam0">Il mio reclamo:</label><textarea id="reclam0" name="reclam0" cols="50" rows="5"> </textarea>

      <hr>

      <br><br>
      <div id="reclamo">
        Vuoi migliorare il nostro servizio? Completa il seguente questionario
        <br> scegliendo l'opzione che più ti aggrada e ricorda che nelle valutazioni numeriche <br>
        1 corrisponde a 'per niente soddisfatto' e 5 corrisponde a 'molto soddisfatto.
      </div>

      <h2 id="h1">Questionario</h2>


      <fieldset>
        <legend>
          <h3 class="h3"> Sicurezza e Pulizia </h3>
        </legend>
        <div class="domande">

          Pensa che le norme di sicurezza Covid-19 siano adeguate?
          <br>
          <input id="sic" type="radio" name="norme" value="si" />
          <label for="sic">Si </label>
          <input id="nope" type="radio" name="norme" value="no" />
          <label for="nope"> no </label>
          <input id="idk" type="radio" name="norme" value="non so" />
          <label for="idk"> Non so </label>

          <br>
          <hr>
          In una scala da 1 a 5, quanto
          è soddisfatto della pulizia e della sanificazione dei mezzi di trasporto?
          <br>
          <input id="one" type="radio" name="sicurezza_e_pulizia" value="1" />
          <label for="one">1</label>
          <input id="two" type="radio" name="sicurezza_e_pulizia" value="2" />
          <label for="two">2 </label>
          <input id="three" type="radio" name="sicurezza_e_pulizia" value="3" />
          <label for="three">3 </label>
          <input id="four" type="radio" name="sicurezza_e_pulizia" value="4" />
          <label for="four">4 </label>
          <input id="five" type="radio" name="sicurezza_e_pulizia" value="5" />
          <label for="five">5</label>

        </div>
      </fieldset>
      <fieldset>
        <legend>
          <h3 class="h3"> Servizio Clienti e Personale </h3>
        </legend>
        <div class="domande">
          In una scala da 1 a 5
          valuti la funzionalità e l'efficienza del servizio clienti <br>
          <input id="1" type="radio" name="Servizio_Clienti_e_Personale" value="1" />
          <label for="1">1 </label>
          <input id="2" type="radio" name="Servizio_Clienti_e_Personale" value="2" />
          <label for="2">2 </label>
          <input id="3" type="radio" name="Servizio_Clienti_e_Personale" value="3" />
          <label for="3">3 </label>
          <input id="4" type="radio" name="Servizio_Clienti_e_Personale" value="4" />
          <label for="4">4 </label>
          <input id="5" type="radio" name="Servizio_Clienti_e_Personale" value="5" />
          <label for="5"> 5 </label>
          <br>
          <hr>


          Le è mai capitato di avere problemi con il personale, sia quello presente a bordo dei mezzi,
          sia quello presente nella nostra sede? <br>
          <input id="ja" type="radio" name="Servizio Clienti e Personale" value="si" />
          <label for="ja">Si </label>
          <input id="nein" type="radio" name="Servizio_Clienti_e_Personale" value="no" />
          <label for="nein">No </label>
          <input id="qualche" type="radio" name="Servizio_Clienti_e_Personale" value="qualche_volta" />
          <label for="qualche">qualche volta</label>
          <input id="preferisco" type="radio" name="Servizio_Clienti_e_Personale" value="preferisco_non_rispondere" />
          <label for="preferisco">preferisco non rispondere </label>

        </div>
      </fieldset>

      <fieldset>
        <legend>
          <h3 class="h3"> Mezzi di Trasporto </h3>
        </legend>
        <div class="domande">
          Data la situazione pandemica, le è mai capitato di non poter usufruire del nostro servizio,
          poichè si era raggiunta la capienza massima? <br>
          <input id="si" type="radio" name="Mezzi_di_Trasporto" value="si" />
          <label for="si">Si </label>
          <input id="no" type="radio" name="Mezzi_di_Trasporto" value="no" />
          <label for="no">no </label>
          <input id="spesso" type="radio" name="Mezzi_di_trasporto" value="spesso" />
          <label for="spesso">spesso </label>

          <br>

          Se la riposta alla precendente domanda è stata si/spesso, di che mezzo si trattava?
          <input id="bus" type="radio" name="Mezzi_di_Trasporto" value="bus" />
          <label for="bus"> bus </label>
          <input id="tram" type="radio" name="Mezzi_di_Trasporto" value="tram" />
          <label for="tram">tram</label>
          <input id="metropolitana" type="radio" name="Mezzi_di_Trasporto" value="metropolitana" />

          <label for="metropolitana">metropolitana </label>
        </div>
      </fieldset>


      <fieldset>
        <legend>
          <h3 class="h3">Suggerimenti </h3>
        </legend>

        <div class="domande">
          Se ha qualche suggerimento per poter migliorare il nostro servizio, può inserirlo nel box sottostante. <br><br>
          <label for="suggest"> il mio suggerimento:</label><textarea id="suggest" name="suggerimento" cols="30" rows="7">mi piacerebbe..</textarea>


        </div>
      </fieldset>
      <br><br>
      <input type="submit" value="invia" id="invia" />

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
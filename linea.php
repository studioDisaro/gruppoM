<?php session_start(); ?>

<!DOCTYPE html>
<html lang="it">

<head>

    <meta charset="UTF-8">

    <title>Linee e Orari</title>

    <meta name="keywords" content="assignment finale, html, css" />
    <meta name="description" content="assignment finale" />
    <meta name="author" content="giorgia canova manuela ferri" />

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="style.css">

</head>

<body>
    <?php include('header.php');
    include_once('functions.php');
    ?>

    <article>
        <h1>Linee e Orari:</h1>


        <p class="testo">La nostra compagnia garantisce una copertura diurna e notturna, sia per le tratte urbane, che suburbane.<br><br>
            L'unica eccezione è la <strong> metropolitana</strong>, la cui ultima corsa parte alle 01.00 del mattino. <br>
            Per evitare spiacevoli inconvenienti, si consiglia di tener sotto controllo la pagina degli <a href="avvisi.html">avvisi.</a> <br>
            Nella seguente tabella può trovare gli orari delle corse diurne e notturne: </p>
        <br>



        <?php $linee = get_service_list()?>
        <?php //var_dump($linee);?>

        <?php foreach($linee as $linea):?>
            <?=$linea["service__name"];?> -> <?=$linea["service_description"];?> <button onclick="window.location='linea_dettaglio.php?id_service=<?=$linea['service_id']?>'">VEDI FERMATE</button>
            <hr>
        <?php endforeach;?>




        <table id="tabella">
            <thead>
                <tr>
                    <th></th>
                    <th> linee urbane </th>
                    <th> linee suburbane </th>
            </thead>
            <tbody>
                <tr>
                    <td class="diurne"> diurne</td>
                    <td> 06.00-01.00 </td>
                    <td>06.00-23.30</td>
                </tr>


                <tr>
                    <td class="notturne"> notturne</td>
                    <td> 00.30-05.00</td>
                    <td>02.30-05.30</td>
                </tr>

            </tbody>
            <tfoot>
            </tfoot>
        </table>

    </article>

    <br>
    <br>
    <section>
        <h2> Regolamento per il trasporto</h2>
        <div class="testo">Recentemente è stato aggiornato il regolamento del trasporto urbano e suburbano,
            dove abbiamo voluto fare chiarezza riguardo aspetti; questo grazie anche a delle novità che ci hanno interessato
            nel corso degli ultimi anni per le modalità di viaggio ed esigenze dei clienti:<br>
            i documenti di viaggio necessari per i bambini, l'accesso ai
            mezzi dei clienti con disabilità e di passeggini e carrozzine, il trasporto di animali, la videosorveglianza e la segnalazione di reati.
        </div>
    </section>

    <br><br>
    <aside>
        <div class="mto">
            MOVE inTO S.p.A Corso Regina Margherita, 10124 Torino TO
            - tel. 011.57.641 e-mail: MoveTo@Info.to.it <br /> R.I. di Torino e Codice Fiscale 08555172966 - P. IVA 08556488532 - Pec: mto@pec.into.to.it<br /> Info sul sito: Informazioni e Telecomunicazioni MTO- Redazione, Via Oropa, 96, 10153 Torino TO
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
<?php session_start();?>
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
	<header class="header">

   <img src="immagini/logo3.png" alt="logo" title="logo" id="logo">

<h1 id="id"> Move in Turin </h1>

<p><label for="search">cerca nel sito:</label>
 <input id="search" type="search" placeholder="search" name="search" value="search" />
                          <input type="submit" name="submit" value="invia"> </p>
						     

      <nav>
    <div class="menu">
      <ul>

        <li  tabindex="1"><a href="home.html" > Home </a></li>
        <li tabindex="2" ><a href="biglietteria.html" > Biglietteria </a></li>
        <li tabindex="3"><a href="linee.html"> Linee e Orari </a></li>
        <li tabindex="4"><a href="pagamenti.html"> Pagamento sanzioni </a></li>
        <li tabindex="5" > <a href="reclami.html"> Reclami </a> </li>
		<li tabindex="6"><a href="avvisi.html">Avvisi</a></li>
        
            


      </ul>
    </div>
      </nav>
     
    </header>                     

      <h2>ACCEDI</h2>
      <hr>
       
     
<article>
<p class="testo">Qui potrà accedere al suo profilo, se dovesse rinscontrare problemi ci <a href="contatti.html"> contatti.</a></p>
      <section>
         <label for="username">Username</label><br/> <input  id="username" type="text" name="username" value="_" size="45" maxlength="45" /> <br>
         <br/>                            
          <label for="password">Password</label><br/> <input id="password" type="text" name="password" value="_" size="45" maxlength="45" /><br>
         <br/>                      
           <label for="mail">E-mail</label><br/> <input id="mail" type="text" name="E-mail" value="_" /><br>
		                                 

         <br>
           <input type="submit" name="invia" value="invia"  />
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
  Copyright  © 2021 Manuela Ferri & Giorgia Canova
  </div>

</footer>

  </body>
</html>
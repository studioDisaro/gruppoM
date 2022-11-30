<header class="header">

  <img src="immagini/logo3.png" alt="logo" title="logo" id="logo">

  <h1 id="id">Move in Turin </h1>

  <p> <label for="search">cerca nel sito:</label><input id="search" type="search" placeholder="search" name="search" value="search" />

    <input type="submit" name="submit" value="invia">
  </p>

  <?php if (!isset($_SESSION['auth_login'])) : ?>
    <div class="login"><a href="reserved.php">Login</a></div>
  <?php endif; ?>
  <nav>
    <div class="menu">
      <ul>

        <li tabindex="1"><a href="home.php"> Home </a></li>
        <li tabindex="2"><a href="biglietti.php"> Biglietteria </a></li>
        <li tabindex="3"><a href="linea.php"> Linee e Orari </a></li>
        <li tabindex="4"><a href="pagamenti.php"> Pagamento sanzioni </a></li>
        <?php if (isset($_SESSION)) :
          if (isset($_SESSION['auth_login'])) : ?>
            <li tabindex="5"> <a href="reclami.php"> Reclami </a> </li>
        <?php endif;
        endif;
        ?>
        <li tabindex="6"><a href="avvisi.php">Avvisi</a></li>
        <?php if (isset($_SESSION)) :
          if (isset($_SESSION['auth_login'])) : 
          if ($_SESSION['user']['user_admin'] == 1) : ?>
          <li tabindex="5"> <a href="admin.php"> Amministratore </a> </li>
           <?php endif;?>
            <li tabindex="6"> <a href="logout.php"> Esci </a> </li>
        <?php endif;
        endif;
        ?>

      </ul>
    </div>
  </nav>
</header>
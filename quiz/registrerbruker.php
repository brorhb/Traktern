<?php session_start(); ?>
<!DOCTYPE html>
<html lang="no">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="../wp-content/themes/laurels/style.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <header>
      <div class="books_bg">
        <div class="overlay">
          <div class="container-fluid">
            <div class="col-md-3"><a href="http://136147-www.web.tornado-node.net/quiz/index.php?">
                <p class="red"><-- Tilbake</p></a>
              <h1>Registrer deg</h1>
              <p>Registrer deg å få tilgang på våre kaffekurs helt gratis! På denne måten kan du øke kaffenytelsen din hjemme, og vite litt mer om hva baristaer gjør med kaffen din.</p>
            </div>
          </div>
        </div>
      </div>
    </header>
    <div class="container-fluid">
      <div class="col-md-6 col-md-offset-3 box"><a href="http://136147-www.web.tornado-node.net/quiz/index.php?">
          <p class="red"><-- Tilbake</p></a>
        <h3>Registrer deg</h3>
        <form class="form-signin">
          <label for="inputUsername" class="sr-only">Brukernavn</label>
          <input id="inputUsername" type="text" placeholder="Brukernavn" required="" autofocus="" class="form-control">
          <label for="inputPassword" class="sr-only">Passord</label>
          <label for="inputEmail" class="sr-only">Epost adresse</label>
          <input id="inputEmail" type="email" placeholder="Epost adresse" required="" autofocus="" class="form-control">
          <input id="inputPassword" type="password" placeholder="Passord" required="" class="form-control">
          <label for="inputPassword" class="sr-only">Bekreft passord</label>
          <input id="inputPassword" type="password" placeholder="Bekreft passord" required="" class="form-control">
          <div class="checkbox">
            <label>
              <input type="checkbox" value="remember-me"> Husk meg
            </label>
        </div><a type="submit" href="loggetinn.php" class="btn btn-lg btn-default btn-block">Registrer deg og logg inn</a>
        </form>
          
          <?php
            connectDB(); 
            //include_once("db-tilkobling.php");
            include_once("../wp-includes/pluggable.php");
            
            $brukernavn = $_POST["inputUsername"];
            $epost = $_POST["inputEmail"];
            $passord = $_POST["inputPassword"];
        
            if (!$brukernavn) {
                print("Fyll ut brukernavn");
            } else if (!$passord) {
                print("Fyll ut passord");
            } else if (filter_var($epost, FILTER_VALIDATE_EMAIL)) {
                echo "($epost) er ugyldig";
            } else {
                $sqlSetning = "SELECT * FROM wp_users WHERE user_login = '$brukernavn';";
                $sqlResultat = mysqli_query($db, $sqlSetning) or die ("ikke mulig å hente fra db");
                
                if (mysqli_num_rows($sqlResultat) != 0) {
                    print("bruker finnes fra før");
                }
                else {
                    $kryptertPassord = wp_password_hash($passord); /* kommer fra include fila lenger opp. egen wp funksjon for hashing av passord */
                    $sqlSetning = "INSERT INTO wp_users VALUES ('', '$brukernavn', '$kryptertPassord', '', 'epost', '', '', '', '', '');";
                    mysqli_query($db, $sqlSetning) or die ("ikke mulig å registrere");
                    print ("bruker er registrert");
                }
            }
        ?>
          
      </div>
    </div>
  </body>
</html>

<?php
  $debug = FALSE;

  // Hvilke(n) kategori(er) quizen skal gjelde
  $kategoriargument = 2;
  $totalt_antall_sporsmaal_per_kategori = 5;

  include_once("../funksjoner.php");

  connectDB();

  /* Navnet på quizen */
  $navn = HentKategorinavnFraKategoriID($kategoriargument);
?>


<!DOCTYPE html>
<html lang="no">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="../../wp-content/themes/laurels/style.css">
    <link rel="stylesheet" href="../css/style.css">
  </head>
  <body>
    <header>
      <div class="books_bg">
        <div class="overlay">
          <div class="container-fluid">
            <div class="col-md-3"><a href="http://136147-www.web.tornado-node.net/quiz/loggetinn.php">
                <p class="red"><-- Tilbake til start</p></a>
              <h1><?php echo $navn; ?></h1>
              <p>I dette kurset vil du lære å lage <?php echo strtolower($navn); ?>. Vi guider deg nå igjennom en video hvor du lærer hvordan du skal lage denne kaffe typen perfekt, hva den inneholder og hvordan man lager den.</p>
            </div>
          </div>
        </div>
      </div>
    </header>
    <div class="container-fluid">
      <div class="col-sm-7">
        <div class="col-sm-12 box">
          <div class="col-sm-12">







<?php
  /* Script info */
    /*session_start();
    print_r($_SERVER);
    echo "<br><br><br>Session:";
    print_r($_SESSION);
    echo "Session slutt<br><br>";*/

  // Hvis brukeren leverer quizen
  if (@$_POST['lever']) {

    $poeng = 0;
    $poeng_per_sporsmaal = 10;
    $antall_sporsmaal = 0;

    $sporsmaalIDer = $_POST['sporsmaalID'];
    $antall = count($sporsmaalIDer);
      if ($debug === TRUE) { echo "Antall: " . $antall . "<br>"; }

    // For hvert spørsmål
    for ($i=0; $i<$antall; $i++) {
      $sporsmaalIDsvar = $_POST['sporsmaalID'][$i];
      if ($debug === TRUE) { echo "Spørsmål ID: " . $sporsmaalIDsvar . "<br>"; }

      $svarIDer = $_POST['svar'][$sporsmaalIDsvar];
      $antall1 = count($svarIDer);
      if ($debug === TRUE) { echo "Antall svar: " . $antall1 . "<br>"; }

      // Finne antall mulige poeng for gitt spørsmål
      $antall_alternativer = HentAntallSvaralternativerFraSporsmaalID($sporsmaalIDsvar);

      // Hindrer at det legges til poeng i totalsumen hvis spørsmålet ikke har noen svaralternativer
      // Spørsmålet må tas med i og med at det har allerede blitt vist til brukeren
      if ($antall_alternativer > 0) {

        $antall_riktige_fasit = HentAntallRiktigeSvaralternativerFraSporsmaalID($sporsmaalIDsvar);
        $antall_feil_fasit = $antall_alternativer - $antall_riktige_fasit;

        $antall_riktige_bruker = 0;
        $antall_feil_bruker = 0;

        // Kjører for hver alternativ brukeren har huket av
        for ($j=0; $j<$antall1; $j++) {
          $svarIDersvar = $_POST['svar'][$sporsmaalIDsvar][$j];
          if ($debug === TRUE) { echo "Svar: " . $svarIDersvar . "<br>"; }

          // Hvis det riktige
          if (sjekkOmSvaralternativErKorrekt($svarIDersvar)) {
            $antall_riktige_bruker++;
          }
          else {
            $antall_feil_bruker++;
          }

        }

        $antall_korrekte_rikitge = $antall_riktige_bruker;
        $antall_korrekte_feil = $antall_feil_fasit - $antall_feil_bruker;
        $antall_rikitge_svar = $antall_korrekte_rikitge + $antall_korrekte_feil;
        $poengprosent = round($antall_rikitge_svar / $antall_alternativer * 100);
        $antall_poeng = round($poeng_per_sporsmaal * $poengprosent / 100);
        $poeng += $antall_poeng;
        $antall_sporsmaal++;

      }

      if ($debug === TRUE) {
        echo "<br><h4>Antall spørsmål: " . $antall_sporsmaal . "<br> Poeng: " . $poeng . "/". $antall_sporsmaal * $poeng_per_sporsmaal . " (" . $poengprosent . "%)</h4><br>";

        echo "<br><br>";
      }

    }

    $totalt_mulige_poeng = $antall_sporsmaal * $poeng_per_sporsmaal;
    $total_prosent = round($poeng / $totalt_mulige_poeng * 100, 1);
    echo '<h3>Resultat</h3>';
    echo '<h4 class="resultat"><!--Antall spørsmål: ' . $antall_sporsmaal . '<br> -->Poeng: ' . $poeng . '/'. $totalt_mulige_poeng . '(' . $total_prosent . '%)</h4>';
    echo '<br><p>Ønsker du å prøve igjen?</p>';
    echo '<a href="quiz.php" class="btn btn-default pull-right">Prøv quiz igjen</a><a href="index.php" class="btn btn-default pull-left">Ta kurset på nytt</a>';

  }
  else {

    if (isset($kategoriargument)) {
      $sql = "SELECT id FROM qz_kategori WHERE id = $kategoriargument ORDER BY RAND();";
    }
    else {
      $sql = "SELECT id FROM qz_kategori ORDER BY RAND();";
    }

    $result = connectDB()->query($sql);

    /*if (@!$_GET['svar'] == 1) {
      echo '<a href="?svar=1">Fasit</a>';
    }
    else {
      echo '<a href="">Tilbake</a>';
    }*/

    if ($result->num_rows > 0) {

      echo '<form action="" method="POST">';

      // output data of each row
      while($row = $result->fetch_assoc()) {

        $kategoriID = $row["id"];

        echo "<h3>" . HentKategorinavnFraKategoriID($kategoriID) . "</h3>";

        $sql2 = "SELECT * FROM qz_sporsmaal WHERE kategoriID = '$kategoriID' ORDER BY RAND() LIMIT " . $totalt_antall_sporsmaal_per_kategori . ";";
        $result2 = connectDB()->query($sql2);

        if ($result2->num_rows > 0) {
          // output data of each row
          while($row2 = $result2->fetch_assoc()) {

            $sporsmaalID = $row2["id"];

            echo "<br><h4><strong>" . HentSporsmaalFraSporsmaalID($sporsmaalID) . "</strong></h4>";
            echo '<input type="hidden" name="sporsmaalID[]" value="' . $sporsmaalID . '">'; // Spørsmål ID

            $sql3 = "SELECT * FROM qz_svar WHERE sporsmaalID = '$sporsmaalID' ORDER BY RAND();";
            $result3 = connectDB()->query($sql3);

            if ($result3->num_rows > 0) {
              // output data of each row
              while($row3 = $result3->fetch_assoc()) {

                $svarID = $row3["id"];
                $svaralternativ = utf8_encode($row3["svaralternativ"]);
                $svar = utf8_encode($row3["svar"]);

                if (@!$_GET['svar']==1) {
                  echo '<p><input type="checkbox" name="svar[' . $sporsmaalID . '][]" value="' . $svarID . '"> ' . $svaralternativ . '</p>';
                }
                else {
                  if ($svar == FALSE) {
                    echo '<p style="color:red;"><input type="checkbox" name="svar[' . $sporsmaalID . '][]" value="' . $svarID . '"> ' . $svaralternativ . '</p>';
                  }
                  else {
                    echo '<p style="color:green;"><input type="checkbox" name="svar[' . $sporsmaalID . '][]" value="' . $svarID . '" checked> ' . $svaralternativ . '</p>';
                  }
                }
              }
            }
          }
        }
      }
      echo '<input type="submit" class="btn btn-default pull-right" value="Lever svar" name="lever">';
      echo '<a href="video.php" class="btn btn-default pull-left">Tilbake</a>';
      echo "</form>";
    }
    else {
      echo "0 results";
    }
  }
  connectDB()->close();
?>




<!--

<div class="col-sm-4 col-sm-offset-1 profil">
        <h3>Velkommen </h3>
        <div class="col-md-12">
          <div class="profilbilde"></div>
        </div>
        <div class="col-md-12">
          <h4>Kaffe latte</h4>
          <div class="progresjonBG">
              <div class="progresjon"></div>
          </div>
          <h4>Kaffe i Norge</h4>
          <div class="progresjonBG">
              <div class="progresjon"></div>
          </div>
          <h4>Chai latte</h4>
            <div class="progresjonBG">
                <div class="progresjon" style="width:20%;"></div>
            </div>
        </div>
        <div class="col-md-12"><a href="">
            <p class="red">Rediger </p></a><a href="http://136147-www.web.tornado-node.net/quiz/index.php" class="btn btn-default pull-right">Logg ut</a></div>
      </div>





<div class="col-sm-4 col-sm-offset-1 box hidden-sm hidden-xs">
        <h3>Velkommen Marius Wetterlin!</h3>
        <div class="col-md-12">
          <div class="profilbilde"></div>
        </div>
        <div class="col-md-12">
          <h4>Kaffe latte</h4>
          <div class="progresjonEn"></div>
          <h4>Kaffe i Norge</h4>
          <div class="progresjonTre"></div>
          <h4>Chai latte</h4>
          <div class="progresjonTo"></div>
        </div>
        <div class="col-md-12"><a href="">
            <p class="red">Rediger </p></a><a href="http://136147-www.web.tornado-node.net/quiz/index.php" class="btn btn-default pull-right">Logg ut</a></div>
      </div>





-->





          </div>
        </div>
      </div>
      <div class="col-sm-4 col-sm-offset-1 profil">
        <h3>Velkommen <?php echo "$brukernavn"; ?></h3>
        <div class="col-md-12">
          <div class="profilbilde"></div>
        </div>
        <div class="col-md-12">

        <?php
          progresjon();
        ?>

        </div>
        <div class="col-md-12"><a href="">
            <p class="red">Rediger </p></a><a href="http://136147-www.web.tornado-node.net/quiz/index.php" class="btn btn-default pull-right">Logg ut</a></div>
      </div>
    </div>
  </body>
</html>

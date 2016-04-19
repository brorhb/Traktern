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
              <h1>Chai Latte</h1>
              <p>I dette kurset vil du lære å lage Chai Latte. Vi guider deg nå igjennom en video hvor du lærer hvordan du skal lage denne te typen perfekt, hva den inneholder og hvordan man lager den.</p>
            </div>
          </div>
        </div>
      </div>
    </header>
    <div class="container-fluid">
      <div class="col-sm-7">
        <div class="col-sm-12 box">
          <div class="col-sm-12">
            <h3>Chai Latte</h3>
            <h4>Video gjennomgang</h4><iframe width="560" height="315" src="https://www.youtube.com/embed/aVAdgp2C9Zw" frameborder="0" allowfullscreen></iframe>
            <p>Etter du har sett denne videoen anbefaler vi at du prøver å lage en Chai Latte selv. Se filmen gjærne flere ganger.</p><a href="quiz.php" class="btn btn-default pull-right">Neste</a><a href="infoChaiLatte.php" class="btn btn-default pull-left">Tilbake</a>
          </div>
        </div>
      </div>
      <div class="col-sm-4 col-sm-offset-1 profil">
        <h3>Velkommen <?php echo "$brukernavn"; ?></h3>
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
        <div class="col-md-12"><a href="http://136147-www.web.tornado-node.net/quiz/index.php" class="btn btn-default pull-right">Logg ut</a></div>
      </div>
    </div>
  </body>
</html>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <title>Obligatorisk oppgave 4</title>
        <link href="bootstrap.min.css" rel="stylesheet">
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <script src="bootstrap.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/functions.js" type="text/javascript"></script>
        <link href="css/bootstrap.css" rel="stylesheet">
    </head>

    <body>
        <?php include_once("db-tilkobling.php"); ?>
        <nav class="navbar navbar-default">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php">USN</a>
            </div>
            <div class="container-fluid">
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Registrer<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="registrer-klasse.php">Klasse</a></li>
                            <li><a href="registrer-student.php">Student</a></li>
                            <li><a href="registrer-bilde.php">Bilde</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"> 
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            Endre
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="rediger-klasse.php">Klasse</a></li>
                            <li><a href="rediger-student.php">Student</a></li>
                            <li><a href="rediger-bilde.php">Bilde</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            Vis
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="vis-klasse.php">Klasse</a></li>
                            <li><a href="vis-student.php">Student</a></li>
                            <li><a href="vis-bilde.php">Bilde</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            Slett
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="slett-klasse.php">Klasse</a></li>
                            <li><a href="slett-student.php">Student</a></li>
                            <li><a href="slett-bilde.php">Bilde</a></li>
                        </ul>
                    </li>
                    <?php
                        include_once("nyttige-funksjoner.php");
                        if (erLoggetInn()) {
                            echo '
                                <li>
                                    <a href="logg-ut.php">
                                        Logg ut
                                    </a>
                                </li>';
                        }
                        
                    ?>
                    <!--<form class="navbar-form navbar-left" role="sok">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Søk">
                        </div>
                        <button type="submit" class="btn btn-default">Søk</button>
                    </form>-->
                </ul>
            </div>
        </nav>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <h3>Obligatorisk oppgave 4</h3>
                <h4>Av Thomas Iversen Ramm, Marius Wetterlin og Bror Brurberg</h4>
            </div>
        </div>
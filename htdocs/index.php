<!DOCTYPE html>
<html>
    <head>
      <title>Web Login</title>
      <link type="text/css" rel="stylesheet" href="Homepage/index.css" />
	    <link href="https://fonts.googleapis.com/css?family=Gamja+Flower" rel="stylesheet">
    </head>
    <body>
      <?php
      //Überprüfung auf Eingeloggt und Einlog versuche
        session_start();
        if (!isset($_SESSION['tried'])) {
          $_SESSION['tried'] = 0;
          // code...
        }
        if (!isset($_SESSION['logged'])) {
          $_SESSION['logged'] = 0;
          // code...
        }
        if (!isset($_SESSION['loggedout'])) {
          $_SESSION['loggedout'] = 0;
          // code...
        }
        //Einbinden von externem Menüfeld, durch den Include unabhängig und könnte
        //auch auf jeder anderen Seite der Webseite aufgerufen werden
        include('Homepage/headder.php');
      ?>

      <h1>Web Login</h1>
      <h2>von Tim-Cedric Inhoff</h2>


    </body>
</html>

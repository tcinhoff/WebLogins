<!DOCTYPE html>
<html>
    <title>
    </title>
    <head>
    </head>
    <body>
        <?php
        //Wenn auf der Indexseite auf loggoff geklickt wird, wird der Status von Eingeloggt
        //auf Ausgeloggt gesetzt, mit den dafür notwendigen Bedingungen
        session_start();
        if (isset($_SESSION['logged']) && $_SESSION['logged'] == 1) {
          $_SESSION['logged'] = 0;
          $_SESSION['loggedout'] = 0;
          header('Location: '.$uri. '../index.php');
          die();
        } else {
          $_SESSION['loggedout'] = 1;
          header('Location: '.$uri. '../index.php');
          die();
        }
        ?>
    </body>
</html>

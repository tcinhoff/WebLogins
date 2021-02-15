<!DOCTYPE = html>
<html>
<head>
    <title> Tc Login </title>
    <link rel="stylesheet" type="text/css" href="../stylelogin.css">
</head>
    <body>
    <div class="login-box">

        <h1>Login PHP</h1>
          <form action="" method="post">
            <input type="text" name="username" placeholder="Enter Username" id="unId" required autofocus /> <br/>
            <input type="password" name="password" placeholder="Enter Password" id="pwId" required />
            </br>
            <!-- recaptcha hinzufügen -->
      			<input type="submit" name="submit" value="Login" />

            <a class="right" href="../../index.php">back</a>

          </form>

          <?php

            //überprüfen, ob es schon einen Einlogversuch gab, je nach dem wird eine Anzeige aktiviert
            session_start();
            if (!isset($_SESSION['failed'])) {
              $_SESSION['failed'] = 0;
            }

            if ((isset($_SESSION['failed'])) && ($_SESSION['failed'] == 1) && ($_SESSION['logged'] == 0)) {
              echo "<script> alert('Login failed, Username or Password wrong'); </script>";// code...
              $_SESSION['failed'] = 0;
            }



            //Testen, ob submit gedrückt wurde
            if(isset($_POST['submit'])){

              $pdo = new PDO('mysql:host=localhost;dbname=nutzerdaten', 'root', '');

               //Username und Password aus Textfeldern von html in Variabeln laden
              $un = htmlspecialchars($_POST['username']);
              $pw = htmlspecialchars($_POST['password']);

              //Untzernamen und Passwörter aus Datenbank holen
              $sql = "SELECT username, password FROM user";

               //Überprüfen, ob die Nutzerdaten übereinstimmen
               //Je nach Ausgang wird Variable logged auf 1 oder 0 gesetzt
              foreach ($pdo->query($sql) as $row) {
                if ($un == $row['username'] && $pw == $row['password']) {
                  $_SESSION['logged'] = 1;
                  break;
                } else {
                  $_SESSION['logged'] = 0;
                }
              }




             //Weiterleitung, je nach login Status, entweder zurück zur Startseite oder
             //es wird die Seite neu geladen, mit gesetztem failed
             if (isset($_SESSION['logged']) && $_SESSION['logged'] == 1) {
               header('Location: /index.php');
               die();
              }
               if (isset($_SESSION['logged']) && $_SESSION['logged'] == 0 ) {
                 $_SESSION['failed'] = 1;
                 header('Location: '.$uri);
                 die();
               }

            }
          ?>

        </div>

    </body>
</html>

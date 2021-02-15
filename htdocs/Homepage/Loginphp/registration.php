<!DOCTYPE = html>
<html>
<head>
    <title> Tc Registration </title>
    <link rel="stylesheet" type="text/css" href="../stylereg.css">
</head>
    <body>
    <div class="login-box">
        <h1>Registration</h1>

          <form action="" method="post">
            <input type="text" name="username" placeholder="Enter Username" id="unId" maxlength="20" required autofocus />  </br>
            <input type="text" name="email" placeholder="Enter E-Mail" id="mail" maxlength="20" required />  </br>
            <input type="password" name="password" placeholder="Enter Password" id="pwId" maxlength="20" required />  </br>

      			<input type="submit" name="submit" value="Registration" />
			    </form>

          <a class="left" href="login.php">Login</a>
          <a class="right" href="../../index.php">back</a>

          <?php

            //überprüfen, ob es schon einen Einlogversuch gab, je nach dem wird eine Anzeige aktiviert
            session_start();
            if (!isset($_SESSION['failedmail'])) {
              $_SESSION['failedmail'] = 0;
            }

            if ((isset($_SESSION['failedmail'])) && ($_SESSION['failedmail'] == 1)) {
              echo "<script> alert('mail already used'); </script>";// code...
              $_SESSION['failedmail'] = 0;
            }

            //Testen, ob submit gedrückt wurde
            if(isset($_POST['submit'])){

              //Aktuelle Benutzerdatenbank laden
              $fileContents = file_get_contents('../user/user.json');

              //Die Benutzerdaten von Json in Array umwandeln
              $user = json_decode($fileContents, true);

              //Eingegebene Daten aus html Textfeldern laden
              $un = htmlspecialchars($_POST['username']);
              $pw = htmlspecialchars($_POST['password']);
              $mail = htmlspecialchars($_POST['email']);

              //Überprüfen, ob die Nutzerdaten übereinstimmen
              //Je nach Ausgang wird Variable logged auf 1 oder 0 gesetzt
              for($x =0; $x < count($user); $x++){
               if ($mail != $user[$x]['mail']) {
                 //Nutzerdaten als Json-format in Array speichern
                 $usernew = [
                   'username' => $un,
                   'password' => $pw,
                   'mail' => $mail
                 ];

                 //Neue Nutzerdaten zu bestehenden hinzufügen
                 array_push($user, $usernew);

                 //Array zurück in Json convertieren
                 $encodedString  = json_encode($user);

                 //Die neuen Nuterdaten in der File user.json speicher, nachdem die File
                 //vor dem Speichern gelöscht wurde
                 $cssdir = "../user/user.json";
                 $cssfile = fopen($cssdir, "w+");
                 fwrite($cssfile, $encodedString);
                 fclose($cssfile);

                 //Weiterleiten auf Login Seite
                 header('Location: '.$uri.'login.php');
                 die();
               } else {
                 //Seite neuladen, Email schon vergeben
                  $_SESSION['failedmail'] = 1;
                 header('Location: '.$uri);
                 die();

               }
             }
           }
          ?>


        </div>

    </body>
</html>

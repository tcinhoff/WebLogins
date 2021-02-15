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
            <input type="text" name="username" placeholder="Enter Username" id="unId" required autofocus />  </br>
            <input type="text" name="email" placeholder="Enter E-Mail" id="mail" required />  </br>
            <input type="password" name="password" placeholder="Enter Password" id="pwId" required />  </br>

      			<input type="submit" name="submit" value="Registration" />
			    </form>

          <a class="left" href="login.php">Login</a>
          <a class="right" href="../../index.php">back</a>

          <?php

            //Testen, ob submit gedrückt wurde
            if(isset($_POST['submit'])){

              $pdo = new PDO('mysql:host=localhost;dbname=nutzerdaten', 'root', '');

              //Eingegebene Daten aus html Textfeldern laden
              $un = htmlspecialchars($_POST['username']);
              $pw = htmlspecialchars($_POST['password']);
              $mail = htmlspecialchars($_POST['email']);
              //Eingegebene Nutzerdaten in Benutzerdatenbank hinzufügen
              $statement = $pdo->prepare("INSERT INTO user(username, password, mail) VALUES (?,?,?)");
              $statement->execute(array($un, $pw, $mail));

              //Weiterleiten auf Login Seite
              header('Location: '.$uri.'login.php');
              die();
            }
          ?>


        </div>

    </body>
</html>

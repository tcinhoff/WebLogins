<!DOCTYPE = html>
<html>
<head>
    <title> Tc Login </title>
    <link rel="stylesheet" type="text/css" href="../stylelogin.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
    <body>
    <script type="application/javascript">
        function login(){
            // XMLHttpRequest Objekt wird erzeugt
            var xhr = new XMLHttpRequest();
            // Lade Benutzerdaten in Json Format
            xhr.open("GET", "../user/user.json", true);

            // Wenn Daten geladen, führe folgende Funktion aus
            xhr.onreadystatechange = function(err, xml, status) {
              if(xhr.readyState == 4 && xhr.status == 200) {
                var data = JSON.parse(xhr.responseText);
                var un = document.getElementById('unId').value;
                var pw = document.getElementById('pwId').value;
                var pwtest = false;
                for (var a=0; a < data.length; a++) {
                  if (un == data[a].username && pw == data[a].password) {
                    pwtest = true;
                    logchange(pwtest);
                    break;
                  } else {
                    pwtest = false;
                  }
              }
            }
          }
            // Sende Variable an url
            xhr.send();
      }


          function logchange(pwtest){
              // XMLHttpRequest Objekt wird erzeugt
              var req = new XMLHttpRequest();
              var url = "logchange.php";
              var vars = "pwtest=" + pwtest;
              req.open("POST", url, true);
              req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
              // Wenn request erfolgreich, dann zurück zur Indexseite
              req.onreadystatechange = function(err, xml, status) {
          	    if(req.readyState == 4 && req.status == 200) {
                  window.location = "/index.php";
          	    }
              }
                // Sende Variable an url
              req.send(vars);
          }

    </script>

    <?php
    if (isset($_SESSION['logged']) && $_SESSION['logged'] == 1) {
      header('Location: '.$uri.'../../index.php');
      die();
     }
      if (isset($_SESSION['logged']) && $_SESSION['logged'] == 0 ) {
        $_SESSION['failed'] = 1;
        header('Location: '.$uri);
        die();
      }


   ?>
    <div class="login-box">

        <h1>Login JS</h1>
        <!-- html layout für das Login mit Js, wird der Button gedrückt, wird
        in der verlinkten Javaskript datei die Funktion login() ausgeführt -->
            <input type="text" name="username" placeholder="Enter Username" id="unId" maxlength="20" required autofocus />  </br>
            <input type="password" name="password" placeholder="Enter Password" id="pwId" maxlength="20" required />  </br>
      			<button class="submit" onclick="login();" name="submit">Login</button>

            <a class="right" href="../../index.php">back</a>
            <p id=status></p>

          </form>


        </div>

    </body>
</html>

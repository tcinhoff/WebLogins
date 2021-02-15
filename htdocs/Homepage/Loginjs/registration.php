<!DOCTYPE = html>
<html>
<head>
    <title> Tc Registration </title>
    <link rel="stylesheet" type="text/css" href="../stylereg.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
    <body>

    <script type="application/javascript">
        function reg() {
                  // Create our XMLHttpRequest object
                  var xhr = new XMLHttpRequest();
                  // Create some variables we need to send to our PHP file
                  var url = "safereg.php";
                  var un = document.getElementById('unId').value;
                  var pw = document.getElementById('pwId').value;
                  var mail = document.getElementById('mail').value;

                  var vars = ("un=" + un + "&pw=" + pw + "&mail=" + mail);
                  xhr.open("POST", url, true);
                  // Set content type header information for sending url encoded variables in the request
                  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                  // Access the onreadystatechange event for the XMLHttpRequest object
                  xhr.onreadystatechange = function() {
              	    if(xhr.readyState == 4 && xhr.status == 200) {
                      window.location = "/Homepage/Loginjs/login.php";
              	    }
              }
            // Send the data to PHP now... and wait for response to update the status div
            xhr.send(vars); // Actually execute the request
          }

    </script>

    <div class="login-box">
        <h1>Registration</h1>

          <form action="" method="post">
            <input type="text" name="username" placeholder="Enter Username" id="unId" required autofocus />  </br>
            <input type="text" name="email" placeholder="Enter E-Mail" id="mail" required />  </br>
            <input type="password" name="password" placeholder="Enter Password" id="pwId" required />  </br>

      			<input type="submit" onclick="reg()" name="submit" value="Registration" />
			    </form>

          <a class="left" href="login.php">Login</a>
          <a class="right" href="../../index.php">back</a>

        </div>

    </body>
</html>

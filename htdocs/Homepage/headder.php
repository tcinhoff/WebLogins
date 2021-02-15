
      <!-- Erstellen der Menüleiste mit entsprechenden Weiterleitungen -->
      <div id="menu">
          <ul>
              <li class="topmenu">
                  <a href="Homepage/Loginphpmysqp/login.php"> PHP - MYSQL </a>
                  <ul>
                      <li class="submenu"><a href="Homepage/Loginphpmysqp/registration.php"> Registration </a></li>
                      <li class="submenu"><a href="Homepage/Loginphpmysqp/login.php"> Login </a></li>
                  </ul>
              </li>
              <li class="topmenu">
                  <a href="Homepage/Loginphp/login.php"> PHP - Datei </a>
                  <ul>
                      <li class="submenu"><a href="Homepage/Loginphp/registration.php"> Registration </a></li>
                      <li class="submenu"><a href="Homepage/Loginphp/login.php"> Login </a></li>
                  </ul>
              </li>
              <li class="topmenu">
                  <a href="Homepage/Loginjs/login.php"> JS - Datei </a>
                  <ul>
                      <li class="submenu"><a href="Homepage/Loginjs/registration.php"> Registration </a></li>
                      <li class="submenu"><a href="Homepage/Loginjs/login.php"> Login </a></li>
                  </ul>
              </li>
          </ul>
      </div>

    <div id="logged">
      <?php
      //Informationsstatus, in der oberen linken Ecke, ob eingeloggt oder nicht und
      //falls eingeloggt, wird die Möglichkeit zum ausloggen erstellt
      if (isset($_SESSION['logged']) && $_SESSION['logged'] == 1) {
        echo "logged in</br>";// code...
        echo "<a href='Homepage/loggingout.php'>loging off</a>";
      } else {
        echo "logged out</br>";// code...
      }


       ?>
    </div>

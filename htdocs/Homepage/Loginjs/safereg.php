<?php

  session_start();
  //Aktuelle Benutzerdatenbank laden
   $fileContents = file_get_contents('../user/user.json');

   //Benutzer in Array laden
   $user = json_decode($fileContents, true);

   //Eingegebene Daten aus html Textfeldern laden
   $un = $_POST['un'];
   $pw = $_POST['pw'];
   $mail = $_POST['mail'];
   //Eingegebene Nutzerdaten in Benutzerdatenbank ergänzen und Index speichern
   $usernew = [
     'username' => $un,
     'password' => $pw,
     'mail' => $mail
   ];
   array_push($user, $usernew);

   //Array zurück in String convertieren
   $encodedString  = json_encode($user);


  //Die neuen Nuterdaten in der File user.json speicher, nachdem die File
  //vor dem Speichern gelöscht wurde
  $cssdir = "../user/user.json";
  $cssfile = fopen($cssdir, "w+");
  fwrite($cssfile, $encodedString);
  fclose($cssfile);

 ?>

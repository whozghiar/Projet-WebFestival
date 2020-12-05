<?php

$base="projetfestival";
$adresse="localhost";
$port=3306;
$user="root";
$passwd="root";

/*** require('tp2.php');**/
$db = new PDO
  (
      // !! une seule ligne, sans espace !!
      "mysql:host=$adresse;port=$port;dbname=$base;charset=utf8",
      $user,
      $passwd
  );

$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>

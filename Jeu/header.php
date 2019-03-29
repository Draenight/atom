<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="style.css" >
  <title>Mon jeu</title>
</head>
<body>

  <?php
  session_start();


  $base = new PDO('mysql:host=localhost;dbname=project3il', 'root', 'root');
  $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);



  function loadClass($classname)
  {
    require 'class//'.$classname.'.php';
  }
  spl_autoload_register('loadClass');

  if (isset($_SESSION['id'])) {
    $characterRepository = new CharacterRepository($base);
    $character = $characterRepository->find($_SESSION['id']);
  }

  include __DIR__.'/menu.php';

  ?>

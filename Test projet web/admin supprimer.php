<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="css/bootstrap-4.3.1.css" rel="stylesheet">
	<link href="css/login.css" rel="stylesheet" type="text/css">

</head>
<body>
    <header>
    <div class="logo">
		<img src="logo.jpg" width="512" height="512" alt=""/> 
		<h1>Change.tn<div class="slogan">Sign a petition for a better world !</div>     </h1>

	  </div>


      </header>

      <h1> liste des petitions a supprimer  </h1>

      <?php
  session_start();

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'projet pweb');
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 

if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])){
$txtEmail = $_POST['mail'];
$txtMdp = $_POST['mdp'];

?>


<ul>
<?php foreach ( $p as $petition) : ?>
 <li>
<?= $petition['id'] ?> 
<?= $petition['titre'] ?>  -
<?= $petition['description'] ?> - 
<?= $petition['date_creation'] ?> - 
<?= $petition['propriaitaire'] ?> 

<a href ="admi" <?= petition['mail']?>">supprimer</a> 
  </li>
<?php endforeach; ?>

</ul>

</body>
</html>
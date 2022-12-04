<?php 

   session_start(); 
   $mail=$_SESSION['mail'];
   define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'projet pweb');
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
   $sql = "SELECT nom,prenom,cin,mail,mdp FROM membre where mail='$mail'" ;

$rs = mysqli_query($link, $sql);
$row = mysqli_fetch_array($rs);
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Untitled Document</title>
    <!-- Bootstrap -->
	<link href="css/bootstrap-4.3.1.css" rel="stylesheet">
	<link href="css/login.css" rel="stylesheet" type="text/css">
  </head>
  <body>
  	<!-- body code goes here -->
<header>
	 <div class="logo">
		<img src="logo.jpg" width="512" height="512" alt=""/> 
		<h1>Change.tn<div class="slogan">Sign a petition for a better world !</div>     </h1>
	  </div>
   <ul class="nav nav-pills">
	<li class="nav-item"> <a class="nav-link" href="session.php">Liste pétitions</a> </li>
	    <li class="nav-item"> <a class="nav-link" href="ajouter petition.html">Ajouter une pétition</a> </li>
	    <li class="nav-item"> <a class="nav-link active" href="profilePage.php">Profil</a> </li>
	   	 <li class="nav-item"> <a class="nav-link" href="login.html">Déconnexion</a> </li>
  </ul>
  </header>
	  <br>
     <form method="post"  action="modifierProfil.php">
	<div class="form-group">
	   <label for="nom">Nom*</label>
		  <br>
	<input name="nom" id="nom" type="text" value="<?PHP echo $row[0]; ?>">
		  <br>
		  <label for="prenom">Prénom*</label>
		  <br>
	  <input id="prenom" name="prenom" type="text" value="<?PHP echo $row[1]; ?>">
		  <br>
		  <label for="cin">CIN*</label>
		  <br>
	  <input id="cin" name="cin" type="text" value="<?PHP echo $row[2]; ?>">
		  <br>
		  <label for="mail">E-mail*</label>
		  <br>
	 <input disabled="true" id="mail" name="mail" type="email" value="<?PHP echo $row[3]; ?>">
		  <br>
		  <label for="mdp">Mot de passe*</label>
		  <br>
	  <input type="text" id="mdp" name="mdp" value="<?PHP echo $row[4]; ?>">
		  <br>
	  </div>
	  <button type="submit" id="submit" name="submit" value="Submit" class="btn btn-primary">Done</button>
	 
  </form>

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
	<script src="js/jquery-3.3.1.min.js"></script>

	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/popper.min.js"></script> 
	<script src="js/bootstrap-4.3.1.js"></script>
  </body>
</html>
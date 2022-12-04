<?php
session_start(); 
   $mail=$_SESSION['mail'];
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
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

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])){
$txtName = $_POST['nom'];
$txtPrenom = $_POST['prenom'];
$txtMdp = $_POST['mdp'];
$txtCin = $_POST['cin'];

if( $txtCin!=""&& $txtMdp!="" && $txtPrenom!="" ){

// database insert SQL code
$sql = "UPDATE membre  SET nom='$txtName', prenom='$txtPrenom', cin='$txtCin' ,mdp='$txtMdp' WHERE mail='$mail'";

// insert in database 
$rs = mysqli_query($link, $sql);
if($rs)
{
	echo '<script>alert("modifications enregistrées !")</script>';
}
else {echo mysqli_error($link);}
}
else {echo '<script>alert("Veuillez remplir tout les champs notés obligatoires ! ")</script>';}
}
?> 
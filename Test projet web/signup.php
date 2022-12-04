<?php
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
$txtEmail = $_POST['mail'];
$txtPrenom = $_POST['prenom'];
$txtMdp = $_POST['mdp'];
$txtCin = $_POST['cin'];
$txtProfession=$_POST['radio']; 

if($txtEmail!="" && $txtCin!=""&& $txtMdp!="" && $txtPrenom!="" && $_POST['radio'] ){

// database insert SQL code
$sql = "INSERT INTO membre(nom,prenom,cin,mail,mdp,profession) VALUES ('$txtName','$txtPrenom','$txtCin','$txtEmail', '$txtMdp','$txtProfession')";

// insert in database 
$rs = mysqli_query($link, $sql);
if($rs)
{
	echo '<script>alert("Vous etes inscrit !")</script>';
	include ("login.html");
}
else {echo '<script>alert("Mail dèja existant !")</script>';
include ("sign up.html");}
}
else {echo '<script>alert("Veuillez remplir tout les champs notés obligatoires ! ")</script>';
include ("sign up.html");}
}
?> 
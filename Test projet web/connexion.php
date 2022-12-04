<?php
  session_start();
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
$txtEmail = $_POST['mail'];
$txtMdp = $_POST['mdp'];


$sql = "SELECT mail,mdp FROM membre where mail='$txtEmail' and mdp='$txtMdp'";


$rs = mysqli_query($link, $sql);
$row = mysqli_fetch_array($rs,MYSQLI_ASSOC);
$count = mysqli_num_rows($rs);


        if($count > 0){
        	$_SESSION['mail'] = $txtEmail;
        	header('Location: session.php');
	
        }else{
            echo '<script>alert("Informations invalides !")</script>';
            include ("login.html");
        }
}
?> 
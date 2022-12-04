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
if (isset($_POST["mybutton"]))
   {
       $id= $_POST["mybutton"];

   }

   if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["mybutton"])){


$txtCommentaire = $_POST['area'];
$txtAction=$_POST['radio']; 



// database insert SQL code
$sql = "INSERT INTO actions(IDpetition,IDmembre,action,commentaire) VALUES ('$id','$mail','$txtAction','$txtCommentaire')";

// insert in database 
$rs = mysqli_query($link, $sql);
if($rs){echo"ok";}
else {echo "error"; }

}

?>
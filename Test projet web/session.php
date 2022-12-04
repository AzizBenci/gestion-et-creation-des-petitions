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
   $sql = "SELECT id,titre,date_creation FROM petition" ;

$rs = mysqli_query($link, $sql);


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
	<li class="nav-item"> <a class="nav-link active" href="liste petitions.html">Liste pétitions</a> </li>
	    <li class="nav-item"> <a class="nav-link" href="ajouter petition.html">Ajouter une pétition</a> </li>
	    <li class="nav-item"> <a class="nav-link" href="profilePage.php">Profil</a> </li>
	   	 <li class="nav-item"> <a class="nav-link" href="login.html">Déconnexion</a> </li>
  </ul>
  </header>
	  <br>
    <main>
		<table border="1">
			<tr>
				<th>Num</th>
				<th>Titre</th>
				<th>Date de création</th>
			</tr>
			<?php 
               while ($row = mysqli_fetch_array($rs)) {?>
                   <tr>
                   <td><?php echo $row[0];?></td>
                   <td><?php echo $row[1];?></td>
                   <td><?php echo $row[2];?></td>
                   <td> 
                   <form action="detailsPetition.php" method="POST">
    <button type="submit" value="<?php echo $row[0];?>" name="mybutton" style="color:blue"> Plus de détails</button> 
     </form> </td>
                   </tr>
              <?php } ?>
		</table>
		
	  </main>
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
	<script src="js/jquery-3.3.1.min.js"></script>

	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/popper.min.js"></script> 
  <script src="js/bootstrap-4.3.1.js"></script>
  </body>
</html>

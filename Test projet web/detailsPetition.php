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
   $sql = "SELECT * FROM petition WHERE id='$id' " ;

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
	<script type="text/javascript" src="ControlAction.js"></script>
  </head>
  <body>
  	<!-- body code goes here -->
<header>
	 <div class="logo">
		<img src="logo.jpg" width="512" height="512" alt=""/> 
		<h1>Change.tn<div class="slogan">Sign a petition for a better world !</div>     </h1>
	  </div>
   
  </header>
	  <br>
    <main>
    	<table>
	<tr>
		<th>Num</th>
         <td><?php echo $row[0];?></td>
	</tr>
	<tr>
		<th>Titre</th>
		<td><?php echo $row[1];?></td>
	</tr>
	<tr>
		<th>Description</th>
		<td><?php echo $row[2];?></td>
	</tr>
	<tr>
		<th>Date Création</th>
		<td><?php echo $row[3];?></td>
	</tr>
	<tr>
		<th>Proprietaire</th>
		<td><?php echo $row[4];?></td>
	</tr>

</table>
<form  action="action.php" method="POST" onsubmit="return CheckForBlank()">
		  <label for="radio">Take action !</label> <br>
		  <p id="result" style="color:red"></p>
		  <input type="radio" name="radio" id="participer" value="participer">Participer 
		  <br>
          <input type="radio" name="radio" id="opposer" value="opposer"> S'opposer
          <br>
          <label for="area">Commentaire:</label>
			<br>
			<textarea id="area" name="area"></textarea> <br>
	<button type="submit" value="<?php echo $row[0];?>" name="mybutton" style="color:blue"> OK </button> 
</form>

	<button onclick="document.location='session.php'">Retour</button>


	  </main>
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
	<script src="js/jquery-3.3.1.min.js"></script>

	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/popper.min.js"></script> 
  <script src="js/bootstrap-4.3.1.js"></script>
  </body>
</html>


















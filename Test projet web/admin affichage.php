<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="css/bootstrap-4.3.1.css" rel="stylesheet">
	<link href="css/login.css" rel="stylesheet" type="text/css">
    <style>
        td {
            border:  1px solid ;
        }
    </style>

    
</head>
<body>
<header>
    <div class="logo">
		<img src="logo.jpg" width="512" height="512" alt=""/> 
		<h1>Change.tn<div class="slogan">Sign a petition for a better world !</div>     </h1>

	  </div>
      </header>

    <h1>affichage des petitions</h1>
    

    <?php 
$server = "localhost";
$user = "root";
$pass = "";
$database = "projet pweb";

$conn = mysqli_connect($server, $user, $pass, $database);

if (!$conn) {
    die("erreur d'accés base de donnée");
}
if ($conn) {
   echo "saluuuuuuuuuuuuuuuuuuuuuuuuuut" ; 
}





 
if (isset(S_GET['s']) and !empty(S_GET['s']) ) 
{
$recherche = htmlspecialchars(S_GET['s']); 

$sql1 = 'SELECT * FROM petition where id = "'$recherche'"  ' ;
$rs1 = mysqli_query($link, $sql1);


}




$sql = "SELECT * FROM petition" ;

$rs = mysqli_query($link, $sql);
if(!$rs)
{
echo 'erreur de l\'execution de la requete' ; 
}
else {
    ?>

<table>

<tr>
   <td>id</td>
   <td>titre</td>
   <td>description</td>
   <td>date_creation</td>
   <td>Proprietaire</td>
</tr>
<?php while ($ligne = mysqli_fetch_array($rs)) { 
    
    
    ?>
<tr>
<td>  <?php echo $ligne ['id'] ?>   </td>
<td>  <?php echo $ligne ['titre'] ?> </td>
<td>  <?php echo $ligne ['description'] ?> </td>
<td>  <?php echo $ligne ['date_creation'] ?> </td>
<td>  <?php echo $ligne ['propriaitaire'] ?> </td>


</tr>


<?php    
}

?>
</table>
<form method="GET">
<input type="search" name="s" plaeholder="Recherche une petition" >
<input type="text" type ="submit" name ="envoyer" >
<section>



<table>
<tr>
   <td>id</td>
   <td>titre</td>
   <td>description</td>
   <td>date_creation</td>
   <td>Proprietaire</td>

</tr>

<tr>
<?php

if ($sql1->rowCount() > 0 )
{
while ($ligne1 = mysqli_fetch_array($rs1))
?>

<td>  <?php echo $ligne1 ['id'] ?>   </td>
<td>  <?php echo $ligne1 ['titre'] ?> </td>
<td>  <?php echo $ligne1 ['description'] ?> </td>
<td>  <?php echo $ligne1 ['date_creation'] ?> </td>
<td>  <?php echo $ligne1 ['propriaitaire'] ?> </td>


<?php
}
else {
    ?>
<p>aucune petition trouvée </p>
</tr>



</table>




<?php
}

?>


</section>

    </form>


</body>
</html>
<?php ?>

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

$re = $objetPdo -> prepare ('delete from petition where mail =:m LIMIT 1 ');

// liaison du parametre  

$re-> blindValue (':m' , $_GET['ma'], PDO::PARAM_STR ) ; 
 
// execution de la req 
$executeIsOkay = $re -> execute() ; 

if ($executeIsOkay)
{$message = 'la petition a été supprimé' ; }
else 
{$message= 'echec dela suppression ' ; }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1> supression </h1>
<p><?=$message ?></p> 
</body>
</html>
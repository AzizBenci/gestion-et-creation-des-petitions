
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
$bdd= new PDO("mysql:host=localhost;dbname=projet pweb","root","") ;


// count nb accounts dispo
$sql = "Select count(*) as nbracc from membre";
$result = mysqli_query($conn, $sql);
$nbracc=mysqli_fetch_assoc($result);

echo 'le nombre des comptes existants sont ' $nbracc ;  


// count nb etudiants dispo
$sql1="select count(*) as nbretud from membre where profession ='etudiant'";
$result1=mysqli_query($conn,$sql1);
$nb_etud=mysqli_fetch_assoc($result1);
// count nbr d'enseignants
$sql2="select count(*) as nbrens from membre where profession='enseignant'";
$result2=mysqli_query($conn,$sql2);
$nb_ens=mysqli_fetch_assoc($result2);




$sql4="select * from membre order by id DESC";
$result4=mysqli_query($conn,$sql4);

$sql5='select * from petitions, actions where (action="participer" and IDpetition=id) order by id DESC';
$result5=mysqli_query($conn,$sql5);


?>


    
</body>
</html>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title></title>
</head>
<body>
<a href="gestion.php">retour au tableau de bord</a> 	

<?php
// recupérer dans l'url l'id de l'album à supprimer
$parkings_id=$_GET['num'];

require '../../secretxyz123.php';
$covoiturage = new PDO('mysql:host=localhost;dbname=sae202;charset=UTF8;', LUTILISATEUR, LEMOTDEPASSE);
$covoiturage->query('SET NAMES utf8;');

// tapez ici la requete de suppression de l'album dont l'id est passé dans l'url
$req = 'DELETE FROM parkings WHERE parkings_id = '.$parkings_id; 

$resultat = $covoiturage->query($req);

echo '<h2>vous venez de supprimer le parking numéro '.$parkings_id.'.</h2>';
?>

</body>
</html>
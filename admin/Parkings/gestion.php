<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<a href="../gestion.php">retour au site</a> 	
	<hr>
<h1>gestion de nos parkings</h1>
<hr>
<a href="ajouter.php">ajouter un parking</a>
<table border=1>
	<thead>
		<tr><td>Nom du parking</td><td>Nombre de place</td><td>Adresse du parking</td><td>supprimer</td><td>modifier</td></tr>
	</thead>
	<tbody>
<?php
require '../../secretxyz123.php';
$covoiturage = new PDO('mysql:host=localhost;dbname=sae202;charset=UTF8;', LUTILISATEUR, LEMOTDEPASSE);
$covoiturage->query('SET NAMES utf8;');
$req = "SELECT * FROM parkings";
$resultat = $covoiturage->query($req);

foreach ($resultat as $value) {
    echo '<tr>' ;
    echo '<td>'.$value['parkings_nom'] . '</td>';
    echo '<td>' . $value['parkings_nombre_de_place'] . '</td>';
    echo '<td>' . $value['parkings_adresse'] . '</td>';
    echo '<td> <a href="supprimer.php?num=' . $value['parkings_id'] . ' " > supprimer </a> </td>';
    echo '<td> <a href="modifier.php?num=' . $value['parkings_id'] . ' " > modifier </a> </td>';
    echo '</tr>';
}
?>
</tbody>
</table>
</body>
</html>
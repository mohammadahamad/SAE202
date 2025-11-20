<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<a href="../gestion.php">retour au site</a> 	
	<hr>
<h1>gestion de nos usagers</h1>
<hr>
<a href="ajouter.php">ajouter un usager</a>
<table border=1>
	<thead>
		<tr><td>Nom</td><td>Prénom</td><td>Numéro de téléphone</td><td>Adresse mail</td><td>supprimer</td><td>modifier</td></tr>
	</thead>
	<tbody>
<?php
require '../../secretxyz123.php';
$covoiturage = new PDO('mysql:host=localhost;dbname=sae202;charset=UTF8;', LUTILISATEUR, LEMOTDEPASSE);
$covoiturage->query('SET NAMES utf8;');
$req = "SELECT * FROM usagers";
$resultat = $covoiturage->query($req);

foreach ($resultat as $value) {
    echo '<tr>' ;
    echo '<td>'.$value['usagers_nom'] . '</td>';
    echo '<td>' . $value['usagers_prenom'] . '</td>';
    echo '<td>' . $value['usagers_numtel'] . '</td>';
    echo '<td>' . $value['usagers_mail'] . '</td>';
    echo '<td> <a href="supprimer.php?num=' . $value['usagers_id'] . ' " > supprimer </a> </td>';
    echo '<td> <a href="modifier.php?num=' . $value['usagers_id'] . ' " > modifier </a> </td>';
    echo '</tr>';
}
?>
</tbody>
</table>
</body>
</html>
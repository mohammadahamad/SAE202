<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<a href="../gestion.php">retour au site</a> 	
	<hr>
<h1>gestion de nos trajets</h1>
<hr>
<a href="ajouter.php">ajouter un trajet</a>
<table border=1>
	<thead>
		<tr><td>Heure du départ du trajet</td><td>Heure d'arrivée du trajet</td><td>Photo</td><td>Nombre de place disponibles</td><td>Point de départ</td><td>Destination</td><td>Rue</td><td>Numéro de rue</td><td>Code postal</td><td>supprimer</td><td>modifier</td></tr>
	</thead>
	<tbody>
<?php
require '../../secretxyz123.php';
$covoiturage = new PDO('mysql:host=localhost;dbname=sae202;charset=UTF8;', LUTILISATEUR, LEMOTDEPASSE);
$covoiturage->query('SET NAMES utf8;');
$req = "SELECT trajet.*, usagers.usagers_nom, usagers.usagers_prenom FROM trajets JOIN usagers ON trajets._usagers_id = usagers.usagers_id";


$req = "SELECT * FROM trajets";
$resultat = $covoiturage->query($req);

foreach ($resultat as $value) {
    echo '<tr>' ;
    echo '<td>'.$value['trajets_depart'] . '</td>';
    echo '<td>' . $value['trajets_arriver'] . '</td>';
    echo '<td> <img src="../../assets/imgs/'.$value['trajets_photo_vehicule'].'" style="max-width: 100px; height: auto;"</td>';
    echo '<td>' . $value['trajets_nb_de_places_dispo'] . '</td>';
    echo '<td>' . $value['trajets_point_de_depart'] . '</td>';
    echo '<td>' . $value['trajets_destination'] . '</td>';
    echo '<td>' . $value['trajets_rue'] . '</td>';
    echo '<td>' . $value['trajets_num_rue'] . '</td>';
    echo '<td>' . $value['trajets_code_postal'] . '</td>';
    echo '<td> <a href="supprimer.php?num=' . $value['trajets_id'] . ' " > supprimer </a> </td>';
    echo '<td> <a href="modifier.php?num=' . $value['trajets_id'] . ' " > modifier </a> </td>';
    echo '</tr>';
}
?>
</tbody>
</table>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<a href="../gestion.php">retour au site</a>     
    <hr>
<h1>gestion de nos réservations</h1>
<hr>
<a href="ajouter.php">ajouter une réservation</a>
<table border=1>
    <thead>
        <tr><td>Usager</td><td>Echange/Service</td><td>Date</td><td>Nombre de passager</td><td>Point de départ</td><td>Destination</td><td>supprimer</td><td>modifier</td></tr>
    </thead>
    <tbody>
<?php
require '../../secretxyz123.php';
$covoiturage = new PDO('mysql:host=localhost;dbname=sae202;charset=UTF8;', LUTILISATEUR, LEMOTDEPASSE);
$covoiturage->query('SET NAMES utf8;');
$req = "SELECT * FROM reservations";
$resultat = $covoiturage->query($req);

foreach ($resultat as $value) {
    echo '<tr>' ;
    echo '<td>'.$value['reservations_usager'] . '</td>';
    echo '<td>' . $value['reservations_echange_service'] . '</td>';
    echo '<td>' . $value['reservations_date'] . '</td>';
    echo '<td>' . $value['reservations_nb_passagers'] . '</td>';
    echo '<td>' . $value['reservations_point_de_depart'] . '</td>';
    echo '<td>' . $value['reservations_destination'] . '</td>';
    echo '<td> <a href="supprimer.php?num=' . $value['reservations_id'] . ' " > supprimer </a> </td>';
    echo '<td> <a href="modifier.php?num=' . $value['reservations_id'] . ' " > modifier </a> </td>';
    echo '</tr>';
}
?>
</tbody>
</table>
</body>
</html>
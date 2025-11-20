<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<a href="gestion.php">retour au tableau de bord</a> 	
	<hr>
<h1>gestion de nos réservations</h1>
<h2>vous venez d'ajouter une réservation</h2>
<hr>
<?php

$usager=$_POST['usager'];
$echange=$_POST['echange'];
$date=$_POST['date'];
$nbrpassager=$_POST['nbrpassager'];
$pointdepart=$_POST['pointdepart'];
$destination=$_POST['destination'];

require '../../secretxyz123.php';

// Vérifier si le champ "Nombre de place" est un nombre
if (!is_numeric($nbrpassager)) {
    echo "Formulaire incorrect, veuillez saisir un chiffre dans le champ 'Nombre de place'";
    exit; // Arrêter l'exécution du script si le champ est incorrect
}

$covoiturage = new PDO('mysql:host=localhost;dbname=sae202;charset=UTF8;', LUTILISATEUR, LEMOTDEPASSE);
$covoiturage->query('SET NAMES utf8;');
$usagersQuery = $covoiturage->query('SELECT * FROM usagers WHERE CONCAT(usagers_nom, " ", usagers_prenom) = "'.$usager.'"');
$usagerRow = $usagersQuery->fetch();

if ($usagerRow !== false) {
    // Un usager a été trouvé
    $usagerId = $usagerRow['usagers_id'];
    $usagerNom = $usagerRow['usagers_nom'];
    $usagerPrenom = $usagerRow['usagers_prenom'];
} else {
    // Gérer le cas où aucun usager n'a été trouvé
    echo "Aucun usager trouvé avec ce nom.";
    exit;
}



$trajetsQuery = $covoiturage->query('SELECT * FROM trajets');
$trajetRow = $trajetsQuery->fetch();
$trajetId = $trajetRow['trajets_id'];

$req = 'INSERT INTO reservations(reservations_usager,reservations_echange_service,reservations_date,reservations_nb_passagers,reservations_point_de_depart,reservations_destination,_usagers_id,_trajets_id) VALUES("'.$usager.'","'.$echange.'","'.$date.'","'.$nbrpassager.'","'.$pointdepart.'","'.$destination.'","'.$usagerId.'","'.$trajetId.'" )';
$resultat = $covoiturage->query($req);
?>
</tbody>
</table>
</body>
</html>

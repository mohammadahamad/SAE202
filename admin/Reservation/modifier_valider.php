<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<a href="gestion.php">retour au tableau de bord</a> 	
	<hr>
<h1>gestion de nos réservations</h1>
<h2>vous venez de modifier une réservation</h2>
<hr>
<?php
$usager=$_POST['usager'];
$echange=$_POST['echange'];
$date=$_POST['date'];
$nbrpassager=$_POST['nbrpassager'];
$pointdepart=$_POST['pointdepart'];
$destination=$_POST['destination'];

$num=$_POST['num'];

require '../../secretxyz123.php';
$covoiturage = new PDO('mysql:host=localhost;dbname=sae202;charset=UTF8;', LUTILISATEUR, LEMOTDEPASSE);
$covoiturage->query('SET NAMES utf8;');

// Vérifier si le champ "Nombre de passager" est un nombre
if (!is_numeric($nbrpassager)) {
    echo "Formulaire incorrect, veuillez saisir un chiffre dans le champ 'Nombre de passager'";
    exit; // Arrêter l'exécution du script si le champ est incorrect
}

$req ='UPDATE reservations SET reservations_usager="'.$usager.'",reservations_echange_service="'.$echange.'",reservations_date="'.$date.'",reservations_nb_passagers="'.$nbrpassager.'",reservations_point_de_depart="'.$pointdepart.'",reservations_destination="'.$destination.'" WHERE reservations_id="'.$num.'"';
$resultat = $covoiturage->query($req);
?>
</tbody>
</table>
</body>
</html>

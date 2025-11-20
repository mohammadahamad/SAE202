<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<a href="gestion.php">retour au tableau de bord</a> 	
	<hr>
<h1>gestion de nos trajets</h1>
<h2>vous venez d'ajouter un trajet</h2>
<hr>
<?php

$usagerId = $_POST['usager'];
$depart=$_POST['depart'];
$arriver=$_POST['arriver'];
$photo = $_FILES['photo']['name'];  // Récupère le nom du fichier
$photo_tmp = $_FILES['photo']['tmp_name'];  // Récupère le fichier temporaire
$nbplace=$_POST['nbplace'];
$pointdepart=$_POST['pointdepart'];
$destination=$_POST['destination'];
$rue=$_POST['rue'];
$numrue=$_POST['numrue'];
$codepostal=$_POST['codepostal'];

require '../../secretxyz123.php';
$covoiturage = new PDO('mysql:host=localhost;dbname=sae202;charset=UTF8;', LUTILISATEUR, LEMOTDEPASSE);
$covoiturage->query('SET NAMES utf8;');

$usagerQuery = $covoiturage->query('SELECT usagers_nom, usagers_prenom FROM usagers WHERE usagers_id = '.$usagerId);
$usagerRow = $usagerQuery->fetch();
$usagerNom = $usagerRow['usagers_nom'];
$usagerPrenom = $usagerRow['usagers_prenom'];


$req = 'INSERT INTO trajets(trajets_depart,trajets_arriver,trajets_photo_vehicule,trajets_nb_de_places_dispo,trajets_point_de_depart,trajets_destination,trajets_rue,trajets_num_rue,trajets_code_postal,_usagers_id) VALUES("'.$depart.'","'.$arriver.'","'.$photo.'","'.$nbplace.'","'.$pointdepart.'","'.$destination.'","'.$rue.'","'.$numrue.'","'.$codepostal.'","'.$usagerId.'" )';
$resultat = $covoiturage->query($req);

// Déplacer le fichier téléchargé vers le dossier de destination
$destination_folder = '../../assets/imgs/';
move_uploaded_file($photo_tmp, $destination_folder . $photo);
?>
</tbody>
</table>
</body>
</html>
</html>
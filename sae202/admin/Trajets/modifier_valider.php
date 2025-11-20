<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<a href="gestion.php">retour au tableau de bord</a> 	
	<hr>
<h1>gestion de nos trajets</h1>
<h2>vous venez de modifier une trajet</h2>
<hr>
<?php
$depart=$_POST['depart'];
$arriver=$_POST['arriver'];
$photo = $_FILES['photo']['name'];
$nbplace=$_POST['nbplace'];
$pointdepart=$_POST['pointdepart'];
$destination=$_POST['destination'];
$rue=$_POST['rue'];
$numrue=$_POST['numrue'];
$codepostal=$_POST['codepostal'];

$num=$_POST['num'];



require '../../secretxyz123.php';
$covoiturage = new PDO('mysql:host=localhost;dbname=sae202;charset=UTF8;', LUTILISATEUR, LEMOTDEPASSE);
$covoiturage->query('SET NAMES utf8;');

// Déplacer le fichier téléchargé vers le dossier de destination s'il y en a un
if (!empty($photo)) {
    $photo_tmp = $_FILES['photo']['tmp_name'];
    $destination_folder = '../../assets/imgs/';
    move_uploaded_file($photo_tmp, $destination_folder . $photo);
}


$req ='UPDATE trajets SET trajets_depart="'.$depart.'",trajets_arriver="'.$arriver.'",trajets_nb_de_places_dispo="'.$nbplace.'",trajets_point_de_depart="'.$pointdepart.'",trajets_destination="'.$destination.'",trajets_rue="'.$rue.'",trajets_num_rue="'.$numrue.'",trajets_code_postal="'.$codepostal.'" ';

if (!empty($photo)) {
    $req .= ', trajets_photo_vehicule="'.$photo.'"';
}

$req .= ' WHERE trajets_id="'.$num.'"';


$resultat = $covoiturage->query($req);

?>
</tbody>
</table>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<a href="gestion.php">retour au tableau de bord</a> 	
	<hr>
<h1>gestion de nos parkings</h1>
<h2>vous venez de modifier un parking</h2>
<hr>
<?php
$Nom=$_POST['Nom'];
$Nombreplace=$_POST['Nombreplace'];
$Adresse=$_POST['Adresse'];

$num=$_POST['num'];

// Vérifier si le champ "Nombre de place" est un nombre
if (!is_numeric($Nombreplace)) {
    echo "Formulaire incorrect, veuillez saisir un chiffre dans le champ 'Nombre de place'";
    exit; // Arrêter l'exécution du script si le champ est incorrect
}

require '../../secretxyz123.php';
$covoiturage = new PDO('mysql:host=localhost;dbname=sae202;charset=UTF8;', LUTILISATEUR, LEMOTDEPASSE);
$covoiturage->query('SET NAMES utf8;');
$req ='UPDATE parkings SET parkings_nom="'.$Nom.'",parkings_nombre_de_place="'.$Nombreplace.'",parkings_adresse="'.$Adresse.'" WHERE parkings_id="'.$num.'"';
$resultat = $covoiturage->query($req);

?>
</tbody>
</table>
</body>
</html>
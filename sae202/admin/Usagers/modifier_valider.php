<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<a href="gestion.php">retour au tableau de bord</a> 	
	<hr>
<h1>gestion de nos usagers</h1>
<h2>vous venez de modifier un usager</h2>
<hr>
<?php
$Nom=$_POST['Nom'];
$Prenom=$_POST['Prenom'];
$numtel=$_POST['numtel'];
$mail=$_POST['mail'];

$num=$_POST['num'];

require '../../secretxyz123.php';
$covoiturage = new PDO('mysql:host=localhost;dbname=sae202;charset=UTF8;', LUTILISATEUR, LEMOTDEPASSE);
$covoiturage->query('SET NAMES utf8;');
$req ='UPDATE usagers SET usagers_nom="'.$Nom.'",usagers_prenom="'.$Prenom.'",usagers_numtel="'.$numtel.'",usagers_mail="'.$mail.'" WHERE usagers_id="'.$num.'"';
$resultat = $covoiturage->query($req);
?>
</tbody>
</table>
</body>
</html>

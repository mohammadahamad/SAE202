<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<a href="gestion.php">retour au tableau de bord</a> 	
	<hr>
<h1>gestion de nos usagers</h1>
<h2>vous venez d'ajouter un usager</h2>
<hr>
<?php

$Nom=$_POST['Nom'];
$Prenom=$_POST['Prenom'];
$numtel=$_POST['numtel'];
$mail=$_POST['mail'];
$mdp=$_POST['mdp'];

require '../../secretxyz123.php';
$covoiturage = new PDO('mysql:host=localhost;dbname=sae202;charset=UTF8;', LUTILISATEUR, LEMOTDEPASSE);
$covoiturage->query('SET NAMES utf8;');


$req = 'INSERT INTO usagers(usagers_nom,usagers_prenom,usagers_numtel,usagers_mail,usagers_mdp) VALUES("'.$Nom.'","'.$Prenom.'","'.$numtel.'","'.$mail.'","'.$mdp.'"  )';
$resultat = $covoiturage->query($req);
?>
</tbody>
</table>
</body>
</html>
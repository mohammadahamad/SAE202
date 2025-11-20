<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title></title>
</head>
<body>
<a href="gestion.php">retour au tableau de bord</a>  
    <hr>
<h1>gestion de nos usagers</h1>
<p>modifier ici un usager</p>
<?php
$num = $_GET['num'];
require '../../secretxyz123.php';
$covoiturage = new PDO('mysql:host=localhost;dbname=sae202;charset=UTF8;', LUTILISATEUR, LEMOTDEPASSE);
$covoiturage->query('SET NAMES utf8;');
$req = 'SELECT * FROM usagers WHERE usagers_id = '.$num;
$resultat = $covoiturage->query($req);
$usagers = $resultat->fetch();
?>
<hr>
<form method="POST" action="modifier_valider.php" enctype="multipart/form-data">
    <input type="hidden" name="num" value="<?php echo $usagers['usagers_id']?>"><br>
    Nom:<input type="text" name="Nom" value="<?php echo $usagers['usagers_nom']?>"><br>
    Prénom:<input type="text" name="Prenom" value="<?php echo $usagers['usagers_prenom']?>"><br>
    Numéro de téléphone:<input type="tel" name="numtel" value="<?php echo $usagers['usagers_numtel']?>"><br>
    Adresse mail:<input type="email" name="mail" value="<?php echo $usagers['usagers_mail']?>"><br>
    <input type="submit" name="Modifier">
</form>
</tbody>
</table>
</body>
</html>

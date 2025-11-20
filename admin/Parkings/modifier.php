<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="styles.css">
	<title></title>
</head>
<body>
<a href="gestion.php">retour au tableau de bord</a> 	
	<hr>
<h1>gestion de nos parkings</h1>
<p>modifier ici un parking</p>
    <?php
        $num = $_GET['num'];
        require '../../secretxyz123.php';
        $covoiturage = new PDO('mysql:host=localhost;dbname=sae202;charset=UTF8;', LUTILISATEUR, LEMOTDEPASSE);
        $covoiturage->query('SET NAMES utf8;');
        $req = 'SELECT * FROM parkings WHERE parkings_id = '.$num;
        $resultat = $covoiturage->query($req);
        $parkings = $resultat->fetch();
?>
<hr>
<form method="POST" action="modifier_valider.php" enctype="multipart/form-data">

    <input type="hidden" name="num" value="<?php echo $parkings['parkings_id']?>"><br>
    Nom du parking:<input type="text" name="Nom" value="<?php echo $parkings['parkings_nom']?>"><br>
    Nombre de place:<input type="text" name="Nombreplace" value="<?php echo $parkings['parkings_nombre_de_place']?>"><br>
    Adresse du parking:<input type="text" name="Adresse" value="<?php echo $parkings['parkings_adresse']?>"><br>
    <input type="submit" name="Modifier">
</form>

</tbody>
</table>
</body>
</html>
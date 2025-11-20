<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="styles.css">
	<title></title>
</head>
<body>
<a href="gestion.php">retour au tableau de bord</a> 	
	<hr>
<h1>gestion de nos trajets</h1>
<p>modifier ici un trajet</p>
    <?php
        $num = $_GET['num'];
        require '../../secretxyz123.php';
        $covoiturage = new PDO('mysql:host=localhost;dbname=sae202;charset=UTF8;', LUTILISATEUR, LEMOTDEPASSE);
        $covoiturage->query('SET NAMES utf8;');
        $req = 'SELECT * FROM trajets WHERE trajets_id = '.$num;
        $resultat = $covoiturage->query($req);
        $trajets = $resultat->fetch();
?>
<hr>
<form method="POST" action="modifier_valider.php" enctype="multipart/form-data">
    <input type="hidden" name="num" value="<?php echo $trajets['trajets_id']?>"><br>

    Heure du départ du trajet:<input type="datetime-local" name="depart" value="<?php echo $trajets['trajets_depart']?>"><br>
    Heure d'arrivée du trajet:<input type="datetime-local" name="arriver" value="<?php echo $trajets['trajets_arriver']?>"><br>
    Photo : <input type="file" name="photo"><br/>
    Nombre de place disponibles:<input type="text" name="nbplace" value="<?php echo $trajets['trajets_nb_de_places_dispo']?>"><br>
    Point de départ<input type="text" name="pointdepart" value="<?php echo $trajets['trajets_point_de_depart']?>"><br>
    Destination:<input type="text" name="destination" value="<?php echo $trajets['trajets_destination']?>"><br>
    Rue:<input type="text" name="rue" value="<?php echo $trajets['trajets_rue']?>"><br>
    Numéro de rue:<input type="text" name="numrue" value="<?php echo $trajets['trajets_num_rue']?>"><br>
    Code postal:<input type="text" name="codepostal" value="<?php echo $trajets['trajets_code_postal']?>"><br>

    <input type="submit" name="Modifier">
</form>

</tbody>
</table>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title></title>
</head>
<body>
<a href="gestion.php">retour au tableau de bord</a>  
    <hr>
<h1>gestion de nos réservations</h1>
<p>modifier ici une réservation</p>
<?php
$num = $_GET['num'];
require '../../secretxyz123.php';
$covoiturage = new PDO('mysql:host=localhost;dbname=sae202;charset=UTF8;', LUTILISATEUR, LEMOTDEPASSE);
$covoiturage->query('SET NAMES utf8;');
$req = 'SELECT * FROM reservations WHERE reservations_id = '.$num;
$resultat = $covoiturage->query($req);
$reservations = $resultat->fetch();
?>
<hr>
<form method="POST" action="modifier_valider.php" enctype="multipart/form-data">
    <input type="hidden" name="num" value="<?php echo $reservations['reservations_id']?>"><br>
    <label>Sélectionner un Usager :</label>
    <select name="usager">
    <?php
    $usagersQuery = $covoiturage->query('SELECT * FROM usagers');
    while ($usagerRow = $usagersQuery->fetch()) {
        $usagerId = $usagerRow['usagers_id'];
        $usagerNom = $usagerRow['usagers_nom'];
        $usagerPrenom = $usagerRow['usagers_prenom'];
        $selected = ($usagerId == $reservations['reservations_usager']) ? 'selected' : '';
        echo '<option value="' . $usagerId . '" ' . $selected . '>' . $usagerNom . ' ' . $usagerPrenom . '</option>';
    }
    ?>
    </select><br>
    Echange/Service:<input type="text" name="echange" value="<?php echo $reservations['reservations_echange_service']?>"><br>
    Date:<input type="datetime-local" name="date" value="<?php echo $reservations['reservations_date']?>"><br>
    Nombre de passager:<input type="text" name="nbrpassager" value="<?php echo $reservations['reservations_nb_passagers']?>"><br>
    Point de départ:<input type="text" name="pointdepart" value="<?php echo $reservations['reservations_point_de_depart']?>"><br>
    Destination:<input type="text" name="destination" value="<?php echo $reservations['reservations_destination']?>"><br>
    <input type="submit" name="Modifier">
</form>

</tbody>
</table>
</body>
</html>

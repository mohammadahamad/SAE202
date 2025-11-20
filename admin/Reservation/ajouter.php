<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<a href="gestion.php">retour au tableau de bord</a>  
    <hr>
<h1>gestion de nos réservations</h1>
<p>ajouter ici une réservation</p>
<hr>
<form method="POST" action="ajouter_valider.php" enctype="multipart/form-data">
    <label>Sélectionner un Usager : </label>
    <select name="usager">
    <?php
    require '../../secretxyz123.php';
    $covoiturage = new PDO('mysql:host=localhost;dbname=sae202;charset=UTF8;', LUTILISATEUR, LEMOTDEPASSE);
    $covoiturage->query('SET NAMES utf8;');

    $usagersQuery = $covoiturage->query('SELECT * FROM usagers');
    while ($usagerRow = $usagersQuery->fetch()) {
        $usagerId = $usagerRow['usagers_id'];
        $usagerNom = $usagerRow['usagers_nom'];
        $usagerPrenom = $usagerRow['usagers_prenom'];
        echo '<option value="' . $usagerNom . ' ' . $usagerPrenom . '">' . $usagerNom . ' ' . $usagerPrenom . '</option>';
    }
    ?>
</select>
<br>

    Echange/Service:<input type="text" name="echange"><br>
    Date:<input type="datetime-local" name="date"><br>
    Nombre de passager:<input type="text" name="nbrpassager"><br>
    Point de départ:<input type="text" name="pointdepart"><br>
    Destination:<input type="text" name="destination"><br>
    <input type="submit" name="Ajouter">
</form>

</tbody>
</table>
</body>
</html>

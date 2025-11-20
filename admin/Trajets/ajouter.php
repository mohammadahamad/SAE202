<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<a href="gestion.php">retour au tableau de bord</a> 	
	<hr>
<h1>gestion de nos trajets</h1>
<p>ajouter ici un trajet</p>
<hr>
<form method="POST" action="ajouter_valider.php" enctype="multipart/form-data">
    Usager:
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
        echo '<option value="' . $usagerId . '">' . $usagerNom . ' ' . $usagerPrenom . '</option>';
    }
    ?>
    </select><br>    
    Heure du départ du trajet:<input type="datetime-local" name="depart"><br>
    Heure d'arrivée du trajet:<input type="datetime-local" name="arriver"><br>
    Photo : <input type="file" name="photo"><br/>
    Nombre de place disponibles:<input type="text" name="nbplace"><br>
    Point de départ<input type="text" name="pointdepart"><br>
    Destination:<input type="text" name="destination"><br>
    Rue:<input type="text" name="rue"><br>
    Numéro de rue:<input type="text" name="numrue"><br>
    Code postal:<input type="text" name="codepostal"><br>
    <input type="submit" name="Ajouter">
</form>

</tbody>
</table>
</body>
</html>
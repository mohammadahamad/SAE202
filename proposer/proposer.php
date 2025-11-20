<?php require '../debut_html.inc.php'; ?>
<?php require '../fonctions.inc.php'; ?>
<?php require '../menu_html.inc.php'; ?>
<br><br><br><br><br>

    <div id="contenu">
        <h1>Proposer un trajet</h1>
    </div>
    <div id="form">
    <form method="POST" action="proposer_valider.php" enctype="multipart/form-data">
    Photo<input id="photo_form" type="file" name="photo"><br/>
    Usager<select class="element_form" name="usager">
    <?php
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
    Nombre de place<input class="element_form" type="text" name="nbrplace"><br>
    Point de départ<input class="element_form" type="text" name="pointdepart"><br>
    Destination<input class="element_form" type="text" name="destination"><br>
    Heure du départ du trajet<input class="element_form" type="datetime-local" name="depart"><br>
    Heure d'arrivée du trajet<input class="element_form" type="datetime-local" name="arriver"><br>
    Rue<input class="element_form" type="text" name="rue"><br>
    Numéro de rue<input class="element_form" type="text" name="numrue"><br>
    Code postal<input class="element_form" type="text" name="codepostal"><br>
    <input id="envoyer_form" type="submit" name="Ajouter" value="Ajouter">
</form>
</div>
</tbody>
</table>
<?php require '../fin_html.inc.php'; ?>
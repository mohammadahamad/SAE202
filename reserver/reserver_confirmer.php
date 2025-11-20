<?php
require '../debut_html.inc.php';
require '../fonctions.inc.php';
require '../menu_html.inc.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idTrajet = $_POST['id_trajet'] ?? '';

    if (!empty($idTrajet)) {
        $covoiturage = new PDO('mysql:host=localhost;dbname=sae202;charset=UTF8;', LUTILISATEUR, LEMOTDEPASSE);
        $covoiturage->query('SET NAMES utf8;');

        $trajetQuery = $covoiturage->prepare('SELECT * FROM trajets WHERE trajets_id = :idTrajet AND trajets_nb_de_places_dispo > 0');
        $trajetQuery->execute(array(':idTrajet' => $idTrajet));
        $trajet = $trajetQuery->fetch();

        if ($trajet) {
            // Mettre à jour le nombre de places disponibles
            $nouveauNbPlaces = $trajet['trajets_nb_de_places_dispo'] - 1;
            $updateQuery = $covoiturage->prepare('UPDATE trajets SET trajets_nb_de_places_dispo = :nouveauNbPlaces WHERE trajets_id = :idTrajet');
            $updateQuery->execute(array(':nouveauNbPlaces' => $nouveauNbPlaces, ':idTrajet' => $idTrajet));

            // Insérer une entrée dans la table "reservations"
            $insertQuery = $covoiturage->prepare('INSERT INTO reservations (reservations_usager, reservations_echange_service, reservations_date, reservations_nb_passagers, reservations_point_de_depart, reservations_destination, _trajets_id, _usagers_id) VALUES (:usager, :echangeService, NOW(), :nbPassagers, :pointDepart, :destination, :idTrajet, :usagerId)');
$insertQuery->execute(array(
    ':usager' => $_SESSION['usagers_nom'] . ' ' . $_SESSION['usagers_prenom'],
    ':echangeService' => 'Échange de service',
    ':nbPassagers' => 1,
    ':pointDepart' => $trajet['trajets_point_de_depart'],
    ':destination' => $trajet['trajets_destination'],
    ':idTrajet' => $idTrajet,
    ':usagerId' => $_SESSION['usagers_id']
));


            echo '<br><br><br><br><br><h2 id="reserver_titre3">Réservation confirmée :</h2>';
            echo '<p id="reserver-trajet">Votre réservation pour le trajet de ' . $trajet['trajets_point_de_depart'] . ' à ' . $trajet['trajets_destination'] . ' le ' . $trajet['trajets_depart'] . ' a été confirmée avec succès.</p>';
        } else {
            echo '<h2>Le trajet spécifié n\'est pas disponible.</h2>';
        }
    }
} else {
    echo 'Méthode de requête incorrecte.';
}

require '../fin_html.inc.php';
?>

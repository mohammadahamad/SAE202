<?php
require '../debut_html.inc.php';
require '../fonctions.inc.php';
require '../menu_html.inc.php';
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $idTrajet = $_GET['id_trajet'] ?? '';

    if (!empty($idTrajet)) {
        $covoiturage = new PDO('mysql:host=localhost;dbname=sae202;charset=UTF8;', LUTILISATEUR, LEMOTDEPASSE);
        $covoiturage->query('SET NAMES utf8;');

        $trajetQuery = $covoiturage->prepare('SELECT * FROM trajets WHERE trajets_id = :idTrajet AND trajets_nb_de_places_dispo > 0');
        $trajetQuery->execute(array(':idTrajet' => $idTrajet));
        $trajet = $trajetQuery->fetch();

        if ($trajet) {
            
            echo '<br><br><br><br><br><h2 id="reserver_titre3">Réserver le trajet :</h2>';
            echo '<table>';
            echo '<tr><th id="reserver_resultat">Point de départ</th><th id="reserver_resultat">Destination</th><th id="reserver_resultat">Nombre de places disponibles</th><th id="reserver_resultat">Date</th><th id="reserver_resultat">Action</th></tr>';
            echo '<tr>';
            echo '<td id="reserver_resultat4">' . $trajet['trajets_point_de_depart'] . '</td>';
            echo '<td id="reserver_resultat4">' . $trajet['trajets_destination'] . '</td>';
            echo '<td id="reserver_resultat4">' . $trajet['trajets_depart'] . '</td>';
            echo '<td id="reserver_resultat4">';
            if ($trajet['trajets_nb_de_places_dispo'] > 0) {
                echo $trajet['trajets_nb_de_places_dispo'];
            } else {
                echo 'Complet';
            }
            echo '</td>';
            echo '<td id="confirmer">';
            if ($trajet['trajets_nb_de_places_dispo'] > 0) {
                echo '<br><form action="reserver_confirmer.php" method="POST">';
                echo '<input type="hidden" name="id_trajet" value="' . $trajet['trajets_id'] . '">';
                echo '<input id="confirm_reservation" type="submit" value="Confirmer la réservation">';
                echo '</form>';
            } else {
                echo 'Indisponible';
            }
            echo '</td>';
            echo '</tr>';
            echo '</table>';
        } else {
            echo '<h2>Le trajet spécifié n\'est pas disponible.</h2>';
        }
    }
} else {
    echo 'Méthode de requête incorrecte.';
}

require '../fin_html.inc.php';
?>

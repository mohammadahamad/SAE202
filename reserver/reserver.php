<?php
require '../debut_html.inc.php';
require '../fonctions.inc.php';
require '../menu_html.inc.php';
?>
<br><br><br><br><br>
<div id=reserver_font>
    <h1 id="reserver_titre">Réserver votre voyage en</h1>
    <h1 id="reserver_titre2">3 étapes</h1>
</div>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $villeDepart = $_GET['trajets_point_de_depart'] ?? '';
    $villeArrivee = $_GET['trajets_destination'] ?? '';

    $covoiturage = new PDO('mysql:host=localhost;dbname=sae202;charset=UTF8;', LUTILISATEUR, LEMOTDEPASSE);
    $covoiturage->query('SET NAMES utf8;');

    // Barre de recherche
    echo '<div id="center"style="
    display: flex;
    justify-content: center;">';
    echo '<form action="reserver.php" method="GET">';
    echo '<label for="trajets_point_de_depart">Point de départ:</label>';
    echo '<select name="trajets_point_de_depart" id="trajets_point_de_depart">';
    
    $villesDepartQuery = $covoiturage->query('SELECT DISTINCT trajets_point_de_depart FROM trajets WHERE trajets_nb_de_places_dispo > 0');
    $villesDepart = $villesDepartQuery->fetchAll(PDO::FETCH_COLUMN);
    foreach ($villesDepart as $ville) {
        $selected = ($ville === $villeDepart) ? 'selected' : '';
        echo '<option value="' . htmlentities($ville, ENT_QUOTES) . '" ' . $selected . '>' . $ville . '</option>';
    }
    
    echo '</select>';
    
    echo '<label for="trajets_destination">Destination:</label>';
    echo '<select name="trajets_destination" id="trajets_destination">';
    
    $villesArriveeQuery = $covoiturage->query('SELECT DISTINCT trajets_destination FROM trajets WHERE trajets_nb_de_places_dispo > 0');
    $villesArrivee = $villesArriveeQuery->fetchAll(PDO::FETCH_COLUMN);
    foreach ($villesArrivee as $ville) {
        $selected = ($ville === $villeArrivee) ? 'selected' : '';
        echo '<option value="' . htmlentities($ville, ENT_QUOTES) . '" ' . $selected . '>' . $ville . '</option>';
    }
    
    echo '</select>';
    echo '<input type="submit" value="Chercher un trajet">';
    echo '</form>';
    echo '</div>';

    // Requête et affichage des résultats
    if (!empty($villeDepart) && !empty($villeArrivee)) {
        $trajetsQuery = $covoiturage->prepare('SELECT * FROM trajets WHERE trajets_point_de_depart = :villeDepart AND trajets_destination = :villeArrivee AND trajets_nb_de_places_dispo > 0');
        $trajetsQuery->execute(array(':villeDepart' => $villeDepart, ':villeArrivee' => $villeArrivee));
        $trajets = $trajetsQuery->fetchAll();

        if (count($trajets) > 0) {
            echo '<br><br><h2 id="reserver_titre3">Résultats de la recherche :</h2><br>';
            echo '<table>';
            echo '<thead><tr><th id="reserver_resultat">Point de départ</th><th id="reserver_resultat">Destination</th><th id="reserver_resultat">Nombre de places disponibles</th><th id="reserver_resultat">Date</th><th id="reserver_resultat">Action</th></tr></thead>';
            echo '<tbody>';
            foreach ($trajets as $trajet) {
                echo '<tr>';
                echo '<td id="reserver_resultat2">' . $trajet['trajets_point_de_depart'] .'</td>';
                echo '<td id="reserver_resultat2">' . $trajet['trajets_destination'] . '</td>';
                echo '<td id="reserver_resultat2">';
                if ($trajet['trajets_nb_de_places_dispo'] > 0) {
                    echo $trajet['trajets_nb_de_places_dispo'];
                } else {
                    echo 'Complet';
                }
                echo '</td>';
                echo '<td id="reserver_resultat2">' . $trajet['trajets_depart'] . '</td>';
                echo '<td id="reserver_resultat3">';
                if ($trajet['trajets_nb_de_places_dispo'] > 0) {
                    echo '<a href="reserver_valider.php?id_trajet=' . $trajet['trajets_id'] . '">Réserver</a>';
                } else {
                    echo 'Indisponible';
                }
                echo '</td>';
                echo '</tr>';
            }
            echo '</tbody>';
            echo '</table>';
        } else {
            echo '<h2>Aucun trajet disponible pour la recherche spécifiée.</h2>';
        }
    }
} else {
    echo 'Méthode de requête incorrecte.';
}
?>
<br>
<br>
<?php require '../fin_html.inc.php'; ?>

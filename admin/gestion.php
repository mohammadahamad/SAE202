<?php require '../fonctions.inc.php'; ?>
<?php require '../debut_html.inc.php'; ?>
<?php require '../menu_html.inc.php'; ?>
<br><br><br><br><br>
<h1>Administration</h1>
<a href="../index.php">Retour accueil</a>
<p>Vous pouvez accéder aux deux différentes pages de gestion des tables en cliquant sur les liens ci-dessous :</p>
<ul>
    <li><a id="gestion_liens" href="../admin/Parkings/gestion.php">Table de gestion parking</a></li>
    <li><a id="gestion_liens" href="../admin/Reservation/gestion.php">Table de gestion reservation</a></li>
    <li><a id="gestion_liens" href="../admin/Trajets/gestion.php">Table de gestion trajet</a></li>
    <li><a id="gestion_liens" href="../admin/Usagers/gestion.php">Table de gestion usagers</a></li>
</ul>

<?php
$covoiturage = new PDO('mysql:host=localhost;dbname=sae202;charset=UTF8;', LUTILISATEUR, LEMOTDEPASSE);
$covoiturage->query('SET NAMES utf8;');
$req = "SELECT * FROM usagers WHERE usagers_id"; // créer la requête

try {
    $resultat=$covoiturage->query($req); // exécuter la requête
} catch (PDOException $e) {
    print "Erreur : ".$e->getMessage().'<br />'; die();
}

// compter le nombre de résultats
$lignes_resultat = $resultat->rowCount();
echo "Nombre d'usagers : ".$lignes_resultat;
?>
<br>
<?php
$req = "SELECT * FROM trajets WHERE trajets_id"; // créer la requête

try {
    $resultat=$covoiturage->query($req); // exécuter la requête
} catch (PDOException $e) {
    print "Erreur : ".$e->getMessage().'<br />'; die();
}

// compter le nombre de résultats
$lignes_resultat = $resultat->rowCount();
echo "Nombre de trajets : ".$lignes_resultat;
?>
<br>
<?php
$req = "SELECT * FROM reservations WHERE reservations_id"; // créer la requête

try {
    $resultat=$covoiturage->query($req); // exécuter la requête
} catch (PDOException $e) {
    print "Erreur : ".$e->getMessage().'<br />'; die();
}

// compter le nombre de résultats
$lignes_resultat = $resultat->rowCount();
echo "Nombre de réservations : ".$lignes_resultat;
?>
<br>
<?php
$req = "SELECT * FROM parkings WHERE parkings_id"; // créer la requête

try {
    $resultat=$covoiturage->query($req); // exécuter la requête
} catch (PDOException $e) {
    print "Erreur : ".$e->getMessage().'<br />'; die();
}

// compter le nombre de résultats
$lignes_resultat = $resultat->rowCount();
echo "Nombre de parkings : ".$lignes_resultat;
?>
<?php require '../fin_html.inc.php'; ?>

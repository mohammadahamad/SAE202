<?php require '../debut_html.inc.php'; ?>
<?php require '../fonctions.inc.php'; ?>
<?php require '../menu_html.inc.php'; ?>
<body>
<br><br><br><br><br>    
<h2>vous venez de proposer un trajet !</h2>
<hr>
<?php
$photo = $_FILES['photo']['name'];  // Récupère le nom du fichier
$photo_tmp = $_FILES['photo']['tmp_name'];  // Récupère le fichier temporaire
$usagerId = $_POST['usager'];
$nbrplace = $_POST['nbrplace'];
$pointdepart = $_POST['pointdepart'];
$destination = $_POST['destination'];
$depart=$_POST['depart'];
$arriver=$_POST['arriver'];
$rue=$_POST['rue'];
$numrue=$_POST['numrue'];
$codepostal=$_POST['codepostal'];


$covoiturage = new PDO('mysql:host=localhost;dbname=sae202;charset=UTF8;', LUTILISATEUR, LEMOTDEPASSE);
$covoiturage->query('SET NAMES utf8;');


$usagerQuery = $covoiturage->query('SELECT usagers_nom, usagers_prenom FROM usagers WHERE usagers_id = '.$usagerId);
$usagerRow = $usagerQuery->fetch();
$usagerNom = $usagerRow['usagers_nom'];
$usagerPrenom = $usagerRow['usagers_prenom'];

$req = 'INSERT INTO trajets(trajets_depart,trajets_arriver,trajets_photo_vehicule,trajets_nb_de_places_dispo,trajets_point_de_depart,trajets_destination,trajets_rue,trajets_num_rue,trajets_code_postal,_usagers_id) VALUES("'.$depart.'","'.$arriver.'","'.$photo.'","'.$nbrplace.'","'.$pointdepart.'","'.$destination.'","'.$rue.'","'.$numrue.'","'.$codepostal.'","'.$usagerId.'"  )';



$resultat = $covoiturage->query($req);
?>
<?php require '../fin_html.inc.php'; ?>

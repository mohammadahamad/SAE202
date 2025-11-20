<?php
require '../secretxyz123.php';
$covoiturage = new PDO('mysql:host=localhost;dbname=sae202;charset=UTF8;', LUTILISATEUR, LEMOTDEPASSE);
$covoiturage->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$covoiturage->query('SET NAMES utf8;');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $num = $_POST['num'];
    $nom = $_POST['Nom'];
    $prenom = $_POST['Prenom'];
    $numtel = $_POST['numtel'];
    $mail = $_POST['mail'];
    $mdp = $_POST['mdp'];

    $req = 'UPDATE usagers SET usagers_nom = :nom, usagers_prenom = :prenom, usagers_numtel = :numtel, usagers_mail = :mail';
    $params = array(':nom' => $nom, ':prenom' => $prenom, ':numtel' => $numtel, ':mail' => $mail);

    if (!empty($mdp)) {
        $hashedMdp = password_hash($mdp, PASSWORD_DEFAULT);
        $req .= ', usagers_mdp = :mdp';
        $params[':mdp'] = $hashedMdp;
    }

    $req .= ' WHERE usagers_id = :num';
    $params[':num'] = $num;

    $statement = $covoiturage->prepare($req);
    $statement->execute($params);

    // Redirection vers la page de profil après la modification
    header('Location: profil.php?num=' . $num);
    exit();
} else {
    // Redirection vers la page d'accueil si la requête n'est pas de type POST
    header('Location: accueil.php');
    exit();
}
?>

<?php
session_start();
require 'fonctions.inc.php';

$email = $_POST['email'];
$mdp = $_POST['mdp'];
$covoiturage = connexioncovoiturage();

// Vérifier si l'adresse e-mail existe dans la base de données
$req = 'SELECT * FROM usagers WHERE usagers_mail = :email';
$stmt = $covoiturage->prepare($req);
$stmt->bindParam(':email', $email);
$stmt->execute();
$ligne = $stmt->fetch(PDO::FETCH_ASSOC);

if ($ligne && password_verify($mdp, $ligne['usagers_mdp'])) {
    // Le mot de passe est correct
    $_SESSION['usagers_prenom'] = $ligne['usagers_prenom'];
    $_SESSION['usagers_nom'] = $ligne['usagers_nom'];
    $_SESSION['usagers_id'] = $ligne['usagers_id'];
    header('Location: index.php');
    exit();
} elseif ($ligne) {
    // L'adresse e-mail existe, mais le mot de passe est incorrect
    $_SESSION['erreur'] = 'Le mot de passe saisi est incorrect.';
    header('Location: connexion.php');
    exit();
} else {
    // L'adresse e-mail n'existe pas dans la base de données
    $_SESSION['erreur'] = 'L\'adresse e-mail n\'est pas enregistrée dans notre base de données. Vous pouvez vous inscrire <a href="inscription.php">ici</a>.';
    header('Location: connexion.php');
    exit();
}
?>

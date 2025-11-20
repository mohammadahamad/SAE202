<?php
require 'fonctions.inc.php';

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['usagers_id'])) {
    // Rediriger vers la page de connexion
    header('Location: connexion.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Inscription confirmée</title>
    <?php require 'debut_html.inc.php'; ?>
    <?php require 'menu_html.inc.php'; ?>
</head>
<body>
<br><br><br><br><br>
    <h1>Inscription confirmée</h1>

    <div id="contenu">
        <p>Félicitations, votre inscription a été confirmée !</p>
        <p>Bienvenue, <?php echo $_SESSION['usagers_prenom']; ?> !</p>
        <p>Vous pouvez maintenant accéder à notre site et profiter de nos services.</p>
    </div>

</body>
</html>
<?php require 'fin_html.inc.php'; ?>

<?php
require '../fonctions.inc.php';
$covoiturage = new PDO('mysql:host=localhost;dbname=sae202;charset=UTF8;', LUTILISATEUR, LEMOTDEPASSE);
$covoiturage->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$covoiturage->query('SET NAMES utf8;');

if (isset($_GET['num'])) {
    $num = $_GET['num'];

    $req = 'SELECT * FROM usagers WHERE usagers_id = :num';
    $statement = $covoiturage->prepare($req);
    $statement->bindParam(':num', $num);
    $statement->execute();
    $usagers = $statement->fetch(PDO::FETCH_ASSOC);
} else {
    // Redirection vers la page d'accueil si le numéro d'utilisateur n'est pas spécifié
    header('Location: ../connexion.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Profil</title>
    <?php require '../debut_html.inc.php'; ?>
    <?php require '../menu_html.inc.php'; ?>
</head>
<body>
<br><br><br><br><br>
    <h1 class="titre">Votre profil</h1>

        <?php 
        echo '<a class="texte1" href="../profil/modif-profil.php?num='.$_SESSION['usagers_id'].'">Modifier mon profil</a>';
    ?>

    <div id="contenu_profil">

        <div id="tableau">
        <h1 id="profil">Informations personnelles</h1><br>
        <p id="profil_texte">Numéro d'utilisateur <br>
            <div id="PROFIL">
                <form id="profil_contenue">
                    <?php echo htmlspecialchars($usagers['usagers_id']); ?>
                </form>
            </div>
        </p>
        <p id="profil_texte">Nom <br>
            <div id="PROFIL">
                <form id="profil_contenue">
                    <?php echo htmlspecialchars($usagers['usagers_nom']); ?>
                </form>
            </div>
        </p>
        <p id="profil_texte">Prénom <br>
            <div id="PROFIL">
                <form id="profil_contenue">
                    <?php echo htmlspecialchars($usagers['usagers_prenom']); ?>
                </form>
            </div>
        </p>
        <p id="profil_texte">Numéro de téléphone <br>
            <div id="PROFIL">
                <form id="profil_contenue">
                    <?php echo htmlspecialchars($usagers['usagers_numtel']); ?>
                </form>
            </div>
        </p>
        <p id="profil_texte">Adresse mail <br>
            <div id="PROFIL">
                <form id="profil_contenue">
                    <?php echo htmlspecialchars($usagers['usagers_mail']); ?>
                </form>
            </div>
        </p>
        </div>
    </div>


   <?php
    if (isset($_SESSION['usagers_prenom'])) {
                 echo '<a class="texte1" href="../deconnexion.php">Déconnexion</a>';
    }
    ?>
    <br>

</body>
</html>
<?php require '../fin_html.inc.php'; ?>

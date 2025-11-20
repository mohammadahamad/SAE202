<?php
require 'fonctions.inc.php';

// Vérifier si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $numtel = $_POST['numtel'];
    $email = $_POST['email'];
    $mdp = $_POST['mdp'];

    // Hacher le mot de passe
    $hashedPassword = password_hash($mdp, PASSWORD_DEFAULT);

    // Insérer les données dans la base de données
    $covoiturage = connexioncovoiturage();
    $req = 'INSERT INTO usagers (usagers_nom, usagers_prenom, usagers_numtel, usagers_mail, usagers_mdp) VALUES (:nom, :prenom, :numtel, :email, :mdp)';
    $stmt = $covoiturage->prepare($req);
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':prenom', $prenom);
    $stmt->bindParam(':numtel', $numtel);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':mdp', $hashedPassword);
    $stmt->execute();

    // Rediriger vers une page de confirmation d'inscription
    header('Location: inscription_confirmation.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Inscription</title>
    <?php require 'debut_html.inc.php'; ?>
    <?php require 'menu_html.inc.php'; ?>
</head>
<body>
<br><br><br><br><br>
    <!-- Votre formulaire d'inscription ici -->
    <div id="contenu"> 
        <h1 id="inscription">Inscription</h1> 
        <form id='inscri' action="../inscription.php" method="post" > 
            <div id="inscription">
            <label for="nom">Nom</label>
            <input type="text" id="nom" name="nom" required>
            </div>

            <div id="inscription">
            <label for="prenom">Prénom</label>
            <input type="text" id="prenom" name="prenom" required>
            </div>

            <div id="inscription">
            <label for="numtel">Numéro de téléphone</label>
            <input type="tel" id="numtel" name="numtel" required>
            </div>

            <div id="inscription">
            <label for="email">Adresse e-mail</label>
            <input type="email" id="email" name="email" required>
            </div>

            <div id="inscription">
            <label for="mdp">Mot de passe</label>
            <input type="password" id="mdp" name="mdp" required>
            </div>

            <input id="submit" type="submit" value="S'inscrire"> 
            <a class="texte" href="../connexion.php">Déja un compte ? Se connecter</a>
        </div>
        </form>
    </div>

    <!-- Votre contenu supplémentaire, messages d'erreur, etc. ici -->

</body>
</html>
<?php require 'fin_html.inc.php'; ?>

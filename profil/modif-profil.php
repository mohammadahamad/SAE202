<!DOCTYPE html>
<html>
<head>
    <title>Profil</title>
    <?php require '../debut_html.inc.php'; ?>
    <?php require '../fonctions.inc.php'; ?>
    <?php require '../menu_html.inc.php'; ?>
</head>
<body>
<br><br><br><br><br>
    <h1 class="titre">Votre profil</h1>
    <?php
        $covoiturage = new PDO('mysql:host=localhost;dbname=sae202;charset=UTF8;', LUTILISATEUR, LEMOTDEPASSE);
        $covoiturage->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $covoiturage->query('SET NAMES utf8;');
        $num = $_GET['num'];
        $req = 'SELECT * FROM usagers WHERE usagers_id = :num';
        $statement = $covoiturage->prepare($req);
        $statement->bindParam(':num', $num);
        $statement->execute();
        $usagers = $statement->fetch(PDO::FETCH_ASSOC);
    ?>
        <h1 class="texte1">Voulez-vous modifier votre profil</h1>

    <div id="contenu_profil">

        <div>    
            <form id="tab" method="POST" action="modif-profil-valider.php" enctype="multipart/form-data">
                    <input id="profil_contenue" type="hidden" name="num" value="<?php echo htmlspecialchars($usagers['usagers_id']); ?>"><br>
                <p id="profil_texte">Nom <br></p>
                  <input id="profil_contenue" type="text" name="Nom" value="<?php echo htmlspecialchars($usagers['usagers_nom']); ?>"><br>
                <p id="profil_texte">Prénom <br></p>
                    <input id="profil_contenue" type="text" name="Prenom" value="<?php echo htmlspecialchars($usagers['usagers_prenom']); ?>"><br>
                <p id="profil_texte">Numéro de téléphone <br></p>
                    <input id="profil_contenue" type="tel" name="numtel" value="<?php echo htmlspecialchars($usagers['usagers_numtel']); ?>"><br>
                <p id="profil_texte">Adresse mail <br></p>
                    <input id="profil_contenue" type="email" name="mail" value="<?php echo htmlspecialchars($usagers['usagers_mail']); ?>"><br>
                <p id="profil_texte">Mot de passe <br></p>
                    <input id="profil_contenue" type="password" name="mdp" value=""><br>
                <p id="profil_texte"><input id="modifier" type="submit" name="Modifier" value="Modifier"></p>
            </form>
        </div>

</body>

</html>


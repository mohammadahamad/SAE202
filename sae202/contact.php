<!DOCTYPE html>
<html>
<head>
    <title>Contact</title>
    <?php require 'debut_html.inc.php'; ?>
    <?php require 'menu_html.inc.php'; ?>
</head>
<body>
<br><br><br><br><br>
<style type="text/css">
        .erreur {
            color: red;
        }
    </style>

    <h1 id="contact_titre">Vous souhaitez nous contacter ?</h1>
    <h1 id="contact_description">Remplissez simplement ce formulaire ?</h1>
    <div id="contenu-contact">
    <?php
        if (!empty($_SESSION['erreur'])) {
            echo '<p class="erreur">' . $_SESSION['erreur'] . '</p>';
            unset($_SESSION['erreur']);
        }
    ?>
        <form method="POST" action="contact_verif.php">
            <label for="prenom">Prénom</label>
            <input id="tab_style"type="text" id="prenom" name="prenom" required><br>

            <label for="nom">Nom</label>
            <input id="tab_style" type="text" id="nom" name="nom" required><br>

            <label for="email">Email</label>
            <input id="tab_style" type="email" id="email" name="email" required><br>

            <label for="objet">Objet</label>
            <input id="tab_style" type="text" id="objet" name="objet" required><br>

            <label for="message">Message</label>
            <textarea id="form_contact_mess" id="message" name="message" rows="5" required></textarea><br>

            <input id="envoyer" type="submit" value="Envoyer">
        </form>
    </div>
</body>
</html>
<?php require 'fin_html.inc.php'; ?>
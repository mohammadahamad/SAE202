<?php require 'debut_html.inc.php'; ?>
<header id="header">
    <div class="navbar">
<a class="texte" href="../index.php">
<img class="logo_entier" src="../img/logo.svg">
<img class="logo_car" src="../img/logo_mobile.svg">
</a>
    <div id="lien">
        <div class="lien_texte">
        <a class="texte" href="../index.php">Accueil</a>
        
        <?php
             echo '<a class="texte" href="../admin/gestion.php">Admin</a>';
             if (isset($_SESSION['usagers_prenom'])) {
                 echo '<span>Bonjour, '.$_SESSION['usagers_prenom'].' <span>';
                 echo '<a class="texte" href="../deconnexion.php">Déconnexion</a>';
                 echo '</div>';
                 echo '<div class="pictos">';
                 echo '<a href="../reserver/reserver.php">';
                 echo '<img class="loupe"src="../img/loupe.svg" alt="">';
                 echo '</a>';
                 echo '<a href="../proposer/proposer.php">';
                 echo '<img class="ajout"src="../img/ajout.svg" alt="">';
                 echo '</a>';
                 echo '<a href="../profil/profil.php?num='.$_SESSION['usagers_id'].'">';
                 echo '<img class="profil"src="../img/profil.svg" alt="">';
                 echo '</a>';
                 echo '</div>';
             } else {
                 echo '<a class="texte" href="../connexion.php">Connexion</a>';
                 echo '<a class="texte">/</a>';
                 echo '<a class="texte" href="../inscription.php">Inscription</a>';
                 echo '</div>';
                 echo '<div class="pictos">';
                 echo '<a href="../profil/profil.php">';
                 echo '<img class="profil"src="../img/profil.svg" alt="">';
                 echo '</a>';
                 echo '</div>';
             }                    
         ?>
    </div>
</div>
</header>

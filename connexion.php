<?php require 'debut_html.inc.php'; ?>
<?php require 'menu_html.inc.php'; ?>
<br><br><br><br><br>
<div id="contenu"> 
    <h1 id="conn">Connexion</h1> 
    <form id='formco' action="../connexion_verif.php" method="post"> 
         Adresse e-mail<input type="text" name="email" /><br />  
         Mot de passe<input type="password" name="mdp" />
         <a class="oubli" href="../inscription.php">Mot de passe oublié</a><br />
         <input id="submit" type="submit" value="Se connecter"> 
         <a class="texte" href="../inscription.php">Pas encore inscrit ? Créer un compte</a>
    </form>
    
    <?php
    if (!empty($_SESSION['erreur'])) {
         echo $_SESSION['erreur'];
         unset($_SESSION['erreur']);
    }
    ?>
</div>
<?php require 'fin_html.inc.php'; ?>
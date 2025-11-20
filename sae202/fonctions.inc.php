
<?php 
session_start();
 require 'secretxyz123.php'; 
 function connexioncovoiturage() {
    
     $covoiturage = null;  
            
     try {              
         $covoiturage = new PDO('mysql:host=localhost;dbname=sae202;charset=UTF8;', LUTILISATEUR, LEMOTDEPASSE);
         $covoiturage->query('SET NAMES utf8;');  
     }
     catch (PDOException $e) {  
         echo '<p>Erreur : ' . $e->getMessage() . '</p>';  
         die();  
     }   
     return $covoiturage; 
 }

 function recuperer_jeu($co, $id) {
    $req = "SELECT * FROM mmiple_jeux WHERE jeu_code=".$id; // créer la requête

    echo '<p>'.$req.'</p>'."\n";      
    try {       
           $resultat=$co->query($req); // exécuter la requête
    } catch (PDOException $e) {
           print "Erreur : ".$e->getMessage().'<br />'; die();
    }
   
    // compter le nombre de résultats       
    $lignes_resultat=$resultat->rowCount();

    if ($lignes_resultat>0) { // y a-t-il des résultats ?
           // oui : pour chaque résultat : afficher
           return $resultat->fetch(PDO::FETCH_ASSOC);       
    } else {
           // non, on renvoie la valeur "null"
           return null;
    }       
}
 
?>

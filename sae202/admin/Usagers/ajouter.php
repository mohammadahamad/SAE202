<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<a href="gestion.php">retour au tableau de bord</a> 	
	<hr>
<h1>gestion de nos usagers</h1>
<p>ajouter ici un usager</p>
<hr>
<form method="POST" action="ajouter_valider.php" enctype="multipart/form-data">
    
    Nom:<input type="text" name="Nom"><br>
    Prénom:<input type="text" name="Prenom"><br>
    Numéro de téléphone:<input type="tel" name="numtel"><br>
    Adress mail:<input type="email" name="mail"><br>
    Mot de passe:<input type="password" name="mdp"><br>
    <input type="submit" name="Ajouter">
</form>

</tbody>
</table>
</body>
</html>
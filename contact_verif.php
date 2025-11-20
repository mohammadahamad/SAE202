<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $objet = $_POST['objet'];
    $message = $_POST['message'];

    // Vérification du champ prenom
    if (strlen($prenom) < 5) {
        $_SESSION['erreur'] = "Le prénom doit comporter au moins 5 caractères.";
        header('Location: contact.php');
        exit();
    }

    // Vérification du champ nom
    if (strlen($nom) < 5) {
        $_SESSION['erreur'] = "Le nom doit comporter au moins 5 caractères.";
        header('Location: contact.php');
        exit();
    }

    // Vérification de l'adresse email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['erreur'] = "L'adresse email n'est pas valide.";
        header('Location: contact.php');
        exit();
    }

    // Vérification du champ objet
    if (strlen($objet) < 5) {
        $_SESSION['erreur'] = "L'objet doit comporter au moins 5 caractères.";
        header('Location: contact.php');
        exit();
    }

    // Vérification du champ message
    if (strlen($message) < 10) {
        $_SESSION['erreur'] = "Le message doit comporter au moins 10 caractères.";
        header('Location: contact.php');
        exit();
    }

    // Vérification de sécurité contre les injections SQL
    if (!preg_match('/^[a-zA-Z0-9\s]+$/', $prenom) || !preg_match('/^[a-zA-Z0-9\s]+$/', $nom) || !preg_match('/^[a-zA-Z0-9\s]+$/', $objet) || !preg_match('/^[a-zA-Z0-9\s]+$/', $message)) {
        $_SESSION['erreur'] = "Veuillez entrer des caractères alphanumériques uniquement.";
        header('Location: contact.php');
        exit();
    }

    // Traitement du message (vous pouvez personnaliser cette partie selon vos besoins)

    // Exemple de traitement : envoi du message par e-mail
    $destinataire = 'mmi22h14@mmi-troyes.fr';
    $sujet = 'Nouveau message de la part de ' . $prenom . ' ' . $nom;
    $contenu = "Prénom : $prenom\n";
    $contenu .= "Nom : $nom\n";
    $contenu .= "Email : $email\n";
    $contenu .= "Objet : $objet\n";
    $contenu .= "Message :\n$message";

    // Vous pouvez personnaliser l'en-tête du message si nécessaire
    $headers = 'From: ' . $prenom . ' ' . $nom . ' <' . $email . '>' . "\r\n";
    $headers .= 'Reply-To: ' . $email . "\r\n";

    // Envoi du message
    if (mail($destinataire, $sujet, $contenu, $headers)) {
        // Envoi du mail de confirmation à l'expéditeur
        $sujet_confirmation = 'Confirmation - Votre message a été envoyé';
        $contenu_confirmation = "Bonjour $prenom,\n\n";
        $contenu_confirmation .= "Nous vous confirmons que votre message a bien été envoyé et sera traité dans les plus brefs délais.\n\n";
        $contenu_confirmation .= "Cordialement,\nACYET";

        $headers_confirmation = 'From: Votre entreprise <noreply@acyet.com>' . "\r\n";
        $headers_confirmation .= 'Reply-To: Votre entreprise <noreply@acyet.com>' . "\r\n";

        mail($email, $sujet_confirmation, $contenu_confirmation, $headers_confirmation);

        echo "Votre message a été envoyé avec succès. Vous allez recevoir un e-mail de confirmation.";
        header('Location: contact.php');
    } else {
        echo "Une erreur s'est produite lors de l'envoi du message.";
    }
} else {
    // Redirection vers la page de contact si la requête n'est pas de type POST
    header('Location: contact.php');
    exit();
}
?>

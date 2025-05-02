<?php
// Afficher les erreurs (utile pour le débogage)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Importation des classes PHPMailer (à mettre tout en haut)
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

// Si vous n'utilisez pas Composer, utilisez ces require :
require 'phpmailer/Exception.php';
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération et sécurisation des données
    $nom = htmlspecialchars($_POST['nom'] ?? '');
    $prenom = htmlspecialchars($_POST['prenom'] ?? '');
    $email = htmlspecialchars($_POST['email'] ?? '');
    $telephone = htmlspecialchars($_POST['telephone'] ?? '');
    $objet = htmlspecialchars($_POST['objet'] ?? '');
    $message = htmlspecialchars($_POST['message'] ?? '');

    // Validation simple
    if (empty($nom) || empty($prenom) || empty($email) || empty($message)) {
        header("Location: index.php?error=1");
        exit;
    }

    try {
        // Créer une instance de PHPMailer
        $mail = new PHPMailer(true);

        // Configuration SMTP
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'azizicharaf10@gmail.com'; // votre adresse Gmail
        $mail->Password   = 'smsz gzjz rhzu ycpo'; // utilisez un mot de passe d'application Gmail
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;
        $mail->CharSet    = 'UTF-8';

        // Destinataires
        $mail->setFrom($email, $prenom . ' ' . $nom);
        $mail->addAddress('azizicharaf10@gmail.com'); // destinataire
        $mail->addReplyTo($email, $prenom . ' ' . $nom);

        // Contenu
        $mail->isHTML(true);
        $mail->Subject = 'Nouveau message de contact: ' . $objet;

        $mail->Body = "
            <h2>Nouveau message de contact</h2>
            <p><strong>Nom:</strong> $nom</p>
            <p><strong>Prénom:</strong> $prenom</p>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Téléphone:</strong> $telephone</p>
            <p><strong>Objet:</strong> $objet</p>
            <p><strong>Message:</strong></p>
            <p>$message</p>
        ";

        $mail->AltBody = "Nouveau message de contact\n\n"
            . "Nom: $nom\n"
            . "Prénom: $prenom\n"
            . "Email: $email\n"
            . "Téléphone: $telephone\n"
            . "Objet: $objet\n\n"
            . "Message:\n$message";

        $mail->send();

        // Redirection avec succès
        header("Location: ../contact/index.php?success=1");
        exit;

    } catch (Exception $e) {
        echo "Le message n'a pas pu être envoyé. Erreur : {$mail->ErrorInfo}";
    }
} else {
    // Si accès direct, rediriger
    header("Location: ../contact/index.php");
    exit;
}
?>

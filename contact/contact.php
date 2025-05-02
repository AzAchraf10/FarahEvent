<?php
// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire
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
    
    // Utilisation de PHPMailer
    // Assurez-vous d'avoir installé PHPMailer via Composer
    
    // 1. Importez d'abord les classes nécessaires
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP;
    
    // Si vous n'utilisez pas Composer, décommentez ces lignes:
    require '../phpmailer/PHPMailer/Exception.php';
    require '../phpmailer/PHPMailer/PHPMailer.php';
    require '../phpmailer/PHPMailer/SMTP.php';
    
    try {
        // Créer une instance de PHPMailer
        $mail = new PHPMailer(true);
        
        // Configuration du serveur
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com'; // Utilisez Gmail comme serveur SMTP
        $mail->SMTPAuth   = true;
        $mail->Username   = 'azizicharaf10@gmail.com'; // Votre adresse Gmail
        $mail->Password   = 'Azerty123'; // Votre mot de passe Gmail ou mot de passe d'application
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;
        
        // Caractères
        $mail->CharSet = 'UTF-8';
        
        // Destinataires
        $mail->setFrom($email, $prenom . ' ' . $nom);
        $mail->addAddress('azizicharaf10@gmail.com'); // Où vous voulez recevoir les emails
        $mail->addReplyTo($email, $prenom . ' ' . $nom);
        
        // Contenu
        $mail->isHTML(true);
        $mail->Subject = 'Nouveau message de contact: ' . $objet;
        
        // Corps du message en HTML
        $messageHTML = "
        <h2>Nouveau message de contact</h2>
        <p><strong>Nom:</strong> $nom</p>
        <p><strong>Prénom:</strong> $prenom</p>
        <p><strong>Email:</strong> $email</p>
        <p><strong>Téléphone:</strong> $telephone</p>
        <p><strong>Objet:</strong> $objet</p>
        <p><strong>Message:</strong></p>
        <p>$message</p>
        ";
        
        $mail->Body = $messageHTML;
        
        // Version texte du message
        $mail->AltBody = "Nouveau message de contact\n\n"
            . "Nom: $nom\n"
            . "Prénom: $prenom\n"
            . "Email: $email\n"
            . "Téléphone: $telephone\n"
            . "Objet: $objet\n\n"
            . "Message:\n$message";
        
        // Envoyer l'email
        $mail->send();
        
        // Rediriger avec un message de succès
        header("Location: index.php?success=1");
        exit;
    } catch (Exception $e) {
        echo "Le message n'a pas pu être envoyé. Erreur: {$mail->ErrorInfo}";
    }
} else {
    // Si quelqu'un essaie d'accéder directement à ce fichier
    header("Location: index.php");
    exit;
}
?>
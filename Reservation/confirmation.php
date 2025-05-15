<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation de réservation</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        .confirmation-container {
            max-width: 800px;
            margin: 50px auto;
            padding: 30px;
            background-color: #f9f9f9;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
            text-align: center;
        }
        
        .confirmation-icon {
            font-size: 80px;
            color: #9ba21a;
            margin-bottom: 20px;
        }
        
        .confirmation-title {
            font-family: "Parisienne", cursive;
            font-size: 36px;
            margin-bottom: 20px;
            color: #17191b;
        }
        
        .confirmation-message {
            font-size: 18px;
            line-height: 1.6;
            margin-bottom: 30px;
        }
        
        .back-button {
            display: inline-block;
            background: #9ba21a;
            color: white;
            padding: 12px 25px;
            border-radius: 5px;
            text-decoration: none;
            font-family: "Parisienne", cursive;
            font-size: 20px;
            transition: all 0.3s ease;
        }
        
        .back-button:hover {
            background: #8a901a;
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    <?php include '../nav.php'; ?>
    
    <div class="confirmation-container">
        <div class="confirmation-icon">
            <i class="fas fa-check-circle"></i>
        </div>
        <h1 class="confirmation-title">Réservation Confirmée!</h1>
        <p class="confirmation-message">
            Nous avons bien reçu votre demande de réservation. Notre équipe va l'examiner et vous contactera dans les plus brefs délais pour finaliser les détails.
            <br><br>
            Merci de nous avoir choisis pour votre événement spécial!
        </p>
        <a href="../index.php" class="back-button">Retour à l'accueil</a>
    </div>
    
    <?php include '../footer.html'; ?>
</body>
</html>
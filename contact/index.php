<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="/FarahEvent/styles/fonts.css">
</head>
<body>
    <?php include '../nav.php'; ?>
    <div class="first-image">
        <div>le début d'une belle histoire</div>
        <h2>Contactez-Nous</h2>
    </div>

    <div class="contact-wrapper">
    <form class="contact-form" action="contact.php" method="POST">
            
            <div class="form-group">
                <label>Nom :</label>
                <input name="nom" type="text" required>
            </div>

            <div class="form-group">
                <label>Prénom :</label>
                <input type="text" name="prenom" required>
            </div>

            <div class="form-group">
                <label>Email :</label>
                <input name="email" type="email">
            </div>

            <div class="form-group">
                <label>Téléphone :</label>
                <input type="tel" name="telephone" required>
            </div>

            <div class="form-group">
                <label>Objet :</label>
                <select name="objet" required>
                    <option value=""  >Problème</option>
                    <option value="" selected>Question</option>
                </select>
            </div>

            <div class="form-group">
                <label>Message :</label>
                <textarea name="message" rows="6" required></textarea>
            </div>

            <button type="submit" class="btn-envoyer">Envoyer</button>
        </form>

        <div class="map-container">
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d20897.28973320809!2d-1.933003169473047!3d34.68134267634812!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd7864b0b90574a9%3A0x5e9d699243adcfd8!2sOujda%2C%20Maroc!5e0!3m2!1sfr!2sfr!4v1716864865843!5m2!1sfr!2sfr" 
                width="100%" 
                height="100%" 
                style="border:0;" 
                allowfullscreen="" 
                loading="lazy" 
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
    </div>

    <section class="packs">
        <h2>Célébrez votre événement comme vous l'avez toujours rêvé !</h2>
        <div class="pack-buttons">
            <a href="../Reservation/index.php"><button class="btn-pack">Réserver Maintenant</button></a>
        </div>
    </section>
    <?php include '../footer.html'; ?>
</body>
</html>
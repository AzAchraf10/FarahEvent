<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farah Event - Organisation de Mariages</title>
    <meta name="description" content="Agence d'organisation de mariages à Oujda, spécialisée dans les événements sur mesure et prestations haut de gamme.">
    <link rel="stylesheet" href="/FarahEvent/styles/index.css">
    <link rel="stylesheet" href="/FarahEvent/styles/fonts.css">
</head>
<body>
    <?php include 'nav.html'; ?>
    
    <header class="hero">
        <video autoplay muted loop playsinline>
            <source src="/FarahEvent/include/images/video.mp4" type="video/mp4">
            Votre navigateur ne supporte pas la vidéo.
        </video>
        <h1>Célébrez Votre Mariage</h1>
        <a href="/FarahEvent/Reservation/index.php">Réservez dès maintenant</a>
    </header>
    
    <main>
        <section class="bienvenue">
            <div>
                <h2>Bienvenue</h2>
                <h3>Découvrez l'expérience DreamEvents</h3>
                <p>À la recherche d'une équipe exceptionnelle pour créer le mariage de vos rêves ? Notre agence Dream Events, située au cœur de Oujda, vous propose un service sur mesure, professionnel et chaleureux. Laissez-nous vous accompagner dans la réalisation d'un événement inoubliable pour célébrer votre amour.</p>
                <a href="/FarahEvent/apropos.php">Lire plus</a>
            </div>
            <div class="video-container">
                <video id="weddingVideo" poster="/FarahEvent/include/images/img1.webp">
                    <source src="/FarahEvent/include/images/wedding1.mp4" type="video/mp4">
                    Votre navigateur ne supporte pas la lecture des vidéos.
                </video>
                <button class="play-btn" aria-label="Lire la vidéo">
                    <img src="/FarahEvent/include/icons/circle-play.svg" alt="Bouton lecture">
                </button>
            </div>
        </section>
   
        <section class="prestation">
            <div class="first-part">
                <h2>Nos Prestations</h2>
                <p>Offrant des espaces élégants, des décorations exquises, une beauté de mariée impeccable, une gastronomie exceptionnelle et des animations envoûtantes, notre service de mariage tout-en-un garantit que chaque détail de votre jour spécial est pris en charge avec perfection.</p>
            </div>
            <div class="cards">
                <div class="restauration">
                    <img src="/FarahEvent/include/images/restauration.webp" alt="Service de restauration pour mariage">
                    <a href="/FarahEvent/Prestation/Restauration/index.php">Restauration</a>
                </div>
                <div class="espace">
                    <img src="/FarahEvent/include/images/espace.webp" alt="Espaces et décorations de mariage">
                    <a href="/FarahEvent/Prestation/Espace&Décoration/index.php">Espace & Décoration</a>
                </div>
                <div class="beaute">
                    <img src="/FarahEvent/include/images/beaute.webp" alt="Service de beauté pour la mariée">
                    <a href="/FarahEvent/Prestation/Beauté_mariée/index.php">Beauté de la mariée</a>
                </div>
            </div>
        </section>
    </main>
    
    <?php include 'footer.html'; ?>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const video = document.getElementById("weddingVideo");
            const button = document.querySelector(".play-btn");
            
            button.addEventListener('click', function() {
                if (video.paused) {
                    video.play();
                    button.style.display = "none"; // Cache le bouton après le démarrage
                }
            });
            
            // Réafficher le bouton quand la vidéo est terminée
            video.addEventListener('ended', function() {
                button.style.display = "block";
            });
        });
    </script>
</body>
</html>
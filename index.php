<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farah Event</title>
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
        <h1>Célébrer Votre Mariage</h1>
        <a href="/FarahEvent/Reservation/index.php">Résérvez dès maintenant</a>
    </header>
        <section class="bienvenue">
            <div>
                <h2>Bienvenue</h2>
                <h3>Découvrir l'expérience DreamEvents</h3>
                <p>À la recherche d’une équipe exceptionnelle pour créer le mariage de vos rêves ? Notre agence de Dream Events, située au cœur de Oujda, vous propose un service sur mesure, professionnel et chaleureux. Laissez-nous vous accompagner dans la réalisation d’un événement inoubliable pour célébrer votre amour. </p>
                <a href="">lire plus</a>
            </div>
            <div class="video-container">
                <video id="weddingVideo" poster="/FarahEvent/include/images/img1.webp">
                    <source src="/FarahEvent/include/images/wedding1.mp4" type="video/mp4">
                    Votre navigateur ne supporte pas la lecture des vidéos.
                </video>
                <button class="play-btn" onclick="playVideo()">
                    <img src="/FarahEvent/include/icons/circle-play.svg" alt="play">
                </button>
            </div>
            
        </section>
    
        <section class="prestation">
            <div class="first-part">
                <div>
                    <h2>Nos Prestations</h2>
                </div>
                <p>Offrant des espaces élégants, des décorations exquises, une beauté de mariée impeccable, une gastronomie exceptionnelle et des animations envoûtantes, notre service de mariage tout-en-un garantit que chaque détail de votre jour spécial est pris en charge avec perfection.</p>
            </div>
            <div class="cards">
                <div class="restauration">
                    <img src="/FarahEvent/include/images/restauration.webp" alt="Restauration">
                    <h4>Restauration</h4>
                </div>
                <div class="espace">
                    <img src="/FarahEvent/include/images/espace.webp" alt="Espace & Decoration">
                    <h4>Espace & Decoration</h4>
                </div>
                <div class="beaute">
                    <img src="/FarahEvent/include/images/beaute.webp" alt="Beauté de la mariée">
                    <h4>Beauté de la mariée</h4>
                </div>
            </div>
        </section>
    <?php include 'footer.html'; ?>
    <script>
        function playVideo() {
            var video = document.getElementById("weddingVideo");
            var button = document.querySelector(".play-btn");
    
            if (video.paused) {
                video.play();
                button.style.display = "none"; // Cache le bouton après le démarrage
            }
        }
    </script>
    
</body>
</html>
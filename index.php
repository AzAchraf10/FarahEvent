<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farah Event</title>
    <link rel="stylesheet" href="styles/index.css">
    <link rel="stylesheet" href="styles/fonts.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <?php include 'nav.html'; ?>
    <header class="hero">
        <video autoplay muted loop playsinline>
            <source src="include/images/video.mp4" type="video/mp4">
            Votre navigateur ne supporte pas la vidéo.
        </video>
        <h1>Célébrer Votre Mariage</h1>
        <a href="">Résérvez dès maintenant</a>
    </header>
        <section class="bienvenue">
            <div>
                <h2>Bienvenue</h2>
                <h3>Découvrir l'expérience DreamEvents</h3>
                <p>À la recherche d’une équipe exceptionnelle pour créer le mariage de vos rêves ? Notre agence de Dream Events, située au cœur de Oujda, vous propose un service sur mesure, professionnel et chaleureux. Laissez-nous vous accompagner dans la réalisation d’un événement inoubliable pour célébrer votre amour. </p>
                <a href="">lire plus</a>
            </div>
            <div class="video-container">
                <video id="weddingVideo" poster="include/images/img1.webp">
                    <source src="include/images/wedding1.mp4" type="video/mp4">
                    Votre navigateur ne supporte pas la lecture des vidéos.
                </video>
                <button class="play-btn" onclick="playVideo()">
                    <img src="include/icons/circle-play.svg" alt="play">
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
                    <img src="include/images/restauration.webp" alt="Restauration">
                    <h4>Restauration</h4>
                </div>
                <div class="espace">
                    <img src="include/images/espace.webp" alt="Espace & Decoration">
                    <h4>Espace & Decoration</h4>
                </div>
                <div class="beaute">
                    <img src="include/images/beaute.webp" alt="Beauté de la mariée">
                    <h4>Beauté de la mariée</h4>
                </div>
                <div class="animations">
                    <img src="include/images/animation.webp" alt="Animations">
                    <h4>Animations</h4>
                </div>
            </div>
        </section>
    
        <section class="container my-5 text-center">
            <h2>Ils parlent de nous</h2>
            <h3 class="section-title mb-4">Témoignages</h3>
            <div class="row justify-content-center">
        
                <!-- Témoignage 1 -->
                <div class="col-md-3">
                    <div class="testimonial-card p-3 mb-4">
                        <!-- Avatar cercle avec initiale -->
                        <div class="avatar-circle mx-auto mb-2">
                            <span class="initial">Z</span>
                        </div>
                        <h5 class="mb-1">Zineb Loukili</h5>
                        <small class="text-muted">2023-10-17</small>
                        <!-- Étoiles -->
                        <div class="stars my-2">★★★★★</div>
                        <p class="comment">
                            Une salle spacieuse et très bien aménagée avec ascenseur
                            sur trois niveaux.
                        </p>
                    </div>
                </div>
        
                <!-- Témoignage 2 -->
                <div class="col-md-3">
                    <div class="testimonial-card p-3 mb-4">
                        <div class="avatar-circle mx-auto mb-2">
                            <span class="initial">S</span>
                        </div>
                        <h5 class="mb-1">Salah Tahir</h5>
                        <small class="text-muted">2023-10-19</small>
                        <div class="stars my-2">★★★★★</div>
                        <p class="comment">
                            Muy buena sitio para celebrar bodas.
                        </p>
                    </div>
                </div>
        
                <!-- Témoignage 3 -->
                <div class="col-md-3">
                    <div class="testimonial-card p-3 mb-4">
                        <div class="avatar-circle mx-auto mb-2">
                            <span class="initial">Y</span>
                        </div>
                        <h5 class="mb-1">Youssef El Khnysy</h5>
                        <small class="text-muted">2023-10-25</small>
                        <div class="stars my-2">★★★★★</div>
                        <p class="comment">
                            صالة جميلة
                        </p>
                    </div>
                </div>
        
                <!-- Témoignage 4 -->
                <div class="col-md-3">
                    <div class="testimonial-card p-3 mb-4">
                        <div class="avatar-circle mx-auto mb-2">
                            <span class="initial">T</span>
                        </div>
                        <h5 class="mb-1">Toutou Amine</h5>
                        <small class="text-muted">2025-01-16</small>
                        <div class="stars my-2">★★★★★</div>
                        <p class="comment">
                            Une salle de fêtes spacieuse propre. Je la commande.
                        </p>
                    </div>
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
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
    <!-- Ajoutez cette section avant la fermeture de la balise main -->

<section class="temoignages">
    <div class="first-part">
        <h2>Témoignage</h2>
        <p>Découvrez ce que nos clients pensent de nos services. Nous sommes fiers de créer des mariages inoubliables qui dépassent les attentes.</p>
    </div>
    <div class="testimonials-container">
        <!-- Premier témoignage -->
        <div class="testimonial">
            <div class="client-info">
                <div class="client-avatar">
                    <span>Z</span>
                    <img src="/FarahEvent/include/icons/google-icon.svg" alt="Google" class="google-icon">
                </div>
                <div class="client-details">
                    <h4>Zineb Loukili</h4>
                    <span class="date">2023-10-17</span>
                </div>
            </div>
            <div class="rating">
                <span class="star">★</span>
                <span class="star">★</span>
                <span class="star">★</span>
                <span class="star">★</span>
                <span class="star">★</span>
            </div>
            <p class="testimonial-text">Une salle spacieuse et très bien aménagée avec ascenseur et sur trois niveaux</p>
        </div>

        <!-- Deuxième témoignage -->
        <div class="testimonial">
            <div class="client-info">
                <div class="client-avatar">
                    <span>S</span>
                    <img src="/FarahEvent/include/icons/google-icon.svg" alt="Google" class="google-icon">
                </div>
                <div class="client-details">
                    <h4>salah tahir</h4>
                    <span class="date">2023-10-15</span>
                </div>
            </div>
            <div class="rating">
                <span class="star">★</span>
                <span class="star">★</span>
                <span class="star">★</span>
                <span class="star">★</span>
                <span class="star">★</span>
            </div>
            <p class="testimonial-text">Muy buen sitio para celebrar bodas</p>
        </div>

        <!-- Troisième témoignage -->
        <div class="testimonial">
            <div class="client-info">
                <div class="client-avatar">
                    <span>Y</span>
                    <img src="/FarahEvent/include/icons/google-icon.svg" alt="Google" class="google-icon">
                </div>
                <div class="client-details">
                    <h4>YOUSSEF EL KHMYSY</h4>
                    <span class="date">2023-10-09</span>
                </div>
            </div>
            <div class="rating">
                <span class="star">★</span>
                <span class="star">★</span>
                <span class="star">★</span>
                <span class="star">★</span>
                <span class="star">★</span>
            </div>
            <p class="testimonial-text">جميل جدا</p>
        </div>

        <!-- Quatrième témoignage -->
        <div class="testimonial">
            <div class="client-info">
                <div class="client-avatar">
                    <span>T</span>
                    <img src="/FarahEvent/include/icons/google-icon.svg" alt="Google" class="google-icon">
                </div>
                <div class="client-details">
                    <h4>Toutou Amine</h4>
                    <span class="date">2023-09-16</span>
                </div>
            </div>
            <div class="rating">
                <span class="star">★</span>
                <span class="star">★</span>
                <span class="star">★</span>
                <span class="star">★</span>
                <span class="star">★</span>
            </div>
            <p class="testimonial-text">Une salle de fêtes spacieuse propre. Je le commande</p>
        </div>
    </div>
</section>

<section class="avis-client">
    <div class="first-part">
        <h2>Votre Avis</h2>
        <p>Partagez votre expérience avec nous et aidez-nous à améliorer nos services pour les futurs mariés.</p>
    </div>
    <div class="form-container">
        <form id="testimonial-form" action="/FarahEvent/submit_testimonial.php" method="POST">
            <div class="form-row">
                <div class="form-group">
                    <label for="name">Nom complet</label>
                    <input type="text" id="name" name="name" required>
                </div>
                
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>
            </div>
            
            <div class="form-group">
                <label>Votre note</label>
                <div class="rating-select">
                    <input type="radio" id="star5" name="rating" value="5" checked>
                    <label for="star5" title="5 étoiles">★</label>
                    <input type="radio" id="star4" name="rating" value="4">
                    <label for="star4" title="4 étoiles">★</label>
                    <input type="radio" id="star3" name="rating" value="3">
                    <label for="star3" title="3 étoiles">★</label>
                    <input type="radio" id="star2" name="rating" value="2">
                    <label for="star2" title="2 étoiles">★</label>
                    <input type="radio" id="star1" name="rating" value="1">
                    <label for="star1" title="1 étoile">★</label>
                </div>
            </div>
            
            <div class="form-group">
                <label for="message">Votre témoignage</label>
                <textarea id="message" name="message" rows="4" required></textarea>
            </div>
            
            <button type="submit" class="submit-btn">Envoyer votre avis</button>
        </form>
    </div>
</section>
    
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
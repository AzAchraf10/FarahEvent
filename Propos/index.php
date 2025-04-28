<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A propos</title>
    <link rel="stylesheet" href="style.css">
    <!-- Add Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Add Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Parisienne&family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
</head>
<body>
<?php include '../nav.php'; ?>
    <!-- Hero Section -->
    <div class="top">
        <div class="container">
            <h1>À propos de nous</h1>
        </div>
    </div>  

    <!-- About Section -->  
    <section class="histoire">
        <div class="left">
            <h5>Experience</h5>
            <h3>L'histoire de notre agence</h3>
            <p>Depuis plus de 10 ans, DreamEvents est un acteur incontournable de l'événementiel au Maroc. Notre équipe de professionnels expérimentés vous accompagne dans l'organisation de tous vos événements, qu'ils soient privés ou professionnels.</p>
            <p>Nous sommes spécialisés dans la réalisation de mariages, de conférences, de babyshowers… Et de tout autre événement sur mesure. Nous nous adaptons à vos besoins et à votre budget pour vous garantir un événement unique et inoubliable.</p>
            <p>Notre objectif est de vous aider à réaliser l'événement de vos rêves. Nous vous accompagnons à chaque étape de la planification, de la recherche de prestataires à la coordination du jour J. Nous sommes à votre disposition pour répondre à toutes vos questions et vous proposer des solutions adaptées à vos besoins.</p>
        </div>
        <div class="rights" aria-label="Image décorative de notre agence"></div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials-section">
        <h2 class="avis">Ce que pensent les gens</h2>
        <div class="testemony">
            <div class="test-left">
                <div class="testo">  
                    <div class="photo"><img src="images/img.jpg" alt="Client Faty et Ahmed"></div>
                    <div class="nom">Faty & Ahmed</div>
                    <div class="paragraph">"Nous avons été comblés par le travail de Dream Events. Elle a su nous faire vivre un mariage de rêve, dans le respect de nos envies et de notre budget. Nous la recommandons sans hésitation."</div>
                </div>

                <div class="testo">  
                    <div class="photo"><img src="images/img8.jpg" alt="Client Laila et Morad"></div>
                    <div class="nom">Laila & Morad</div>
                    <div class="paragraph">"Dream Events a été d'une aide précieuse pour l'organisation de notre mariage. Elle a su nous écouter, nous guider et nous proposer des solutions adaptées à notre budget et à nos envies. Nous avons passé une journée inoubliable, et nous ne pouvons que recommander ses services."</div>
                </div>

                <div class="testo">  
                    <div class="photo"><img src="images/img9.jpg" alt="Client Abir"></div>
                    <div class="nom">Abir</div>
                    <div class="paragraph">"Dream Events a organisé notre événement à la perfection. Tout était parfait, de la planification à la réalisation. Nous avons eu un excellent retour de nos invités et nous sommes ravis de les avoir fait confiance."</div>
                </div>
                <!-- Testimonial Controls -->
                <div class="testimonial-controls">
                    <span class="control-dot" data-index="0"></span>
                    <span class="control-dot" data-index="1"></span>
                    <span class="control-dot" data-index="2"></span>
                </div>
            </div>
            <div class="test-right" aria-label="Image décorative de témoignages"></div>
        </div>
    </section>
    
    <!-- FAQ Section -->
    <section class="faq-container">
        <div class="faq-header">
            <h2 class="faq-title">FAQ</h2>
            <p class="faq-subtitle">Trouvez rapidement les réponses à vos questions dans notre section FAQ</p>
        </div>
        
        <div class="faq-content">
            <div class="faq-questions">
                <div class="faq-item">
                    <div class="faq-question">Quels types d'événements organisez-vous ?</div>
                    <div class="faq-answer">
                        Nous organisons des mariages, événements d'entreprise, fêtes privées et conférences.
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question">Quels sont les services inclus dans vos honoraires ?</div>
                    <div class="faq-answer">
                        Nos forfaits comprennent la coordination, gestion des prestataires et supervision.
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question">Comment puis-je vous contacter en cas d'urgence ?</div>
                    <div class="faq-answer">
                        Un numéro dédié vous sera fourni 48h avant l'événement.
                    </div>
                </div>
            </div>
            
            <div class="faq-image" aria-label="Image décorative FAQ"></div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section class="gallery-section">
        <h2 class="gallery">Gallery</h2>
        <div class="souvenirs">De beaux souvenirs</div>
        <div class="souv-img">
            <div class="souv-left-one"></div>
            <div class="souv-right-one"></div>
        </div>
        <div class="souv-img">
            <div class="souv-left-two"></div>
            <div class="souv-right-two"></div>
        </div>
        <div class="souv-img">
            <div class="souv-left-three"></div>
            <div class="souv-right-three"></div>
        </div>
    </section>

    <section class="section">
      <h2>Harmonie</h2>
      <p>Célébrez votre événement comme vous l'avez toujours rêvé !</p>

      <div class="buttons">
        <a href="../Reservation/index.php" class="btn btn-gold">Réserver maintenant</a>
      </div>
    </section>

    <script src="index.js"></script>
    <?php include '../footer.html'; ?>
</body>
</html>
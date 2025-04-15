<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace & Décoration</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="../../styles/nav.css">
    <link rel="stylesheet" href="../../styles/fonts.css">
    <link rel="stylesheet" href="../../styles/footer.css">
</head>
<body>
    <?php include '../../nav.html'; ?>
    <div class="image-container">
        <div>Créons ensemble des événements qui resteront gravés dans vos mémoires.</div>
        <h2>Espace & Décoration</h2>
    </div>
    <div class="espace">
        <div class="content">
            <p>Sublimez Vos Événements Avec Élégance et Créativité</p>
        </div>
    </div>
    <div class="filter-buttons">
        <button onclick="filterImages('all', this)" class="nav-btn active">Accueil</button>
        <button onclick="filterImages('cristalle', this)" class="nav-btn">Salle Cristalle</button>
        <button onclick="filterImages('salle1', this)" class="nav-btn">Salle 1</button>
        <button onclick="filterImages('salle2', this)" class="nav-btn">Salle 2</button>
    </div>
    <div class="gallery">
        <img src="include/images/image.png" class="category-cristalle" alt="Salle Cristalle">
        <img src="include/images/image2.jpg" class="category-cristalle" alt="Salle Cristalle">
        <img src="include/images/image3.avif" class="category-cristalle" alt="Salle Cristalle">
        <img src="include/images/image4.jpg" class="category-salle1" alt="Salle 1">
        <img src="include/images/image 5.jpg" class="category-cristalle" alt="Salle Cristalle">
        <img src="include/images/image6.jpg" class="category-salle2" alt="Salle 2">
    </div>
    <div class="discover-button">
        <button onclick="window.location.href='../index.php'" class="btn-discover">Découvrir toutes les prestations</button>
    </div>
    <section class="packs">
        <h2>Harmonie</h2>
        <p>Célébrez votre événement comme vous l'avez toujours rêvé !</p>
        <div class="pack-buttons">
            <a href="/FarahEvent/Reservation/index.php">
                <button class="btn-pack customize">
                    Réserver maintenant
                    <i class="fa-regular fa-paper-plane"></i>
                </button>
            </a>
        </div>
    </section>
    <?php include '../../footer.html'; ?>
    <script>
        // Mettre le premier bouton en actif par défaut
        document.addEventListener('DOMContentLoaded', function() {
            const firstButton = document.querySelector('.nav-btn');
            if (firstButton) {
                firstButton.classList.add('active');
            }
        });

        function filterImages(category, clickedBtn) {
            const images = document.getElementsByTagName('img');
            for (let img of images) {
                if (category === 'all') {
                    img.style.display = 'block';
                } else {
                    if (img.classList.contains('category-' + category)) {
                        img.style.display = 'block';
                    } else {
                        img.style.display = 'none';
                    }
                }
            }
            
            const buttons = document.querySelectorAll('.nav-btn');
            buttons.forEach(btn => btn.classList.remove('active'));
            clickedBtn.classList.add('active');
        }
    </script>
</body>
</html>
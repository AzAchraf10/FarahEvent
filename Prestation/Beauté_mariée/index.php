<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beauté de la mariée</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="../../styles/nav.css">
    <link rel="stylesheet" href="../../styles/fonts.css">
    <link rel="stylesheet" href="../../styles/footer.css">
</head>
<body>
    <?php include '../../nav.html'; ?>
    
    <div class="image-container">
        <div>Éclat et élégance pour une beauté inoubliable.</div>
        <h2>Beauté de la mariée</h2>
    </div>
    
    <div class="espace">
        <div class="content">
            <p>Sublimez-vous le Jour J</p>
        </div>
    </div>
    
    <div class="filter-buttons">
        <button onclick="filterImages('all', this)" class="nav-btn active">Accueil</button>
        <button onclick="filterImages('Hanaa', this)" class="nav-btn">Hanaa</button>
        <button onclick="filterImages('Amaria', this)" class="nav-btn">Amaria</button>
        <button onclick="filterImages('Dfouaa', this)" class="nav-btn">Dfouaa</button>
        <button onclick="filterImages('Nggafa', this)" class="nav-btn">Nggafa</button>
    </div>
    
    <div class="gallery">
        <img src="include/images/image1.jpg" alt="Hanaa" class="category-Hanaa">
        <img src="include/images/image2.jpg" alt="Amaria" class="category-Amaria">
        <img src="include/images/image3.jpg" alt="Hanaa" class="category-Hanaa">
        <img src="include/images/image4.jpg" alt="Hanaa" class="category-Hanaa">
        <img src="include/images/image5.jpg" alt="Amaria" class="category-Amaria">
        <img src="include/images/image6.jpg" alt="Amaria" class="category-Amaria">
        <img src="include/images/image7.jpg" alt="Hanaa" class="category-Hanaa">
        <img src="include/images/image8.jpg" alt="Nggafa" class="category-Nggafa">
        <img src="include/images/image12.webp" alt="Nggafa" class="category-Nggafa">
        <img src="include/images/image10.png" alt="Dfouaa" class="category-Dfouaa">
        <img src="include/images/image11.png" alt="Dfouaa" class="category-Dfouaa">
    </div>
    
    <div class="discover-button">
        <a href="../index.php" class="btn-discover">Découvrir toutes les prestations</a>
    </div>
    
    <section class="packs">
        <h2>Harmonie</h2>
        <p>Célébrez votre événement comme vous l'avez toujours rêvé !</p>
        <a href="/FarahEvent/Reservation/index.php">
        <div class="pack-buttons">
            <button class="btn-pack customize">Réserver maintenant
                <i class="fa-regular fa-paper-plane"></i>
            </button>
        </div>
        </a>
    </section>
    
    <?php include '../../footer.html'; ?>
    
    <script>
        function filterImages(category, clickedBtn) {
            const images = document.querySelectorAll('.gallery img');
            
            images.forEach(img => {
                if (category === 'all') {
                    img.style.display = 'block';
                } else {
                    if (img.classList.contains('category-' + category)) {
                        img.style.display = 'block';
                    } else {
                        img.style.display = 'none';
                    }
                }
            });
            
            const buttons = document.querySelectorAll('.nav-btn');
            buttons.forEach(btn => btn.classList.remove('active'));
            clickedBtn.classList.add('active');
        }
        
        // Définir "Accueil" comme bouton actif par défaut lors du chargement
        document.addEventListener('DOMContentLoaded', function() {
            const defaultBtn = document.querySelector('.nav-btn');
            if (defaultBtn) {
                defaultBtn.classList.add('active');
            }
        });
    </script>
</body>
</html>
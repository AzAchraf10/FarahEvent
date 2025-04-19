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
        <img src="include/pictures/hanna1.jpg" alt="Hanaa" class="category-Hanaa">
        <img src="include/pictures/hanna2.jpeg" alt="Hanaa" class="category-Hanaa">
        <img src="include/pictures/hanna3.jpg" alt="Hanaa" class="category-Hanaa">
        <img src="include/pictures/hanna4.jpg" alt="Hanaa" class="category-Hanaa">
        <img src="include/pictures/hanna5.jpg" alt="Hanaa" class="category-Hanaa">
        <img src="include/pictures/amaria1.jpg" alt="Amaria" class="category-Amaria">
        <img src="include/pictures/amaria2.jpg" alt="Amaria" class="category-Amaria">
        <img src="include/pictures/amaria3.jpg" alt="Amaria" class="category-Amaria">
        <img src="include/pictures/amaria4.jpg" alt="Amaria" class="category-Amaria">
        <img src="include/pictures/amaria5.jpg" alt="Amaria" class="category-Amaria">
        <img src="include/pictures/amaria6.jpg" alt="Amaria" class="category-Amaria">
        <img src="include/pictures/dfouaa1.jpg" alt="Dfouaa" class="category-Dfouaa">
        <img src="include/pictures/dfouaa2.jpg" alt="Dfouaa" class="category-Dfouaa">
        <img src="include/pictures/dfouaa3.jpg" alt="Dfouaa" class="category-Dfouaa">
        <img src="include/pictures/dfouaa4.jpg" alt="Dfouaa" class="category-Dfouaa">
        <img src="include/pictures/dfouaa4.png" alt="Dfouaa" class="category-Dfouaa">
        <img src="include/pictures/neggafa1.jpg" alt="Nggafa" class="category-Nggafa">
        <img src="include/pictures/neggafa2.jpg" alt="Nggafa" class="category-Nggafa">
        <img src="include/pictures/neggafa3.jpg" alt="Nggafa" class="category-Nggafa">
        <img src="include/pictures/neggafa4.jpg" alt="Nggafa" class="category-Nggafa">
        <img src="include/pictures/neggafa5.jpg" alt="Nggafa" class="category-Nggafa">
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
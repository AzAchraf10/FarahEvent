<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restauration</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="../../styles/nav.css">
    <link rel="stylesheet" href="../../styles/fonts.css">
    <link rel="stylesheet" href="../../styles/footer.css"> 
</head>
<body>
    <?php include '../../nav.php'; ?>
    <div class="image-container">
        <div>Succombez à notre menu raffiné et surprenez vos événements</div>
        <h2>Restauration</h2>
    </div>
    <div class="restauration">
        <div class="content">
            <p>Saveurs Inoubliables pour Vos Événements Exceptionnels !</p>
        </div>
    </div>
    <div class="filter-buttons">
        <button onclick="filterImages('all', this)" class="nav-btn active">Accueil</button>
        <button onclick="filterImages('cocktail', this)" class="nav-btn">Cocktail et Réception</button>
        <button onclick="filterImages('soiree', this)" class="nav-btn">Soirée</button>
        <button onclick="filterImages('pieces', this)" class="nav-btn">Pièces Montées</button>
        <button onclick="filterImages('marocain', this)" class="nav-btn">Dîner Marocain</button>
    </div>
    <div class="gallery">
        <img src="include/images/image1.jpg" class="category-marocain" alt="Dîner Marocain">
        <img src="include/images/image2.jpg" class="category-marocain" alt="Dîner Marocain">
        <img src="include/images/image3.jpg" class="category-cocktail" alt="Cocktail et Réception">
        <img src="include/images/image4.jpg" class="category-cocktail" alt="Cocktail et Réception">
        <img src="include/images/image5.jpg" class="category-marocain" alt="Dîner Marocain">
        <img src="include/images/image6.jpg" class="category-marocain" alt="Dîner Marocain">
        <img src="include/images/image7.jpg" class="category-marocain" alt="Dîner Marocain">
        <img src="include/images/image8.jpg" class="category-pieces" alt="Pièces Montées">
        <img src="include/images/image9.jpg" class="category-marocain" alt="Dîner Marocain">
        <img src="include/images/image10.jpg" class="category-pieces" alt="Pièces Montées">
        <img src="include/images/image11.jpg" class="category-pieces" alt="Pièces Montées">
        <img src="include/images/image12.jpg" class="category-cocktail" alt="Cocktail et Réception">
        <img src="include/images/image13.jpeg" class="category-marocain" alt="Dîner Marocain">
        <img src="include/images/image14.jpg" class="category-soiree" alt="Soirée">
        <img src="include/images/image15.jpg" class="category-soiree" alt="Soirée">
        <img src="include/images/image17.jpg" class="category-marocain" alt="Dîner Marocain">
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
        document.addEventListener('DOMContentLoaded', function() {
            // Activer le premier bouton par défaut
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prestation</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="/FarahEvent/styles/fonts.css">
</head>
<body>
    <?php include '../nav.php'; ?>
    <div class="first-image">
        <h5>Créons ensemble des événements qui resteront gravés dans vos mémoires.</h5>
        <h2>Prestation</h2>
    </div>
    
    <div class="discover">
        <h3>Decouvrir nos prestation</h3>
        <p>Offrez-vous une prestation complète pour votre mariage avec animation, restauration, espace et décoration, ainsi que des services de beauté pour la mariée. Créez des moments inoubliables dans un cadre magnifique et harmonieux.</p>
    </div>
    
    <div class="trio-box">
        <div class="image-box">
            <img src="include/images/restauration.jpg" alt="Restauration">
            <div class="content-overlay">
                <h2>Restauration</h2>
                <a href="Restauration/index.php"><button class="discover-button">Découvrir plus</button></a>
            </div>
        </div>
        
        <div class="image-box">
            <img src="include/images/espace.jpg" alt="Espace & Decoration">
            <div class="content-overlay">
                <h2>Espace & Decoration</h2>
                <a href="Espace&Décoration/index.php"><button class="discover-button">Découvrir plus</button></a>
            </div>
        </div>
        
        <div class="image-box">
            <img src="include/images/marie.jpg" alt="Beaute de la mariee">
            <div class="content-overlay">
                <h2>Beauté de la mariée</h2>
                <a href="Beauté_mariée/index.php"><button class="discover-button">Découvrir plus</button></a>
            </div>
        </div>
    </div>


    <div class="espace-section">
        <div class="espace-container">
            <div class="espace-content">
                <h5 class="espace-subtitle">Nos prestation</h5>
                <h2 class="espace-title">Espace & Decoration</h2>
                <div class="gold-line"></div>
                
                <div class="espace-gallery">
                    <div class="gallery-item">
                        <img src="include/images/salle1.jpg" alt="Salle 1">
                        <p>Salle Cristal</p>
                    </div>
                    <div class="gallery-item">
                        <img src="include/images/salle2.jpg" alt="Salle 2">
                        <p>Salle Diamond</p>
                    </div>
                    <div class="gallery-item">
                        <img src="include/images/salle3.jpg" alt="Salle 3">
                        <p>Salle Imperial</p>
                    </div>
                </div>
                
                <a href="Espace&Décoration/index.php"><button class="cta-button">Savoir plus</button></a>
            </div>
            
            <div class="espace-image">
                <img src="include/images/salle2.jpg" alt="Décoration d'espace">
            </div>
        </div>
    </div>

    
    <div class="restauration-section">
        <div class="restauration-container">
            <div class="restauration-image">
                <img src="include/images/restau.jpg" alt="Service restauration">
            </div>
            
            <div class="restauration-content">
                <h5 class="restauration-subtitle">Nos spécialités</h5>
                <h2 class="restauration-title">Restauration</h2>
                <div class="gold-line"></div>
                
                <div class="restauration-gallery">
                    <div class="gallery-item">
                        <img src="include/images/mange1.jpg" alt="Accueil">
                        <p>Accueil</p>
                    </div>
                    <div class="gallery-item">
                        <img src="include/images/mange2.jpeg" alt="Dîner">
                        <p>Dîner</p>
                    </div>
                    <div class="gallery-item">
                        <img src="include/images/mange3.jpg" alt="Fruits">
                        <p>Fruits</p>
                    </div>
                    <div class="gallery-item">
                        <img src="include/images/mange4.jpg" alt="Fruits de mer">
                        <p>Fruits de mer</p>
                    </div>
                    <div class="gallery-item">
                        <img src="include/images/mange5.jpeg" alt="Salée">
                        <p>Salée</p>
                    </div>
                </div>
                
                <a href="Restauration/index.php"><button class="cta-button">Voir le menu</button></a>
            </div>
        </div>
    </div>

    <div class="beaute-section">
        <div class="beaute-container">
            <div class="beaute-content">
                <h5 class="beaute-subtitle">Nos prestation</h5>
                <h2 class="beaute-title">Beauté De La Mariée</h2>
                <div class="gold-line"></div>
                
                <div class="beaute-gallery">
                    <div class="gallery-item">
                        <img src="include/images/nagafa.jpg" alt="Salle 1">
                        <p>Neggafa</p>
                    </div>
                    <div class="gallery-item">
                        <img src="include/images/Amaria.jpg" alt="Salle 2">
                        <p>Amaria</p>
                    </div>
                    <div class="gallery-item">
                        <img src="include/images/Dafoue.jpg" alt="Salle 3">
                        <p>Dfouaa</p>
                    </div>
                    <div class="gallery-item">
                        <img src="include/images/makeup.jpg" alt="Salle 4">
                        <p>Makeup</p>
                    </div>
                    <div class="gallery-item">
                        <img src="include/images/henna.jpg" alt="Salle 5">
                        <p>Henna</p>
                    </div>
                </div>
                
                <a href="Beauté_mariée/index.php"><button class="cta-button">Savoir plus</button></a>
            </div>
            
            <div class="espace-image">
                <img src="include/images/salle2.jpg" alt="Décoration d'espace">
            </div>
        </div>
    </div>

    <section class="packs">
        <h2>Célébrez votre événements comme vous l'avez toujours rêvé !</h2>
      
        <div class="pack-buttons">
            <a href="../Reservation/index.php"><button class="btn-pack discover">Réserver maintenant</button></a>
          
        </div>
    </section>
    <?php include '../footer.html'; ?>
</body>
</html>
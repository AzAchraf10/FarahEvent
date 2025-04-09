<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restauration</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>
<body>
    <?php include '../../nav.html'; ?>
    <div class="image-container">
        <div>Succombez à notre menu raffiné et surprenez vos événements</div>
        <h2>Restauration</h2>
    </div>
    <div class="restauration">
        <div class="content">
            <p>Saveurs Inoubliables pour Vos Evenements Exeptionnels ! </p>
        </div>
    </div>
    <div style="padding: 15px; text-align: center;">
        <button onclick="filterImages('all',this)" class="nav-btn">Accueil</button>
        <button onclick="filterImages('cocktail',this)" class="nav-btn">Cocktail et Réception</button>
        <button onclick="filterImages('soirée',this)" class="nav-btn">soirée</button>
        <button onclick="filterImages('pieces',this)" class="nav-btn">Pièces Montées</button>
        <button onclick="filterImages('marocain',this)" class="nav-btn">Dîner Marocain</button>
    </div>
    <div class="gallery">
        <img src="include/images/image1.jpg"class="category-marocain">
        <img src="include/images/image2.jpg"class="category-marocain">
        <img src="include/images/image3.jpg"class="category-cocktail">
        <img src="include/images/image4.jpg"class="category-cocktail">
        <img src="include/images/image5.jpg"class="category-marocain">
        <img src="include/images/image6.jpg"class="category-marocain">
        <img src="include/images/image7.jpg"class="category-marocain">
        <img src="include/images/image8.jpg"class="category-pieces">
        <img src="include/images/image9.jpg"class="category-marocain">
        <img src="include/images/image10.jpg"class="category-pieces">
        <img src="include/images/image11.jpg"class="category-pieces">
        <img src="include/images/image12.jpg"class="category-cocktail">
        <img src="include/images/image13.jpeg"class="category-marocain">
        <img src="include/images/image14.jpg"class="category-soirée">
        <img src="include/images/image15.jpg"class="category-soirée">
        <img src="include/images/image17.jpg"class="category-marocain">
    </div>
    <div style="padding: 15px; text-align: center;">
        <button onclick="window.location.href='prestations.html'"style=" background-color: black; color: white; border: none; padding: 10px 20px;cursor: pointer; font-size: 16px; font-weight: bold; border-radius: 5px; transition: 0.3s; margin: 10px; font-family: 'Parisienne', cursive;   font-weight: 400; font-style: normal;"onmouseover="this.style.transform='scale(1.09)'" onmouseout="this.style.transform='scale(1)'">Découvrir toutes les prestations</button>
    </div>
    <section class="packs">
        <h2>Harmonie</h2>
        <p>Célébrez votre événement comme vous l'avez toujours rêvé !</p>
        <div class="pack-buttons">
            <button class="btn-pack customize">Réserver vos maintenant
                <i class="fa-regular fa-paper-plane"></i>
            </button>
        </div>
    </section>
    <?php include '../../footer.html'; ?>
    
    <script>
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
            buttons.forEach(btn => btn.classList.remove('active')); // n7aydou active men koulchi
            clickedBtn.classList.add('active'); // nzidouha ghi 3la dak li tclicka 3lih
        }    
    </script> 
</body>
</html>


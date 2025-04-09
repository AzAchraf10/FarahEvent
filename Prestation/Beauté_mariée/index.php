<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beauté de la mariée</title>
    <link rel="stylesheet" href="style.css">
   <link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>
<body>
    <?php include '../../nav.html'; ?>
    <div class="image-container">
        <div>Éclat et élégance pour une beauté inoubliable.</div>
        <h2>Beauté de la mariée</h2>
    </div>
    <div class="Espace ">
        <div class="content">
            <p>Sublimez-vous le Jour J</p>
        </div>
    </div>
    <div style="padding: 15px; text-align: center;">
        <button onclick="filterImages('all',this)" class="nav-btn">Accueil</button>
        <button onclick="filterImages('Hanaa',this)" class="nav-btn">Hanaa</button>
        <button onclick="filterImages('Amaria',this)" class="nav-btn">Amaria</button>
        <button onclick="filterImages('Dfouaa',this)" class="nav-btn">Dfouaa</button>
        <button onclick="filterImages('Nggafa',this)" class="nav-btn">Nggafa</button>
    </div>
    <div class="gallery">
        <img src="include/images/image1.jpg" class="category-Hanaa">
        <img src="include/images/image2.jpg" class="category-Amaria">
        <img src="include/images/image3.jpg" class="category-Hanaa">
        <img src="include/images/image4.jpg" class="category-Hanaa">
        <img src="include/images/image5.jpg" class="category-Amaria">
        <img src="include/images/image6.jpg" class="category-Amaria">
        <img src="include/images/image7.jpg" class="category-Hanaa">
        <img src="include/images/image8.jpg" class="category-Nggafa">
        <img src="include/images/image12.webp" class="category-Nggafa">
        <img src="include/images/image10.png" class="category-Dfouaa">
        <img src="include/images/image11.png" class="category-Dfouaa">
    </div>
    <div style="padding: 15px; text-align: center;">
        <button onclick="window.location.href='prestations.html'"style=" background-color: black; color: white; border: none; padding: 10px 20px;cursor: pointer; font-size: 16px; font-weight: bold; border-radius: 5px; transition: 0.3s; margin: 10px; font-family: 'Parisienne', cursive;   font-weight: 400; font-style: normal;"onmouseover="this.style.transform='scale(1.09)'" onmouseout="this.style.transform='scale(1)'">Découvrir toutes les prestations</button>
    </div>
    <section class="packs">
        <h2> Harmonie</h2>
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
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dream Events - Beauté de la Mariée</title>
  <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Allura&family=Cormorant+Garamond:ital@1&family=Dancing+Script&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <?php include '../../nav.html'; ?>
  
  <header class="hero">
    <div class="logo">
      <p>Éclat et élégance pour une beauté inoubliable.</p>
      <h1>Beauté de la mariée</h1>
    </div>
  </header>

  <main>
    <section class="intro">
      <h2>Sublimez-vous le Jour J</h2>
      <p>
        Découvrez nos prestations dédiées à la dfouaa, à l'amaria, au maquillage et à la neggafa pour un mariage exceptionnel.
        Faites-vous choyer par nos experts !
      </p>
    </section>

    <nav class="nav-buttons">
      <button class="active" data-group="hanaa">Hanaa</button>
      <button data-group="amaria">Amaria</button>
      <button data-group="dfouaa">Dfouaa</button>
      <button data-group="neggafa">Neggafa</button>
    </nav>

    <div id="hanaa" class="image-group show">
      <img src="include/pictures/hanna1.jpg" alt="Hanaa 1" loading="lazy">
      <img src="include/pictures/hanna2.jpeg" alt="Hanaa 2" loading="lazy">
      <img src="include/pictures/hanna3.jpg" alt="Hanaa 3" loading="lazy">
      <img src="include/pictures/hanna4.jpg" alt="Hanaa 4" loading="lazy">
      <img src="include/pictures/hanna5.jpg" alt="Hanaa 5" loading="lazy">
    </div>

    <div id="amaria" class="image-group">
      <img src="include/pictures/amaria1.jpg" alt="Amaria 1" loading="lazy">
      <img src="include/pictures/amaria2.jpg" alt="Amaria 2" loading="lazy">
      <img src="include/pictures/amaria3.jpg" alt="Amaria 3" loading="lazy">
      <img src="include/pictures/amaria6.jpg" alt="Amaria 6" loading="lazy">
    </div>

    <div id="dfouaa" class="image-group">
      <img src="include/pictures/dfouaa1.jpg" alt="Dfouaa 1" loading="lazy">
      <img src="include/pictures/dfouaa2.jpg" alt="Dfouaa 2" loading="lazy">
      <img src="include/pictures/dfouaa3.jpg" alt="Dfouaa 3" loading="lazy">
      <img src="include/pictures/dfouaa4.png" alt="Dfouaa 4" loading="lazy">
    </div>

    <div id="neggafa" class="image-group">
      <img src="include/pictures/neggafa1.jpg" alt="Neggafa 1" loading="lazy">
      <img src="include/pictures/neggafa2.jpg" alt="Neggafa 2" loading="lazy">
      <img src="include/pictures/neggafa3.jpg" alt="Neggafa 3" loading="lazy">
      <img src="include/pictures/neggafa4.jpg" alt="Neggafa 4" loading="lazy">
      <img src="include/pictures/neggafa5.jpg" alt="Neggafa 5" loading="lazy">
    </div><br>
    <br>
    <div class="buttons">
      <a href="../index.php" class="btn btn-gold">Découvrir tous les prestations</a>
    </div>

    <div class="section">
      <h2>Harmonie</h2>
      <p>Célébrez votre événement comme vous l'avez toujours rêvé !</p>

      <div class="buttons">
        <a href="../../Reservation/index.php" class="btn btn-gold">Réserver maintenant</a>
      </div>
    </div>
  </main>

  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const buttons = document.querySelectorAll('.nav-buttons button');
      
      buttons.forEach(button => {
        button.addEventListener('click', () => {
          // Masquer tous les groupes d'images
          const groups = document.querySelectorAll('.image-group');
          groups.forEach(group => {
            group.classList.remove('show');
            setTimeout(() => {
              group.style.display = 'none';
            }, 300);
          });
          
          // Afficher le groupe sélectionné
          const groupId = button.getAttribute('data-group');
          const selectedGroup = document.getElementById(groupId);
          if (selectedGroup) {
            setTimeout(() => {
              selectedGroup.style.display = 'flex';
              selectedGroup.classList.add('show');
            }, 300);
          }
          
          // Mettre à jour l'état actif du bouton
          buttons.forEach(btn => btn.classList.remove('active'));
          button.classList.add('active');
        });
      });
      
      // Initialiser l'état par défaut au chargement
      document.getElementById('hanaa').style.display = 'flex';
    });
  </script>

  <?php include '../../footer.html'; ?>
</body>
</html>
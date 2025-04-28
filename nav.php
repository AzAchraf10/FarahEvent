<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>navbar</title>
    <link rel="stylesheet" href="/FarahEvent/styles/nav.css">
    <link rel="stylesheet" href="/FarahEvent/styles/fonts.css">
</head>
<body>
    <nav class="navbar">
        <div class="menu-toggle">☰</div>
        <!-- Liens pour version desktop -->
        <div class="nav-links left">
            <a href="/FarahEvent/index.php">Accueil</a>
            <a href="/FarahEvent/Prestation/index.php">Préstation</a>
            <a href="/FarahEvent/Reservation/index.php">Réservation</a>
        </div>
        <div class="logo">
            <img src="/FarahEvent/include/images/logo.png" alt="Farah Logo">
        </div>
       
        <div class="nav-links right">
            <a href="/FarahEvent/Propos/index.php">A Propos</a>
            <a href="/FarahEvent/contact/index.php">Contactez-Nous</a>
            
            <?php if(isset($_SESSION['user_id'])): ?>
                <!-- Menu utilisateur connecté -->
                <div class="user-menu">
                    <div class="user-profile">
                        <?php
                        $photoPath = "../uploads/users/" . $_SESSION['user_id'] . ".jpg";
                        $defaultPhoto = "../include/images/default_user.png";
                        $photoSrc = file_exists($photoPath) ? $photoPath : $defaultPhoto;
                        ?>
                        <img src="<?php echo $photoSrc; ?>" alt="Photo de profil" class="user-avatar">
                        <span><?php echo htmlspecialchars($_SESSION['user_name']); ?></span>
                    </div>
                    <div class="user-dropdown">
                        <a href="#" class="dropdown-item" id="edit-profile">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-right: 10px;"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg>
                            Modifier mon profil
                        </a>
                        <a href="/FarahEvent/Connexion/logout.php" class="dropdown-item logout">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-right: 10px;"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                            Se déconnecter
                        </a>
                    </div>
                </div>
            <?php else: ?>
                <!-- Lien de connexion pour visiteurs -->
                <a href="/FarahEvent/Connexion/login.php">Se Connecter</a>
            <?php endif; ?>
        </div>
       
        <!-- Liens regroupés pour version mobile -->
        <div class="all-links">
            <a href="/FarahEvent/index.php">Accueil</a>
            <a href="/FarahEvent/Prestation/index.php">Préstation</a>
            <a href="/FarahEvent/Reservation/index.php">Réservation</a>
            <a href="/FarahEvent/Propos/index.php">A Propos</a>
            <a href="/FarahEvent/contact/index.php">Contactez-Nous</a>
            
            <?php if(isset($_SESSION['user_id'])): ?>
                <!-- Menu utilisateur pour mobile -->
                <div class="user-menu-mobile">
                    <div class="user-profile-mobile">
                        <img src="<?php echo $photoSrc; ?>" alt="Photo de profil" class="user-avatar">
                        <span><?php echo htmlspecialchars($_SESSION['user_name']); ?></span>
                    </div>
                    <a href="#" class="dropdown-item" id="edit-profile-mobile">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-right: 10px;"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg>
                        Modifier mon profil
                    </a>
                    <a href="/FarahEvent/Connexion/logout.php" class="dropdown-item logout">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-right: 10px;"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                        Se déconnecter
                    </a>
                </div>
            <?php else: ?>
                <a href="/FarahEvent/Connexion/login.php">Se Connecter</a>
            <?php endif; ?>
        </div>
    </nav>

    <!-- Modal pour modifier le profil -->
    <?php if(isset($_SESSION['user_id'])): ?>
    <div id="profileModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Modifier mon profil</h2>
                <span class="close">&times;</span>
            </div>
            <form action="/FarahEvent/Connexion/update_profile.php" method="POST" enctype="multipart/form-data">
                <?php
                // Récupérer les informations de l'utilisateur
                try {
                    require_once($_SERVER['DOCUMENT_ROOT'] . "/FarahEvent/conn.php");
                    $stmt = $pdo->prepare("SELECT * FROM client WHERE id = :id");
                    $stmt->execute([':id' => $_SESSION['user_id']]);
                    $user = $stmt->fetch();
                } catch (PDOException $e) {
                    $user = null;
                }
                ?>
                
                <div class="photo-upload">
                    <img src="<?php echo $photoSrc; ?>" alt="Photo de profil" class="photo-preview" id="photoPreview">
                    <div>
                        <label for="profile_photo">Changer ma photo</label>
                        <input type="file" id="profile_photo" name="profile_photo" accept="image/*">
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="name">Nom</label>
                    <input type="text" id="name" name="name" value="<?php echo isset($user) ? htmlspecialchars($user['nom']) : ''; ?>" required>
                </div>
                
                <div class="form-group">
                    <label for="prenom">Prénom</label>
                    <input type="text" id="prenom" name="prenom" value="<?php echo isset($user) ? htmlspecialchars($user['prenom']) : ''; ?>" required>
                </div>
                
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="<?php echo isset($user) ? htmlspecialchars($user['email']) : ''; ?>" required>
                </div>
                
                <div class="form-group">
                    <label for="new_password">Nouveau mot de passe (laisser vide pour ne pas changer)</label>
                    <input type="password" id="new_password" name="new_password">
                </div>
                
                <div class="form-group">
                    <label for="confirm_password">Confirmer le nouveau mot de passe</label>
                    <input type="password" id="confirm_password" name="confirm_password">
                </div>
                
                <button type="submit" class="update-btn">Mettre à jour</button>
            </form>
        </div>
    </div>
    <?php endif; ?>

    <script>
        // Script pour le menu mobile
        document.querySelector('.menu-toggle').addEventListener('click', function() {
            document.querySelector('.all-links').classList.toggle('active');
        });

        // Script pour le menu utilisateur
        <?php if(isset($_SESSION['user_id'])): ?>
        document.querySelector('.user-profile').addEventListener('click', function(e) {
            e.stopPropagation();
            document.querySelector('.user-dropdown').classList.toggle('active');
        });

        document.addEventListener('click', function() {
            document.querySelector('.user-dropdown').classList.remove('active');
        });

        // Modal de modification de profil
        const modal = document.getElementById('profileModal');
        const editProfileBtn = document.getElementById('edit-profile');
        const editProfileMobileBtn = document.getElementById('edit-profile-mobile');
        const closeBtn = document.querySelector('.close');

        editProfileBtn.addEventListener('click', function() {
            modal.style.display = 'block';
        });

        if (editProfileMobileBtn) {
            editProfileMobileBtn.addEventListener('click', function() {
                modal.style.display = 'block';
            });
        }

        closeBtn.addEventListener('click', function() {
            modal.style.display = 'none';
        });

        window.addEventListener('click', function(event) {
            if (event.target == modal) {
                modal.style.display = 'none';
            }
        });

        // Aperçu de la photo
        document.getElementById('profile_photo').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('photoPreview').src = e.target.result;
                }
                reader.readAsDataURL(file);
            }
        });
        <?php endif; ?>
    </script>
</body>
</html>
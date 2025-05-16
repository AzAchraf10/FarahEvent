<?php
session_start();

// Traitement du formulaire de connexion admin
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Vérifier si l'email et le mot de passe sont remplis
    if (isset($_POST['email']) && isset($_POST['password'])) {
        // Récupérer les données du formulaire
        $email = trim($_POST['email']);
        $password = $_POST['password'];

        // Validation basique
        if (empty($email) || empty($password)) {
            $_SESSION['error_message'] = "❌ Veuillez remplir tous les champs.";
            header("Location: index.php");
            exit();
        }

        try {
            require_once("Comptes/connexion.php"); // Connexion à la base de données

            // Rechercher l'administrateur dans la base de données
            $sql = "SELECT * FROM Admin WHERE email = :email";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([':email' => $email]);
            $admin = $stmt->fetch();

            if ($admin) {
                // Vérifier si le mot de passe est correct
                if (password_verify($password, $admin['mot_de_passe'])) {
                    // Authentification réussie
                    $_SESSION['admin_id'] = $admin['id'];
                    $_SESSION['admin_nom'] = $admin['nom'];
                    $_SESSION['admin_prenom'] = $admin['prenom'];
                    $_SESSION['admin_email'] = $admin['email'];
                    $_SESSION['est_admin'] = true;
                    $_SESSION['success_message'] = "✅ Connexion admin réussie!";
                    
                    // Redirection vers le tableau de bord admin
                    header("Location: Home/index.php");
                    exit();
                } else {
                    $_SESSION['error_message'] = "❌ Mot de passe incorrect.";
                }
            } else {
                $_SESSION['error_message'] = "❌ Aucun compte administrateur trouvé avec cet email.";
            }
        } catch (PDOException $e) {
            $_SESSION['error_message'] = "❌ Erreur de connexion à la base de données: " . $e->getMessage();
        }
        
        header("Location: index.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration - Connexion</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="styles/index.css">
</head>
<body>
    <!-- Background Elements -->
    <div class="background"></div>
    <div class="background-animation" id="particles"></div>
    
    <!-- Geometric Shapes -->
    <div class="shapes">
        <div class="shape shape1"></div>
        <div class="shape shape2"></div>
    </div>
    
    <!-- Main Container -->
    <div class="container">
        <div class="login-container">
            <div class="login-form">
                <form action="index.php" method="POST">
                    <div class="form-group">
                        <label for="email">Adresse email</label>
                        <div class="input-group">
                            <input type="email" id="email" name="email" placeholder="Entrez votre adresse email" required>
                            <span class="input-icon">
                                <i class="fas fa-envelope"></i>
                            </span>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="password">Mot de passe</label>
                        <div class="input-group">
                            <input type="password" id="password" name="password" placeholder="Entrez votre mot de passe" required>
                            <span class="input-icon">
                                <i class="fas fa-lock"></i>
                            </span>
                            <button type="button" class="password-toggle" id="togglePassword">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                    </div>
                    
                    <div class="form-footer">
                        <label class="custom-checkbox">
                            <input type="checkbox" id="remember" name="remember">
                            <span class="checkmark"></span>
                            <span>Se souvenir de moi</span>
                        </label>
                    </div>
                    
                    <button type="submit" class="login-button" id="loginButton">
                        <div class="button-text">
                            <span>Connexion</span>
                            <span class="button-icon"><i class="fas fa-arrow-right"></i></span>
                        </div>
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Afficher les messages d'erreur ou de succès -->
    <?php if (isset($_SESSION['error_message']) || isset($_SESSION['success_message'])): ?>
        <div class="message-container">
            <?php if (isset($_SESSION['error_message'])): ?>
                <div class="error-message">
                    <?php echo $_SESSION['error_message']; ?>
                </div>
                <?php unset($_SESSION['error_message']); ?>
            <?php endif; ?>

            <?php if (isset($_SESSION['success_message'])): ?>
                <div class="success-message">
                    <?php echo $_SESSION['success_message']; ?>
                </div>
                <?php unset($_SESSION['success_message']); ?>
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Toggle password visibility
            const togglePassword = document.getElementById('togglePassword');
            const passwordInput = document.getElementById('password');
            
            togglePassword.addEventListener('click', function() {
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);
                this.querySelector('i').classList.toggle('fa-eye');
                this.querySelector('i').classList.toggle('fa-eye-slash');
            });

            // Faire disparaître les messages après 5 secondes
            setTimeout(() => {
                const messages = document.querySelectorAll('.error-message, .success-message');
                messages.forEach(message => {
                    message.style.opacity = '0';
                    setTimeout(() => {
                        message.style.display = 'none';
                    }, 500);
                });
            }, 5000);
        });
    </script>
</body>
</html> 

<?php
session_start();

// Traitement du formulaire de connexion
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Vérifier si l'email et le mot de passe sont remplis
    if (isset($_POST['email']) && isset($_POST['password'])) {
        // Récupérer les données du formulaire
        $email = trim($_POST['email']);
        $password = $_POST['password'];

        // Validation basique
        if (empty($email) || empty($password)) {
            $_SESSION['error_message'] = "❌ Veuillez remplir tous les champs.";
            header("Location: login.php");
            exit();
        }

        try {
            require_once("../conn.php"); // Connexion à la base de données

            // Rechercher l'utilisateur dans la base de données
            $sql = "SELECT * FROM client WHERE email = :email";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([':email' => $email]);
            $user = $stmt->fetch();

            if ($user) {
                // Vérifier si le mot de passe est correct
                if (password_verify($password, $user['mdp'])) {
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['user_name'] = $user['nom'];
                    $_SESSION['success_message'] = "✅ Connexion réussie!";
                    header("Location: /FARAHEVENT/index.php");
                    exit();
                } else {
                    $_SESSION['error_message'] = "❌ Mot de passe incorrect.";
                }
            } else {
                $_SESSION['error_message'] = "❌ Aucun compte trouvé avec cet email.";
            }
        } catch (PDOException $e) {
            $_SESSION['error_message'] = "❌ Erreur de connexion à la base de données: " . $e->getMessage();
        }
        
        header("Location: login.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/login.css">
    <title>Connexion - FARAHEVENT</title>
</head>
<body>
<div class="container" id="container">
    <div class="form-container sign-up-container">
        <form action="register.php" method="POST">
            <h1>Créer un compte</h1>
            <span>Entrez vos informations personnelles</span>
            <input type="text" placeholder="Nom" name="name" required />
            <input type="text" placeholder="Prénom" name="prenom" required />
            <input type="email" placeholder="Email" name="email" required />
            <input type="password" placeholder="Mot de passe" name="password" required />
            <button type="submit">S'inscrire</button>
        </form>        
    </div>
    <div class="form-container sign-in-container">
        <form action="login.php" method="POST">
            <h1>Connexion</h1>
            <span>Utilisez votre compte</span>
            <input type="email" placeholder="Email" name="email" required />
            <input type="password" placeholder="Mot de passe" name="password" required/>
            <a href="#" id="forgotPasswordLink">Mot de passe oublié?</a>
            <button type="submit">Se connecter</button>
        </form>
    </div>
    <div class="overlay-container">
        <div class="overlay">
            <div class="overlay-panel overlay-left">
                <h1>Bon retour!</h1>
                <p>Pour rester connecté avec nous, veuillez vous connecter avec vos informations personnelles</p>
                <button class="ghost" id="signIn">Se connecter</button>
            </div>
            <div class="overlay-panel overlay-right">
                <h1>Bonjour!</h1>
                <p>Entrez vos informations personnelles et commencez votre voyage avec nous</p>
                <button class="ghost" id="signUp">S'inscrire</button>
            </div>
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
    const signUpButton = document.getElementById('signUp');
    const signInButton = document.getElementById('signIn');
    const container = document.getElementById('container');
    const forgotPasswordLink = document.getElementById('forgotPasswordLink');

    signUpButton.addEventListener('click', () => {
        container.classList.add("right-panel-active");
    });

    signInButton.addEventListener('click', () => {
        container.classList.remove("right-panel-active");
    });

    // Gérer le lien "Mot de passe oublié"
    forgotPasswordLink.addEventListener('click', (e) => {
        e.preventDefault();
        alert("Fonctionnalité de récupération de mot de passe à implémenter!");
        // Rediriger vers la page de récupération de mot de passe (à créer)
        // window.location.href = "reset_password.php";
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

    // Activer l'onglet d'inscription si erreur lors de l'inscription
    <?php if (isset($_GET['signup']) && $_GET['signup'] == 'error'): ?>
        container.classList.add("right-panel-active");
    <?php endif; ?>
</script>
</body>
</html>
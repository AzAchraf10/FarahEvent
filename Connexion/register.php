<?php
session_start();

// Vérifier si le formulaire est envoyé
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Vérifier si tous les champs sont remplis
    if (isset($_POST["name"]) && isset($_POST["prenom"]) && isset($_POST["email"]) && isset($_POST["password"])) {
        // Récupérer et nettoyer les champs
        $name = trim($_POST["name"]);
        $prenom = trim($_POST["prenom"]);
        $email = trim($_POST["email"]);
        $password = $_POST["password"];
        
        // Validation des champs
        if (empty($name) || empty($prenom) || empty($email) || empty($password)) {
            $_SESSION['error_message'] = "❌ Veuillez remplir tous les champs.";
            header("Location: login.php?signup=error");
            exit();
        }
        
        // Validation de l'email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['error_message'] = "❌ Adresse email non valide.";
            header("Location: login.php?signup=error");
            exit();
        }
        
        // Validation du mot de passe (minimum 6 caractères)
        if (strlen($password) < 6) {
            $_SESSION['error_message'] = "❌ Le mot de passe doit contenir au moins 6 caractères.";
            header("Location: login.php?signup=error");
            exit();
        }
        
        try {
            require_once("../conn.php"); // Connexion à la base de données
            
            // Vérifier si l'email existe déjà
            $checkEmail = "SELECT COUNT(*) FROM client WHERE email = :email";
            $stmt = $pdo->prepare($checkEmail);
            $stmt->execute([':email' => $email]);
            if ($stmt->fetchColumn() > 0) {
                $_SESSION['error_message'] = "⚠️ Cet email est déjà utilisé.";
                header("Location: login.php?signup=error");
                exit();
            }
            
            // Hasher le mot de passe
            $password_hashed = password_hash($password, PASSWORD_DEFAULT);
            
            // Préparer l'insertion (sans spécifier l'ID pour l'auto-incrémentation)
            $sql = "INSERT INTO client (nom, prenom, email, mdp) VALUES (:name, :prenom, :email, :password)";
            $stmt = $pdo->prepare($sql);
            
            // Exécuter
            $stmt->execute([
                ':name' => $name,
                ':prenom' => $prenom,
                ':email' => $email,
                ':password' => $password_hashed
            ]);
            
            $_SESSION['success_message'] = "✅ Inscription réussie! Vous pouvez maintenant vous connecter.";
            header("Location: login.php");
            exit();
            
        } catch (PDOException $error) {
            $_SESSION['error_message'] = "❌ Erreur lors de l'inscription: " . $error->getMessage();
            header("Location: login.php?signup=error");
            exit();
        }
    } else {
        $_SESSION['error_message'] = "❌ Veuillez remplir tous les champs.";
        header("Location: login.php?signup=error");
        exit();
    }
} else {
    // Si quelqu'un accède directement à register.php sans POST
    header("Location: login.php");
    exit();
}
?>
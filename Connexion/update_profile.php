<?php
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    $_SESSION['error_message'] = "❌ Vous devez être connecté pour modifier votre profil.";
    header("Location: login.php");
    exit();
}

// Vérifier si le formulaire est soumis
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Récupérer les données du formulaire
    $name = trim($_POST['name']);
    $prenom = trim($_POST['prenom']);
    $email = trim($_POST['email']);
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];
    
    // Validation basique
    if (empty($name) || empty($prenom) || empty($email)) {
        $_SESSION['error_message'] = "❌ Les champs Nom, Prénom et Email sont obligatoires.";
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit();
    }
    
    // Validation de l'email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error_message'] = "❌ Adresse email non valide.";
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit();
    }
    
    // Vérifier si les mots de passe correspondent
    if (!empty($new_password) && $new_password !== $confirm_password) {
        $_SESSION['error_message'] = "❌ Les mots de passe ne correspondent pas.";
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit();
    }
    
    try {
        require_once($_SERVER['DOCUMENT_ROOT'] . "/FarahEvent/conn.php");
        
        // Vérifier si l'email existe déjà (sauf pour l'utilisateur actuel)
        $checkEmail = "SELECT COUNT(*) FROM client WHERE email = :email AND id != :id";
        $stmt = $pdo->prepare($checkEmail);
        $stmt->execute([':email' => $email, ':id' => $_SESSION['user_id']]);
        if ($stmt->fetchColumn() > 0) {
            $_SESSION['error_message'] = "⚠️ Cet email est déjà utilisé par un autre compte.";
            header("Location: " . $_SERVER['HTTP_REFERER']);
            exit();
        }
        
        // Préparer la mise à jour
        $updateFields = "UPDATE client SET nom = :name, prenom = :prenom, email = :email";
        $params = [
            ':name' => $name,
            ':prenom' => $prenom,
            ':email' => $email,
            ':id' => $_SESSION['user_id']
        ];
        
        // Ajouter le mot de passe à la mise à jour si fourni
        if (!empty($new_password)) {
            $updateFields .= ", mdp = :password";
            $params[':password'] = password_hash($new_password, PASSWORD_DEFAULT);
        }
        
        $updateFields .= " WHERE id = :id";
        
        // Exécuter la mise à jour
        $stmt = $pdo->prepare($updateFields);
        $stmt->execute($params);
        
        // Mettre à jour le nom dans la session
        $_SESSION['user_name'] = $name;
        
        $_SESSION['success_message'] = "✅ Profil mis à jour avec succès!";
        header("Location: /FarahEvent/index.php");
        exit();
        
    } catch (PDOException $e) {
        $_SESSION['error_message'] = "❌ Erreur lors de la mise à jour du profil: " . $e->getMessage();
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit();
    }
}
?>
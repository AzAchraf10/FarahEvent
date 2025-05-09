<?php
require_once '../../conn.php';

// Vérifier si l'ID est fourni
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    
    try {
        // Supprimer l'événement
        $stmt = $pdo->prepare("DELETE FROM evenement WHERE id = :id");
        $stmt->execute([':id' => $id]);
        
        // Redirection avec message de succès
        header('Location: index.php?success=delete');
        exit;
        
    } catch (PDOException $e) {
        // En cas d'erreur, redirection avec message d'erreur
        header('Location: index.php?error=' . urlencode($e->getMessage()));
        exit;
    }
} else {
    // ID non fourni
    header('Location: index.php?error=id_manquant');
    exit;
}
?>
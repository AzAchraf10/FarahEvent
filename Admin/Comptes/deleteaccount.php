<?php
require 'connexion.php';

if (
    !isset($_GET['id']) ||
    !filter_var($_GET['id'], FILTER_VALIDATE_INT)
) {
    die("ID invalide.");
}

$userId = (int) $_GET['id'];

try {
    $pdo->beginTransaction();

    // Récupérer les FK pour savoir quelle table vider
    $stmt = $pdo->prepare("SELECT id_Admin, id_Client FROM Compte WHERE id = :id");
    $stmt->execute([':id' => $userId]);
    $row = $stmt->fetch();

    if (!$row) {
        throw new Exception("Compte introuvable.");
    }

    // 1) Supprimer la ligne dans Compte
    $pdo->prepare("DELETE FROM Compte WHERE id = :id")
        ->execute([':id' => $userId]);

    // 2) Supprimer dans Admin ou Client
    if ($row['id_Admin']) {
        $pdo->prepare("DELETE FROM Admin WHERE id = :aid")
            ->execute([':aid' => $row['id_Admin']]);
    }
    if ($row['id_Client']) {
        $pdo->prepare("DELETE FROM Client WHERE id = :cid")
            ->execute([':cid' => $row['id_Client']]);
    }

    $pdo->commit();
    header('Location: index.php');
    exit;

} catch (Exception $e) {
    $pdo->rollBack();
    die("Erreur lors de la suppression : " . $e->getMessage());
}

<?php
require_once '../../conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $titre = $_POST['titre'];
    $dateDebut = $_POST['date_debut'];
    $dateFin = $_POST['date_fin'];
    $idClient = $_POST['id_client'] ?? null;
    $nombreTables = $_POST['nombre_tables'] ?? null;
    $espace = $_POST['espace'] ?? null;
    $pieceMontee = $_POST['piece_montee'] ?? 'non';
    $message = $_POST['message'] ?? null;
    $etat = $_POST['etat'] ?? 'planifié';

    // Conversion des options en JSON
    $accueil = isset($_POST['accueil']) ? json_encode($_POST['accueil']) : null;
    $cocktail = isset($_POST['cocktail']) ? json_encode($_POST['cocktail']) : null;
    $diner = isset($_POST['diner']) ? json_encode($_POST['diner']) : null;
    $soiree = isset($_POST['soiree']) ? json_encode($_POST['soiree']) : null;

    try {
        $stmt = $pdo->prepare("UPDATE evenement SET
            titre = :titre,
            dateDebut = :dateDebut,
            dateFin = :dateFin,
            id_Client = :idClient,
            nombre_tables = :nombreTables,
            espace = :espace,
            accueil = :accueil,
            cocktail = :cocktail,
            diner = :diner,
            soiree = :soiree,
            piece_montee = :pieceMontee,
            message = :message,
            état = :etat
            WHERE id = :id");

        $stmt->execute([
            ':id' => $id,
            ':titre' => $titre,
            ':dateDebut' => $dateDebut,
            ':dateFin' => $dateFin,
            ':idClient' => $idClient,
            ':nombreTables' => $nombreTables,
            ':espace' => $espace,
            ':accueil' => $accueil,
            ':cocktail' => $cocktail,
            ':diner' => $diner,
            ':soiree' => $soiree,
            ':pieceMontee' => $pieceMontee,
            ':message' => $message,
            ':etat' => $etat
        ]);

        echo json_encode(['success' => true]);
    } catch (PDOException $e) {
        echo json_encode(['success' => false, 'error' => $e->getMessage()]);
    }
}
?>
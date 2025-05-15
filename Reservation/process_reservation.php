<?php
require_once '../conn.php'; // Ajustez le chemin selon votre structure

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupération des données personnelles
    $nom = $_POST['nom'] ?? null;
    $prenom = $_POST['prenom'] ?? null;
    $telephone = $_POST['telephone'] ?? null;
    $adresse = $_POST['adresse'] ?? null;
    
    // Récupération des détails de réservation
    $dateDebut = $_POST['date_debut'] ?? null;
    $dateFin = $_POST['date_fin'] ?? null;
    $nombre_tables = $_POST['nombre_tables'] ?? null;
    
    // Récupération de l'espace (prendre le premier si plusieurs sont sélectionnés)
    $espace = isset($_POST['espace']) && is_array($_POST['espace']) ? $_POST['espace'][0] : null;
    
    // Récupération des options (cases à cocher)
    $accueil = isset($_POST['accueil']) ? json_encode($_POST['accueil']) : null;
    $cocktail = isset($_POST['cocktail']) ? json_encode($_POST['cocktail']) : null;
    $diner = isset($_POST['diner']) ? json_encode($_POST['diner']) : null;
    $soiree = isset($_POST['soiree']) ? json_encode($_POST['soiree']) : null;
    
    // Récupération des options supplémentaires
    $piece_montee = $_POST['piece_montee'] ?? 'non';
    $message = $_POST['message'] ?? null;
    
    // Valeurs par défaut pour les autres champs
    $titre = "Réservation de " . $prenom . " " . $nom;
    $description = "Réservation effectuée par " . $prenom . " " . $nom . " le " . date('Y-m-d');
    $lieu = $adresse;
    $etat = 'planifié'; // Statut par défaut
    
    try {
        // Insertion dans la table evenement
        $stmt = $pdo->prepare("INSERT INTO evenement 
            (titre, description, dateDebut, dateFin, lieu, etat, 
             nombre_tables, espace, accueil, cocktail, diner, soiree, 
             piece_montee, message) 
            VALUES 
            (:titre, :description, :dateDebut, :dateFin, :lieu, :etat, 
             :nombre_tables, :espace, :accueil, :cocktail, :diner, :soiree, 
             :piece_montee, :message)");
        
        $stmt->execute([
            ':titre' => $titre,
            ':description' => $description,
            ':dateDebut' => $dateDebut,
            ':dateFin' => $dateFin,
            ':lieu' => $lieu,
            ':etat' => $etat,
            ':nombre_tables' => $nombre_tables,
            ':espace' => $espace,
            ':accueil' => $accueil,
            ':cocktail' => $cocktail,
            ':diner' => $diner,
            ':soiree' => $soiree,
            ':piece_montee' => $piece_montee,
            ':message' => $message
        ]);
        
        // Redirection avec message de succès
        header('Location: confirmation.php?success=1');
        exit;
        
    } catch (PDOException $e) {
        // En cas d'erreur, redirection avec message d'erreur
        header('Location: index.php?error=' . urlencode($e->getMessage()));
        exit;
    }
} else {
    // Si accès direct au script sans POST
    header('Location: index.php');
    exit;
}
?>
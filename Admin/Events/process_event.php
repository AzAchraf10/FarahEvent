<?php
require_once '../../conn.php';

// Vérifier si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    
    // Traitement selon l'action
    if ($action === 'add' || $action === 'edit') {
        // Récupération des données du formulaire
        $titre = $_POST['titre'] ?? 'Événement sans nom';
        $description = $_POST['description'] ?? null;
        $dateDebut = $_POST['date_debut'];
        $dateFin = $_POST['date_fin'];
        $lieu = $_POST['lieu'] ?? null;
        $etat = $_POST['etat'] ?? 'planifié';
        $id_Client = $_POST['id_client'] ?? null;
        $nombre_tables = $_POST['nombre_tables'] ?? null;
        $espace = $_POST['espace'] ?? null;
        $piece_montee = $_POST['piece_montee'] ?? 'non';
        $message = $_POST['message'] ?? null;
        
        // Récupération des options (cases à cocher)
        $accueil = isset($_POST['accueil']) ? json_encode($_POST['accueil']) : null;
        $cocktail = isset($_POST['cocktail']) ? json_encode($_POST['cocktail']) : null;
        $diner = isset($_POST['diner']) ? json_encode($_POST['diner']) : null;
        $soiree = isset($_POST['soiree']) ? json_encode($_POST['soiree']) : null;
        
        try {
            if ($action === 'add') {
                // Insertion d'un nouvel événement
                $stmt = $pdo->prepare("INSERT INTO evenement 
                    (titre, description, dateDebut, dateFin, lieu, etat, id_Client, 
                     nombre_tables, espace, accueil, cocktail, diner, soiree, 
                     piece_montee, message) 
                    VALUES 
                    (:titre, :description, :dateDebut, :dateFin, :lieu, :etat, :id_Client, 
                     :nombre_tables, :espace, :accueil, :cocktail, :diner, :soiree, 
                     :piece_montee, :message)");
                
                $stmt->execute([
                    ':titre' => $titre,
                    ':description' => $description,
                    ':dateDebut' => $dateDebut,
                    ':dateFin' => $dateFin,
                    ':lieu' => $lieu,
                    ':etat' => $etat,
                    ':id_Client' => $id_Client,
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
                header('Location: index.php?success=add');
                exit;
                
            } elseif ($action === 'edit') {
                // Mise à jour d'un événement existant
                $id = $_POST['id'];
                
                $stmt = $pdo->prepare("UPDATE evenement SET
                    titre = :titre,
                    description = :description,
                    dateDebut = :dateDebut,
                    dateFin = :dateFin,
                    lieu = :lieu,
                    etat = :etat,
                    id_Client = :id_Client,
                    nombre_tables = :nombre_tables,
                    espace = :espace,
                    accueil = :accueil,
                    cocktail = :cocktail,
                    diner = :diner,
                    soiree = :soiree,
                    piece_montee = :piece_montee,
                    message = :message
                    WHERE id = :id");
                
                $stmt->execute([
                    ':id' => $id,
                    ':titre' => $titre,
                    ':description' => $description,
                    ':dateDebut' => $dateDebut,
                    ':dateFin' => $dateFin,
                    ':lieu' => $lieu,
                    ':etat' => $etat,
                    ':id_Client' => $id_Client,
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
                header('Location: index.php?success=edit');
                exit;
            }
            
        } catch (PDOException $e) {
            // En cas d'erreur, redirection avec message d'erreur
            header('Location: index.php?error=' . urlencode($e->getMessage()));
            exit;
        }
    } else {
        // Action non reconnue
        header('Location: index.php?error=action_invalide');
        exit;
    }
} else {
    // Méthode non autorisée
    header('Location: index.php?error=methode_invalide');
    exit;
}
?>
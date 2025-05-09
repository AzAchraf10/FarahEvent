<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de l'événement - Admin</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="admin-container">
    <?php include '../dashboard.html'; ?>
    <div class="main-content">
        <header>
            <div class="container header-content">
                <h1 class="dashboard-title">Détails de l'événement</h1>
            </div>
        </header>
        
        <?php
        require_once '../../conn.php';
        
        // Vérifier si l'ID est fourni
        if (!isset($_GET['id']) || empty($_GET['id'])) {
            echo '<div class="alert alert-danger">ID d\'événement non spécifié.</div>';
            echo '<a href="index.php" class="btn-pack">Retour à la liste</a>';
            exit;
        }
        
        $id = $_GET['id'];
        
        // Récupérer les données de l'événement
        try {
            $stmt = $pdo->prepare("SELECT * FROM evenement WHERE id = :id");
            $stmt->execute([':id' => $id]);
            $event = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if (!$event) {
                echo '<div class="alert alert-danger">Événement non trouvé.</div>';
                echo '<a href="index.php" class="btn-pack">Retour à la liste</a>';
                exit;
            }
            
            // Décoder les champs JSON
            $accueil = $event['accueil'] ? json_decode($event['accueil'], true) : [];
            $cocktail = $event['cocktail'] ? json_decode($event['cocktail'], true) : [];
            $diner = $event['diner'] ? json_decode($event['diner'], true) : [];
            $soiree = $event['soiree'] ? json_decode($event['soiree'], true) : [];
            
            // Formater les dates
            $dateDebut = new DateTime($event['dateDebut']);
            $dateFin = new DateTime($event['dateFin']);
            
            // Fonction pour obtenir le nom lisible d'une option
            function getOptionName($optionValue) {
                $optionsMap = [
                    'dattes' => 'Dattes Majhoul',
                    'lait' => 'Lait',
                    'amuse_bouches' => 'Amuse-bouches',
                    'noga' => 'Noga',
                    'chocolat' => 'Chocolat',
                    'macaron' => 'Macaron',
                    'jus' => 'Jus varié',
                    'gateaux' => 'Gâteaux soirée',
                    'the' => 'Thé',
                    'sales' => 'Assortiment des salés',
                    'sushi' => 'Sushi',
                    'fruits_mer' => 'Pastilla Fruits de mer',
                    'fruits_poulet' => 'Pastilla Poulet',
                    'poisson' => 'Poisson',
                    'tagine' => 'Tagine',
                    'boeuf' => 'Bœuf',
                    'mechoui' => 'Mechoui',
                    'poulet' => 'Poulet',
                    'fruits' => 'Fruits de saison',
                    'amande' => 'Gâteau 100% amande',
                    'glace' => 'Glace',
                    'tarte' => 'Tarte'
                ];
                
                return $optionsMap[$optionValue] ?? $optionValue;
            }
            
        } catch (PDOException $e) {
            echo '<div class="alert alert-danger">Erreur: ' . $e->getMessage() . '</div>';
            echo '<a href="index.php" class="btn-pack">Retour à la liste</a>';
            exit;
        }
        ?>
        
        <div class="event-detail-card">
            <h2><?php echo htmlspecialchars($event['titre']); ?></h2>
            
            <div class="event-section">
                <h3>Informations de base</h3>
                <p><strong>Date de début:</strong> <?php echo $dateDebut->format('d/m/Y'); ?></p>
                <p><strong>Date de fin:</strong> <?php echo $dateFin->format('d/m/Y'); ?></p>
                <p><strong>Statut:</strong> <span class="status-badge <?php echo $event['etat']; ?>"><?php echo $event['etat']; ?></span></p>
                <p><strong>Espace:</strong> <?php echo $event['espace'] ? str_replace('salle', 'Salle ', $event['espace']) : 'Non spécifié'; ?></p>
            </div>
            
            <div class="event-section">
                <h3>Détails de la réservation</h3>
                <p><strong>Nombre de tables:</strong> <?php echo $event['nombre_tables'] ?? 'Non spécifié'; ?></p>
                
                <?php if (!empty($accueil)): ?>
                <div class="options-section">
                    <h4>Accueil:</h4>
                    <ul>
                        <?php foreach ($accueil as $option): ?>
                        <li><?php echo getOptionName($option); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <?php endif; ?>
                
                <?php if (!empty($cocktail)): ?>
                <div class="options-section">
                    <h4>Cocktail:</h4>
                    <ul>
                        <?php foreach ($cocktail as $option): ?>
                        <li><?php echo getOptionName($option); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <?php endif; ?>
                
                <?php if (!empty($diner)): ?>
                <div class="options-section">
                    <h4>Dîner:</h4>
                    <ul>
                        <?php foreach ($diner as $option): ?>
                        <li><?php echo getOptionName($option); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <?php endif; ?>
                
                <?php if (!empty($soiree)): ?>
                <div class="options-section">
                    <h4>Soirée:</h4>
                    <ul>
                        <?php foreach ($soiree as $option): ?>
                        <li><?php echo getOptionName($option); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <?php endif; ?>
                
                <?php if ($event['piece_montee'] === 'oui'): ?>
                <p><strong>Pièce montée:</strong> Oui</p>
                <?php endif; ?>
            </div>
            
            <?php if (!empty($event['message'])): ?>
            <div class="event-section">
                <h3>Message</h3>
                <p><?php echo nl2br(htmlspecialchars($event['message'])); ?></p>
            </div>
            <?php endif; ?>
            
            <div class="event-actions">
                <a href="index.php" class="btn-pack">Retour à la liste</a>
                <a href="edit_event.php?id=<?php echo $id; ?>" class="btn-edit">Modifier</a>
                <a href="delete_event.php?id=<?php echo $id; ?>" class="btn-delete" onclick="return confirm('Voulez-vous vraiment supprimer cet événement ?')">Supprimer</a>
            </div>
        </div>
    </div>
</div>
</body>
</html>
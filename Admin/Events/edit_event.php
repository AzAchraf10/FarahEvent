<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un événement - Admin</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="admin-container">
    <?php include '../dashboard.html'; ?>
    <div class="main-content">
        <header>
            <div class="container header-content">
                <h1 class="dashboard-title">Modifier un événement</h1>
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
            
        } catch (PDOException $e) {
            echo '<div class="alert alert-danger">Erreur: ' . $e->getMessage() . '</div>';
            echo '<a href="index.php" class="btn-pack">Retour à la liste</a>';
            exit;
        }
        ?>
        
        <form action="process_event.php" method="POST" class="reservation-form">
            <input type="hidden" name="action" value="edit">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            
            <div class="form-section">
                <h3>Informations de base:</h3>
                <div class="form-group">
                    <label for="titre">Titre de l'événement :</label>
                    <input type="text" id="titre" name="titre" value="<?php echo htmlspecialchars($event['titre']); ?>" required>
                </div>
                <div class="form-group">
                    <label for="description">Description :</label>
                    <textarea id="description" name="description" rows="3"><?php echo htmlspecialchars($event['description'] ?? ''); ?></textarea>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="date_debut">Date de début :</label>
                        <input type="date" id="date_debut" name="date_debut" value="<?php echo $event['dateDebut']; ?>" required> 
                    </div>
                    <div class="form-group">
                        <label for="date_fin">Date de fin :</label>
                        <input type="date" id="date_fin" name="date_fin" value="<?php echo $event['dateFin']; ?>" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="lieu">Lieu :</label>
                    <input type="text" id="lieu" name="lieu" value="<?php echo htmlspecialchars($event['lieu'] ?? ''); ?>">
                </div>
                <div class="form-group">
                    <label for="etat">Statut :</label>
                    <select id="etat" name="etat" required>
                        <option value="planifié" <?php echo $event['etat'] === 'planifié' ? 'selected' : ''; ?>>Planifié</option>
                        <option value="confirmé" <?php echo $event['etat'] === 'confirmé' ? 'selected' : ''; ?>>Confirmé</option>
                        <option value="annulé" <?php echo $event['etat'] === 'annulé' ? 'selected' : ''; ?>>Annulé</option>
                        <option value="terminé" <?php echo $event['etat'] === 'terminé' ? 'selected' : ''; ?>>Terminé</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="id_client">ID Client (si applicable) :</label>
                    <input type="number" id="id_client" name="id_client" min="1" value="<?php echo $event['id_Client'] ?? ''; ?>">
                </div>
            </div>
            
            <div class="form-section">
                <h3>Détails de la Réservation:</h3>
                <div class="form-row">
                    <div class="form-group">
                        <label for="nombre_tables">Nombre de tables :</label>
                        <input type="number" id="nombre_tables" name="nombre_tables" min="1" value="<?php echo $event['nombre_tables'] ?? ''; ?>" placeholder="10">
                    </div>
                </div>
            </div>
          
            <div class="form-section">
                <h3>Choix de l'Espace:</h3>
                <div class="salles">
                    <label class="salle-option">
                        <input type="radio" name="espace" value="salle1" <?php echo $event['espace'] === 'salle1' ? 'checked' : ''; ?> required>
                        <img src="images/salle1.jpg" alt="Salle 1">
                        <span class="salle-label">Salle 1</span>
                    </label>
                    <label class="salle-option">
                        <input type="radio" name="espace" value="salle2" <?php echo $event['espace'] === 'salle2' ? 'checked' : ''; ?>>
                        <img src="images/salle2.jpg" alt="Salle 2">
                        <span class="salle-label">Salle 2</span>
                    </label>
                    <label class="salle-option">
                        <input type="radio" name="espace" value="salle3" <?php echo $event['espace'] === 'salle3' ? 'checked' : ''; ?>>
                        <img src="images/salle3.jpg" alt="Salle 3">
                        <span class="salle-label">Salle 3</span>
                    </label>
                </div>
            </div>
            
            <div class="form-section accueil-section">
                <h4 class="special-font">Accueil:</h4>
                <div class="checkbox-group">
                    <label class="checkbox-item">
                        <input type="checkbox" name="accueil[]" value="dattes" <?php echo in_array('dattes', $accueil) ? 'checked' : ''; ?>>Dattes Majhoul
                    </label>
                    <label class="checkbox-item">
                        <input type="checkbox" name="accueil[]" value="lait" <?php echo in_array('lait', $accueil) ? 'checked' : ''; ?>>Lait
                    </label>
                    <label class="checkbox-item">
                        <input type="checkbox" name="accueil[]" value="amuse_bouches" <?php echo in_array('amuse_bouches', $accueil) ? 'checked' : ''; ?>>Amuse-bouches
                    </label>
                </div>
            </div>
            
            <div class="form-section CocktailRéception-section">
                <h4 class="special-font">Cocktail Réception:</h4>
                <div class="checkbox-group">
                    <label class="checkbox-item">
                        <input type="checkbox" name="cocktail[]" value="noga" <?php echo in_array('noga', $cocktail) ? 'checked' : ''; ?>>Noga
                    </label>
                    <label class="checkbox-item">
                        <input type="checkbox" name="cocktail[]" value="chocolat" <?php echo in_array('chocolat', $cocktail) ? 'checked' : ''; ?>>Chocolat
                    </label>
                    <label class="checkbox-item">
                        <input type="checkbox" name="cocktail[]" value="macaron" <?php echo in_array('macaron', $cocktail) ? 'checked' : ''; ?>>Macaron
                    </label>
                    <label class="checkbox-item">
                        <input type="checkbox" name="cocktail[]" value="jus" <?php echo in_array('jus', $cocktail) ? 'checked' : ''; ?>>Jus varié
                    </label>
                    <label class="checkbox-item">
                        <input type="checkbox" name="cocktail[]" value="gateaux" <?php echo in_array('gateaux', $cocktail) ? 'checked' : ''; ?>>Gâteaux soirée
                    </label>
                    <label class="checkbox-item">
                        <input type="checkbox" name="cocktail[]" value="the" <?php echo in_array('the', $cocktail) ? 'checked' : ''; ?>>Thé
                    </label>
                    <label class="checkbox-item">
                        <input type="checkbox" name="cocktail[]" value="sales" <?php echo in_array('sales', $cocktail) ? 'checked' : ''; ?>>Assortiment des salés
                    </label>
                    <label class="checkbox-item">
                        <input type="checkbox" name="cocktail[]" value="sushi" <?php echo in_array('sushi', $cocktail) ? 'checked' : ''; ?>>Sushi
                    </label>
                </div>
            </div>
       
            <div class="form-section">
                <h4 class="special-font">Dîner Marocain:</h4>
                <div class="checkbox-group">
                    <label class="checkbox-item">
                        <input type="checkbox" name="diner[]" value="fruits_mer" <?php echo in_array('fruits_mer', $diner) ? 'checked' : ''; ?>>Pastilla Fruits de mer
                    </label>
                    <label class="checkbox-item">
                        <input type="checkbox" name="diner[]" value="fruits_poulet" <?php echo in_array('fruits_poulet', $diner) ? 'checked' : ''; ?>>Pastilla Poulet
                    </label>
                    <label class="checkbox-item">
                        <input type="checkbox" name="diner[]" value="poisson" <?php echo in_array('poisson', $diner) ? 'checked' : ''; ?>>Poisson
                    </label>
                    <label class="checkbox-item">
                        <input type="checkbox" name="diner[]" value="tagine" <?php echo in_array('tagine', $diner) ? 'checked' : ''; ?>>Tagine
                    </label>
                    <label class="checkbox-item">
                        <input type="checkbox" name="diner[]" value="boeuf" <?php echo in_array('boeuf', $diner) ? 'checked' : ''; ?>>Bœuf
                    </label>
                    <label class="checkbox-item">
                        <input type="checkbox" name="diner[]" value="mechoui" <?php echo in_array('mechoui', $diner) ? 'checked' : ''; ?>>Mechoui
                    </label>
                    <label class="checkbox-item">
                        <input type="checkbox" name="diner[]" value="poulet" <?php echo in_array('poulet', $diner) ? 'checked' : ''; ?>>Poulet
                    </label>
                    <label class="checkbox-item">
                        <input type="checkbox" name="diner[]" value="fruits" <?php echo in_array('fruits', $diner) ? 'checked' : ''; ?>>Fruits de saison
                    </label>
                </div>
            </div>
            
            <div class="form-section">
                <h4 class="special-font">Soirée:</h4>
                <div class="checkbox-group">
                    <label class="checkbox-item">
                        <input type="checkbox" name="soiree[]" value="the" <?php echo in_array('the', $soiree) ? 'checked' : ''; ?>>Thé
                    </label>
                    <label class="checkbox-item">
                        <input type="checkbox" name="soiree[]" value="amande" <?php echo in_array('amande', $soiree) ? 'checked' : ''; ?>>Gâteau 100% amande
                    </label>
                    <label class="checkbox-item">
                        <input type="checkbox" name="soiree[]" value="glace" <?php echo in_array('glace', $soiree) ? 'checked' : ''; ?>>Glace
                    </label>
                    <label class="checkbox-item">
                        <input type="checkbox" name="soiree[]" value="tarte" <?php echo in_array('tarte', $soiree) ? 'checked' : ''; ?>>Tarte
                    </label>
                </div>
            </div>
            
            <div class="form-section">
                <h3>Options Supplémentaires:</h3>
                <div class="form-group">
                    <label>Pièce montée Américain :</label>
                    <div class="radio-group">
                        <label class="radio-item">
                            <input type="radio" name="piece_montee" value="oui" <?php echo $event['piece_montee'] === 'oui' ? 'checked' : ''; ?>>Oui
                        </label>
                        <label class="radio-item">
                            <input type="radio" name="piece_montee" value="non" <?php echo $event['piece_montee'] === 'non' ? 'checked' : ''; ?>>Non
                        </label>
                    </div>
                </div>
            </div>
            
            <div class="form-group">
                <label for="message">Message :</label>
                <textarea id="message" name="message" rows="4" placeholder="Votre message..."><?php echo htmlspecialchars($event['message'] ?? ''); ?></textarea>
            </div>
            
            <div class="form-actions">
                <a href="index.php" class="btn-pack">Annuler</a>
                <button type="submit" class="btn-reserver">Mettre à jour l'événement</button>
            </div>
        </form>
    </div>
</div>

<script>
// Script simple pour la validation des dates
document.addEventListener('DOMContentLoaded', function() {
    const dateDebut = document.getElementById('date_debut');
    const dateFin = document.getElementById('date_fin');
    
    dateDebut.addEventListener('change', function() {
        if (dateFin.value && dateFin.value < dateDebut.value) {
            dateFin.value = dateDebut.value;
        }
        dateFin.min = dateDebut.value;
    });
});
</script>
</body>
</html>
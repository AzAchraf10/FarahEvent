<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un événement - Admin</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="admin-container">
    <?php include '../dashboard.html'; ?>
    <div class="main-content">
        <header>
            <div class="container header-content">
                <h1 class="dashboard-title">Ajouter un événement</h1>
            </div>
        </header>
        
        <form action="process_event.php" method="POST" class="reservation-form">
            <input type="hidden" name="action" value="add">
            
            <div class="form-section">
                <h3>Informations de base:</h3>
                <div class="form-group">
                    <label for="titre">Titre de l'événement :</label>
                    <input type="text" id="titre" name="titre" required>
                </div>
                <div class="form-group">
                    <label for="description">Description :</label>
                    <textarea id="description" name="description" rows="3"></textarea>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="date_debut">Date de début :</label>
                        <input type="date" id="date_debut" name="date_debut" required> 
                    </div>
                    <div class="form-group">
                        <label for="date_fin">Date de fin :</label>
                        <input type="date" id="date_fin" name="date_fin" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="lieu">Lieu :</label>
                    <input type="text" id="lieu" name="lieu">
                </div>
                <div class="form-group">
                    <label for="etat">Statut :</label>
                    <select id="etat" name="etat" required>
                        <option value="planifié">Planifié</option>
                        <option value="confirmé">Confirmé</option>
                        <option value="annulé">Annulé</option>
                        <option value="terminé">Terminé</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="id_client">ID Client (si applicable) :</label>
                    <input type="number" id="id_client" name="id_client" min="1">
                </div>
            </div>
      
            <div class="form-section">
                <h3>Détails de la Réservation:</h3>
                <div class="form-row">
                    <div class="form-group">
                        <label for="nombre_tables">Nombre de tables :</label>
                        <input type="number" id="nombre_tables" name="nombre_tables" min="1" placeholder="10">
                    </div>
                </div>
            </div>
          
            <div class="form-section">
                <h3>Choix de l'Espace:</h3>
                <div class="salles">
                    <label class="salle-option">
                        <input type="radio" name="espace" value="salle1" required>
                        <img src="images/salle1.jpg" alt="Salle 1">
                        <span class="salle-label">Salle 1</span>
                    </label>
                    <label class="salle-option">
                        <input type="radio" name="espace" value="salle2">
                        <img src="images/salle2.jpg" alt="Salle 2">
                        <span class="salle-label">Salle 2</span>
                    </label>
                    <label class="salle-option">
                        <input type="radio" name="espace" value="salle3">
                        <img src="images/salle3.jpg" alt="Salle 3">
                        <span class="salle-label">Salle 3</span>
                    </label>
                </div>
            </div>
            
            <div class="form-section accueil-section">
                <h4 class="special-font">Accueil:</h4>
                <div class="checkbox-group">
                    <label class="checkbox-item">
                        <input type="checkbox" name="accueil[]" value="dattes">Dattes Majhoul
                    </label>
                    <label class="checkbox-item">
                        <input type="checkbox" name="accueil[]" value="lait">Lait
                    </label>
                    <label class="checkbox-item">
                        <input type="checkbox" name="accueil[]" value="amuse_bouches">Amuse-bouches
                    </label>
                </div>
            </div>
            
            <div class="form-section CocktailRéception-section">
                <h4 class="special-font">Cocktail Réception:</h4>
                <div class="checkbox-group">
                    <label class="checkbox-item">
                        <input type="checkbox" name="cocktail[]" value="noga">Noga
                    </label>
                    <label class="checkbox-item">
                        <input type="checkbox" name="cocktail[]" value="chocolat">Chocolat
                    </label>
                    <label class="checkbox-item">
                        <input type="checkbox" name="cocktail[]" value="macaron">Macaron
                    </label>
                    <label class="checkbox-item">
                        <input type="checkbox" name="cocktail[]" value="jus">Jus varié
                    </label>
                    <label class="checkbox-item">
                        <input type="checkbox" name="cocktail[]" value="gateaux">Gâteaux soirée
                    </label>
                    <label class="checkbox-item">
                        <input type="checkbox" name="cocktail[]" value="the">Thé
                    </label>
                    <label class="checkbox-item">
                        <input type="checkbox" name="cocktail[]" value="sales">Assortiment des salés
                    </label>
                    <label class="checkbox-item">
                        <input type="checkbox" name="cocktail[]" value="sushi">Sushi
                    </label>
                </div>
            </div>
       
            <div class="form-section">
                <h4 class="special-font">Dîner Marocain:</h4>
                <div class="checkbox-group">
                    <label class="checkbox-item">
                        <input type="checkbox" name="diner[]" value="fruits_mer">Pastilla Fruits de mer
                    </label>
                    <label class="checkbox-item">
                        <input type="checkbox" name="diner[]" value="fruits_poulet">Pastilla Poulet
                    </label>
                    <label class="checkbox-item">
                        <input type="checkbox" name="diner[]" value="poisson">Poisson
                    </label>
                    <label class="checkbox-item">
                        <input type="checkbox" name="diner[]" value="tagine">Tagine
                    </label>
                    <label class="checkbox-item">
                        <input type="checkbox" name="diner[]" value="boeuf">Bœuf
                    </label>
                    <label class="checkbox-item">
                        <input type="checkbox" name="diner[]" value="mechoui">Mechoui
                    </label>
                    <label class="checkbox-item">
                        <input type="checkbox" name="diner[]" value="poulet">Poulet
                    </label>
                    <label class="checkbox-item">
                        <input type="checkbox" name="diner[]" value="fruits">Fruits de saison
                    </label>
                </div>
            </div>
            
            <div class="form-section">
                <h4 class="special-font">Soirée:</h4>
                <div class="checkbox-group">
                    <label class="checkbox-item">
                        <input type="checkbox" name="soiree[]" value="the">Thé
                    </label>
                    <label class="checkbox-item">
                        <input type="checkbox" name="soiree[]" value="amande">Gâteau 100% amande
                    </label>
                    <label class="checkbox-item">
                        <input type="checkbox" name="soiree[]" value="glace">Glace
                    </label>
                    <label class="checkbox-item">
                        <input type="checkbox" name="soiree[]" value="tarte">Tarte
                    </label>
                </div>
            </div>
            
            <div class="form-section">
                <h3>Options Supplémentaires:</h3>
                <div class="form-group">
                    <label>Pièce montée Américain :</label>
                    <div class="radio-group">
                        <label class="radio-item">
                            <input type="radio" name="piece_montee" value="oui">Oui
                        </label>
                        <label class="radio-item">
                            <input type="radio" name="piece_montee" value="non" checked>Non
                        </label>
                    </div>
                </div>
            </div>
            
            <div class="form-group">
                <label for="message">Message :</label>
                <textarea id="message" name="message" rows="4" placeholder="Votre message..."></textarea>
            </div>
            
            <div class="form-actions">
                <a href="index.php" class="btn-pack">Annuler</a>
                <button type="submit" class="btn-reserver">Enregistrer l'événement</button>
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
    
    // Définir la date minimale pour aujourd'hui
    const today = new Date().toISOString().split('T')[0];
    dateDebut.min = today;
    dateFin.min = today;
});
</script>
</body>
</html>
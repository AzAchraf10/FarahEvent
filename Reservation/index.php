<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réservation</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body>
    <?php include '../nav.php'; ?>
    <div class="image-container">
        <div>Créons ensemble des événements qui resteront gravés dans vos mémoires.</div>
        <h2>Réservation</h2>
    </div>
    <div class="reservation">
        <div class="content">
            <p>Créez l'événement de vos rêves avec notre Pack Modèle dès maintenant!</p>
        </div>
    </div>
    
    <?php if (isset($_GET['error'])): ?>
    <div class="alert alert-danger" style="background-color: #f8d7da; color: #721c24; padding: 10px; margin: 10px auto; max-width: 800px; border-radius: 5px; text-align: center;">
        <strong>Erreur:</strong> <?php echo htmlspecialchars($_GET['error']); ?>
    </div>
    <?php endif; ?>
    
    <section>
        <div class="debut">
            <form class="reservation-form" action="process_reservation.php" method="POST">
                <div class="form-section">
                    <h3>Informations Personnelles</h3>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="nom">Nom : <span class="required-indicator">*</span></label>
                            <input type="text" id="nom" name="nom" placeholder="Doe" required>
                        </div>
                        <div class="form-group">
                            <label for="prenom">Prénom : <span class="required-indicator">*</span></label>
                            <input type="text" id="prenom" name="prenom" placeholder="John" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="telephone">Téléphone : <span class="required-indicator">*</span></label>
                            <input type="tel" id="telephone" name="telephone" placeholder="+212 600 000 000" required>
                        </div>
                        <div class="form-group">
                            <label for="adresse">Adresse : <span class="required-indicator">*</span></label>
                            <input type="text" id="adresse" name="adresse" placeholder="123 Rue Principale" required>
                        </div>
                    </div>
                </div>
          
                <div class="form-section">
                    <h3>Détails de la Réservation</h3>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="date_debut">Date de début : <span class="required-indicator">*</span></label>
                            <input type="date" id="date_debut" name="date_debut" required> 
                        </div>
                        <div class="form-group">
                            <label for="date_fin">Date de fin : <span class="required-indicator">*</span></label>
                            <input type="date" id="date_fin" name="date_fin" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="nombre_tables">Nombre de tables : <span class="required-indicator">*</span></label>
                            <input type="number" id="nombre_tables" name="nombre_tables" min="1" placeholder="10" required>
                        </div>
                    </div>
                </div>
                
                <div class="form-section">
                    <h3>Choix de l'Espace <span class="required-indicator">*</span></h3>
                    <div class="salles">
                        <label class="salle-option">
                            <input type="radio" name="espace[]" value="salle1" required>
                            <img src="include/images/salle1.jpg" alt="Salle 1">
                            <span class="salle-label">Salle 1</span>
                        </label>
                        <label class="salle-option">
                            <input type="radio" name="espace[]" value="salle2">
                            <img src="include/images/salle2.jpg" alt="Salle 2">
                            <span class="salle-label">Salle 2</span>
                        </label>
                        <label class="salle-option">
                            <input type="radio" name="espace[]" value="salle3">
                            <img src="include/images/salle3.jpg" alt="Salle 3">
                            <span class="salle-label">Salle 3</span>
                        </label>
                    </div>
                </div>
                
                <div class="form-section accueil-section">
                    <h4 class="special-font">Accueil <span class="required-indicator">*</span></h4>
                    <div class="checkbox-group">
                        <label class="checkbox-item">
                            <input type="checkbox" name="accueil[]" value="dattes"> Dattes Majhoul
                        </label>
                        <label class="checkbox-item">
                            <input type="checkbox" name="accueil[]" value="lait"> Lait
                        </label>
                        <label class="checkbox-item">
                            <input type="checkbox" name="accueil[]" value="amuse_bouches"> Amuse-bouches
                        </label>
                    </div>
                </div>
                
                <div class="form-section cocktail-reception-section">
                    <h4 class="special-font">Cocktail Réception <span class="required-indicator">*</span></h4>
                    <div class="checkbox-group">
                        <label class="checkbox-item">
                            <input type="checkbox" name="cocktail[]" value="noga"> Noga
                        </label>
                        <label class="checkbox-item">
                            <input type="checkbox" name="cocktail[]" value="chocolat"> Chocolat
                        </label>
                        <label class="checkbox-item">
                            <input type="checkbox" name="cocktail[]" value="macaron"> Macaron
                        </label>
                        <label class="checkbox-item">
                            <input type="checkbox" name="cocktail[]" value="jus"> Jus varié
                        </label>
                        <label class="checkbox-item">
                            <input type="checkbox" name="cocktail[]" value="gateaux"> Gâteaux soirée
                        </label>
                        <label class="checkbox-item">
                            <input type="checkbox" name="cocktail[]" value="the"> Thé
                        </label>
                        <label class="checkbox-item">
                            <input type="checkbox" name="cocktail[]" value="sales"> Assortiment des salés
                        </label>
                        <label class="checkbox-item">
                            <input type="checkbox" name="cocktail[]" value="sushi"> Sushi
                        </label>
                    </div>
                </div>
           
                <div class="form-section">
                    <h4 class="special-font">Dîner Marocain <span class="required-indicator">*</span></h4>
                    <div class="checkbox-group">
                        <label class="checkbox-item">
                            <input type="checkbox" name="diner[]" value="fruits_mer"> Pastilla Fruits de mer
                        </label>
                        <label class="checkbox-item">
                            <input type="checkbox" name="diner[]" value="fruits_poulet"> Pastilla Poulet
                        </label>
                        <label class="checkbox-item">
                            <input type="checkbox" name="diner[]" value="poisson"> Poisson
                        </label>
                        <label class="checkbox-item">
                            <input type="checkbox" name="diner[]" value="tagine"> Tagine
                        </label>
                        <label class="checkbox-item">
                            <input type="checkbox" name="diner[]" value="boeuf"> Bœuf
                        </label>
                        <label class="checkbox-item">
                            <input type="checkbox" name="diner[]" value="mechoui"> Mechoui
                        </label>
                        <label class="checkbox-item">
                            <input type="checkbox" name="diner[]" value="poulet"> Poulet
                        </label>
                        <label class="checkbox-item">
                            <input type="checkbox" name="diner[]" value="fruits"> Fruits de saison
                        </label>
                    </div>
                </div>
                
                <div class="form-section">
                    <h4 class="special-font">Soirée <span class="required-indicator">*</span></h4>
                    <div class="checkbox-group">
                        <label class="checkbox-item">
                            <input type="checkbox" name="soiree[]" value="the"> Thé
                        </label>
                        <label class="checkbox-item">
                            <input type="checkbox" name="soiree[]" value="amande"> Gâteau 100% amande
                        </label>
                        <label class="checkbox-item">
                            <input type="checkbox" name="soiree[]" value="glace"> Glace
                        </label>
                        <label class="checkbox-item">
                            <input type="checkbox" name="soiree[]" value="tarte"> Tarte
                        </label>
                    </div>
                </div>
                
                <div class="form-section">
                    <h3>Options Supplémentaires</h3>
                    <div class="form-group">
                        <label>Pièce montée Américaine : <span class="required-indicator">*</span></label>
                        <div class="radio-group">
                            <label class="radio-item">
                                <input type="radio" name="piece_montee" value="oui"> Oui
                            </label>
                            <label class="radio-item">
                                <input type="radio" name="piece_montee" value="non"> Non
                            </label>
                        </div>
                    </div>
                
                    <div class="form-group">
                        <label for="message">Message :</label>
                        <textarea id="message" name="message" rows="4" placeholder="Votre message..."></textarea>
                    </div>
                </div>
                
                <button type="submit" class="btn-reserver">Réserver</button>
            </form>
        </div>
    </section>
    <?php include '../footer.html'; ?>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Définir la date minimale pour aujourd'hui
            const today = new Date().toISOString().split('T')[0];
            document.getElementById('date_debut').min = today;
            document.getElementById('date_fin').min = today;
            
            // Validation des dates
            const dateDebut = document.getElementById('date_debut');
            const dateFin = document.getElementById('date_fin');
            
            dateDebut.addEventListener('change', function() {
                if (dateFin.value && dateFin.value < dateDebut.value) {
                    dateFin.value = dateDebut.value;
                }
                dateFin.min = dateDebut.value;
            });
            
            // Validation du formulaire
            document.querySelector('.reservation-form').addEventListener('submit', function(e) {
                const form = e.target;
                let isValid = true;
                let message = "";
                
                // Champs obligatoires classiques
                const requiredFields = form.querySelectorAll('input[required], textarea[required], select[required]');
                requiredFields.forEach(field => {
                    if (!field.value.trim()) {
                        isValid = false;
                    }
                });
                
                // Groupes de checkbox
                const checkboxGroups = [
                    { name: "accueil[]", label: "Accueil" },
                    { name: "cocktail[]", label: "Cocktail Réception" },
                    { name: "diner[]", label: "Dîner Marocain" },
                    { name: "soiree[]", label: "Soirée" }
                ];
                
                checkboxGroups.forEach(group => {
                    const checkboxes = form.querySelectorAll(`input[name="${group.name}"]:checked`);
                    if (checkboxes.length === 0) {
                        isValid = false;
                        message += `Veuillez sélectionner au moins une option pour "${group.label}".\n`;
                    }
                });
                        
                // Validation de radio (Pièce montée)
                const pieceMontee = form.querySelectorAll('input[name="piece_montee"]:checked');
                if (pieceMontee.length === 0) {
                    isValid = false;
                    message += `Veuillez choisir une option pour "Pièce montée Américaine".\n`;
                }
                        
                if (!isValid) {
                    e.preventDefault();
                    alert("⚠️ Merci de remplir tous les champs obligatoires marqués par une étoile (*).\n\n" + message);
                }
            });
        });
    </script>
</body>
</html>
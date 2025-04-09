<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réservation</title>
    <link rel="stylesheet" href="style.css">
   <link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>
<body>
    <?php include '../../nav.html'; ?>
    <div class="image-container">
        <div>Créons ensemble des événements qui resteront gravés dans vos mémoires.</div>
        <h2>Réservation</h2>
    </div>
    <div class="reservation">
        <div class="content">
            <p>Créez l'événement de vos rêves avec notre Pack Modèle dès maintenant!</p>
        </div>
    </div>
    <section>
        <div class="Début">
            <form class="reservation-form">
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
                <h3>Détails de la Réservation:</h3>
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
            </div>
              <div class="form-section">
                <h3>Choix de l'Espace:<span class="required-indicator">*</span></h3>
                <div class="salles">
                    <label class="salle-option">
                        <input type="checkbox" name="espace[]" value="salle1">
                        <img src="include/images/salle1.jpg" alt="Salle 1">
                        <span class="salle-label">Salle 1</span>
                    </label>
                    <label class="salle-option">
                        <input type="checkbox" name="espace[]" value="salle2">
                        <img src="include/images/salle2.jpg" alt="Salle 2">
                        <span class="salle-label">Salle 2</span>
                    </label>
                    <label class="salle-option">
                        <input type="checkbox" name="espace[]" value="salle3">
                        <img src="include/images/salle3.jpg" alt="Salle 3">
                        <span class="salle-label">Salle 3</span>
                    </label>
                </div>
            </div>
            <div class="form-section accueil-section">
                <h4 class="special-font">Accueil:<span class="required-indicator">*</span></h4>
                <div class="checkbox-group">
                    <label class="checkbox-item ">
                        <input type="checkbox" name="accueil[]" value="dattes">    Dattes Majhoul
                    </label>
                    <label class="checkbox-item">
                        <input type="checkbox" name="accueil[]" value="lait">  Lait
                    </label>
                    <label class="checkbox-item ">
                        <input type="checkbox" name="accueil[]" value="amuse_bouches"> Amuse-bouches
                    </label>
                </div>
            </div>
            <div class="form-section CocktailRéception-section ">
                <h4 class="special-font">CocktailRéception:<span class="required-indicator">*</span></h4>
                <div class="checkbox-group">
                    <label class="checkbox-item ">
                        <input type="checkbox" name="cocktail[]" value="noga">Noga
                    </label>
                    <label class="checkbox-item">
                        <input type="checkbox" name="cocktail[]" value="chocolat"> Chocolat
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
                <h4 class="special-font">Dîner Marocain:<span class="required-indicator">*</span></h4>
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
                <h4 class="special-font">Soirée:<span class="required-indicator">*</span></h4>
                <div class="checkbox-group">
                    <label class="checkbox-item">
                        <input type="checkbox" name="soiree[]" value="the"> Thé
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
        </div>
        <div class="form-section">
            <h3 >Options Supplémentaires:</h3>
            <div class="form-group">
                <label>Piéce montée Américain :<span class="required-indicator">*</span></label>
                <div class="radio-group">
                    <label class="radio-item">
                        <input type="radio" name="piece_montee" value="oui">Oui
                    </label>
                    <label class="radio-item">
                        <input type="radio" name="piece_montee" value="non" >Non
                    </label>
                </div>
            </div>
        </div>
            <div class="form-group">
                <label for="message">Message :</label>
                <textarea id="message" name="message" rows="4" placeholder="Votre message..."></textarea>
            </div>
        </div>
            <button type="submit" class="btn-reserver">Réserver </button>
        </form>
    </div>
</section>
    <section class="packs">
        <h2>Harmonie</h2>
        <p>Célébrez votre événement comme vous l'avez toujours rêvé !</p>
    <div class="pack-buttons">
        <button class="btn-pack customize">Réserver vos maintenant
            <i class="fa-regular fa-paper-plane"></i>
        </button>
    </div>
    </section>
    <?php include '../../footer.html'; ?>
    <script>
            document.querySelector('.reservation-form').addEventListener('submit', function (e) {
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
            { name: "soiree[]", label: "Soirée" },
            { name: "espace[]", label: "Choix de l'espace" },
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
            message += `Veuillez choisir une option pour "Pièce montée Américain".\n`;
            }
                    
            if (!isValid) {
            e.preventDefault();
            alert("⚠️ Merci de remplir tous les champs obligatoires marqués par une étoile (*).\n\n" + message);
            }
            });
        </script>
        
</body>
</html>


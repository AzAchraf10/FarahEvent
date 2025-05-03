<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Événements - Admin</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="admin-container">
    <?php include '../dashboard.html'; ?>
    <div class="main-content">
        <header>
            <div class="container header-content">
                <h1 class="dashboard-title">&nbsp;&nbsp;&nbsp;Tableau de bord Admin</h1>
            </div>
        </header>
        <div class="dashboard-actions">
            <div class="search-bar">
                <input type="text" id="search-events" placeholder="Rechercher un événement...">
            </div>
            <button id="add-event-btn">+ Ajouter un événement</button>
        </div>
        <table class="events-table">
            <thead>
                <tr>
                    <th>Titre</th>
                    <th>Date</th>
                    <th>Espace</th>
                    <th>Statut</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="events-list">
                <!-- Événements chargés via AJAX -->
            </tbody>
        </table>

        <div class="pagination" id="pagination">
            <!-- Pagination générée par JavaScript -->
        </div>
    </div>

    <!-- Modal pour ajouter/modifier un événement -->
    <div class="modal" id="event-modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2 id="modal-title">Ajouter un événement</h2>
                <span class="close-modal">&times;</span>
            </div>
            <form id="event-form" class="reservation-form">
                <input type="hidden" id="event-id">
                
                <div class="form-section">
                    <h3>Informations de base:</h3>
                    <div class="form-group">
                        <label for="titre">Titre de l'événement :</label>
                        <input type="text" id="titre" name="titre" required>
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
                        <label for="etat">Statut :</label>
                        <select id="etat" name="etat" required>
                            <option value="planifié">Planifié</option>
                            <option value="confirmé">Confirmé</option>
                            <option value="annulé">Annulé</option>
                            <option value="terminé">Terminé</option>
                        </select>
                    </div>
                </div>
                
                <div class="form-section">
                    <h3>Informations Personnelles:</h3>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="nom">Nom :</label>
                            <input type="text" id="nom" name="nom" placeholder="Doe">
                        </div>
                        <div class="form-group">
                            <label for="prenom">Prénom :</label>
                            <input type="text" id="prenom" name="prenom" placeholder="John">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="telephone">Téléphone :</label>
                            <input type="tel" id="telephone" name="telephone" placeholder="+212 600 000 000">
                        </div>
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
                    <button type="button" id="cancel-event" class="btn-pack">Annuler</button>
                    <button type="submit" id="save-event" class="btn-reserver">Enregistrer l'événement</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal pour visualiser un événement -->
    <div class="modal" id="view-event-modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Détails de l'événement</h2>
                <span class="close-modal">&times;</span>
            </div>
            <div id="event-details">
                <!-- Les détails de l'événement seront injectés ici par JavaScript -->
            </div>
        </div>
    </div>
</div>

<script>
// Variables globales
let events = [];
let currentPage = 1;
const itemsPerPage = 10;

// Éléments DOM
const eventsList = document.getElementById('events-list');
const pagination = document.getElementById('pagination');
const eventModal = document.getElementById('event-modal');
const viewEventModal = document.getElementById('view-event-modal');
const eventForm = document.getElementById('event-form');
const modalTitle = document.getElementById('modal-title');
const searchInput = document.getElementById('search-events');
const addEventBtn = document.getElementById('add-event-btn');
const cancelEventBtn = document.getElementById('cancel-event');
const closeModalBtns = document.querySelectorAll('.close-modal');

// Initialisation
document.addEventListener('DOMContentLoaded', () => {
    loadEvents();
    setupEventListeners();
});

// Charger les événements depuis le serveur
async function loadEvents() {
    try {
        const response = await fetch('get_events.php');
        const data = await response.json();
        
        if (data.success) {
            events = data.data;
            renderEvents();
        } else {
            console.error('Erreur:', data.error);
            alert('Erreur lors du chargement des événements');
        }
    } catch (error) {
        console.error('Erreur de chargement:', error);
        alert('Erreur de connexion au serveur');
    }
}

// Configuration des écouteurs d'événements
function setupEventListeners() {
    addEventBtn.addEventListener('click', openAddEventModal);
    cancelEventBtn.addEventListener('click', closeEventModal);
    eventForm.addEventListener('submit', saveEvent);
    searchInput.addEventListener('input', handleSearch);
    
    closeModalBtns.forEach(btn => {
        btn.addEventListener('click', (e) => {
            if (e.target.closest('#event-modal')) {
                closeEventModal();
            }
            if (e.target.closest('#view-event-modal')) {
                closeViewEventModal();
            }
        });
    });
    
    // Fermeture des modales en cliquant à l'extérieur
    window.addEventListener('click', (e) => {
        if (e.target.classList.contains('modal')) {
            closeEventModal();
            closeViewEventModal();
        }
    });
    
    // Validation des dates
    const dateDebut = document.getElementById('date_debut');
    const dateFin = document.getElementById('date_fin');
    
    dateDebut.addEventListener('change', () => {
        if (dateFin.value && dateFin.value < dateDebut.value) {
            dateFin.value = dateDebut.value;
        }
        dateFin.min = dateDebut.value;
    });
}

// Afficher les événements
function renderEvents(filteredEvents = null) {
    const eventsToRender = filteredEvents || events;
    const startIndex = (currentPage - 1) * itemsPerPage;
    const endIndex = startIndex + itemsPerPage;
    const paginatedEvents = eventsToRender.slice(startIndex, endIndex);
    
    eventsList.innerHTML = '';
    
    if (paginatedEvents.length === 0) {
        eventsList.innerHTML = `
            <tr>
                <td colspan="5" style="text-align: center;">Aucun événement trouvé</td>
            </tr>
        `;
        return;
    }
    
    paginatedEvents.forEach(event => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${event.titre}</td>
            <td>${formatDate(event.dateDebut)}</td>
            <td>${event.espace ? event.espace.replace('salle', 'Salle ') : 'Non spécifié'}</td>
            <td><span class="status-badge ${event.état}">${event.état}</span></td>
            <td class="actions-cell">
                <button class="btn-view" data-id="${event.id}">Voir</button>
                <button class="btn-edit" data-id="${event.id}">Éditer</button>
                <button class="btn-delete" data-id="${event.id}">Supprimer</button>
            </td>
        `;
        eventsList.appendChild(row);
    });
    
    // Ajout des écouteurs sur les boutons d'actions
    document.querySelectorAll('.btn-view').forEach(btn => {
        btn.addEventListener('click', () => openViewEventModal(parseInt(btn.dataset.id)));
    });
    
    document.querySelectorAll('.btn-edit').forEach(btn => {
        btn.addEventListener('click', () => openEditEventModal(parseInt(btn.dataset.id)));
    });
    
    document.querySelectorAll('.btn-delete').forEach(btn => {
        btn.addEventListener('click', () => deleteEvent(parseInt(btn.dataset.id)));
    });
    
    renderPagination(eventsToRender.length);
}

// Générer la pagination
function renderPagination(totalItems) {
    const pageCount = Math.ceil(totalItems / itemsPerPage);
    pagination.innerHTML = '';
    
    if (pageCount <= 1) return;
    
    // Bouton précédent
    if (currentPage > 1) {
        const prevBtn = document.createElement('button');
        prevBtn.textContent = '«';
        prevBtn.addEventListener('click', () => {
            currentPage--;
            renderEvents();
        });
        pagination.appendChild(prevBtn);
    }
    
    // Pages numérotées
    for (let i = 1; i <= pageCount; i++) {
        const pageBtn = document.createElement('button');
        pageBtn.textContent = i;
        if (i === currentPage) {
            pageBtn.classList.add('active');
        }
        pageBtn.addEventListener('click', () => {
            currentPage = i;
            renderEvents();
        });
        pagination.appendChild(pageBtn);
    }
    
    // Bouton suivant
    if (currentPage < pageCount) {
        const nextBtn = document.createElement('button');
        nextBtn.textContent = '»';
        nextBtn.addEventListener('click', () => {
            currentPage++;
            renderEvents();
        });
        pagination.appendChild(nextBtn);
    }
}

// Fonction de recherche
function handleSearch() {
    const searchTerm = searchInput.value.toLowerCase().trim();
    
    if (searchTerm === '') {
        renderEvents();
        return;
    }
    
    const filteredEvents = events.filter(event => 
        (event.titre && event.titre.toLowerCase().includes(searchTerm)) || 
        (event.espace && event.espace.toLowerCase().includes(searchTerm)) ||
        (event.dateDebut && formatDate(event.dateDebut).toLowerCase().includes(searchTerm)) ||
        (event.nom && event.nom.toLowerCase().includes(searchTerm)) ||
        (event.prenom && event.prenom.toLowerCase().includes(searchTerm)) ||
        (event.telephone && event.telephone.toLowerCase().includes(searchTerm))
    );
    
    currentPage = 1;
    renderEvents(filteredEvents);
}

// Ouvrir la modale pour visualiser un événement
function openViewEventModal(id) {
    const event = events.find(e => e.id === id);
    if (!event) return;
    
    const eventDetails = document.getElementById('event-details');
    
    // Créer le contenu des détails
    let detailsHTML = `
        <div class="event-detail-card">
            <h3>${event.titre}</h3>
            <p><strong>Date de début:</strong> ${formatDate(event.dateDebut)}</p>
            <p><strong>Date de fin:</strong> ${formatDate(event.dateFin)}</p>
            <p><strong>Statut:</strong> <span class="status-badge ${event.état}">${event.état}</span></p>
            <p><strong>Espace:</strong> ${event.espace ? event.espace.replace('salle', 'Salle ') : 'Non spécifié'}</p>
    `;
    
    // Ajouter les informations personnelles si disponibles
    if (event.nom || event.prenom) {
        detailsHTML += `<p><strong>Client:</strong> ${event.prenom || ''} ${event.nom || ''}</p>`;
    }
    if (event.telephone) {
        detailsHTML += `<p><strong>Téléphone:</strong> ${event.telephone}</p>`;
    }
    
    // Ajouter les détails de réservation
    detailsHTML += `
            <p><strong>Nombre de tables:</strong> ${event.nombre_tables || 'Non spécifié'}</p>
    `;
    
    // Ajouter les options sélectionnées
    detailsHTML += `<div class="event-options">`;
    
    const addOptionsSection = (title, options) => {
        if (options && options.length > 0) {
            detailsHTML += `<h4>${title}:</h4><ul>`;
            options.forEach(opt => {
                detailsHTML += `<li>${getOptionName(opt)}</li>`;
            });
            detailsHTML += `</ul>`;
        }
    };
    
    addOptionsSection('Accueil', event.accueil);
    addOptionsSection('Cocktail', event.cocktail);
    addOptionsSection('Dîner', event.diner);
    addOptionsSection('Soirée', event.soiree);
    
    if (event.piece_montee === 'oui') {
        detailsHTML += `<p><strong>Pièce montée:</strong> Oui</p>`;
    }
    
    // Ajouter le message s'il existe
    if (event.message) {
        detailsHTML += `<div class="event-message"><strong>Message:</strong><p>${event.message}</p></div>`;
    }
    
    detailsHTML += `</div></div>`;
    
    eventDetails.innerHTML = detailsHTML;
    viewEventModal.style.display = 'flex';
}

// Fermer la modale de visualisation
function closeViewEventModal() {
    viewEventModal.style.display = 'none';
}

// Ouvrir la modale pour ajouter un événement
function openAddEventModal() {
    modalTitle.textContent = 'Ajouter un événement';
    eventForm.reset();
    document.getElementById('event-id').value = '';
    
    // Définir la date minimale pour aujourd'hui
    const today = new Date().toISOString().split('T')[0];
    document.getElementById('date_debut').min = today;
    document.getElementById('date_fin').min = today;
    
    // Définir le statut par défaut
    document.getElementById('etat').value = 'planifié';
    
    eventModal.style.display = 'flex';
}

// Ouvrir la modale pour éditer un événement
function openEditEventModal(id) {
    const event = events.find(e => e.id === id);
    if (!event) return;
    
    modalTitle.textContent = 'Modifier l\'événement';
    
    // Remplir le formulaire avec les données de l'événement
    document.getElementById('event-id').value = event.id;
    document.getElementById('titre').value = event.titre;
    document.getElementById('date_debut').value = event.dateDebut;
    document.getElementById('date_fin').value = event.dateFin;
    document.getElementById('etat').value = event.état;
    
    // Informations personnelles
    if (event.nom) document.getElementById('nom').value = event.nom;
    if (event.prenom) document.getElementById('prenom').value = event.prenom;
    if (event.telephone) document.getElementById('telephone').value = event.telephone;
    
    // Détails de réservation
    if (event.nombre_tables) document.getElementById('nombre_tables').value = event.nombre_tables;
    
    // Sélectionner la salle
    if (event.espace) {
        const salleRadio = document.querySelector(`input[name="espace"][value="${event.espace}"]`);
        if (salleRadio) salleRadio.checked = true;
    }
    
    // Sélectionner les options
    const checkOptions = (name, values) => {
        if (values && values.length > 0) {
            values.forEach(val => {
                const checkbox = document.querySelector(`input[name="${name}[]"][value="${val}"]`);
                if (checkbox) checkbox.checked = true;
            });
        }
    };
    
    checkOptions('accueil', event.accueil);
    checkOptions('cocktail', event.cocktail);
    checkOptions('diner', event.diner);
    checkOptions('soiree', event.soiree);
    
    // Pièce montée
    if (event.piece_montee) {
        const pieceMonteeRadio = document.querySelector(`input[name="piece_montee"][value="${event.piece_montee}"]`);
        if (pieceMonteeRadio) pieceMonteeRadio.checked = true;
    }
    
    // Message
    if (event.message) document.getElementById('message').value = event.message;
    
    eventModal.style.display = 'flex';
}

// Fermer la modale d'événement
function closeEventModal() {
    eventModal.style.display = 'none';
}

// Enregistrer un événement (ajout ou modification)
async function saveEvent(e) {
    e.preventDefault();
    
    const formData = new FormData(eventForm);
    const eventId = document.getElementById('event-id').value;
    
    // Récupérer les cases à cocher sélectionnées
    const getCheckedValues = (name) => {
        return Array.from(document.querySelectorAll(`input[name="${name}[]"]:checked`)).map(el => el.value);
    };
    
    // Créer un objet avec toutes les données
    const eventData = {
        titre: formData.get('titre'),
        date_debut: formData.get('date_debut'),
        date_fin: formData.get('date_fin'),
        etat: formData.get('etat'),
        nom: formData.get('nom'),
        prenom: formData.get('prenom'),
        telephone: formData.get('telephone'),
        nombre_tables: formData.get('nombre_tables'),
        espace: formData.get('espace'),
        accueil: getCheckedValues('accueil'),
        cocktail: getCheckedValues('cocktail'),
        diner: getCheckedValues('diner'),
        soiree: getCheckedValues('soiree'),
        piece_montee: formData.get('piece_montee'),
        message: formData.get('message')
    };
    
    // Déterminer l'URL et la méthode en fonction de l'ID
    const url = eventId ? 'update_event.php' : 'create_event.php';
    const method = 'POST';
    
    try {
        // Ajouter l'ID si c'est une modification
        if (eventId) {
            eventData.id = eventId;
        }
        
        const response = await fetch(url, {
            method,
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(eventData)
        });
        
        const data = await response.json();
        
        if (data.success) {
            loadEvents(); // Recharger la liste
            closeEventModal();
            alert(eventId ? 'Événement mis à jour avec succès!' : 'Événement ajouté avec succès!');
        } else {
            alert('Erreur: ' + (data.error || 'Une erreur est survenue'));
        }
    } catch (error) {
        console.error('Erreur:', error);
        alert('Erreur de connexion au serveur');
    }
}

// Supprimer un événement
async function deleteEvent(id) {
    if (!confirm('Voulez-vous vraiment supprimer cet événement ? Cette action est irréversible.')) {
        return;
    }
    
    try {
        const response = await fetch('delete_event.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ id })
        });
        
        const data = await response.json();
        
        if (data.success) {
            loadEvents(); // Recharger la liste
            alert('Événement supprimé avec succès');
        } else {
            alert('Erreur: ' + (data.error || 'Échec de la suppression'));
        }
    } catch (error) {
        console.error('Erreur:', error);
        alert('Erreur de connexion au serveur');
    }
}

// Utilitaires
function formatDate(dateString) {
    if (!dateString) return '';
    const date = new Date(dateString);
    return date.toLocaleDateString('fr-FR', {
        day: '2-digit',
        month: '2-digit',
        year: 'numeric'
    });
}

function getOptionName(optionValue) {
    const optionsMap = {
        'dattes': 'Dattes Majhoul',
        'lait': 'Lait',
        'amuse_bouches': 'Amuse-bouches',
        'noga': 'Noga',
        'chocolat': 'Chocolat',
        'macaron': 'Macaron',
        'jus': 'Jus varié',
        'gateaux': 'Gâteaux soirée',
        'the': 'Thé',
        'sales': 'Assortiment des salés',
        'sushi': 'Sushi',
        'fruits_mer': 'Pastilla Fruits de mer',
        'fruits_poulet': 'Pastilla Poulet',
        'poisson': 'Poisson',
        'tagine': 'Tagine',
        'boeuf': 'Bœuf',
        'mechoui': 'Mechoui',
        'poulet': 'Poulet',
        'fruits': 'Fruits de saison',
        'amande': 'Gâteau 100% amande',
        'glace': 'Glace',
        'tarte': 'Tarte'
    };
    
    return optionsMap[optionValue] || optionValue;
}
</script>
</body>
</html>
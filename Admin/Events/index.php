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
    <?php include '../dashboard.php'; ?>
    <div class="main-content">
    <header>
        <div class="container header-content">
            <h1 class="dashboard-title">&nbsp;&nbsp;&nbsp;Tableau de bord Admin</h1>
        </div>
    </header>

    <div class="container">
        <div class="dashboard-actions">
            <div class="search-bar">
                <input type="text" id="search-events" placeholder="Rechercher un événement...">
            </div>
            <button id="add-event-btn">+ Ajouter un événement</button>
        </div>
        <!-- Stats Cards -->
        <div class="stats-cards">
            <div class="card stat-card">
                <div class="icon">📅</div>
                <p>Total Événements</p>
                <h3 id="total-events">124</h3>
            </div>
            <div class="card stat-card">
                <div class="icon">✓</div>
                <p>Événements Actifs</p>
                <h3 id="active-events">86</h3>
            </div>
            <div class="card stat-card">
                <div class="icon">⏱️</div>
                <p>En attente</p>
                <h3 id="pending-events">28</h3>
            </div>
            <div class="card stat-card">
                <div class="icon">👥</div>
                <p>Participants</p>
                <h3 id="total-participants">1,240</h3>
            </div>
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
                <!-- Événements injectés par JavaScript -->
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
             <!-- Insertion du formulaire de réservation ici -->
             <form id="event-form" class="reservation-form">
                <input type="hidden" id="event-id">
                
                <div class="form-section">
                    <h3>Informations Personnelles:</h3>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="nom">Nom : </label>
                            <input type="text" id="nom" name="nom" placeholder="Doe" required>
                        </div>
                        <div class="form-group">
                            <label for="prenom">Prénom :</label>
                            <input type="text" id="prenom" name="prenom" placeholder="John" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="telephone">Téléphone : </label>
                            <input type="tel" id="telephone" name="telephone" placeholder="+212 600 000 000" required>
                        </div>
                        <div class="form-group">
                            <label for="adresse">Adresse : </label>
                            <input type="text" id="adresse" name="adresse" placeholder="123 Rue Principale" required>
                        </div>
                    </div>
                </div>
          
                <div class="form-section">
                    <h3>Détails de la Réservation:</h3>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="date_debut">Date de début :</label>
                            <input type="date" id="date_debut" name="date_debut" required> 
                        </div>
                        <div class="form-group">
                            <label for="date_fin">Date de fin : </label>
                            <input type="date" id="date_fin" name="date_fin" required>
                        </div>
                    </div>
                </div>
              
                <div class="form-section">
                    <h3>Choix de l'Espace:</h3>
                    <div class="salles">
                        <label class="salle-option">
                            <input type="checkbox" name="espace[]" value="salle1">
                            <img src="images/salle1.jpg" alt="Salle 1">
                            <span class="salle-label">Salle 1</span>
                        </label>
                        <label class="salle-option">
                            <input type="checkbox" name="espace[]" value="salle2">
                            <img src="images/salle2.jpg" alt="Salle 2">
                            <span class="salle-label">Salle 2</span>
                        </label>
                        <label class="salle-option">
                            <input type="checkbox" name="espace[]" value="salle3">
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
                    <h4 class="special-font">CocktailRéception:</h4>
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
                        <label>Piéce montée Américain :</label>
                        <div class="radio-group">
                            <label class="radio-item">
                                <input type="radio" name="piece_montee" value="oui">Oui
                            </label>
                            <label class="radio-item">
                                <input type="radio" name="piece_montee" value="non">Non
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
                    <button type="submit" id="save-event" class="btn-reserver">Enregistrer l'evenement</button>
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
</div>
<script>
    // Données exemple pour les événements
    let events = [
        {
            id: 1,
            title: "Mariage",
            date: "2025-05-15",
            time: "20:00",
            category: "salle1",
            status: "published"
        },
        {
            id: 2,
            title: "Mariage",
            date: "2025-06-20",
            time: "22:00",
            category: "salle2",
            status: "published"
        },
        {
            id: 3,
            title: "Mariage",
            date: "2025-07-05",
            time: "22:30",
            category: "salle3",
            status: "draft"
        },
        {
            id: 4,
            title: "Mariage",
            date: "2025-06-20",
            time: "23:00",
            category: "salle2",
            status: "draft"
        },
        {
            id: 5,
            title: "Mariage",
            date: "2025-09-25",
            time: "19:30",
            category: "salle1",
            status: "cancelled"
        }
    ];
    
    // Variables pour la pagination
    const itemsPerPage = 5;
    let currentPage = 1;
    
    // Éléments DOM
    const eventsList = document.getElementById('events-list');
    const pagination = document.getElementById('pagination');
    const eventModal = document.getElementById('event-modal');
    const viewEventModal = document.getElementById('view-event-modal');
    const eventForm = document.getElementById('event-form');
    const modalTitle = document.getElementById('modal-title');
    const searchInput = document.getElementById('search-events');
    
    // Boutons
    const addEventBtn = document.getElementById('add-event-btn');
    const cancelEventBtn = document.getElementById('cancel-event');
    const closeModalBtns = document.querySelectorAll('.close-modal');
    
    // Initialisation
    document.addEventListener('DOMContentLoaded', () => {
        renderEvents();
        setupEventListeners();
        updateStats();
    });
    
    // Mise à jour des statistiques
    function updateStats() {
        const totalEvents = events.length;
        const activeEvents = events.filter(e => e.status === 'published').length;
        const pendingEvents = events.filter(e => e.status === 'draft').length;
        const totalParticipants = totalEvents * 150; // Estimation simple
        
        document.getElementById('total-events').textContent = totalEvents;
        document.getElementById('active-events').textContent = activeEvents;
        document.getElementById('pending-events').textContent = pendingEvents;
        document.getElementById('total-participants').textContent = totalParticipants.toLocaleString();
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
            // Assurer que la date de fin n'est pas antérieure à la date de début
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
                <td>${event.title}</td>
                <td>${formatDate(event.date)} à ${event.time}</td>
                <td>${getCategoryName(event.category)}</td>
                <td><span class="status-badge ${event.status}">${getStatusName(event.status)}</span></td>
                <td class="actions-cell">
                    <button class="btn-view" data-id="${event.id}">Voir</button>
                    <button class="btn-edit" data-id="${event.id}">Éditer</button>
                    <button class="btn-delete" data-id="${event.id}" disabled>Supprimer</button>
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
        
        // Le bouton supprimer est désactivé, donc pas d'écouteur nécessaire
        
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
            // Si le champ de recherche est vide, afficher tous les événements
            renderEvents();
            return;
        }
        
        // Filtrer les événements qui correspondent au terme de recherche
        const filteredEvents = events.filter(event => 
            event.title.toLowerCase().includes(searchTerm) || 
            event.category.toLowerCase().includes(searchTerm) ||
            formatDate(event.date).toLowerCase().includes(searchTerm) ||
            (event.nom && event.nom.toLowerCase().includes(searchTerm)) ||
            (event.prenom && event.prenom.toLowerCase().includes(searchTerm)) ||
            (event.telephone && event.telephone.toLowerCase().includes(searchTerm))
        );
        
        // Réinitialiser la pagination lors d'une recherche
        currentPage = 1;
        
        // Afficher les résultats filtrés
        renderEvents(filteredEvents);
    }
    
    // Ouvrir la modale pour visualiser un événement
    function openViewEventModal(id) {
        const event = events.find(e => e.id === id);
        if (!event) return;
        
        const eventDetails = document.getElementById('event-details');
        eventDetails.innerHTML = `
            <div class="card">
                <h3>${event.title}</h3>
                <p><strong>Date:</strong> ${formatDate(event.date)}</p>
                <p><strong>Heure:</strong> ${event.time}</p>
                <p><strong>Espace:</strong> ${getCategoryName(event.category)}</p>
                <p><strong>Statut:</strong> <span class="status-badge ${event.status}">${getStatusName(event.status)}</span></p>
                ${event.nom ? `<p><strong>Nom:</strong> ${event.nom} ${event.prenom || ''}</p>` : ''}
                ${event.telephone ? `<p><strong>Téléphone:</strong> ${event.telephone}</p>` : ''}
                ${event.adresse ? `<p><strong>Adresse:</strong> ${event.adresse}</p>` : ''}
                ${event.message ? `<p><strong>Message:</strong> ${event.message}</p>` : ''}
            </div>
        `;
        
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
        
        // Définir la date minimale pour les dates
        const today = new Date().toISOString().split('T')[0];
        document.getElementById('date_debut').min = today;
        document.getElementById('date_fin').min = today;
        
        eventModal.style.display = 'flex';
    }
    
    // Ouvrir la modale pour éditer un événement
    function openEditEventModal(id) {
        const event = events.find(e => e.id === id);
        if (!event) return;
        
        modalTitle.textContent = 'Modifier l\'événement';
        
        // Remplir le formulaire avec les données de l'événement
        document.getElementById('event-id').value = event.id;
        
        // Remplir les informations de base
        if (event.nom) document.getElementById('nom').value = event.nom;
        if (event.prenom) document.getElementById('prenom').value = event.prenom;
        if (event.telephone) document.getElementById('telephone').value = event.telephone;
        if (event.adresse) document.getElementById('adresse').value = event.adresse;
        
        // Dates
        document.getElementById('date_debut').value = event.date;
        if (event.date_fin) {
            document.getElementById('date_fin').value = event.date_fin;
        } else {
            // Par défaut, même date que la date de début
            document.getElementById('date_fin').value = event.date;
        }
        
        // Sélectionner la salle appropriée
        const salleCheckboxes = document.querySelectorAll('input[name="espace[]"]');
        salleCheckboxes.forEach(checkbox => {
            checkbox.checked = checkbox.value === event.category;
        });
        
        // Message (s'il existe)
        if (event.message) document.getElementById('message').value = event.message;
        
        // Afficher la modale
        eventModal.style.display = 'flex';
    }
    
    // Supprimer un événement (fonction conservée mais jamais appelée car boutons désactivés)
    function deleteEvent(id) {
        if (confirm('Êtes-vous sûr de vouloir supprimer cet événement ?')) {
            events = events.filter(event => event.id !== id);
            renderEvents();
            updateStats();
            alert('Événement supprimé avec succès!');
        }
    }
    
    // Fermer la modale d'événement
    function closeEventModal() {
        eventModal.style.display = 'none';
    }
    
    // Enregistrer un événement (ajout ou modification)
    function saveEvent(e) {
        e.preventDefault();
        
        const eventId = document.getElementById('event-id').value;
        const eventData = {
            // Récupération des valeurs du formulaire
            title: "Mariage", // Titre par défaut ou autre logique selon vos besoins
            date: document.getElementById('date_debut').value,
            time: eventId ? events.find(e => e.id === parseInt(eventId)).time || "20:00" : "20:00", // Conserver l'heure existante ou utiliser une valeur par défaut
            
            // Trouver quelle salle est sélectionnée
            category: Array.from(document.querySelectorAll('input[name="espace[]"]:checked'))
                .map(cb => cb.value)[0] || 'salle1', // Prendre la première salle sélectionnée ou 'salle1' par défaut
                
            // Autres données
            status: eventId ? events.find(e => e.id === parseInt(eventId)).status : 'draft',
            
            // Informations personnelles
            nom: document.getElementById('nom').value,
            prenom: document.getElementById('prenom').value,
            telephone: document.getElementById('telephone').value,
            adresse: document.getElementById('adresse').value,
            
            // Date de fin
            date_fin: document.getElementById('date_fin').value,
            
            // Message
            message: document.getElementById('message').value,
            
            // Options sélectionnées
            options: {
                accueil: Array.from(document.querySelectorAll('input[name="accueil[]"]:checked')).map(cb => cb.value),
                cocktail: Array.from(document.querySelectorAll('input[name="cocktail[]"]:checked')).map(cb => cb.value),
                diner: Array.from(document.querySelectorAll('input[name="diner[]"]:checked')).map(cb => cb.value),
                soiree: Array.from(document.querySelectorAll('input[name="soiree[]"]:checked')).map(cb => cb.value),
                piece_montee: document.querySelector('input[name="piece_montee"]:checked')?.value || 'non'
            }
        };
        
        if (eventId) {
            // Mise à jour d'un événement existant
            const index = events.findIndex(e => e.id === parseInt(eventId));
            if (index !== -1) {
                events[index] = {
                    ...events[index],
                    ...eventData
                };
            }
        } else {
            // Ajout d'un nouvel événement
            const newId = events.length > 0 ? Math.max(...events.map(e => e.id)) + 1 : 1;
            events.push({
                id: newId,
                ...eventData
            });
        }
        
        closeEventModal();
        updateStats();
        renderEvents();
        
        // Feedback pour l'utilisateur
        alert(eventId ? 'Événement mis à jour avec succès!' : 'Événement ajouté avec succès!');
    }
    
    // Utilitaires
    function formatDate(dateString) {
        if (!dateString) return '';
        const options = { day: '2-digit', month: '2-digit', year: 'numeric' };
        return new Date(dateString).toLocaleDateString('fr-FR', options);
    }
    
    function getCategoryName(categoryKey) {
        const categories = {
            'salle1': 'Salle 1',
            'salle2': 'Salle 2',
            'salle3': 'Salle 3'
        };
        return categories[categoryKey] || categoryKey;
    }
    
    function getStatusName(statusKey) {
        const statuses = {
            'published': 'Publié',
            'draft': 'Brouillon',
            'cancelled': 'Annulé',
            'completed': 'Terminé'
        };
        return statuses[statusKey] || statusKey;
    }
</script>
</body>
</html>

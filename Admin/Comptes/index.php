<?php 
// Inclusion du tableau de bord avec les éléments de navigation
include('../dashboard.html');
?> 

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Comptes - Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="/FarahEvent/Admin/styles/dashboard.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="admin-container">
    <!-- Sidebar inclus via header.php -->
    
    <div class="main-content">
        <header class="content-header">
            <h1>Gestion des Comptes</h1>
            <button class="btn btn-primary" id="openModal">
                <i class="fas fa-plus"></i> Créer un compte
            </button>
        </header>

        <!-- Tableau des comptes -->
        <div class="table-container">
            <div class="table-header">
                <h2>Comptes Utilisateurs</h2>
                <div class="search-box">
                    <i class="fas fa-search"></i>
                    <input type="text" id="searchInput" placeholder="Rechercher des comptes...">
                </div>
            </div>
            
            <table class="users-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Email</th>
                        <th>Rôle</th>
                        <th>Statut</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="usersTableBody">
                    <tr>
                        <td>#1001</td>
                        <td>Dupont</td>
                        <td>Jean</td>
                        <td>jean@example.com</td>
                        <td><span class="badge admin">Administrateur</span></td>
                        <td><span class="badge active">Actif</span></td>
                        <td class="actions">
                            <button class="btn btn-view"><i class="fas fa-eye"></i></button>
                            <button class="btn btn-edit"><i class="fas fa-edit"></i></button>
                            <button class="btn btn-delete"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                    <!-- Ajoutez d'autres lignes au besoin -->
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Création/Édition -->
<div class="modal-overlay" id="accountModal">
    <div class="modal">
        <div class="modal-header">
            <h2 id="modalTitle">Créer un compte</h2>
            <button class="modal-close" id="closeModal">&times;</button>
        </div>
        <div class="modal-body">
            <form id="accountForm" method="post" action="process_account.php">
                <input type="hidden" name="user_id" id="userId">
                <div class="form-group">
                    <label for="lastName">Nom</label>
                    <input type="text" id="lastName" name="lastName" required>
                </div>
                <div class="form-group">
                    <label for="firstName">Prénom</label>
                    <input type="text" id="firstName" name="firstName" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" id="password" name="password">
                    <small>(Laissez vide pour conserver le mot de passe actuel lors de la modification)</small>
                </div>
                <div class="form-group">
                    <label for="role">Rôle</label>
                    <select id="role" name="role" required>
                        <option value="">Sélectionner un rôle</option>
                        <option value="admin">Administrateur</option>
                        <option value="user">Client</option>
                    </select>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button class="btn btn-cancel" id="cancelModal">Annuler</button>
            <button class="btn btn-save" id="saveAccount">Enregistrer</button>
        </div>
    </div>
</div>

<!-- Modal Voir -->
<div class="modal-overlay" id="viewModal">
    <div class="modal">
        <div class="modal-header">
            <h2>Détails du compte</h2>
            <button class="modal-close" id="closeViewModal">&times;</button>
        </div>
        <div class="modal-body">
            <div class="user-profile">
                <div class="user-avatar">
                    <i class="fas fa-user-circle"></i>
                </div>
                <div class="user-details">
                    <h3 id="viewName">Jean Dupont</h3>
                    <p id="viewEmail">jean@example.com</p>
                    <p id="viewRole" class="badge admin">Administrateur</p>
                </div>
            </div>
            <div class="detail-section">
                <h4>Informations du compte</h4>
                <div class="detail-row">
                    <span class="detail-label">ID:</span>
                    <span id="viewId" class="detail-value">#1001</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Date de création:</span>
                    <span id="viewCreationDate" class="detail-value">15/02/2023</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Dernière connexion:</span>
                    <span id="viewLastLogin" class="detail-value">Aujourd'hui, 09:45</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Statut:</span>
                    <span class="detail-value"><span id="viewStatus" class="badge active">Actif</span></span>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn btn-cancel" id="closeViewBtn">Fermer</button>
            <button class="btn btn-edit" id="editFromView">Modifier</button>
        </div>
    </div>
</div>

<script>
    // Gestion du modal principal (création/édition)
    const modal = document.getElementById('accountModal');
    const openBtn = document.getElementById('openModal');
    const closeBtn = document.getElementById('closeModal');
    const cancelBtn = document.getElementById('cancelModal');
    const saveBtn = document.getElementById('saveAccount');
    const accountForm = document.getElementById('accountForm');
    const modalTitle = document.getElementById('modalTitle');
    
    // Fonction pour réinitialiser le formulaire
    function resetForm() {
        accountForm.reset();
        document.getElementById('userId').value = '';
        modalTitle.textContent = 'Créer un compte';
    }

    openBtn.addEventListener('click', () => {
        resetForm();
        modal.classList.add('active');
    });
    
    closeBtn.addEventListener('click', () => modal.classList.remove('active'));
    cancelBtn.addEventListener('click', () => modal.classList.remove('active'));
    
    // Soumission du formulaire
    saveBtn.addEventListener('click', () => {
        if(accountForm.checkValidity()) {
            accountForm.submit();
        } else {
            // Déclencher la validation HTML5
            const submitEvent = new Event('submit', {
                'bubbles': true,
                'cancelable': true
            });
            accountForm.dispatchEvent(submitEvent);
        }
    });

    // Fermer le modal en cliquant à l'extérieur
    modal.addEventListener('click', (e) => {
        if (e.target === modal) {
            modal.classList.remove('active');
        }
    });

    // Gestion du modal de visualisation
    const viewModal = document.getElementById('viewModal');
    const closeViewModal = document.getElementById('closeViewModal');
    const closeViewBtn = document.getElementById('closeViewBtn');
    const editFromView = document.getElementById('editFromView');
    
    closeViewModal.addEventListener('click', () => viewModal.classList.remove('active'));
    closeViewBtn.addEventListener('click', () => viewModal.classList.remove('active'));

    // Délégation d'événements pour les boutons d'action
    document.getElementById('usersTableBody').addEventListener('click', (event) => {
        const target = event.target.closest('button');
        if (!target) return;
        
        const row = target.closest('tr');
        const userId = row.cells[0].textContent;
        const lastName = row.cells[1].textContent;
        const firstName = row.cells[2].textContent;
        const email = row.cells[3].textContent;
        const role = row.cells[4].querySelector('.badge').textContent;
        
        if (target.classList.contains('btn-view')) {
            // Remplir les détails de l'utilisateur
            document.getElementById('viewId').textContent = userId;
            document.getElementById('viewName').textContent = `${firstName} ${lastName}`;
            document.getElementById('viewEmail').textContent = email;
            document.getElementById('viewRole').textContent = role;
            
            viewModal.classList.add('active');
        } else if (target.classList.contains('btn-edit')) {
            // Préremplir le formulaire pour l'édition
            document.getElementById('userId').value = userId.replace('#', '');
            document.getElementById('lastName').value = lastName;
            document.getElementById('firstName').value = firstName;
            document.getElementById('email').value = email;
            document.getElementById('role').value = role.toLowerCase() === 'administrateur' ? 'admin' : 'user';
            
            modalTitle.textContent = 'Modifier un compte';
            modal.classList.add('active');
        } else if (target.classList.contains('btn-delete')) {
            if (confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur?')) {
                // Code pour supprimer l'utilisateur
                // Peut être remplacé par une requête AJAX
                window.location.href = `delete_account.php?id=${userId.replace('#', '')}`;
            }
        }
    });

    // Passer du modal de visualisation à l'édition
    editFromView.addEventListener('click', () => {
        const userId = document.getElementById('viewId').textContent;
        const fullName = document.getElementById('viewName').textContent.split(' ');
        const firstName = fullName[0];
        const lastName = fullName.slice(1).join(' ');
        const email = document.getElementById('viewEmail').textContent;
        const role = document.getElementById('viewRole').textContent;
        
        // Préremplir le formulaire
        document.getElementById('userId').value = userId.replace('#', '');
        document.getElementById('lastName').value = lastName;
        document.getElementById('firstName').value = firstName;
        document.getElementById('email').value = email;
        document.getElementById('role').value = role.toLowerCase() === 'administrateur' ? 'admin' : 'user';
        
        modalTitle.textContent = 'Modifier un compte';
        
        viewModal.classList.remove('active');
        setTimeout(() => {
            modal.classList.add('active');
        }, 300);
    });
    
    // Fonctionnalité de recherche
    document.getElementById('searchInput').addEventListener('input', function() {
        const searchText = this.value.toLowerCase();
        const rows = document.querySelectorAll('#usersTableBody tr');
        
        rows.forEach(row => {
            const text = row.textContent.toLowerCase();
            row.style.display = text.includes(searchText) ? '' : 'none';
        });
    });
</script>
</body>
</html>
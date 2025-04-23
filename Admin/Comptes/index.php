<?php 
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
    <!-- Sidebar inclus via dashboard.php -->
    
    <div class="main-content">
        <header class="content-header">
            <h1>Gestion des Comptes</h1>
            <button class="btn btn-primary" id="openModal">
                <i class="fas fa-plus"></i> Créer un compte
            </button>
        </header>

        <!-- Stats Cards -->
        <div class="stats-cards">
            <div class="card stat-card">
                <div class="stat-icon blue">
                    <i class="fas fa-users"></i>
                </div>
                <div class="stat-info">
                    <h3>24</h3>
                    <p>Total Utilisateurs</p>
                </div>
            </div>
            
            <div class="card stat-card">
                <div class="stat-icon green">
                    <i class="fas fa-user-shield"></i>
                </div>
                <div class="stat-info">
                    <h3>8</h3>
                    <p>Administrateurs</p>
                </div>
            </div>
            
            <div class="card stat-card">
                <div class="stat-icon orange">
                    <i class="fas fa-user"></i>
                </div>
                <div class="stat-info">
                    <h3>16</h3>
                    <p>Utilisateurs Standard</p>
                </div>
            </div>
        </div>

        <!-- Tableau des comptes -->
        <div class="table-container">
            <div class="table-header">
                <h2>Comptes Utilisateurs</h2>
                <div class="search-box">
                    <i class="fas fa-search"></i>
                    <input type="text" placeholder="Rechercher des comptes...">
                </div>
            </div>
            
            <table class="users-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Email</th>
                        <th>Rôle</th>
                        <th>Statut</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>#1001</td>
                        <td>Jean Dupont</td>
                        <td>jean@example.com</td>
                        <td><span class="badge admin">Administrateur</span></td>
                        <td><span class="badge active">Actif</span></td>
                        <td class="actions">
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

<!-- Modal -->
<div class="modal-overlay" id="accountModal">
    <div class="modal">
        <div class="modal-header">
            <h2>Créer un compte</h2>
            <button class="modal-close" id="closeModal">&times;</button>
        </div>
        <div class="modal-body">
            <form id="accountForm">
                <div class="form-group">
                    <label>Nom complet</label>
                    <input type="text" required>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" required>
                </div>
                <div class="form-group">
                    <label>Rôle</label>
                    <select required>
                        <option value="">Sélectionner un rôle</option>
                        <option value="admin">Administrateur</option>
                        <option value="user">Utilisateur standard</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Mot de passe</label>
                    <input type="password" required>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button class="btn btn-cancel" id="cancelModal">Annuler</button>
            <button class="btn btn-save">Enregistrer</button>
        </div>
    </div>
</div>

<script>
    // Gestion du modal
    const modal = document.getElementById('accountModal');
    const openBtn = document.getElementById('openModal');
    const closeBtn = document.getElementById('closeModal');
    const cancelBtn = document.getElementById('cancelModal');

    openBtn.addEventListener('click', () => modal.classList.add('active'));
    closeBtn.addEventListener('click', () => modal.classList.remove('active'));
    cancelBtn.addEventListener('click', () => modal.classList.remove('active'));

    // Fermer le modal en cliquant à l'extérieur
    modal.addEventListener('click', (e) => {
        if (e.target === modal) {
            modal.classList.remove('active');
        }
    });
</script>
</body>
</html>
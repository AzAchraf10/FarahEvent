<?php
include('../dashboard.html');
require 'connexion.php';

// Récupération de tous les comptes
$sql = "
  SELECT
    co.id AS compte_id,
    COALESCE(ad.nom, cl.nom)       AS nom,
    COALESCE(ad.prenom, cl.prenom) AS prenom,
    COALESCE(ad.email, cl.email)   AS email,
    co.role                        AS role
  FROM Compte co
  LEFT JOIN Admin  ad ON co.id_Admin  = ad.id
  LEFT JOIN Client cl ON co.id_Client = cl.id
  ORDER BY co.id DESC
";
$stmt    = $pdo->query($sql);
$comptes = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Gestion des Comptes - Admin</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <link rel="stylesheet" href="../dashboard/dashboard.css">
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="admin-container">
    <div class="main-content">
      <header class="content-header">
        <h1>Gestion des Comptes</h1>
        <button type="button" class="btn btn-primary" id="openModal">
          <i class="fas fa-plus"></i> Créer un compte
        </button>
      </header>
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
              <th>ID</th><th>Nom</th><th>Prénom</th><th>Email</th><th>Role</th><th>Actions</th>
            </tr>
          </thead>
          <tbody id="usersTableBody">
            <?php foreach ($comptes as $c): ?>
            <tr>
              <td>#<?= htmlspecialchars($c['compte_id']) ?></td>
              <td><?= htmlspecialchars($c['nom']) ?></td>
              <td><?= htmlspecialchars($c['prenom']) ?></td>
              <td><?= htmlspecialchars($c['email']) ?></td>
              <td>
                <span class="badge <?= strtolower($c['role']) ?>">
                  <?= ucfirst(htmlspecialchars($c['role'])) ?>
                </span>
              </td>
              <td class="actions">
                <button type="button" class="btn btn-view"   data-id="<?= $c['compte_id'] ?>"><i class="fas fa-eye"></i></button>
                <button type="button" class="btn btn-edit"   data-id="<?= $c['compte_id'] ?>"><i class="fas fa-edit"></i></button>
                <button type="button" class="btn btn-delete" data-id="<?= $c['compte_id'] ?>"><i class="fas fa-trash"></i></button>
              </td>
            </tr>
            <?php endforeach; ?>
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
        <button type="button" class="modal-close" id="closeModal">&times;</button>
      </div>
      <div class="modal-body">
        <form id="accountForm" method="post">
          <input type="hidden" name="user_id" id="userId">
          <div class="form-group">
            <label for="lastName">Nom</label>
            <input type="text" id="lastName" name="nom" required>
          </div>
          <div class="form-group">
            <label for="firstName">Prénom</label>
            <input type="text" id="firstName" name="prenom" required>
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
          </div>
          <div class="form-group">
            <label for="password">Mot de passe</label>
            <input type="password" id="password" name="password">
            <small>(Laisser vide pour ne pas changer)</small>
          </div>
          <div class="form-group">
            <label for="role">Rôle</label>
            <select id="role" name="role" required>
              <option value="">Sélectionner un rôle</option>
              <option value="admin">Administrateur</option>
              <option value="client">Client</option>
            </select>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-cancel" id="cancelModal">Annuler</button>
        <button type="button" class="btn btn-save"   id="saveAccount">Enregistrer</button>
      </div>
    </div>
  </div>

  <!-- Modal Voir (facultatif) -->
  <div class="modal-overlay" id="viewModal">
    <div class="modal">
      <div class="modal-header">
        <h2>Détails du compte</h2>
        <button type="button" class="modal-close" id="closeViewModal">&times;</button>
      </div>
      <div class="modal-body">
        <!-- … -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-cancel" id="closeViewBtn">Fermer</button>
      </div>
    </div>
  </div>

  <script>
    const form       = document.getElementById('accountForm');
    const openBtn    = document.getElementById('openModal');
    const closeBtn   = document.getElementById('closeModal');
    const cancelBtn  = document.getElementById('cancelModal');
    const saveBtn    = document.getElementById('saveAccount');
    const tbody      = document.getElementById('usersTableBody');
    const modalTitle = document.getElementById('modalTitle');

    // Ouvrir modal en création
    openBtn.addEventListener('click', () => {
      form.action            = 'createaccount.php';
      modalTitle.textContent = 'Créer un compte';
      form.reset();
      document.getElementById('userId').value = '';
      document.getElementById('accountModal').classList.add('active');
    });
    closeBtn.addEventListener('click', () => document.getElementById('accountModal').classList.remove('active'));
    cancelBtn.addEventListener('click', () => document.getElementById('accountModal').classList.remove('active'));

    // Sauvegarde (create OU edit)
    saveBtn.addEventListener('click', () => {
      const userId = document.getElementById('userId').value.trim();
      form.action = userId ? 'editaccount.php' : 'createaccount.php';
      form.submit();
    });

    // Délégation view/edit/delete
    tbody.addEventListener('click', e => {
      const btn = e.target.closest('button');
      if (!btn) return;
      const id    = btn.dataset.id;
      const row   = btn.closest('tr');
      const nom   = row.cells[1].textContent;
      const prenom= row.cells[2].textContent;
      const email = row.cells[3].textContent;
      const role  = row.cells[4].textContent.trim().toLowerCase();

      if (btn.classList.contains('btn-view')) {
        document.getElementById('viewModal').classList.add('active');
        // remplir viewModal…
      }
      if (btn.classList.contains('btn-edit')) {
        form.action            = 'editaccount.php';
        modalTitle.textContent = 'Modifier un compte';
        document.getElementById('userId').value    = id;
        document.getElementById('lastName').value  = nom;
        document.getElementById('firstName').value = prenom;
        document.getElementById('email').value     = email;
        document.getElementById('role').value      = role;
        document.getElementById('password').value  = '';
        document.getElementById('accountModal').classList.add('active');
      }
      if (btn.classList.contains('btn-delete')) {
        if (confirm('Confirmez la suppression ?')) {
          window.location.href = `deleteaccount.php?id=${id}`;
        }
      }
    });

    // Recherche live
    document.getElementById('searchInput').addEventListener('input', function() {
      const txt = this.value.toLowerCase();
      tbody.querySelectorAll('tr').forEach(r => {
        r.style.display = r.textContent.toLowerCase().includes(txt) ? '' : 'none';
      });
    });
  </script>
</body>
</html>
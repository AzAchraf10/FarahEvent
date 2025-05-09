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
        
        <!-- Formulaire de recherche -->
        <div class="dashboard-actions">
            <form method="GET" action="" class="search-bar">
                <input type="text" name="search" placeholder="Rechercher un événement..." 
                       value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
                <button type="submit">Rechercher</button>
            </form>
            <a href="add_event.php" class="button">+ Ajouter un événement</a>
        </div>
        
        <!-- Tableau des événements -->
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
            <tbody>
                <?php
                require_once '../../conn.php';
                
                // Pagination
                $itemsPerPage = 10;
                $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                $offset = ($page - 1) * $itemsPerPage;
                
                // Recherche
                $search = isset($_GET['search']) ? $_GET['search'] : '';
                $searchCondition = '';
                $params = [];
                
                if (!empty($search)) {
                    $searchCondition = "WHERE titre LIKE :search OR espace LIKE :search";
                    $params[':search'] = "%$search%";
                }
                
                // Requête pour compter le nombre total d'événements
                $countQuery = "SELECT COUNT(*) FROM evenement $searchCondition";
                $countStmt = $pdo->prepare($countQuery);
                if (!empty($params)) {
                    $countStmt->execute($params);
                } else {
                    $countStmt->execute();
                }
                $totalItems = $countStmt->fetchColumn();
                $totalPages = ceil($totalItems / $itemsPerPage);
                
                // Requête pour récupérer les événements
                $query = "SELECT * FROM evenement
                          $searchCondition
                          ORDER BY dateDebut DESC
                          LIMIT :offset, :limit";
                
                $stmt = $pdo->prepare($query);
                $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
                $stmt->bindValue(':limit', $itemsPerPage, PDO::PARAM_INT);
                
                if (!empty($params)) {
                    foreach ($params as $key => $value) {
                        $stmt->bindValue($key, $value);
                    }
                }
                
                $stmt->execute();
                $events = $stmt->fetchAll(PDO::FETCH_ASSOC);
                
                if (count($events) === 0) {
                    echo '<tr><td colspan="5" style="text-align: center;">Aucun événement trouvé</td></tr>';
                } else {
                    foreach ($events as $event) {
                        // Formater la date
                        $dateDebut = new DateTime($event['dateDebut']);
                        $formattedDate = $dateDebut->format('d/m/Y');
                        
                        // Formater l'espace
                        $espace = $event['espace'] ? str_replace('salle', 'Salle ', $event['espace']) : 'Non spécifié';
                        
                        echo '<tr>';
                        echo '<td>' . htmlspecialchars($event['titre']) . '</td>';
                        echo '<td>' . $formattedDate . '</td>';
                        echo '<td>' . htmlspecialchars($espace) . '</td>';
                        echo '<td><span class="status-badge ' . htmlspecialchars($event['etat']) . '">' . htmlspecialchars($event['etat']) . '</span></td>';
                        echo '<td class="actions-cell">';
                        echo '<a href="view_event.php?id=' . $event['id'] . '" class="btn-view">Voir</a>';
                        echo '<a href="edit_event.php?id=' . $event['id'] . '" class="btn-edit">Éditer</a>';
                        echo '<a href="delete_event.php?id=' . $event['id'] . '" class="btn-delete" onclick="return confirm(\'Voulez-vous vraiment supprimer cet événement ?\')">Supprimer</a>';
                        echo '</td>';
                        echo '</tr>';
                    }
                }
                ?>
            </tbody>
        </table>
        
        <!-- Pagination -->
        <?php if ($totalPages > 1): ?>
        <div class="pagination">
            <?php if ($page > 1): ?>
                <a href="?page=<?php echo $page - 1; ?><?php echo !empty($search) ? '&search=' . urlencode($search) : ''; ?>" class="page-link">&laquo;</a>
            <?php endif; ?>
            
            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <a href="?page=<?php echo $i; ?><?php echo !empty($search) ? '&search=' . urlencode($search) : ''; ?>" 
                   class="page-link <?php echo $i === $page ? 'active' : ''; ?>">
                    <?php echo $i; ?>
                </a>
            <?php endfor; ?>
            
            <?php if ($page < $totalPages): ?>
                <a href="?page=<?php echo $page + 1; ?><?php echo !empty($search) ? '&search=' . urlencode($search) : ''; ?>" class="page-link">&raquo;</a>
            <?php endif; ?>
        </div>
        <?php endif; ?>
    </div>
</div>
</body>
</html>
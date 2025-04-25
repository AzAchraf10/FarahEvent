<?php
include('../dashboard.html'); // Changé en .php pour correspondre au commentaire
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Interface d'administration pour la gestion des avis clients">
    <title>Admin - Gestion des Avis Clients</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="/FarahEvent/Admin/Avis/style.css">
</head>
<body>
    <div class="admin-container">
        <!-- Le sidebar est déjà inclus via dashboard.php -->
        
        <!-- Main Content Area -->
        <div class="main-content">
            <div class="header">
                <h1><i class="fas fa-star"></i> Gérer les avis clients</h1>
            </div>

            <!-- Reviews Table -->
            <div class="reviews-container">
                <div class="table-header">
                    <h2>Liste des avis clients</h2>
                    <div class="table-actions">
                        <input type="text" class="search-input" placeholder="Rechercher un avis..." aria-label="Recherche">
                        <button class="filter-btn" title="Filtrer les résultats"><i class="fas fa-filter"></i> Filtrer</button>
                    </div>
                </div>
                
                <div class="table-responsive">
                    <table class="reviews-table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Client</th>
                                <th scope="col">Commentaire</th>
                                <th scope="col">Note</th>
                                <th scope="col">Date</th>
                                <th scope="col">Statut</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="review-id">Avis #1001</td>
                                <td>Marie Dupont</td>
                                <td class="review-content">Service exceptionnel, je recommande vivement ce salon de beauté...</td>
                                <td><span class="star-rating" aria-label="5 étoiles sur 5">★★★★★</span></td>
                                <td>15/06/2023</td>
                                <td><span class="status-badge published">Publié</span></td>
                                <td>
                                    <div class="review-actions">
                                        <button class="action-btn view-btn" title="Voir l'avis complet" onclick="openViewModal('Avis #1001', 'Marie Dupont', 'Service exceptionnel, je recommande vivement ce salon de beauté. Le personnel est très accueillant et professionnel. J\'ai été particulièrement impressionnée par la qualité du service et l\'attention portée aux détails. Je reviendrai certainement pour d\'autres prestations.', '★★★★★', '15/06/2023', 'Publié')"><i class="fas fa-eye"></i> Voir</button>
                                        <button class="action-btn delete-btn" title="Supprimer l'avis" onclick="openDeleteModal('Avis #1001', 'Marie Dupont')"><i class="fas fa-trash"></i> Supprimer</button>
                                    </div>
                                </td>
                            </tr>
                            <!-- Autres lignes de tableau inchangées... -->
                            <tr>
                                <td class="review-id">Avis #1002</td>
                                <td>Jean Martin</td>
                                <td class="review-content">Personnel très professionnel, résultat impeccable...</td>
                                <td><span class="star-rating" aria-label="4 étoiles sur 5">★★★★☆</span></td>
                                <td>12/06/2023</td>
                                <td><span class="status-badge published">Publié</span></td>
                                <td>
                                    <div class="review-actions">
                                        <button class="action-btn view-btn" title="Voir l'avis complet" onclick="openViewModal('Avis #1002', 'Jean Martin', 'Personnel très professionnel, résultat impeccable. J\'ai été très satisfait de la coupe de cheveux et du temps accordé pour discuter de mes besoins. L\'ambiance du salon est très agréable et relaxante. Seul petit bémol : le prix un peu élevé par rapport à la concurrence, mais la qualité est au rendez-vous.', '★★★★☆', '12/06/2023', 'Publié')"><i class="fas fa-eye"></i> Voir</button>
                                        <button class="action-btn delete-btn" title="Supprimer l'avis" onclick="openDeleteModal('Avis #1002', 'Jean Martin')"><i class="fas fa-trash"></i> Supprimer</button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="review-id">Avis #1003</td>
                                <td>Sophie Leroy</td>
                                <td class="review-content">Un peu déçue par le service, le résultat ne correspondait pas à mes attentes...</td>
                                <td><span class="star-rating" aria-label="2 étoiles sur 5">★★☆☆☆</span></td>
                                <td>10/06/2023</td>
                                <td><span class="status-badge pending">En attente</span></td>
                                <td>
                                    <div class="review-actions">
                                        <button class="action-btn view-btn" title="Voir l'avis complet" onclick="openViewModal('Avis #1003', 'Sophie Leroy', 'Un peu déçue par le service, le résultat ne correspondait pas à mes attentes. J\'avais demandé une coloration spécifique et le résultat final était bien différent de ce que j\'avais imaginé. Le personnel a été sympathique et a proposé de rectifier le problème, mais j\'ai dû revenir une deuxième fois ce qui n\'était pas prévu. Je donne une deuxième chance car l\'attitude était professionnelle.', '★★☆☆☆', '10/06/2023', 'En attente')"><i class="fas fa-eye"></i> Voir</button>
                                        <button class="action-btn delete-btn" title="Supprimer l'avis" onclick="openDeleteModal('Avis #1003', 'Sophie Leroy')"><i class="fas fa-trash"></i> Supprimer</button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="review-id">Avis #1004</td>
                                <td>Thomas Bernard</td>
                                <td class="review-content">Très bon rapport qualité-prix, je reviendrai...</td>
                                <td><span class="star-rating" aria-label="4 étoiles sur 5">★★★★☆</span></td>
                                <td>08/06/2023</td>
                                <td><span class="status-badge published">Publié</span></td>
                                <td>
                                    <div class="review-actions">
                                        <button class="action-btn view-btn" title="Voir l'avis complet" onclick="openViewModal('Avis #1004', 'Thomas Bernard', 'Très bon rapport qualité-prix, je reviendrai. Pour le prix payé, je ne m\'attendais pas à un service aussi complet. La styliste a pris le temps de bien comprendre ce que je voulais et le résultat était parfait. L\'endroit est propre et bien entretenu. La seule raison pour laquelle je ne donne pas 5 étoiles est l\'attente un peu longue sans rendez-vous.', '★★★★☆', '08/06/2023', 'Publié')"><i class="fas fa-eye"></i> Voir</button>
                                        <button class="action-btn delete-btn" title="Supprimer l'avis" onclick="openDeleteModal('Avis #1004', 'Thomas Bernard')"><i class="fas fa-trash"></i> Supprimer</button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="review-id">Avis #1005</td>
                                <td>Laura Petit</td>
                                <td class="review-content">Contenu inapproprié...</td>
                                <td><span class="star-rating" aria-label="1 étoile sur 5">★☆☆☆☆</span></td>
                                <td>05/06/2023</td>
                                <td><span class="status-badge rejected">Rejeté</span></td>
                                <td>
                                    <div class="review-actions">
                                        <button class="action-btn view-btn" title="Voir l'avis complet" onclick="openViewModal('Avis #1005', 'Laura Petit', 'Contenu inapproprié: Ce salon est une arnaque totale! Les employés sont incompétents et malpolis. Je ne recommanderais à personne de mettre les pieds dans cet endroit. Ils ont ruiné mes cheveux et ont refusé de reconnaître leur erreur. De plus, l\'hygiène laisse à désirer. À éviter à tout prix!', '★☆☆☆☆', '05/06/2023', 'Rejeté')"><i class="fas fa-eye"></i> Voir</button>
                                        <button class="action-btn delete-btn" title="Supprimer l'avis" onclick="openDeleteModal('Avis #1005', 'Laura Petit')"><i class="fas fa-trash"></i> Supprimer</button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Pagination -->
            <nav aria-label="Navigation des pages">
                <div class="pagination">
                    <a href="#" aria-label="Page précédente">&laquo;</a>
                    <a href="#" class="active" aria-current="page">1</a>
                    <a href="#">2</a>
                    <a href="#">3</a>
                    <a href="#" aria-label="Page suivante">&raquo;</a>
                </div>
            </nav>
        </div>
    </div>

    <!-- View Modal -->
    <div id="viewModal" class="modal" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
        <div class="modal-content">
            <div class="modal-header">
                <h3 id="modalTitle">Détails de l'avis</h3>
                <button class="close-btn" onclick="closeModal('viewModal')" aria-label="Fermer">&times;</button>
            </div>
            <div class="modal-body">
                <div class="review-detail">
                    <label for="view-review-id">ID de l'avis</label>
                    <p id="view-review-id"></p>
                </div>
                <div class="review-detail">
                    <label for="view-client-name">Client</label>
                    <p id="view-client-name"></p>
                </div>
                <div class="review-detail">
                    <label for="view-review-content">Commentaire complet</label>
                    <p class="full-review-content" id="view-review-content"></p>
                </div>
                <div class="review-detail">
                    <label for="view-review-rating">Note</label>
                    <p id="view-review-rating"></p>
                </div>
                <div class="review-detail">
                    <label for="view-review-date">Date</label>
                    <p id="view-review-date"></p>
                </div>
                <div class="review-detail">
                    <label for="view-review-status">Statut</label>
                    <p id="view-review-status"></p>
                </div>
            </div>
            <div class="modal-footer">
                <button class="cancel-btn" onclick="closeModal('viewModal')">Fermer</button>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div id="deleteModal" class="modal" role="dialog" aria-labelledby="deleteModalTitle" aria-hidden="true">
        <div class="modal-content">
            <div class="modal-header">
                <h3 id="deleteModalTitle">Confirmer la suppression</h3>
                <button class="close-btn" onclick="closeModal('deleteModal')" aria-label="Fermer">&times;</button>
            </div>
            <div class="modal-body">
                <p>Êtes-vous sûr de vouloir supprimer l'avis <strong id="delete-review-id"></strong> de <strong id="delete-client-name"></strong> ?</p>
                <p>Cette action est irréversible.</p>
            </div>
            <div class="modal-footer">
                <button class="cancel-btn" onclick="closeModal('deleteModal')">Annuler</button>
                <button class="confirm-delete-btn" onclick="confirmDelete()">Confirmer la suppression</button>
            </div>
        </div>
    </div>

    <script>
        // Function to open view modal
        function openViewModal(id, client, content, rating, date, status) {
            document.getElementById('view-review-id').textContent = id;
            document.getElementById('view-client-name').textContent = client;
            document.getElementById('view-review-content').textContent = content;
            document.getElementById('view-review-rating').innerHTML = '<span class="star-rating">' + rating + '</span>';
            document.getElementById('view-review-date').textContent = date;
            
            // Set status with appropriate badge class
            const statusElement = document.getElementById('view-review-status');
            statusElement.innerHTML = '';
            const badge = document.createElement('span');
            badge.className = 'status-badge ' + (status === 'Publié' ? 'published' : status === 'En attente' ? 'pending' : 'rejected');
            badge.textContent = status;
            statusElement.appendChild(badge);
            
            document.getElementById('viewModal').style.display = 'flex';
        }

        // Function to open delete modal
        function openDeleteModal(id, client) {
            document.getElementById('delete-review-id').textContent = id;
            document.getElementById('delete-client-name').textContent = client;
            document.getElementById('deleteModal').style.display = 'flex';
        }

        // Function to close modal
        function closeModal(modalId) {
            document.getElementById(modalId).style.display = 'none';
        }

        // Function to confirm delete
        function confirmDelete() {
            // Here you would typically make an AJAX call to delete the review from the database
            alert('L\'avis a été supprimé avec succès !');
            closeModal('deleteModal');
            
            // In a real application, you would refresh the table or remove the row from the DOM
            // For this demo, we'll just show an alert
        }

        // Close modal when clicking outside of it
        window.onclick = function(event) {
            if (event.target.className === 'modal') {
                event.target.style.display = 'none';
            }
        }

        // Amélioration: fermeture des modales avec la touche Escape
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                document.querySelectorAll('.modal').forEach(function(modal) {
                    if (modal.style.display === 'flex') {
                        modal.style.display = 'none';
                    }
                });
            }
        });
    </script>
</body>
</html>
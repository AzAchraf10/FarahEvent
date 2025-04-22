<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/FarahEvent/Admin/styles/dashboard.css">
    <title>Dashboard</title>
</head>
<body>
        <!-- sidebar.php - Fichier à inclure dans les autres pages -->
    <div class="sidebar">
        <div class="sidebar-header">
            <i class="fas fa-shield-alt"></i>
            <span class="sidebar-title">Admin Panel</span>
        </div>
        <ul class="sidebar-menu">
            <li>
                <a href="/FarahEvent/Admin/Home/index.php"><i class="fas fa-tachometer-alt"></i> <span>Home</span></a>
            </li>
            <li>
                <a href="/FarahEvent/Admin/Comptes/index.php"><i class="fas fa-user-circle"></i> <span>Comptes</span></a>
            </li>
            <li>
                <a href="/FarahEvent/Admin/Events/index.php"><i class="fas fa-calendar-alt"></i> <span>Evénements</span></a>
            </li>
            <li>
                <a href="/FarahEvent/Admin/Avis/index.php"><i class="fas fa-star"></i> <span>Avis Clients</span></a>
            </li>
            <li>
                <a href="logout.php"><i class="fas fa-sign-out-alt"></i> <span>Se Déconnecter</span></a>
            </li>
        </ul>
        <div class="sidebar-toggle">
            <i class="fas fa-bars"></i>
        </div>
    </div>

    <script>
                // sidebar.js - Script pour la fonctionnalité de la barre latérale
        document.addEventListener('DOMContentLoaded', function() {
            const sidebarToggle = document.querySelector('.sidebar-toggle');
            const sidebar = document.querySelector('.sidebar');
            
            if (sidebarToggle) {
                sidebarToggle.addEventListener('click', function() {
                    sidebar.classList.toggle('active');
                });
            }
            
            // Fermer la sidebar quand on clique ailleurs sur mobile
            document.addEventListener('click', function(event) {
                if (window.innerWidth <= 576) {
                    const isClickInsideSidebar = sidebar.contains(event.target);
                    const isClickOnToggle = sidebarToggle.contains(event.target);
                    
                    if (!isClickInsideSidebar && !isClickOnToggle && sidebar.classList.contains('active')) {
                        sidebar.classList.remove('active');
                    }
                }
            });
            
            // Ajuster en cas de redimensionnement
            window.addEventListener('resize', function() {
                if (window.innerWidth > 576 && sidebar.classList.contains('active')) {
                    sidebar.classList.remove('active');
                }
            });
        });
    </script>
</body>
</html>
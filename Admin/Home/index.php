<?php
include('../dashboard.html');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/FarahEvent/Admin/styles/dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Administration - Tableau de bord</title>
</head>
<body>
    <div class="admin-container">
        <header class="content-header">
            <h1>Home</h1>
            <div class="header-actions">
                <button class="refresh-btn">
                    <i class="fas fa-sync-alt"></i> Actualiser
                </button>
            </div>
        </header>
        
        <!-- Stats Cards - Utilisateurs en row -->
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
            
            <div class="card stat-card">
                <div class="stat-icon purple">
                    <i class="fas fa-user-plus"></i>
                </div>
                <div class="stat-info">
                    <h3>4</h3>
                    <p>Nouveaux Utilisateurs</p>
                </div>
            </div>
        </div>
        
        <!-- Stats Cards - Événements en row -->
        <div class="stats-cards">
            <div class="card stat-card">
                <div class="stat-icon blue">
                    <i class="fas fa-calendar-alt"></i>
                </div>
                <div class="stat-info">
                    <h3 id="total-events">124</h3>
                    <p>Total Événements</p>
                </div>
            </div>
            
            <div class="card stat-card">
                <div class="stat-icon green">
                    <i class="fas fa-check-circle"></i>
                </div>
                <div class="stat-info">
                    <h3 id="active-events">86</h3>
                    <p>Événements Actifs</p>
                </div>
            </div>
            
            <div class="card stat-card">
                <div class="stat-icon orange">
                    <i class="fas fa-clock"></i>
                </div>
                <div class="stat-info">
                    <h3 id="pending-events">28</h3>
                    <p>En attente</p>
                </div>
            </div>
            
            <div class="card stat-card">
                <div class="stat-icon purple">
                    <i class="fas fa-users"></i>
                </div>
                <div class="stat-info">
                    <h3 id="total-participants">1,240</h3>
                    <p>Participants</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Animation simple pour les compteurs
        document.addEventListener('DOMContentLoaded', () => {
            const statNumbers = document.querySelectorAll('.stat-info h3');
            
            statNumbers.forEach(number => {
                const finalValue = number.innerText;
                number.innerText = '0';
                
                let startValue = 0;
                const target = parseInt(finalValue.replace(/,/g, ''));
                const duration = 1500;
                const step = Math.max(1, Math.floor(target / (duration / 30)));
                
                const counter = setInterval(() => {
                    startValue += step;
                    if (startValue > target) {
                        number.innerText = finalValue;
                        clearInterval(counter);
                        return;
                    }
                    number.innerText = startValue.toLocaleString();
                }, 30);
            });
            
            // Animation d'entrée pour les cartes - entrée horizontale
            const cards = document.querySelectorAll('.card');
            cards.forEach((card, index) => {
                card.style.opacity = '0';
                card.style.transform = 'translateX(20px)';
                
                setTimeout(() => {
                    card.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
                    card.style.opacity = '1';
                    card.style.transform = 'translateX(0)';
                }, 100 * index);
            });
        });
    </script>
</body>
</html>
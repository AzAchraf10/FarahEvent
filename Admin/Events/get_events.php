<?php
require_once '../../conn.php';

try {
    $stmt = $pdo->query("
        SELECT e.*, c.nom, c.prenom, c.tel 
        FROM evenement e
        LEFT JOIN client c ON e.id_Client = c.id
        ORDER BY e.dateDebut DESC
    ");
    
    $events = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Décoder les champs JSON
    foreach ($events as &$event) {
        $event['accueil'] = $event['accueil'] ? json_decode($event['accueil'], true) : [];
        $event['cocktail'] = $event['cocktail'] ? json_decode($event['cocktail'], true) : [];
        $event['diner'] = $event['diner'] ? json_decode($event['diner'], true) : [];
        $event['soiree'] = $event['soiree'] ? json_decode($event['soiree'], true) : [];
    }
    
    echo json_encode(['success' => true, 'data' => $events]);
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'error' => $e->getMessage()]);
}
?>
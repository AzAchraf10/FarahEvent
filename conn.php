<?php
// Connexion à la base de données
try {
    $pdo = new PDO('mysql:host=127.0.0.1;port=3306;dbname=FarahEvent;charset=utf8mb4', 
                  'root', 
                  '', 
                  [
                      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                  ]);
    echo "Connexion réussie!"; // À supprimer après test
} catch (PDOException $error) {
    die("Erreur de connexion: " . $error->getMessage());
}
?>
<?php
// Connexion à la base de données
try {
    $pdo = new PDO('mysql:host=localhost;dbname=FarahEvent;charset=utf8', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $error) {
    die("Erreur de connexion: " . $error->getMessage());
}

?>
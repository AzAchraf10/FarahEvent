<?php
session_start();

// Détruire toutes les variables de session
$_SESSION = array();

// Détruire la session
session_destroy();

// Message de déconnexion
session_start();
$_SESSION['success_message'] = "✅ Vous avez été déconnecté avec succès!";

// Rediriger vers la page d'accueil
header("Location: /FarahEvent/index.php");
exit();
?>
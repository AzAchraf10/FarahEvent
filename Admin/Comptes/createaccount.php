<?php
require 'connexion.php';

if (
    isset($_POST['prenom'], $_POST['nom'], $_POST['email'], $_POST['password'], $_POST['role'])
) {
    $prenom = trim($_POST['prenom']);
    $nom    = trim($_POST['nom']);
    $email  = trim($_POST['email']);
    $pass   = trim($_POST['password']);
    $role   = strtolower(trim($_POST['role'])); // 'admin' ou 'client'

    try {
        $pdo->beginTransaction();

        if ($role === 'admin') {
            $pdo->prepare(
                "INSERT INTO Admin (prenom, nom, email, mot_de_passe)
                 VALUES (:prenom, :nom, :email, :password)"
            )->execute([
                ':prenom' => $prenom,
                ':nom'    => $nom,
                ':email'  => $email,
                ':password'    => password_hash($password, PASSWORD_DEFAULT),
            ]);
            $lastId = $pdo->lastInsertId();

            $pdo->prepare(
                "INSERT INTO Compte (role, id_Client, id_Admin)
                 VALUES ('Admin', NULL, :idAdmin)"
            )->execute([':idAdmin' => $lastId]);

        } else {
            $pdo->prepare(
                "INSERT INTO Client (prenom, nom, email, mot_de_passe)
                 VALUES (:prenom, :nom, :email, :password)"
            )->execute([
                ':prenom' => $prenom,
                ':nom'    => $nom,
                ':email'  => $email,
                ':password'    => password_hash($pass, PASSWORD_DEFAULT),
            ]);
            $lastId = $pdo->lastInsertId();

            $pdo->prepare(
                "INSERT INTO Compte (role, id_Client, id_Admin)
                 VALUES ('Client', :idClient, NULL)"
            )->execute([':idClient' => $lastId]);
        }

        $pdo->commit();
        header('Location: index.php');
        exit;
    } catch (Exception $e) {
        $pdo->rollBack();
        die("Erreur lors de la création du compte : " . $e->getMessage());
    }
} else {
    die("Erreur : données du formulaire manquantes.");
}
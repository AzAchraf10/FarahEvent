<?php
require __DIR__ . '/connexion.php';

if (
    isset($_POST['user_id'], $_POST['prenom'], $_POST['nom'], $_POST['email'], $_POST['role'])
) {
    $userId = (int) $_POST['user_id'];
    $prenom = trim($_POST['prenom']);
    $nom    = trim($_POST['nom']);
    $email  = trim($_POST['email']);
    $pass   = trim($_POST['password'] ?? '');
    $role   = strtolower(trim($_POST['role'])); // 'admin' ou 'client'

    try {
        $pdo->beginTransaction();

        // Anciennes liaisons
        $stmt0 = $pdo->prepare("SELECT id_Admin, id_Client FROM Compte WHERE id = :id");
        $stmt0->execute([':id' => $userId]);
        list($oldAdmin, $oldClient) = $stmt0->fetch(PDO::FETCH_NUM);

        if ($role === 'admin') {
            // Mise à jour ou création Admin
            if ($oldAdmin) {
                $sql    = "UPDATE Admin SET prenom = :prenom, nom = :nom, email = :email";
                $params = [':prenom'=>$prenom,':nom'=>$nom,':email'=>$email,':aid'=>$oldAdmin];
                if ($pass!=='') {
                    $sql   .= ", mot_de_passe = :password";
                    $params[':password'] = password_hash($pass, PASSWORD_DEFAULT);
                }
                $sql .= " WHERE id = :aid";
                $pdo->prepare($sql)->execute($params);
                $newAdminId = $oldAdmin;
            } else {
                // supprimer ancien client si existant
                if ($oldClient) {
                    $pdo->prepare("UPDATE Compte SET id_Client = NULL WHERE id = :uid")
                        ->execute([':uid'=>$userId]);
                    $pdo->prepare("DELETE FROM Client WHERE id = :cid")
                        ->execute([':cid'=>$oldClient]);
                }
                $pwdHash = password_hash($pass!==''?$pass:bin2hex(random_bytes(4)), PASSWORD_DEFAULT);
                $pdo->prepare(
                  "INSERT INTO Admin (prenom, nom, email, mot_de_passe)
                   VALUES (:prenom, :nom, :email, :password)"
                )->execute([
                  ':prenom'=>$prenom,':nom'=>$nom,':email'=>$email,':password'=>$pwdHash
                ]);
                $newAdminId = $pdo->lastInsertId();
            }
            // mettre à jour Compte
            $pdo->prepare(
              "UPDATE Compte
               SET role='Admin', id_Admin=:aid, id_Client=NULL
               WHERE id=:uid"
            )->execute([':aid'=>$newAdminId,':uid'=>$userId]);

        } else {
            // rôle = client
            if ($oldClient) {
                $sql    = "UPDATE Client SET prenom = :prenom, nom = :nom, email = :email";
                $params = [':prenom'=>$prenom,':nom'=>$nom,':email'=>$email,':cid'=>$oldClient];
                if ($pass!=='') {
                    $sql   .= ", mot_de_passe = :password";
                    $params[':password'] = password_hash($pass, PASSWORD_DEFAULT);
                }
                $sql .= " WHERE id = :cid";
                $pdo->prepare($sql)->execute($params);
                $newClientId = $oldClient;
            } else {
                if ($oldAdmin) {
                    // Détacher admin avant suppression
                    $pdo->prepare("UPDATE Compte SET id_Admin = NULL WHERE id = :uid")
                        ->execute([':uid'=>$userId]);
                    $pdo->prepare("DELETE FROM Admin WHERE id = :aid")
                        ->execute([':aid'=>$oldAdmin]);
                }
                $pwdHash = password_hash($pass!==''?$pass:bin2hex(random_bytes(4)), PASSWORD_DEFAULT);
                $pdo->prepare(
                  "INSERT INTO Client (prenom, nom, email, mot_de_passe)
                   VALUES (:prenom, :nom, :email, :password)"
                )->execute([
                  ':prenom'=>$prenom,':nom'=>$nom,':email'=>$email,':password'=>$pwdHash
                ]);
                $newClientId = $pdo->lastInsertId();
            }
            $pdo->prepare(
              "UPDATE Compte
               SET role='Client', id_Client=:cid, id_Admin=NULL
               WHERE id=:uid"
            )->execute([':cid'=>$newClientId,':uid'=>$userId]);
        }

        $pdo->commit();
        header('Location: index.php');
        exit;
    } catch (Exception $e) {
        $pdo->rollBack();
        die("Erreur lors de la modification : " . $e->getMessage());
    }
} else {
    die("Données manquantes pour la modification.");
}

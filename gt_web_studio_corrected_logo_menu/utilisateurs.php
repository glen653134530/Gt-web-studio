
<?php
session_start();
if (!isset($_SESSION["admin"])) {
    header("Location: login.php");
    exit();
}

$pdo = new PDO("mysql:host=localhost;dbname=gtweb_db", "root", "");

if (isset($_GET["delete"])) {
    $stmt = $pdo->prepare("DELETE FROM utilisateurs WHERE id = ?");
    $stmt->execute([$_GET["delete"]]);
    header("Location: utilisateurs.php");
    exit();
}

$utilisateurs = $pdo->query("SELECT * FROM utilisateurs ORDER BY date_creation DESC")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Utilisateurs | Admin GT Web</title>
    <link rel="stylesheet" href="style.css">
    <style>
        table {
            width: 90%;
            margin: auto;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
        }
        th {
            background: #f5f5f5;
        }
    </style>
</head>
<body>
    <h2 style="text-align:center;">Gestion des Utilisateurs</h2>
    <div style="text-align:center;"><a href="ajouter_utilisateur.php" class="btn-primary">Ajouter un utilisateur</a></div>
    <table>
        <thead>
            <tr><th>Nom</th><th>Email</th><th>Date de création</th><th>Action</th></tr>
        </thead>
        <tbody>
            <?php foreach ($utilisateurs as $u): ?>
                <tr>
                    <td><?= htmlspecialchars($u["nom"]) ?></td>
                    <td><?= htmlspecialchars($u["email"]) ?></td>
                    <td><?= $u["date_creation"] ?></td>
                    <td><a href="?delete=<?= $u["id"] ?>" onclick="return confirm('Supprimer cet utilisateur ?')">Supprimer</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>

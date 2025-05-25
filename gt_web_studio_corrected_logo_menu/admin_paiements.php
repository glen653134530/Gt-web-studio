<?php
require_once 'db.php';

try {
    $stmt = $pdo->query("SELECT * FROM paiements ORDER BY date_envoi DESC");
    $paiements = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Erreur de lecture : " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des paiements</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 12px; border: 1px solid #ccc; text-align: left; }
        th { background-color: #f5f5f5; }
        h2 { color: #333; }
    </style>
</head>
<body>
    <h2>Paiements enregistrés</h2>
    <table>
        <tr>
            <th>#</th>
            <th>Nom</th>
            <th>Numéro</th>
            <th>Opérateur</th>
            <th>Date</th>
        </tr>
        <?php foreach ($paiements as $paiement): ?>
        <tr>
            <td><?= htmlspecialchars($paiement['id']) ?></td>
            <td><?= htmlspecialchars($paiement['nom']) ?></td>
            <td><?= htmlspecialchars($paiement['numero']) ?></td>
            <td><?= htmlspecialchars($paiement['operateur']) ?></td>
            <td><?= htmlspecialchars($paiement['date_envoi']) ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
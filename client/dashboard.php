
<?php
session_start();
if (!isset($_SESSION['client_id'])) {
    header("Location: login.php");
    exit;
}
$client_id = $_SESSION['client_id'];

require_once __DIR__ . '/../db/db_config.php';
if ($conn->connect_error) { die('Erreur : ' . $conn->connect_error); }

// Récupérer les infos client
$stmt = $conn->prepare("SELECT nom FROM clients WHERE id = ?");
$stmt->bind_param("i", $client_id);
$stmt->execute();
$stmt->bind_result($nom);
$stmt->fetch();
$stmt->close();

// Récupérer les projets du client
$projets = $conn->query("SELECT * FROM projets WHERE client_id = $client_id ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="fr"><head><meta charset="UTF-8"><title>Mon espace client</title></head>
<body>
<h2>Bienvenue, <?php echo htmlspecialchars($nom); ?> !</h2>
<h3>Mes projets</h3>
<?php if ($projets->num_rows > 0): ?>
    <ul>
        <?php while ($p = $projets->fetch_assoc()): ?>
            <li>
                <strong><?php echo htmlspecialchars($p['nom_projet']); ?></strong><br>
                Statut : <?php echo htmlspecialchars($p['statut']); ?><br>
                <?php if ($p['lien']): ?>
                    <a href="<?php echo $p['lien']; ?>" target="_blank">Télécharger le livrable</a>
                <?php endif; ?>
            </li><br>
        <?php endwhile; ?>
    </ul>
<?php else: ?>
    <p>Aucun projet pour le moment.</p>
<?php endif; ?>

<a href="logout.php">Se déconnecter</a>
</body>
</html>
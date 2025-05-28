
<?php
require_once __DIR__ . '/../db/db_config.php';
if ($conn->connect_error) { die('Erreur : ' . $conn->connect_error); }

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST['nom'];
    $email = $_POST['email'];

    $stmt = $conn->prepare("INSERT INTO clients (nom, email, password) VALUES (?, ?, ?)");
    $stmt->execute();
    $stmt->close();
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr"><head><meta charset="UTF-8"><title>Inscription Client</title></head>
<body>
<h2>Créer un compte client</h2>
<form method="POST">
    <input type="text" name="nom" placeholder="Nom complet" required><br>
    <input type="email" name="email" placeholder="Adresse email" required><br>
    <input type="password" name="password" placeholder="Mot de passe" required><br>
    <button type="submit">S'inscrire</button>
</form>
<a href="login.php">Déjà inscrit ? Se connecter</a>
</body>
</html>
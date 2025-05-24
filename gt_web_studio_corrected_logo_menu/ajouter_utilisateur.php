
<?php
session_start();
if (!isset($_SESSION["admin"])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $pdo = new PDO("mysql:host=localhost;dbname=gtweb_db", "root", "");
    $nom = $_POST["nom"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_BCRYPT);
    $stmt = $pdo->prepare("INSERT INTO utilisateurs (nom, email, password, date_creation) VALUES (?, ?, ?, NOW())");
    $stmt->execute([$nom, $email, $password]);
    header("Location: utilisateurs.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter Utilisateur | Admin GT Web</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section class="contact">
        <h2>Ajouter un nouvel utilisateur</h2>
        <form method="post">
            <input type="text" name="nom" placeholder="Nom complet" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Mot de passe" required>
            <button type="submit">Créer</button>
        </form>
    </section>
</body>
</html>

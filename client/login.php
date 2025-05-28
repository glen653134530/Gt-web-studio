
<?php
session_start();
require_once __DIR__ . '/../db/db_config.php';
if ($conn->connect_error) { die('Erreur : ' . $conn->connect_error); }

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    $stmt = $conn->prepare("SELECT id, password FROM clients WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($id, $hashed_password);
        $_SESSION['client_id'] = $id;
        header("Location: dashboard.php");
        exit;
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="fr"><head><meta charset="UTF-8"><title>Connexion Client</title></head>
<body>
<h2>Connexion client</h2>
<form method="POST">
    <input type="email" name="email" placeholder="Email" required><br>
    <input type="password" name="password" placeholder="Mot de passe" required><br>
    <button type="submit">Se connecter</button>
</form>
<a href="register.php">Créer un compte</a>
</body>
</html>
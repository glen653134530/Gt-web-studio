
<?php
session_start();
$admin_username = "admin";
$admin_password = "gtweb2025";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if ($_POST["username"] === $admin_username && $_POST["password"] === $admin_password) {
        $_SESSION["admin"] = true;
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Identifiants incorrects.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion Admin | GT Web Studio</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section class="contact">
        <h2>Connexion Admin</h2>
        <?php if (!empty($error)) echo "<p style='color:red;text-align:center;'>$error</p>"; ?>
        <form method="post">
            <input type="text" name="username" placeholder="Nom d'utilisateur" required>
            <input type="password" name="password" placeholder="Mot de passe" required>
            <button type="submit">Se connecter</button>
        </form>
    </section>
</body>
</html>

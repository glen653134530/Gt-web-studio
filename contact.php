<?php
require 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST['nom'] ?? '';
    $email = $_POST['email'] ?? '';
    $message = $_POST['message'] ?? '';

    $sql = "INSERT INTO messages (nom, email, message) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nom, $email, $message]);

    echo "success";
}
?>
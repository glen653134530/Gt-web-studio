<?php
require_once 'db/db_config.php';
ini_set('display_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nom = $_POST['nom'] ?? '';
    $email = $_POST['email'] ?? '';
    $message = $_POST['message'] ?? '';
    $date_envoi = date('Y-m-d H:i:s');

    $stmt = $conn->prepare("INSERT INTO messages (nom, email, message, date_envoi) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $nom, $email, $message, $date_envoi);

    if ($stmt->execute()) {
        echo "<script>alert('Message envoyé avec succès !'); window.location.href='index.html';</script>";
    } else {
        echo "<script>alert('Erreur : " . $stmt->error . "'); window.history.back();</script>";
    }

    $stmt->close();
} else {
    echo "Méthode non autorisée.";
}
?>
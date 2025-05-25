<?php
require_once 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST['nom'] ?? '';
    $email = $_POST['email'] ?? '';
    $message = $_POST['message'] ?? '';

    if (!empty($nom) && !empty($email) && !empty($message)) {
        $stmt = $pdo->prepare("INSERT INTO messages (nom, email, message) VALUES (:nom, :email, :message)");
        $stmt->execute([
            ':nom' => $nom,
            ':email' => $email,
            ':message' => $message
        ]);
        echo "Message bien enregistré !";
    } else {
        echo "Tous les champs sont requis.";
    }
}
?>
<form method="POST">
    <h2>Contactez-nous</h2>
    <input type="text" name="nom" placeholder="Votre nom" required><br>
    <input type="email" name="email" placeholder="Votre email" required><br>
    <textarea name="message" placeholder="Votre message" required></textarea><br>
    <button type="submit">Envoyer</button>
</form>
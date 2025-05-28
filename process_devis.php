
<?php
require_once __DIR__ . '/db/db_config.php';

if ($conn->connect_error) {
    die('Erreur de connexion: ' . $conn->connect_error);
}

$nom = $_POST['nom'];
$email = $_POST['email'];
$service = $_POST['service'];
$budget = $_POST['budget'];
$message = $_POST['message'];

$sql = "INSERT INTO devis (nom, email, service, budget, message) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssis", $nom, $email, $service, $budget, $message);
$stmt->execute();
$stmt->close();
$conn->close();

echo "Votre demande a bien été envoyée. Nous vous contacterons rapidement.";
?>
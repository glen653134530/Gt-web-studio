
<?php
require_once 'db/db_config.php';
ini_set('display_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nom = $_POST['nom'] ?? '';
    $telephone = $_POST['telephone'] ?? '';
    $operateur = $_POST['operateur'] ?? '';
    $produits = $_POST['produits'] ?? '';
    $total = $_POST['total'] ?? 0;

    $stmt = $conn->prepare("INSERT INTO commandes (nom, telephone, operateur, produits, total) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssd", $nom, $telephone, $operateur, $produits, $total);

    if ($stmt->execute()) {
        echo "<script>alert('Paiement enregistré avec succès.'); window.location.href='index.html';</script>";
    } else {
        echo "<script>alert('Erreur : " . $stmt->error . "'); window.history.back();</script>";
    }

    $stmt->close();
} else {
    echo "Méthode non autorisée.";
}


?>

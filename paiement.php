<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST['nom'] ?? '';
    $numero = $_POST['numero'] ?? '';
    $operateur = $_POST['operateur'] ?? '';

    if (!empty($nom) && !empty($numero) && !empty($operateur)) {
        try {
            $stmt = $pdo->prepare("INSERT INTO paiements (nom, numero, operateur) VALUES (:nom, :numero, :operateur)");
            $stmt->execute([
                ':nom' => $nom,
                ':numero' => $numero,
                ':operateur' => $operateur
            ]);
            echo "<script>alert('Paiement enregistré avec succès !'); window.location.href='paiement.php';</script>";
        } catch (PDOException $e) {
            echo "<script>alert('Erreur : " . addslashes($e->getMessage()) . "');</script>";
        }
    } else {
        echo "<script>alert('Tous les champs sont requis.');</script>";
    }
}
?>

<form method="POST">
    <h2>Paiement Mobile Money</h2>
    <input type="text" name="nom" placeholder="Votre nom" required>
    <input type="text" name="numero" placeholder="Numéro Mobile Money" required>
    <select name="operateur" required>
        <option value="">Choisir un opérateur</option>
        <option value="MTN">MTN</option>
        <option value="Orange">Orange</option>
    </select>
    <button type="submit">Payer maintenant</button>
</form>

<?php
$host = 'localhost';
$dbname = 'gtweb_db';
$username = 'root';
$password = '';

header("Content-Type: application/json");

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $data = json_decode(file_get_contents("php://input"), true);

    if (!empty($data["cart"]) && !empty($data["nom"]) && !empty($data["email"])) {
        $produits = json_encode($data["cart"]);
        $total = array_sum(array_column($data["cart"], "price"));
        $stmt = $pdo->prepare("INSERT INTO commandes (nom, email, produits, total, date) VALUES (?, ?, ?, ?, NOW())");
        $stmt->execute([$data["nom"], $data["email"], $produits, $total]);

        file_put_contents("notification.log", "[".date("Y-m-d H:i:s")."] Nouvelle commande de {$data["nom"]} ({$data["email"]}) - Total: {$total} FCFA
", FILE_APPEND);

        echo json_encode(["status" => "success"]);
    } else {
        echo json_encode(["status" => "invalid"]);
    }
} catch (PDOException $e) {
    echo json_encode(["status" => "error", "message" => $e->getMessage()]);
}
?>


<?php
$host = 'localhost';
$dbname = 'gtweb_db';
$username = 'root';
$password = ''; // Modifier selon configuration

header("Content-Type: application/json");

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $data = json_decode(file_get_contents("php://input"), true);

    if (!empty($data["cart"])) {
        $stmt = $pdo->prepare("INSERT INTO paniers (nom_produit, prix, date_ajout) VALUES (?, ?, NOW())");
        foreach ($data["cart"] as $item) {
            $stmt->execute([$item["name"], $item["price"]]);
        }
        echo json_encode(["status" => "success"]);
    } else {
        echo json_encode(["status" => "empty"]);
    }
} catch (PDOException $e) {
    echo json_encode(["status" => "error", "message" => $e->getMessage()]);
}
?>

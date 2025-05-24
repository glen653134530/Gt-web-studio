<?php
$host = "localhost";
$dbname = "gt_web_studio";
$user = "root";  // À modifier avec votre identifiant MySQL
$pass = "";      // À modifier avec votre mot de passe MySQL

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}
?>
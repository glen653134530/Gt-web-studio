<?php
$host = 'fdb1030.awardspace.net';
$port = '3306';
$dbname = '4631297_vente';
$password = 'Tchouamo2001';

try {
    $pdo = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $user, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}
?>
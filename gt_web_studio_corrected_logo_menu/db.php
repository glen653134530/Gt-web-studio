<?php
$host = 'dpg-d0npiqqli9vc73882atg-a';
$port = '5432';
$dbname = 'gtweb_db';
$user = 'gtweb_db_user';
$password = 'pjL83uSyzTTzifF79ZYuSGmomiXlGPwp';

try {
    $pdo = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $user, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}
?>
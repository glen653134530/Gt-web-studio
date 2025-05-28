
<?php
$host = 'fdb1030.awardspace.net';
$port = '3306';
$dbname = '4631297_vente';
$password = 'Tchouamo2001';
$conn = new mysqli($host, $port, $dbname, $password);
if ($conn->connect_error) {
    die('Erreur de connexion à la base de données : ' . $conn->connect_error);
}
?>

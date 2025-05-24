
<?php
session_start();
if (!isset($_SESSION["admin"])) {
    header("Location: login.php");
    exit();
}

$pdo = new PDO("mysql:host=localhost;dbname=gtweb_db", "root", "");
$total = $pdo->query("SELECT COUNT(*) FROM commandes")->fetchColumn();
$revenu = $pdo->query("SELECT SUM(total) FROM commandes")->fetchColumn();
$daily = $pdo->query("SELECT DATE(date) as jour, SUM(total) as total FROM commandes GROUP BY jour ORDER BY jour")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Dashboard | GT Web Studio</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="style.css">
    <style>
        .stats {
            text-align: center;
            margin: 30px 0;
        }
        .stats div {
            margin: 10px;
            font-size: 18px;
        }
        canvas {
            max-width: 600px;
            margin: auto;
        }
    </style>
</head>
<body>
    <h2 style="text-align:center;">Dashboard Administrateur</h2>
    <div class="stats">
        <div>Total commandes : <?php echo $total; ?></div>
        <div>Revenu total : <?php echo $revenu; ?> FCFA</div>
    </div>
    <canvas id="graph"></canvas>
    <script>
        const data = {
            labels: <?php echo json_encode(array_column($daily, 'jour')); ?>,
            datasets: [{
                label: 'Revenu par jour',
                data: <?php echo json_encode(array_column($daily, 'total')); ?>,
                backgroundColor: 'rgba(0, 208, 132, 0.5)',
                borderColor: '#00D084',
                borderWidth: 2
            }]
        };
        const config = {
            type: 'bar',
            data: data,
            options: {
                scales: {
                    y: { beginAtZero: true }
                }
            }
        };
        new Chart(document.getElementById('graph'), config);
    </script>
</body>
</html>

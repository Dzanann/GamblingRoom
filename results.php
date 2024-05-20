<?php
session_start();

if (!isset($_SESSION['players']) || !isset($_SESSION['scores'])) {
    header('Location: index.php');
    exit();
}

$players = $_SESSION['players'];
$scores = $_SESSION['scores'];

arsort($scores);
$sortedPlayers = [];
foreach ($scores as $index => $score) {
    $sortedPlayers[] = ['name' => $players[$index], 'score' => $score];
}
?>
<!DOCTYPE html>
<html lang="sl">
<head>
    <title>Gambling Room - Results</title>
    <link rel="stylesheet" type="text/css" href="css/style2.css">
</head>
<body>
    <div class="okvir">
        <div class="naslov">
            <div class="nasl1">
            <span style="font-size: 40px;">T</span>he <span style="font-size: 40px;">G</span>ambling <span style="font-size: 40px;">R</span>oom
            </div>
        </div>
        <div class="glavni">
            <div class="okvigr">
                <div class="players" style="display: inline-block; width: 30%;">
                    <h2><?php echo $sortedPlayers[1]['name']; ?></h2>
                    <p>Second Place With Sum Of: <?php echo $sortedPlayers[1]['score']; ?></p>
                </div>
                <div class="players" style="display: inline-block; width: 30%; margin: 0 5%;">
                    <h2><?php echo $sortedPlayers[0]['name']; ?></h2>
                    <p>THE WINNER: <?php echo $sortedPlayers[0]['score']; ?></p>
                </div>
                <div class="players" style="display: inline-block; width: 30%;">
                    <h2><?php echo $sortedPlayers[2]['name']; ?></h2>
                    <p>Third Place With Sum Of: <?php echo $sortedPlayers[2]['score']; ?></p>
                </div>
            </div>
        </div>
        <div class="overlay"></div>
        <div class="noga"></div>
    </div>
</body>
<script>
    setTimeout(function() {
        window.location.href = 'index.php';
    }, 10000);
</script>
</html>
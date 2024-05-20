<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && !isset($_POST['roll'])) {
    // Initialize the session variables if this is the first request
    $_SESSION['players'] = [
        htmlspecialchars($_POST['user1']),
        htmlspecialchars($_POST['user2']),
        htmlspecialchars($_POST['user3'])                   
    ];
    $_SESSION['numDice'] = (int)$_POST['numberOfDice'];
    $_SESSION['numRolls'] = (int)$_POST['numberOfRolls'];
    $_SESSION['currentPlayer'] = 0;
    $_SESSION['currentRoll'] = 0;
    $_SESSION['totalRolls'] = 0;
    $_SESSION['scores'] = array_fill(0, 3, 0);
    $_SESSION['results'] = array_fill(0, 3, []);
}

$players = $_SESSION['players'];
$numDice = $_SESSION['numDice'];
$numRolls = $_SESSION['numRolls'];
$currentPlayer = $_SESSION['currentPlayer'];
$currentRoll = $_SESSION['currentRoll'];
$totalRolls = $_SESSION['totalRolls'];
$scores = $_SESSION['scores'];
$results = $_SESSION['results'];

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['roll'])) {
    // Roll the dice for the current player
    $rollTotal = 0;
    $rolls = [];
    for ($i = 0; $i < $numDice; $i++) {
        $roll = rand(1, 6);
        $rolls[] = $roll;
    }
    // Add the current roll to the results
    $results[$currentPlayer][] = $rolls;
    
    // Calculate the score for the current player (sum of the dice rolls)
    $score = array_sum($rolls);
    $scores[$currentPlayer] += $score; 
    
    // Update session variables
    $_SESSION['scores'] = $scores;
    $_SESSION['results'] = $results;

    // Move to the next player
    $currentPlayer = ($currentPlayer + 1) % 3;
    $currentRoll = ($currentPlayer == 0) ? $currentRoll + 1 : $currentRoll;
    $totalRolls++;

    if ($totalRolls >= $numRolls * 3) {
        header('Location: results.php');
        exit();
    }

    $_SESSION['currentPlayer'] = $currentPlayer;
    $_SESSION['currentRoll'] = $currentRoll;
    $_SESSION['totalRolls'] = $totalRolls;
}
?>
<!DOCTYPE html>
<html lang="sl">
<head>
    <title>Gambling Room - Game</title>
    <link rel="stylesheet" type="text/css" href="css/style1.css">
</head>
<body>
    <div class="okvir">
        <div class="naslov">
            <div class="nasl1">
                <span style="font-size: 40px;">G</span>ame
            </div>
        </div>
        <div class="glavni">
            <div class="okvigr">
                <?php for ($i = 0; $i < 3; $i++): ?>
                    <div class="players">
                        <h2><?php echo $players[$i]; ?></h2>
                        <p>Current Dice Roll:</p>
                        <div class="dice-images">
                            <?php 
                            if (!empty($results[$i])) {
                                foreach (end($results[$i]) as $roll) {
                                    echo '<img src="img/dice' . $roll . '.png" alt="Dice ' . $roll . '">';
                                }
                            }
                            ?>
                        </div>
                        <p>Total Sum: <?php echo $scores[$i]; ?></p>
                    </div>
                <?php endfor; ?>
                <div class="gumb">
                    <form method="post">
                        <button type="submit" name="roll" id="gumb">
                            <?php echo $totalRolls >= $numRolls * 3 - 1 ? 'Show Results' : 'Roll Dice'; ?>
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="overlay"></div>
        <div class="noga"></div>
    </div>
</body>
</html>
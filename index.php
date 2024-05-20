<?php session_start(); ?>
<!DOCTYPE html>
<html lang="sl">
<head>
    <title>Gambling Room</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
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
                <form action="game.php" method="post">
                    <div class="igralci">
                        <div id="player1" class="players">
                            <p class="enterName"><span style="font-size: 22px;">E</span>nter Player 1 name.</p>
                            <input type="text" id="user1" name="user1" placeholder="Player 1" required>
                        </div>
                        <div id="player2" class="players">
                            <p class="enterName"><span style="font-size: 22px;">E</span>nter Player 2 name.</p>
                            <input type="text" id="user2" name="user2" placeholder="Player 2" required>
                        </div>
                        <div id="player3" class="players">
                            <p class="enterName"><span style="font-size: 22px;">E</span>nter Player 3 name.</p>
                            <input type="text" id="user3" name="user3" placeholder="Player 3" required>
                        </div>
                    </div>
                    <div class="izbirakock">
                        <div class="kocke">
                            <label for="numberOfDice"><span style="font-size: 20px;">S</span>et number of dice:</label>
                            <select id="numberOfDice" name="numberOfDice">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                            <br/><br/>
                            <label for="numberOfRolls"><span style="font-size: 20px;">S</span>et number of rolls:</label>
                            <select id="numberOfRolls" name="numberOfRolls">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                            </select>
                        </div>
                    </div>
                    <div class="gumb">
                        <button type="submit" id="gumb"><span style="font-size: 25px;">S</span>tart</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="overlay"></div>
        <div class="noga"></div>
    </div>
</body>
</html>
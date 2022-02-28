<html>
<head>
    <link rel="stylesheet" href="../src/style.css">
</head>
<body>
<img src="../src/hero.png">
<img style="width: 500px;height:  500px" src="../src/battle.png">
<img style="float: right" src="../src/enemy.jpg">
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include "skill.php";
include "character.php";
include "hero.php";
include "enemy.php";
//initialize hero stats
$stats = include "../config/heroStats.php";
$hero = new hero($stats['name'], $stats['health']['min'], $stats['health']['max'],
    $stats['strength']['min'], $stats['strength']['max']
    , $stats['defence']['min'], $stats['defence']['max']
    , $stats['speed']['min'], $stats['speed']['max']
    , $stats['luck']['min'], $stats['luck']['max']);
//initialize enemy stats
$stats = include "../config/enemyStats.php";
$enemy = new enemy($stats['name'], $stats['health']['min'], $stats['health']['max'],
    $stats['strength']['min'], $stats['strength']['max']
    , $stats['defence']['min'], $stats['defence']['max']
    , $stats['speed']['min'], $stats['speed']['max']
    , $stats['luck']['min'], $stats['luck']['max']);
//initialize number of rounds
$turns = include "../config/turns.php";
$turnCounter = 1;
//deciding who goes first
$heroFirst = false;
if ($hero->getSpeed() > $enemy->getSpeed()) {
    $heroFirst = true;
} else if ($hero->getSpeed() == $enemy->getSpeed()) {
    if ($hero->getLuck() > $enemy->getLuck()) {
        $heroFirst = true;
    }
}
//display hero and enemy initial stats
echo "<div class='container'>";
displayStatsHero($hero);
displayStatsEnemy($enemy);
echo "</div>";
//battle loop
while ($turnCounter <= $turns && $hero->getHealth() > 0 && $enemy->getHealth() > 0) {
    echo "<h1 style='color:gold;  -webkit-text-stroke-width: 1px; -webkit-text-stroke-color: black;'>Turn: $turnCounter </h1>";
    if ($heroFirst) {
        $hero->attack($enemy);
        if ($enemy->getHealth() > 0)
            $enemy->attack($hero);
    } else {
        $enemy->attack($hero);
        if ($hero->getHealth() > 0)
            $hero->attack($enemy);
    }
    //display stats after each round
    echo "<div class='container'>";
    displayStatsHero($hero);
    displayStatsEnemy($enemy);
    echo "</div>";
    $turnCounter++;
}
//displaying battle result
if ($turnCounter == $turns+1) {
    echo "<h1>TIE!</h1>";
} elseif ($hero->getHealth() <= 0) {
    echo "<h1>FAIL!</h1>";
} elseif ($enemy->getHealth() <= 0) {
    echo "<h1>VICTORY!</h1>";
}


function displayStatsHero($character): void
{
    echo "<div class='hero'>";
    echo "<h3>$character->name</h3>";

    echo "<p>Health: " . $character->getHealth() . "</p>";
    echo "<p>Strength: " . $character->getStrength() . "</p>";
    echo "<p>Defence: " . $character->getDefence() . "</p>";
    echo "<p>Speed: " . $character->getSpeed() . "</p>";
    echo "<p>Luck: " . $character->getLuck() . "</p>";
    echo "</div>";
}

function displayStatsEnemy($character): void
{
    echo "<div class='enemy'>";
    echo "<h3>$character->name</h3>";

    echo "<p>Health: " . $character->getHealth() . "</p>";
    echo "<p>Strength: " . $character->getStrength() . "</p>";
    echo "<p>Defence: " . $character->getDefence() . "</p>";
    echo "<p>Speed: " . $character->getSpeed() . "</p>";
    echo "<p>Luck: " . $character->getLuck() . "</p>";
    echo "</div>";
}

?>
</body>
</html>
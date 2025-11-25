<?php 

$solutions = [
    'pierre' => ['ciseau', 'lezard'],
    'feuille' => ['pierre', 'spock'],
    'ciseau' => ['feuille', 'lezard'],
    'lezard' => ['ciseau', 'feuille'],
    'spock' => ['ciseau', 'pierre']
];

$choicePlayer = $_GET['player'] ?? null;
$choiceBot = array_rand($solutions);

// $drawStat = 0;
// $winStat = 0;
// $loseStat = 0;


if ($choicePlayer == null) {
    $choiceBot = null;
    $state = null;
} else {
    if ($choicePlayer == $choiceBot) {
        $state = "DRAW";
        // $drawStat += 1;
    } else if (in_array($choiceBot, $solutions[$choicePlayer])) {
        $state = "WIN";
        // $winStat += 1;
    } else {
        $state = "LOSE";
        // $loseStat += 1;
    }
}

// echo "DRAW: $drawStat, WIN: $winStat, LOSE: $loseStat";

$html = <<< HTML
<h1>Jeu Pierre, Feuilles, Ciseaux</h1>

<div>
    <p>Joueur : $choicePlayer</p>
</div>
<div>
    <p>Bot : $choiceBot</p>
</div>

<div>
    <p>$state</p>
</div>

<div>
    <a href="http://localhost:8000/test.php/?player=pierre">PIERRE</a>
    <a href="http://localhost:8000/test.php/?player=feuille">FEUILLE</a>
    <a href="http://localhost:8000/test.php/?player=ciseau">CISEAU</a>
    <a href="http://localhost:8000/test.php/?player=lezard">LEZARD</a>
    <a href="http://localhost:8000/test.php/?player=spock">SPOCK</a>
</div>

<div>
    <a href="http://localhost:8000/test.php">RESET</a>
</div>
HTML;

echo $html;
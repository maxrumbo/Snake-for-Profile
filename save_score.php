<?php
session_start();

$score = isset($_GET['score']) ? (int)$_GET['score'] : 0;
$filename = "highscore.txt";

// Baca skor tertinggi saat ini
if (file_exists($filename)) {
    $highscore = (int)file_get_contents($filename);
} else {
    $highscore = 0;
}

// Jika skor baru lebih tinggi, simpan
if ($score > $highscore) {
    file_put_contents($filename, $score);
    $_SESSION['high_score'] = $score;
} else {
    $_SESSION['high_score'] = $highscore;
}

// Redirect kembali ke game
header("Location: index.html");
exit();
?>

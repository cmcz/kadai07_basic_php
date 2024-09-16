<?php

function sanitize_csv_field($field) {
    return '"' . str_replace('"', '""', $field) . '"';
}

// File Name
$raw_place = $_POST["hiddenPlaceValue"];
$place = preg_replace('/[^a-zA-Z0-9_\-]/', '_', $raw_place);
$fileName = "data/review_" . $place . ".csv";

// Content
$photo = $_POST["user-icon"]; 
$username = sanitize_csv_field($_POST["username"]);
$email = sanitize_csv_field($_POST["email"]);
$rating = $_POST["rating"]; 
$review = sanitize_csv_field($_POST["review"]);
$comma = ",";

$str = $photo . $comma . $username . $comma . $email . $comma . $rating . $comma . $review;

// Write to file
$file = fopen($fileName, "a");
fwrite($file, $str . "\n");
fclose($file);
chmod($fileName, 0666);

header("Location: index.php?loadReview={$raw_place}");
exit
?>

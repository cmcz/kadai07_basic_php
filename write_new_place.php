<?php

function sanitize_csv_field($field) {
    return '"' . str_replace('"', '""', $field) . '"';
}

// Content
$location_name = sanitize_csv_field($_POST["location-name"]);
$address = sanitize_csv_field($_POST["address"]);
$lat = $_POST["lat"]; 
$lon = $_POST["lon"]; 
$description = sanitize_csv_field($_POST["description"]);
$photo = $_POST["new-user-icon"]; 
$website = sanitize_csv_field($_POST["website"]); 
$category = sanitize_csv_field($_POST["category"]);
$comma = ",";

$str = $location_name . $comma . $address . $comma . $lat . $comma . $lon . $comma . $description . $comma . $photo . $comma . $website . $comma . $category;

// File Name
$filename = "data/place.csv";

// Write to file
$file = fopen($filename, "a");
fwrite($file, $str . "\n");
fclose($file);
chmod($filename, 0666);

header("Location: index.php"); 
exit
?>

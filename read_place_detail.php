<?php

$filename = 'data/place.csv';
$topic = $_POST['topic'];

if (($file = fopen($filename, 'r')) !== FALSE) {
    echo "<ul>";
    
    while (($data = fgetcsv($file)) !== FALSE) {

        list($location_name, $address, $lat, $lon, $description, $photo, $website, $category) = $data;

        if ($topic ==$location_name){

            $h = '<div class="comment-card">';

            // Icon
            $h .= '<div class="userblock">';
            $h .= '<img src=' . $photo . ' class="w-20 h-auto object-cover border-2 border-transparent rounded-full">';
            
            // Address
            $h .= '<p class="location-name">' . $address . '</p>';
            $h .= '</div>';
            
            // Description
            $h .= '<p class="comment-content">';
            $h .= $description;
            $h .= '</p>';
            $h .= '<p class="location-detail"> Coordinate  :' . $lat . ', ' . $lon . '</p><br>';
            $h .= '</div>';
            echo $h;
        }

    }

    echo "</ul>";
    fclose($file);
} else {
    echo "Failed to open the file.";
}

?>
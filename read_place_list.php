<?php

$filename = 'data/place.csv';

if (($file = fopen($filename, 'r')) !== FALSE) {
    echo "<ul>";
    
    while (($data = fgetcsv($file)) !== FALSE) {

        list($location_name, $address, $lat, $lon, $description, $photo, $website, $category) = $data;

        $h = '';
        $h .= '<div>';
        $h .= '<li class="topic-item cursor-pointer" data-topic="' . $location_name . '">';
        $h .= $location_name;
        $h .= '</li>';
        $h .= '</div>';
        echo $h;

    }

    echo "</ul>";
    fclose($file);
} else {
    echo "Failed to open the file.";
}

?>

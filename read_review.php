<?php

$place = preg_replace('/[^a-zA-Z0-9_\-]/', '_', $_POST["place"]);
$filename = "data/review_" . $place . ".csv";

$total=0;
$count=0;

if (($file = fopen($filename, 'r')) !== FALSE) {
    
    $h ='';

    while (($data = fgetcsv($file)) !== FALSE) {

        list($photo, $username, $email, $rating, $review) = $data;

        $h .= '<div class="comment-card">';

        // Icon
        $h .= '<div class="userblock">';
        $h .= '<img src="' . $photo . '" class="w-20 h-auto object-cover border-2 border-transparent rounded-full">';
        
        // username
        $h .= '<p class="username">' . $username . '</p>';

        // email
        $h .= '<p class="location-detail">' . $email . '</p>';

        // Rating
        $h .= '<div class="star-rating readonly">';
        for ($i = 0; $i < 5 - $rating; $i++) {
            $h .= '<span>★</span>';
        }
        for ($i = 0; $i < $rating; $i++) {
            $h .= '<span class="filled">★</span>';
        }
        $h .= ' </div>';
        $h .= '</div>';
        
        // review
        $h .= '<p class="comment-content">';
        $h .= $review;
        $h .= '</p>';

        $h .= '</div>';

        // Compute Average Rating
        $total+=$rating;
        $count+=1;

    }

    // Calculate average rating and determine number of stars
    $avg_rating = $total / $count;    
    $fullStars = floor($avg_rating);
    $hasHalfStar = ($avg_rating - $fullStars) >= 0.5;
    $emptyStars = 5 - $fullStars - ($hasHalfStar ? 1 : 0);

    $finalRating = '<div class="rating-container">';
    $finalRating .= '<span class="location-name"> Average Rating: ' . round($avg_rating, 2) . '</span>';
    $finalRating .= '<span class="star-rating readonly">';

    // Empty Stars
    for ($i = 0; $i < $emptyStars; $i++) {
        $finalRating .= '<span>★</span>';
    }

    // Half Star
    if ($hasHalfStar) {
        $finalRating .= '<span class="half-filled">★</span>';
    }

    // Full Stars
    for ($i = 0; $i < $fullStars; $i++) {
        $finalRating .= '<span class="filled">★</span>';
    }

    $finalRating .= '</span>';
    $finalRating .= '</div>';
    echo $finalRating;

    // Reviews
    echo $h;

    fclose($file);
} else {
    echo "No reviews yet. Be the first to add one here!";
}

?>
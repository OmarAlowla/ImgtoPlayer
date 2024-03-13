<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$playerArr = ['idle/player-idle-1.png','jump/player-fall.png','jump/player-jump-1.png','run/player-run-1.png'];

function imgToPlayer($player)
{
    $template = new Imagick('face.png');
    $image = new Imagick('person.jpg');

    // Copy alpha from the template over the person image
    $image->compositeImage($template, Imagick::COMPOSITE_COPYOPACITY, 0, 0);
    $image->writeImage('person1.png');

    // Load the first image
    $image1 = new Imagick('person1.png');

    // Load the second image
    $image2 = new Imagick('./player/' . $player);

    // Resize the first image to 60x60 pixels
    $image1->resizeImage(60, 60, Imagick::FILTER_LANCZOS, 1, true);

    // Resize the second image to 100x100 pixels
    $image2->resizeImage(100, 100, Imagick::FILTER_LANCZOS, 1, true);

    // Composite the first image above the second image
    $image2->compositeImage($image1, Imagick::COMPOSITE_OVER, 30, 10);

    // Save or display the resulting image
    $outputFilename = basename($player);
    $image2->writeImage($outputFilename);

    // Destroy Imagick objects to free up memory
    $image1->destroy();
    $image2->destroy();
}

if (!extension_loaded('imagick')) {
    echo 'imagick not installed';
} else {
    foreach ($playerArr as $player) {
        imgToPlayer($player);
    }
}
?>

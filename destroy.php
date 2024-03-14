<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
</head>

<body>




    <?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    $playerArr = ['idle/player-idle-1.png', 'jump/player-fall.png', 'jump/player-jump-1.png', 'run/player-run-1.png'];

    function destroyImgs($player)
    {

        $image2 = new Imagick('./playerSrc/' . $player);
        // Resize the second image to 100x100 pixels
        $image2->resizeImage(100, 100, Imagick::FILTER_LANCZOS, 1, true);


        // Save or display the resulting image
        $outputFilename = basename($player);
        $image2->writeImage($outputFilename);
        $image2->destroy();
    }
    echo '<img src="person1.png">';
    if (!extension_loaded('imagick')) {
        echo 'imagick not installed';
    } else {
        foreach ($playerArr as $player) {
            destroyImgs($player);
        }
        echo "<script>
    window.location.href = 'done.html';
    </script>";
    }

    ?>

</body>

</html>
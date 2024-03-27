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

    function destroyImg()
    {
        $template = new Imagick('./default.png');
        $template->writeImage('./game/images/bird.png');
    }

    echo '<img src="./default.png">';
    if (!extension_loaded('imagick')) {
        echo 'imagick not installed';
    } else {
        destroyImg();
    }
    echo "<script>window.location.href = './game/'</script>";

    ?>

</body>

</html>
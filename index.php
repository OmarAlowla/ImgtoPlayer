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


    function imgToPlayer()
    {
        $template = new Imagick('./face.png');
        $image = new Imagick('./input/person.jpg');
        $image->resizeImage(350, 400, Imagick::FILTER_LANCZOS, 1, true);
        $image->cropImage(120, 150, 115, 50);
        $image->compositeImage($template, Imagick::COMPOSITE_COPYOPACITY, 10, 10);
        $image->writeImage('person1.png');
        $image1 = new Imagick('person1.png');
        $image1->resizeImage(30, 40, Imagick::FILTER_LANCZOS, 1, true);
        $image1->writeImage('./game/images/bird.png');
    }

    echo '<img src="person1.png">';
    if (!extension_loaded('imagick')) {
        echo 'imagick not installed';
    } else {
        imgToPlayer();
    }
    echo "<script>window.location.href = './game/'</script>";
    ?>

</body>

</html>
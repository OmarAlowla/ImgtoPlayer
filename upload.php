<?php
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["photo_data"])) {
    $data = $_POST["photo_data"];
    $data = str_replace('data:image/jpeg;base64,', '', $data); // Remove data URL header
    $data = str_replace(' ', '+', $data); // Replace spaces with '+'
    $photo_data = base64_decode($data); // Decode base64 data

    $target_dir = "input/"; // Specify the directory where you want to save the uploaded files
    $target_file = $target_dir . 'person.jpg'; // Generate a unique file name

    // Save the photo to the target directory
    if (file_put_contents($target_file, $photo_data)) {
        echo "The photo has been uploaded.";
        echo "<script>
window.location.href = 'index.php';
</script>";

    } else {
        echo "Sorry, there was an error uploading your photo. Error: " . error_get_last()['message'];
    }
}
?>
<?php
$audioFilePath = "C:/output/Cruella - Bad Romance - Lady Gaga - music video.mp3";

header('Cache-Control: no-cache');
header('Content-Transfer-Encoding: binary');
header('Content-Type: audio/mp3'); // Set the output content type to WAV
header('Content-Length: ' . filesize($audioFilePath)); // Set the length of the file
header('Accept-Ranges: bytes');
// header('Content-Disposition: inline; filename="test_audio.mp3"'); // Set an output file name
readfile($audioFilePath); // Read and stream the file
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<body>
    <h1>Audio Player</h1>
    <audio controls>
        <source src="<?php echo $_SERVER['PHP_SELF']; ?>" type="audio/mp3">
        Your browser does not support the audio element.
    </audio>
    <?php
    foreach (new DirectoryIterator('C:/output/') as $file) {
        if (!$file->isDot()) {
            if($file->isDir()){
                echo '<pre style= "color: blue">';
            } else {
                echo '<pre>';
            }
            echo $file->getFilename() . '<br>';
            echo '</pre>';
        }
    }
    ?>
</body>
</html>

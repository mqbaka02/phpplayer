<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="playerstyle.css">
</head>
<body>
    <?php
    $filename= $_GET['filename'];
    ?>
    <audio controls autoplay>
        <source src="phploader/phploader.php" type="audio/mp3">
    </audio>
    <?=$filename?>
</body>
</html>
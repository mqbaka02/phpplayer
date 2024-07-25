<?php require "../laytout/header.php"; ?>
<body>
    <?php
    $filename= $_GET['filename'];
    ?>
    <audio controls autoplay>
        <source src="phploader/phploader.php" type="audio/mp3">
    </audio>
    <?=$filename?>
<?php require '../layout/footer.php'?>
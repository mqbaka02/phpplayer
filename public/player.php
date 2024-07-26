<?php require "../layout/header.php"; ?>
    <form action="index.php" type="get" id="player-form">
        <input type="hidden" value="<?=$mp3file?>" name="filename" id="filename">
    </form>
    <?php
    $filename= $_GET['filename'];
    ?>
    <audio controls autoplay>
        <source src="phploader/phploader.php" type="audio/mp3">
    </audio>
    <?=$filename?>
    <?php $folder= "C:/output/" ?>
    <?php require '../src/song_list_generator.php'; ?>
<?php require '../layout/footer.php'?>
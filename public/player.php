<?php require "../layout/header.php"; ?>
    <form action="index.php" type="get" id="player-form">
        <input type="hidden" value="<?=$mp3file?>" name="filename" id="filename">
    </form>
    <?php
    $filename= $_GET['filename'];
    ?>

    <div class="music-player">
        <audio autoplay id='audio'>
            <source src="phploader/phploader.php" type="audio/mp3">
        </audio>

        <div class="song-name">
            <?=$filename?>
        </div>

        <div class="controls-container">
            <button id="pp">Play</button>
            <div class="volume">
                <button id="vm">-</button>
                <button id="vp">+</button>
            </div>
        </div>
    </div>

    <?php $folder= "C:/output/" ?>
    <?php require '../src/song_list_generator.php'; ?>


    <script src="scripts/player.js">
    </script>
<?php require '../layout/footer.php'?>
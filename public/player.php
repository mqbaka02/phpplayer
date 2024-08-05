<?php $styles=["style.css"] ?>
<?php require "../layout/header.php"; ?>
    <!-- <form action="player.php" type="get" id="player-form">
        <input type="hidden" value="" name="filename" id="filename">
    </form> -->
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
                <div class="volume-value"></div>
                <button id="vp">+</button>
            </div>
        </div>
    </div>

    <?php $folder= json_decode($_COOKIE['added_folders'])[0] ?>
    <?php require '../src/song_list_generator.php'; ?>

    <script src="scripts/player.js">
    </script>
<?php require '../layout/footer.php'?>
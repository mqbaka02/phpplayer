<?php
require '../vendor/autoload.php';
use App\Navigation;
use App\LoaderHandler;

$folder= "C:/output/";
?>
<?php require '../layout/header.php'?>
    <?php
    if(!empty($_GET['filename'])){
        $mp3file= $_GET['filename'];
        LoaderHandler::generate_loader_contents($folder, $mp3file, "phploader/phploader.php");
        Navigation::go_to_page('player.php', ['filename'=> $mp3file]);
    } else {
        $mp3file= null;
    }
    ?>

    <form action="" type="get" id="player-form">
        <input type="hidden" value="<?=$mp3file?>" name="filename" id="filename">
    </form>

    <div class="list-container">
    <?php foreach (new DirectoryIterator($folder) as $file) :?>
        <?php if (!$file->isDot()&&!$file->isDir()) : ?>
            <div class="song-element">
                <div class="clickable-name" theattr="<?= $file->getFilename() ?>">
                    <?= $file->getFilename() ?>
                </div>
            </div>
        <?php endif?>
    <?php endforeach?>
    </div>
    <script defer src="scripts/generate_list_and_submit_form.js">
    </script>
<?php require '../layout/footer.php'?>

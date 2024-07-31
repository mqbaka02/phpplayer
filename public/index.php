<?php $styles=["style.css"] ?>
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


    <!-- variables
     $folder could be an array for all I care
     ...
      -->
    <?php require '../src/song_list_generator.php'; ?>
<?php require '../layout/footer.php'?>

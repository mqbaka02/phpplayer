<?php $styles=["style.css"] ?>
<?php
require '../vendor/autoload.php';
use App\LoaderHandler;
use App\Navigation;

if(isset($_COOKIE['added_folders'])){
    $folders= (json_decode($_COOKIE['added_folders']));
    // exit();
} else {
    Navigation::go_to_page('/');
}

$folder= $folders[0];
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

<!-- variables
    $folder could be an array for all I care
    ...
    -->
<?php require '../src/song_list_generator.php'; ?>

<?php require '../layout/footer.php'?>

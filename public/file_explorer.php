<?php $styles=["style.css", "file_exp.css"] ?>
<?php
require '../vendor/autoload.php';
use App\Navigation;

// $starting_folder= "C:/";

if(isset($_GET['folder'])){
    $folder= urldecode($_GET['folder']);
} 
// else {
//     $folder= $starting_folder;
// }

// $comms= explode(" ", exec("fsutil fsinfo drives"));
// $drives= array_shift($comms);
// var_dump($drives);
// var_dump(explode(" ", exec("fsutil fsinfo drives")));
$drives= [];
$fso = new COM('Scripting.FileSystemObject');
foreach ($fso->Drives as $drive) {
	$drives[]= $drive->DriveLetter;
}
// var_dump($drives);
?>

<?php require "../layout/header.php"; ?>
<?php if(!isset($_GET['folder'])): ?>
    <?php require "drives-list.php"; ?>
<?php endif ?>

<?php if(isset($_GET['folder'])): ?>
    <?php require "folders-list.php"; ?>
<?php endif ?>

<?php require "../layout/footer.php"; ?>
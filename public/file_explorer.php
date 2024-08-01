<?php $styles=["style.css", "file_exp.css"] ?>
<?php
require '../vendor/autoload.php';
use App\Navigation;

$starting_folder= "C:/";

if(isset($_GET['folder'])){
    $folder= urldecode($_GET['folder']);
} else {
    $folder= $starting_folder;
}

// $comms= explode(" ", exec("fsutil fsinfo drives"));
// $drives= array_shift($comms);
// var_dump($drives);
// var_dump(explode(" ", exec("fsutil fsinfo drives")));
$drives= [];
$fso = new COM('Scripting.FileSystemObject');
foreach ($fso->Drives as $drive) {
	$drives[]= $drive->DriveLetter;
}

// exit();
?>

<?php require "../layout/header.php"; ?>
<h2><?=$folder?></h2>
<?php $dir_number= 0; ?>
<div class="folder-container">
    <?php foreach (new DirectoryIterator($folder) as $file): ?>
        <?php if($file-> isDir()) :?>
            <?php $dir_number++ ?>
            <div class="dir-div">
                <a href=<?= "file_explorer.php?folder=" . urlencode($folder) . "/" . urlencode($file->getFilename()) ?>>
                    <?php require "images/folder.svg" ?>
                    <div class="folder-link">
                        <?= $file->getFilename() ?>
                    </div>
                </a>
            </div>
        <?php endif ?>
    <?php endforeach ?>
    <div class="dir-div">
        <a href=<?= "file_explorer.php?folder=" . urlencode($folder) . "/" . urlencode($file->getFilename()) ?>>
            <?php require "images/addfolder.svg" ?>
            <div class="folder-link">
                Add this folder
            </div>
        </a>
    </div>
</div>

<?php require "../layout/footer.php"; ?>
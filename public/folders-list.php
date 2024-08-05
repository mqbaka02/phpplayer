<?php
require '../vendor/autoload.php';
use App\Utils;
$folder_string= implode("/", $folder);
?>
<div class="title file-exp">
    <h2><?= $folder_string ?></h2>
    <div class="folder-buttons">
        <?php foreach($folder as $key=>$single_folder): ?>
            <?php $its_link= Utils::generate_URL_params(array_slice($folder, 0, $key + 1)) ?>
            <a href="<?= 'file_explorer.php?' . $its_link ?>" class="folder-button">
                <?= $single_folder ?>
            </a>
        <?php endforeach ?>
    </div>
</div>
<?php $dir_number= 0; ?>
<div class="folder-explorer">
    <div class="inner">
        <div class="scrollbar"></div>
        <div class="folder-container">
            <?php foreach (new DirectoryIterator($folder_string) as $file): ?>
                <?php if($file-> isDir() && $file->getFileName()!== '.') :?>
                    <?php $dir_number++ ?>
                    <div class="dir-div">
                        <?php
                            $file_path= Utils::generate_file_path_from_array($folder, $file);
                            $folder_url_params= Utils::generate_URL_params($file_path);
                        ?>
                        <a href=<?= "file_explorer.php?" . $folder_url_params ?>>
                            <?php require "images/folder.svg" ?>
                            <div class="folder-link">
                                <?= $file->getFilename() ?>
                            </div>
                        </a>
                    </div>
                <?php endif ?>
            <?php endforeach ?>
            <div class="dir-div">
                <a href="">
                    <?php require "images/addfolder.svg" ?>
                    <div class="folder-link">
                        Add this folder
                    </div>
                </a>
            </div>
        </div>
        <div class="separator" aria-hidden="true" role="presentation"></div>
    </div>
    <div class="inner">
        <div class="scrollbar"></div>
        <?php require "drives-list.php" ?>
    </div>
</div>
<script src="scripts/scrollbars.js"></script>
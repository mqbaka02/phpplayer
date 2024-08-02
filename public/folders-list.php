<?php
$folder_string= implode("/", $folder);
// var_dump($folder);
?>
<div class="title">
    <h2><?= $folder_string ?></h2>
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
                            $file_path= $folder;
                            if($file->getFileName()=== ".."){
                                array_pop($file_path);
                            } else {
                                $file_path[]= $file->getFileName();
                            }

                            $folder_url_params= "folder[]=" . $file_path[0];
                            if(count($file_path) > 1){
                                for($i= 1; $i< count($file_path); $i++){
                                    $folder_url_params .= "&folder[]=" . urlencode($file_path[$i]);
                                }
                            }
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
        <?php require "drives-list.php" ?>
    </div>
</div>
<script src="scripts/scrollbar.js"></script>
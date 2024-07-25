<?php
$folder= "C:/output/";
?>
<?php require '../layout/header.php'?>
    <?php
    if(!empty($_GET['filename'])){
        $mp3file= $_GET['filename'];

        $header_string= "<?php" . PHP_EOL . "header('Content-Type: audio/mpeg');" . PHP_EOL . "readfile('" . $folder . $mp3file . "');" . PHP_EOL;
        $phploader_path= "phploader/phploader.php";
        file_put_contents($phploader_path, $header_string);
        echo "<script>window.location.href='player.php?filename=" . $mp3file . "'</script>";
        
    } else {
        $mp3file= null;
    }

    $music_folder= "C:/output";
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
    <script defer>
        var the_from= document.querySelector("#player-form");
        var all_clickable_songs= document.querySelectorAll(".clickable-name");
        var the_input= document.querySelector("input#filename");
        all_clickable_songs.forEach(el=>{
            el.addEventListener('click', event=> {
                event.preventDefault();
                the_input.value= event.target.getAttribute('theattr');
                the_from.submit();
                // console.log(event.target.getAttribute('theattr'));
                // console.log(event);
            });
        });
        
    </script>
<?php require '../layout/footer.php'?>

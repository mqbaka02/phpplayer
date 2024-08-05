

<form action="" type="get" id="player-form">
    <input type="hidden" value="<?=$mp3file?>" name="filename" id="filename">
</form>

<div class="list-container">
    <?php $song_number= 0; ?>
    <?php foreach (new DirectoryIterator($folder) as $file) :?>
        <?php if (!$file->isDot() && !$file->isDir() && strtolower($file->getExtension()) === 'mp3') : ?>
            <?php $song_number++ ?>
            <div class="song-element">
                <div class="clickable-name" theattr="<?= $file->getFilename() ?>">
                    <?php var_dump($file->getFileName())?>
                    <div class="name-container">
                        <?= $file->getFilename() ?>
                    </div>
                    <div class="play_button">
                        <div class="roundtriangle"></div>
                    </div>
                </div>
            </div>
        <?php endif?>
    <?php endforeach?>
    <?php if ($song_number === 0) :?>
        <div class="song-element">There are no mp3 files in this folder.</div>
    <?php endif ?>
</div>
<script defer src="scripts/generate_list_and_submit_form.js">
</script>
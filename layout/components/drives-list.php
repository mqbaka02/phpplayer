<?php $drives_number= 0; ?>
<div class="folder-container drives">
    <?php foreach ($drives as $drive): ?>
        <?php $drives_number++ ?>
        <div class="dir-div drive">
            <a href=<?= "/?folder[]=" . urlencode($drive) . ":" ?>>
                <?php require "images/drive.svg" ?>
                <div class="folder-link">
                    <?= $drive . ":/" ?>
                </div>
            </a>
        </div>
    <?php endforeach ?>
</div>
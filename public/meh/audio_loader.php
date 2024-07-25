<?php
header('Content-Type: audio/mpeg');
header('Content-Disposition: attachment; filename="audio.mp3"');
readfile('C:/output/Cruella - Bad Romance - Lady Gaga - music video.mp3');
?>
<?php
namespace App;

class LoaderHandler {

    public static function generate_loader_contents(string $folder, string $mp3file, string $phploader_path){
        $header_string= "<?php";
        $header_string .= PHP_EOL;
        $header_string .= "header(\"Content-Type: audio/mpeg\");";
        $header_string .= PHP_EOL;
        $header_string .= "readfile(\"";
        $header_string .= $folder;
        $header_string .= '/';
        $header_string .= $mp3file;
        $header_string .= "\");";
        $header_string .= PHP_EOL;
        file_put_contents($phploader_path, $header_string);
    }
    
}
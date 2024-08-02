<?php
namespace App;

class Utils {
    
    public static function generate_file_path_from_array(array $folder_list, \DirectoryIterator $file): array {
        $file_path= $folder_list;
        if($file->getFileName()=== ".."){
            array_pop($file_path);
        } else {
            $file_path[]= $file->getFileName();
        }
        return $file_path;
    }

    public static function generate_URL_params(array $file_path): string {
        $folder_url_params= "folder[]=" . $file_path[0];
        if(count($file_path) > 1){
            for($i= 1; $i< count($file_path); $i++){
                $folder_url_params .= "&folder[]=" . urlencode($file_path[$i]);
            }
        }
        return $folder_url_params;
    }
}
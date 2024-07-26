<?php
namespace App;

class Navigation {

    public static function go_to_page(string $href, ?array $params= []){
        $new_location_script= "<script>window.location.href='" . $href;
        if(!empty($params)){
            $new_location_script .= "?";
            $keys_list= array_keys($params);
            for($i= 0; $i< count($params); $i++){
                $new_location_script .= $keys_list[$i] . "=" . str_replace("'", "\'", $params[$keys_list[$i]]);
                if($i!== (count($params) - 1)){
                    $new_location_script .= "&";
                }
            }
        }
        $new_location_script .= "'</script>";
        echo $new_location_script;
    }

}
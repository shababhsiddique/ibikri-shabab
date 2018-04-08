<?php

/* Remove Directory Recursively */

function rrmdir($dir) {
    if (is_dir($dir)) {
        $objects = scandir($dir);
        foreach ($objects as $object) {
            if ($object != "." && $object != "..") {
                if (filetype($dir . "/" . $object) == "dir")
                    rrmdir($dir . "/" . $object);
                else
                    unlink($dir . "/" . $object);
            }
        }
        reset($objects);
        rmdir($dir);
    }
}

/* Recursive delte old files */

function rrmdirifold($dir) {
    if (is_dir($dir)) {
        $objects = scandir($dir);
        foreach ($objects as $object) {
            if ($object != "." && $object != "..") {
                if (filetype($dir . "/" . $object) == "dir")
                    if ((time() - filectime($dir . "/" . $object)) < 7200) {
                        rrmdirifold($dir . "/" . $object);
                    } else {
                        if ((time() - filectime($dir . "/" . $object)) < 7200) {
                            unlink($dir . "/" . $object);
                        }
                    }
            }
        }
        reset($objects);
        rmdir($dir);
    }
}


function formatDateLocalized($string){
//    
//    $date = "12111022";
//    $dateTranslated = number($date);
//    $dateTranslated = str_replace(",", "", $dateTranslated);
//    $datePieces = str_split($dateTranslated, 2);
//    
//    
//    echo "<pre>";
//    print_r($datePieces);
//    exit();
//    return "";
    
    $date = date('d',strtotime($string));
    $Month = date('M',strtotime($string));
    $year = date('Y',strtotime($string));
    
    $date = number($date);
    $Month = __($Month);
    $year = str_replace(",", "", number($year));
    
    return "$date $Month $year";
}


?>
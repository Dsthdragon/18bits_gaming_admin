<?php

class upload {

    /**
     * Upload: Image uploda function
     * 
     */
    function getImage($img, $type, $name) {
        $allowedExts = array("gif", "jpeg", "jpg", "png");
        $extension = end(explode(".", $img["name"]));
        $extension = strtolower($extension);
        if ((($img["type"] == "image/gif") || ($img["type"] == "image/jpeg") || ($img["type"] == "image/jpg") || ($img["type"] == "image/pjpeg") || ($img["type"] == "image/x-png") || ($img["type"] == "image/png")) && ($img["size"] < 2000000000) && in_array($extension, $allowedExts)) {
            if ($img["error"] > 0) {
                echo "Return Code: " . $img["error"] . "<br>";
            } else {

                move_uploaded_file($img["tmp_name"], "public/upload/" . $type . "/" . $name);

                return true;
            }
        } else {
            return false;
        }
    }

}

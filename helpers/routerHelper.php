<?php

class RouterHelper {
    public static function recupererPageIx($getArray) {
        $pageIx = 1;
        if (array_key_exists('pageIx', $getArray)) {
            if (is_numeric($getArray['pageIx'])) {
                $pageIx = intval($getArray['pageIx']);
                if ($pageIx <= 0) {
                    $pageIx = 1;
                }
            }
        }
        return $pageIx;
    }

    public static function recupererID($getArray) {
        $id = null;
        if (array_key_exists('id', $getArray)) {
            if (is_numeric($getArray['id'])) {
                $id = intval($getArray['id']);
            }
        }
        return $id;
    }
}
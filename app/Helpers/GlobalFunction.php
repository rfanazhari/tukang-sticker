<?php

namespace App\Helpers;

class GlobalFunction {
    public static function flash_message($type, $header, $title) {
        switch ($type) {
            case 'success':
                $message = "Berhasil ".$header. " ".$title."!";
            break;
            case 'danger':
                $message = "Gagal ".$header. " ".$title."!";
            break;
            
            default:
                $message = "Please, contact your IT !";
            break;
        }

        return $message;
    }
}
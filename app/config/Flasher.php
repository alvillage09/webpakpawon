<?php

namespace app\config;
use app\config\Session;

class Flasher {

    public static function setFlash($function, $message,$action,$type)
    {
        $session = new Session;
        $session->setValue('flash', [
            'function' => $function,
            'message' => $message,
            'action' => $action,
            'type' => $type
        ]);
    }

    public static function flash()
    {
        $session = new Session;
        if(array_key_exists('flash', $_SESSION)){
            echo '<div class="alert alert-'.$_SESSION['flash']['type'].' alert-dismissible fade show" role="alert">
                        Data '.$_SESSION['flash']['function'].' '.$_SESSION['flash']['message'].' '.$_SESSION['flash']['action'].'
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
            $session->unsetValue('flash');
        }
    }
}
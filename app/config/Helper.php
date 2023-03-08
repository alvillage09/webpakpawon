<?php

namespace app\config;
use app\config\Session;

class Helper {

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
                        '.$_SESSION['flash']['function'].' '.$_SESSION['flash']['message'].' '.$_SESSION['flash']['action'].'
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
            $session->unsetValue('flash');
        }
    }

    public function uploadImage($input)
    {
        $fileName = $_FILES[$input]['name'];
        $fileSize = $_FILES[$input]['size'];
        $error = $_FILES[$input]['error'];
        $tmpName = $_FILES[$input]['tmp_name'];

        //cek ada gambar di upload atau tidak
        if ( $error === 4) {
            $errorUpload['messege'] = 'Tidak ada gambar yang di upload';
            $errorUpload['status'] = false;

            return $errorUpload;
        }

        //cek ekstensi gambar

        $validImgExtentions = ['jpg', 'jpeg', 'png'];
        $imgExtention = explode('.',$fileName);
        $imgExtention = strtolower(end($imgExtention));
        if (!in_array($imgExtention,$validImgExtentions)) {
            $errorUpload['messege'] = 'File yang di unggah bukan gambar';
            $errorUpload['status'] = false;

            return $errorUpload;
        }

        //cek ukuran gambar

        if ($fileSize >1000000) {
            $errorUpload['messege'] = 'Besar gambar lebih dari 1mb!!!';
            $errorUpload['status'] = false;

            return $errorUpload;
        }

        $newFileName = uniqid();
        $newFileName .= '.';
        $newFileName .= $imgExtention;

        copy($fileName, BASEURL.'/img/menu/'.$newFileName);

        return $newFileName;
    }
} 
<?php
spl_autoload_register(function ($class) {
    include "../models/" . $class . ".php";
});

class MediaController
{
    public $msg = array(
        "id" => "",
        "text" => "",
    );

    protected $imageWidth;
    protected $imageHeight;

    // Bytes equivalences
    public const TB = 1099511627776;
    public const GB = 1073741824;
    public const MB = 1048576;
    public const KB = 1024;

    // Images path
    public const MEDIAPATH = "../views/web/img/media/";

    // Image functions
    public function isImageTheSupportedType($imgType)
    {
        if (($imgType == "image/jpeg" ||
            $imgType == "image/jpg"   ||
            $imgType == "image/png"   ||
            $imgType == "image/gif")) {
            return true;
        } else {
            return false;
        }
    }
    // File image format is Bytes
    public function isImageBiggerThan2MB($imageSize)
    {
        if ($imageSize > 2 * self::MB) {
            return true;
        }
        return false;
    }
    public function uploadImage($imageFile, &$imgFileName)
    {
        // We add a unique string as a prefix to the file name
        $prefix = uniqid();
        $imgFileName = $prefix . '_' . strtolower($imageFile['name']);
        move_uploaded_file($imageFile['tmp_name'], self::MEDIAPATH . $imgFileName);
    }
    // We have to provide the image name in order to get the image dimensions
    public function getImageRatio($imageName)
    {
        $this->imageWidth = $this->getImageWidth($imageName);
        $this->imageHeight = $this->getImageHeight($imageName);

        return $this->imageWidth / $this->imageHeight;
    }

    public function getImageWidth($imageName)
    {
        $imageWidth = getimagesize($imageName)[0]; // Position 0 of the array is the Width
        return $imageWidth;
    }
    public function getImageHeight($imageName)
    {
        $imageHeight = getimagesize($imageName)[1]; // Position 1 of the array is the Height
        return $imageHeight;
    }
}

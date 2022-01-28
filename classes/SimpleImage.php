<?php
class SimpleImage
{

    var $image;
    var $image_type;

    function load($filename)
    {
        $image_info = getimagesize($filename);
        $this->image_type = $image_info[2];
        if ($this->image_type == IMAGETYPE_PNG) {
            $this->image = imagecreatefrompng($filename);
        } elseif ($this->image_type == IMAGETYPE_JPEG) {
            $this->image = imagecreatefromjpeg($filename);
        }
    }
    function output($image_type = IMAGETYPE_PNG)
    {
        if ($image_type == IMAGETYPE_PNG) {
            imagepng($this->image);
        } elseif ($image_type == IMAGETYPE_JPEG) {
            imagejpeg($this->image);
        }
    }
    function getWidth()
    {
        return imagesx($this->image);
    }
    function getHeight()
    {
        return imagesy($this->image);
    }
    function scale($scale)
    {
        $width = $this->getWidth() * $scale / 100;
        $height = $this->getheight() * $scale / 100;
        $this->resize($width, $height);
    }
    function resize($width, $height)
    {
        $new_image = imagecreatetruecolor($width, $height);
        imagecopyresampled($new_image, $this->image, 0, 0, 0, 0, $width, $height, $this->getWidth(), $this->getHeight());
        $this->image = $new_image;
    }
}
/* Для изображения */
/*
header('Content-Type: image/jpeg');
$image = new SimpleImage();
$image->load('image.png');
//$image->scale(10);//вывод в процентах
$image->resize(200, 100);
$image->output();//выводим в браузер
*/

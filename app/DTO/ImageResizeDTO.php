<?php

namespace App\DTO;

class ImageResizeDTO
{
    private $width;
    private $height;
    private $path;
    private $image;
    private $filename;
    private $quality;

    public function setWidth($width)
    {
        $this->width = $width;
        return $this;
    }

    public function getWidth()
    {
        return $this->width;
    }

    public function setHeight($height)
    {
        $this->height = $height;
        return $this;
    }

    public function getHeight()
    {
        return $this->height;
    }

    public function setPath($path)
    {
        $this->path = $path;
        return $this;
    }

    public function getPath()
    {
        return $this->path;
    }

    public function setImage($image)
    {
        $this->image = $image;
        return $this;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setFilename($filename)
    {
        $this->filename = $filename;
        return $this;
    }

    public function getFilename()
    {
        return $this->filename;
    }

    public function setQuality($quality)
    {
        $this->quality = $quality;
        return $this;
    }

    public function getQuality()
    {
        return $this->quality;
    }
}

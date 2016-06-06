<?php

namespace app\DTO;

class ImageResizeDTO
{
    private $width = 0;
    private $height = 0;
    private $watermark = null;

    public function getWidth()
    {
        return $this->width;
    }

    public function setWidth($width)
    {
        $this->width = $width;
        return $this;
    }

    public function getHeight()
    {
        return $this->height;
    }

    public function setHeight($height)
    {
        $this->height = $height;
        return $this;
    }

}

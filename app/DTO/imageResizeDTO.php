<?php

namespace app\DTO;

class ImageResizeDTO
{
    private $width;
    private $height;
    private $path;
    private $image;
    private $filename;
    private $callback;
    private $folder;

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

    public function setCallback($callback)
    {
        $this->callback = $callback;
        return $this;
    }

    public function getCallback()
    {
        return $this->callback;
    }

    public function setFolder($folder)
    {
        $this->folder = $folder;
        return $this;
    }

    public function getFolder()
    {
        return $this->folder;
    }
}

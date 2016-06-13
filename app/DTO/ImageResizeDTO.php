<?php

namespace app\DTO;

class ImageResizeDTO
{

    /**
     * @var
     */
    private $width;
    /**
     * @var
     */
    private $height;
    /**
     * @var
     */
    private $path;
    /**
     * @var
     */
    private $image;
    /**
     * @var
     */
    private $filename;
    /**
     * @var
     */
    private $callback;
    /**
     * @var
     */
    private $folder;

    /**
     * @return mixed
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @param mixed $width
     * @return ImageResizeDTO
     */
    public function setWidth($width)
    {
        $this->width = $width;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @param mixed $height
     * @return ImageResizeDTO
     */
    public function setHeight($height)
    {
        $this->height = $height;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @param mixed $path
     * @return ImageResizeDTO
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     * @return ImageResizeDTO
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getFilename()
    {
        return $this->filename;
    }

    /**
     * @param mixed $filename
     * @return ImageResizeDTO
     */
    public function setFilename($filename)
    {
        $this->filename = $filename;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCallback()
    {
        return $this->callback;
    }

    /**
     * @param mixed $callback
     * @return ImageResizeDTO
     */
    public function setCallback($callback)
    {
        $this->callback = $callback;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getFolder()
    {
        return $this->folder;
    }

    /**
     * @param mixed $folder
     * @return ImageResizeDTO
     */
    public function setFolder($folder)
    {
        $this->folder = $folder;

        return $this;
    }

}

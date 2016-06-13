<?php

namespace App\Services;

use app\DTO\ImageResizeDTO;
use Intervention\Image\ImageManagerStatic as Image;

class UploadImageSaverService
{
    public static function saveImage(ImageResizeDTO $dto)
    {
        $newImage = Image::make($dto->getImage())
            ->resize($dto->getWidth(), $dto->getHeight(), function ($constraint) {
                $constraint->aspectRatio();
            })->orientate();

        $newImage->save($dto->getPath() . $dto->getFilename(), $dto->getQuality());

        return $newImage ? true : false;
    }
}

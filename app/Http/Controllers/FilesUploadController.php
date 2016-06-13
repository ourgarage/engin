<?php

namespace App\Http\Controllers;

use App\Http\Requests\FilesUploadRequest;
use Intervention\Image\ImageManagerStatic as Image;
use App\DTO\ImageResizeDTO;

class FilesUploadController extends Controller
{

    public function upload(FilesUploadRequest $request)
    {
        $dto = new ImageResizeDTO();

        $dto->setHeight(1300);
        $dto->setWidth(1300);
        $dto->setFolder('/upload/');
        $dto->setCallback($request->CKEditorFuncNum);
        $dto->setPath(public_path($dto->getFolder()));
        $dto->setImage($request->file('upload'));
        $dto->setFilename(md5(date("YmdHis") . rand(5, 50)) . '.' . $dto->getImage()->getClientOriginalExtension());

        return $this->imageResize($dto);
    }

    protected function imageResize(ImageResizeDTO $dto)
    {
        $newImage = Image::make($dto->getImage())->resize($dto->getWidth(), $dto->getHeight(), function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });

        return $this->saveImage($dto, $newImage);
    }

    protected function saveImage(ImageResizeDTO $dto, $newImage)
    {
        $newImage->save($dto->getPath() . $dto->getFilename(), 95);

        return '<script type="text/javascript">window.parent.CKEDITOR.tools.callFunction("' . $dto->getCallback() . '", "' . $dto->getFolder() . $dto->getFilename() . '")</script>';
    }

}
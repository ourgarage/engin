<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Intervention\Image\ImageManagerStatic as Image;
use App\DTO\ImageResizeDTO;
use App\Http\Requests\FilesUploadRequest;

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
/*
        $validator = Validator::make($request->all(), [
            'upload' => 'image|max:10',
        ]);

        if ($validator->fails()) {
            $messages = $validator->errors()->first();
            return "<script type=\"text/javascript\">window.parent.CKEDITOR.tools.callFunction(" . $dto->getCallback() . ",  \"" . $dto->getFolder() . $dto->getFilename() . "\", \"" . $messages . "\");</script>";
        } else {
            return $this->imageResize($dto);
        }
*/
        return $this->imageResize($dto);
    }

    public function imageResize(ImageResizeDTO $dto)
    {
        $newImage = Image::make($dto->getImage())->resize($dto->getWidth(), $dto->getHeight(), function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });

        return $this->saveImage($dto, $newImage);
    }

    public function saveImage(ImageResizeDTO $dto, $newImage)
    {
        if (!$newImage->save($dto->getPath() . $dto->getFilename(), 95)) {
            $message = trans('uploads.error');
        } else {
            $message = '';
        }

        return "<script type=\"text/javascript\">window.parent.CKEDITOR.tools.callFunction(" . $dto->getCallback() . ",  \"" . $dto->getFolder() . $dto->getFilename() . "\", \"" . $message . "\");</script>";

    }

}

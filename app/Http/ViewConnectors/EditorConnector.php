<?php

namespace App\Http\ViewConnectors;

class EditorConnector
{

    const MODE_FULL = 'full';
    const MODE_MEDIUM = 'medium';
    const MODE_LITE = 'lite';
    const IMAGE_DEFAULT = false;

    public function connect($elementID, $siteLocale, $imageUploadUrl, $mode = self::MODE_LITE, $image = self::IMAGE_DEFAULT)
    {
        $data = [
            'elementID' => $elementID,
            'siteLocale' => $siteLocale,
            'imageUploadUrl' => $imageUploadUrl,
            'mode' => $mode,
            'image' => $image
        ];

        return view('connectors.default-editor', $data)->render();
    }
}

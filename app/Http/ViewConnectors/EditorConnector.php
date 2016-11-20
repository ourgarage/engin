<?php

namespace App\Http\ViewConnectors;

class EditorConnector
{

    const MODE_FULL = 'full';
    const MODE_MEDIUM = 'medium';
    const MODE_LITE = 'lite';

    public function connect($elementID, $siteLocale, $imageUploadUrl, $mode = self::MODE_LITE)
    {
        $data = [
            'elementID' => $elementID,
            'siteLocale' => $siteLocale,
            'imageUploadUrl' => $imageUploadUrl,
            'mode' => $mode,
        ];

        return view('connectors.default-editor', $data)->render();
    }
}

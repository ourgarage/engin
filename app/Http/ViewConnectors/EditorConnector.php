<?php

namespace App\Http\ViewConnectors;

class EditorConnector
{

    const MODE_FULL = 'full';
    const MODE_MINI = 'mini';

    public function connect($elementID, $siteLocale, $imageUploadUrl, $mode)
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

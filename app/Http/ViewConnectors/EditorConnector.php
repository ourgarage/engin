<?php

namespace App\Http\ViewConnectors;

class EditorConnector
{
    public function connect($elementID, $siteLocale, $imageUploadUrl, $mode)
    {
        $data = [
            'elementID' => $elementID,
            'siteLocale' => $siteLocale,
            'imageUploadUrl' => $imageUploadUrl,
            'mode' => $mode
        ];

        return view('connectors.default-editor', $data)->render();
    }
}
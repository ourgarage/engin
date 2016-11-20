<script src="/libs/tinymce/tinymce.min.js" type="text/javascript"></script>

@if($siteLocale != 'en')
    <script src="/libs/trumbowyg/dist/langs/{{ $siteLocale }}.min.js" type="text/javascript"></script>
@endif

@if($mode == \App\Http\ViewConnectors\EditorConnector::MODE_FULL)
    <script>imageUploadUrl = "{{ $imageUploadUrl }}";</script>
    <script src="/libs/trumbowyg/dist/plugins/upload/trumbowyg.upload.js" type="text/javascript"></script>
    <script src="/libs/trumbowyg/dist/plugins/colors/trumbowyg.colors.min.js" type="text/javascript"></script>
@endif

<script src="/js/trumbowyg/attachHTMLEditor.js" type="text/javascript"></script>
<script>attachHTMLEditorColorImageUpload("{{ $elementID }}", "{{ $siteLocale }}");</script>

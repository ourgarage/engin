<script src="/libs/trumbowyg/dist/trumbowyg.min.js" type="text/javascript"></script>

@if($siteLocale != 'en')
    <script src="/libs/trumbowyg/dist/langs/{{ $siteLocale }}.min.js" type="text/javascript"></script>
@endif

@if($assembly == 'full')
    <script>imageUploadUrl = "{{ $imageUploadUrl }}";</script>
    <script src="/libs/trumbowyg/dist/plugins/upload/trumbowyg.upload.js" type="text/javascript"></script>
    <script src="/libs/trumbowyg/dist/plugins/colors/trumbowyg.colors.min.js" type="text/javascript"></script>
@endif

<script src="/js/trumbowyg/attachHTMLEditor.js" type="text/javascript"></script>
<script>attachHTMLEditorColorImageUpload("{{ $elementID }}", "{{ $siteLocale }}");</script>



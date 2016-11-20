<script src="/libs/tinymce/tinymce.min.js" type="text/javascript"></script>
<script src="/js/wysiwyg/attachTinyMCE.js" type="text/javascript"></script>

{{--@if($mode == App\Http\ViewConnectors\EditorConnector::MODE_FULL)--}}
    <script>attachTinyMCE("{{ $elementID }}", "{{ $siteLocale }}", "{{ $mode }}", "{{ $image }}");</script>
{{--@endif--}}

function attachWysiwygLite(elementID, siteLocale) {
    //
}

function attachWysiwygFull(elementID, siteLocale, mode) {
    tinymce.init({
        selector: elementID,
        language: siteLocale,
        convert_urls: false,
        fontsize_formats: "8pt 10pt 11pt 12pt 14pt 16pt 18pt 24pt 36pt"
    });

    if (mode == 'full') {
        tinymce.settings.plugins = 'code save textcolor advlist autolink link image lists charmap print preview table pagebreak spellchecker';
        tinymce.settings.toolbar = [
            'undo redo fontfamily | styleselect | alignleft aligncenter alignright | bullist numlist outdent indent | table | bold italic underline strikethrough | fontselect fontsizeselect | forecolor backcolor | subscript superscript | link image | removeformat | ',
            'code print preview save'
        ];
    }
    if (mode == 'medium') {
        tinymce.settings.plugins = 'textcolor advlist autolink link lists charmap pagebreak spellchecker';
        tinymce.settings.toolbar = ['undo redo fontfamily | styleselect | alignleft aligncenter alignright | bullist numlist outdent indent | bold italic underline strikethrough | fontselect fontsizeselect | forecolor backcolor | subscript superscript | link | removeformat'];
    }

    // tinymce.settings.language = siteLocale;
}

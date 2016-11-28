function attachTinyMCE(elementID, siteLocale, mode, image) {
    var defaultToolbar = 'undo redo | styleselect | bold italic | link | alignjustify alignleft aligncenter alignright | bullist, numlist, outdent, indent';
    var defaultPlugins = '';

    tinymce.init({
        selector: elementID,
        language: siteLocale,
        convert_urls: false,
        fontsize_formats: "8pt 10pt 11pt 12pt 14pt 16pt 18pt 24pt 36pt"
    });

    if (image) {
        defaultPlugins += ' image imagetools';
        defaultToolbar += ' image';
    }

    if (mode == 'lite') {
        tinymce.settings.plugins = defaultPlugins;
        tinymce.settings.toolbar = [defaultToolbar];
    }
    if (mode == 'medium') {
        tinymce.settings.plugins = defaultPlugins + ' textcolor advlist autolink link lists charmap pagebreak spellchecker';
        tinymce.settings.toolbar = [
            defaultToolbar +
            ' fontfamily styleselect underline strikethrough | fontselect fontsizeselect | forecolor backcolor | subscript superscript | link | removeformat'];
    }
    if (mode == 'full') {
        tinymce.settings.plugins = defaultPlugins + ' code save textcolor advlist autolink link lists charmap print preview table pagebreak spellchecker';
        tinymce.settings.toolbar = [
            defaultToolbar + ' fontfamily styleselect table | underline strikethrough | fontselect fontsizeselect | forecolor backcolor | subscript superscript | link | removeformat | code print preview save'
        ];
    }
}

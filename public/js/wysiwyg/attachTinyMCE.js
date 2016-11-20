function attachWysiwygLite(elementID, siteLocale) {
    tinymce.init({
        selector: elementID,
        language: siteLocale
    });
}

function attachWysiwygFull(elementID, siteLocale) {
    siteLocale = 'ru';

    tinymce.init({
        selector: elementID
    });

    tinymce.settings.language = siteLocale;
}

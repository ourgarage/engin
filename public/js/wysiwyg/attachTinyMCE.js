function attachWysiwygLite(elementID, siteLocale) {
    tinymce.init({
        selector: elementID,
        language: siteLocale
    });
}

function attachWysiwygFull(elementID, siteLocale) {
    tinymce.init({
        selector: elementID,
        language: siteLocale
    });
}

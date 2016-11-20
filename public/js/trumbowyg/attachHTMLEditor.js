function attachHTMLEditorSimple(elementID, siteLocale, routeURL) {
    tinymce.init({
        selector: elementID
    });
  /*  $(elementID).trumbowyg({
        autogrow: true,
        lang: typeof siteLocale != 'undefined' ? siteLocale : 'en'
    });*/
}

function attachHTMLEditorColorImageUpload(elementID, siteLocale) {
    tinymce.init({
        selector: elementID,
        language: siteLocale
    });
    // $(elementID).trumbowyg({
    //     autogrow: true,
    //     lang: typeof siteLocale != 'undefined' ? siteLocale : 'en',
    //     btnsDef: {
    //         align: {
    //             dropdown: ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
    //             ico: 'justifyLeft'
    //         },
    //         image: {
    //             dropdown: ['insertImage', 'upload'],
    //             ico: 'insertImage'
    //         }
    //     },
    //     btns: [
    //         ['viewHTML'],
    //         ['undo', 'redo'],
    //         ['formatting'],
    //         'btnGrp-semantic',
    //         ['superscript', 'subscript'],
    //         ['link'],
    //         ['image'],
    //         'btnGrp-justify',
    //         'btnGrp-lists',
    //         ['foreColor', 'backColor'],
    //         ['horizontalRule'],
    //         ['removeformat'],
    //         ['fullscreen']
    //     ]
    // });
}

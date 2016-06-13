$('#trumbowygEditor').trumbowyg({
    autogrow: true,
    lang: typeof siteLocale != 'undefined' ? siteLocale : 'en',
    btnsDef: {
        align: {
            dropdown: ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
            ico: 'justifyLeft'
        },
        image: {
            dropdown: ['insertImage', 'upload'],
            ico: 'insertImage'
        }
    },
    btns: [
        ['viewHTML'],
        ['undo', 'redo'],
        ['formatting'],
        'btnGrp-semantic',
        ['superscript', 'subscript'],
        ['link'],
        ['image'],
        'btnGrp-justify',
        'btnGrp-lists',
        ['foreColor', 'backColor'],
        ['horizontalRule'],
        ['removeformat'],
        ['fullscreen']
    ]
});

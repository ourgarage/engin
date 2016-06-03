$('#content').trumbowyg({

    btnsDef: {
        // Customizables dropdowns
        image: {
            dropdown: ['insertImage', 'upload', 'base64'],
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
        ['horizontalRule'],
        ['removeformat'],
        ['fullscreen']
    ]
});
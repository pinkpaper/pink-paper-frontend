CKEDITOR.editorConfig = function(config) {
    config.toolbarGroups = [
        { name: 'basicstyles', groups: ['basicstyles', 'cleanup'] },
        { name: 'colors', groups: ['colors'] },
        { name: 'styles', groups: ['styles'] },
        { name: 'editing', groups: ['find', 'selection', 'spellchecker', 'editing'] },
        '/',
        { name: 'paragraph', groups: ['align', 'indent', 'blocks', 'list', 'bidi', 'paragraph'] },
        { name: 'clipboard', groups: ['clipboard', 'undo'] },
        { name: 'links', groups: ['links'] },
        { name: 'insert', groups: ['insert'] },
        { name: 'forms', groups: ['forms'] },
        { name: 'tools', groups: ['tools'] },
        { name: 'document', groups: ['mode', 'document', 'doctools'] },
        { name: 'others', groups: ['others'] },
        { name: 'about', groups: ['about'] }
    ];

    config.removeButtons = 'Underline,Subscript,Superscript,Anchor,Maximize,RemoveFormat,Indent,Outdent';
    config.extraPlugins = 'simplebutton,youtube';
    //config.extraPlugins = 'youtube';

};
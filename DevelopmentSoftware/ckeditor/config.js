CKEDITOR.editorConfig = function( config ) {
 config.language = 'ru';
 config.extraPlugins = 'wenzgmap';
config.toolbar = [
	{ name: 'document', groups: [ 'mode', 'document', 'doctools' ], items: [ 'Source', 'autoFormat', 'CommentSelectedRange', 'UncommentSelectedRange', 'AutoComplete', '-', /*'Save', 'NewPage', 'Preview',*/ 'Print'/*, '-', 'Templates' */] },
	{ name: 'clipboard', groups: [ 'clipboard', 'undo' ], items: [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ] },
	{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker' ], items: [ 'Find', 'Replace', '-', 'SelectAll'/*, '-', 'Scayt' */] },
	/*{ name: 'forms', items: [ 'Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField' ] },*/
	'/',
	{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'RemoveFormat','-','Bold', 'Italic', 'TransformTextSwitcher', 'TransformTextToLowercase', 'TransformTextToUppercase', 'TransformTextCapitalize',/*'Underline', 'Strike', */'Subscript', 'Superscript'] },
	{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align'/*, 'bidi'*/ ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv'/*, '-', 'BidiLtr', 'BidiRtl', 'Language'*/ ] },
	{ name: 'alignment', groups:[ 'align'], items: [ 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'] },
	{ name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] },
	{ name: 'insert', items: [ 'Image','oembed','Mathjax',/*   'Flash', */'Table', /*'HorizontalRule', 'Smiley',*/ 'SpecialChar', /*'PageBreak',*/ 'Iframe', /*'Syntaxhighlight',*/ 'Googledocs','-', 'qrc',  'gg','wenzgmap' ] },
	'/',
	{ name: 'styles', items: [ /*'Styles',*/ 'Format', /*'Font', */'FontSize' ] },
	{ name: 'colors', items: [ 'TextColor'/*, 'BGColor'*/ ] },
	{ name: 'tools', items: [ 'Zoom',/*'UIColor', */'Maximize', 'ShowBlocks' ] },
	/*{ name: 'about', items: [ 'About' ] }*/
];

// Toolbar groups configuration.
config.toolbarGroups = [
	{ name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
	{ name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
	{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker' ] },
	/*{ name: 'forms' },*/
	'/',
	{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
	{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks'/*, 'bidi'*/ ] },
	{ name: 'alignment', groups:[ 'align']},
	{ name: 'links' },
	{ name: 'insert' },
	'/',
	{ name: 'styles' },
	{ name: 'colors' },
	{ name: 'tools' },
	/*{ name: 'about' }*/
];
};

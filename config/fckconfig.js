/*
 * This file overwrites the default config from FCKeditor.
 */

FCKConfig.ToolbarSets["NOCC"] = [
	['Source','Preview'],
	['Cut','Copy','Paste','PasteText','PasteWord'],
	['Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'],
	['Form','Checkbox','Radio','TextField','Textarea','Select','Button','ImageButton','HiddenField'],
	'/',
	['Bold','Italic','Underline','StrikeThrough','-','Subscript','Superscript'],
	['OrderedList','UnorderedList','-','Outdent','Indent','Blockquote','CreateDiv'],
	['JustifyLeft','JustifyCenter','JustifyRight','JustifyFull'],
	['Link','Unlink','Anchor'],
	['Table','Rule','SpecialChar','PageBreak'],
	'/',
	['Style','FontFormat','FontName','FontSize'],
	['TextColor','BGColor'],
	['FitWindow','ShowBlocks','-','About']		// No comma for the last row.
] ;

FCKConfig.LinkBrowser = false ;

FCKConfig.ImageBrowser = false ;

FCKConfig.FlashBrowser = false ;

FCKConfig.LinkUpload = false ;

FCKConfig.ImageUpload = false ;

FCKConfig.FlashUpload = false ;

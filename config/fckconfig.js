/*
 * This file overwrites the default config from FCKeditor.
 */

FCKConfig.ToolbarSets["NOCC"] = [
	['FontName','FontSize'],
	['TextColor','BGColor'],
	['Cut','Copy','Paste'],
	['Undo','Redo'],
	['Source'],
	'/',
	['Bold','Italic','Underline','StrikeThrough','-','Subscript','Superscript','-','RemoveFormat'],
	['OrderedList','UnorderedList','-','Outdent','Indent'],
	['JustifyLeft','JustifyCenter','JustifyRight','JustifyFull'],
	['Link','Unlink','-','Rule','-','SpecialChar'],
	['About']		// No comma for the last row.
] ;

FCKConfig.LinkDlgHideTarget		= true ;
FCKConfig.LinkDlgHideAdvanced	= true ;

FCKConfig.LinkBrowser = false ;

FCKConfig.ImageBrowser = false ;

FCKConfig.FlashBrowser = false ;

FCKConfig.LinkUpload = false ;

FCKConfig.ImageUpload = false ;

FCKConfig.FlashUpload = false ;

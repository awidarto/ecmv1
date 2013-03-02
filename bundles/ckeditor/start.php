<?php

/**
 * CKEditor for generating TinyMCE rich text editors.
 *
 * @package     Bundles
 * @subpackage  CKEditor
 * @author      Vilhjalmur Magnusson - Follow @villimagg
 *
 * @see http://ckeditor.com/
 */

Autoloader::map(array(
	'CKEditor\\CKEditor'               => __DIR__.'/ckeditor_php5.php',
));

Asset::container('ckeditor')->bundle('ckeditor');

Asset::container('ckeditor')->add('ckeditor',  'ckeditor/ckeditor.js');

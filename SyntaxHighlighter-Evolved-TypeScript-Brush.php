<?php
/*
Plugin Name: SyntaxHighlighter Evolved: TypeScript Brush
Description: Adds support for the TypeScript language to the SyntaxHighlighter Evolved plugin.
Author: Ian Obermiller
Version: 1.0.0
Author URI: http://ianobermiller.com/license
License: MIT
*/

// http://www.viper007bond.com/wordpress-plugins/syntaxhighlighter/adding-a-new-brush-language/

// SyntaxHighlighter Evolved doesn't do anything until early in the "init" hook, so best to wait until after that
add_action('init', 'syntaxhighlighter_typescript_regscript');
 
// Tell SyntaxHighlighter Evolved about this new language/brush
add_filter('syntaxhighlighter_brushes', 'syntaxhighlighter_typescript_addlang');
 
// Register the brush file with WordPress
function syntaxhighlighter_typescript_regscript() {
    wp_register_script(
        'syntaxhighlighter-brush-typescript',
        plugins_url( 'shBrushTypeScript.js', __FILE__),
        array('syntaxhighlighter-core'),
        '1.0.0' // Update version when changing JS file to break browser caches
    );
}
 
// Filter SyntaxHighlighter Evolved's language array
function syntaxhighlighter_typescript_addlang($brushes) {
    $brushes['ts'] = 'typescript';
    $brushes['typescript'] = 'typescript';
 
    return $brushes;
}
 
?>
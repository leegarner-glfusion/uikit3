<?php
/**
 * Theme functions for the UIKit v3 base theme.
 * @package     glFusion CMS
 * @license     GNU General Public License version 2 or later
 *              http://www.opensource.org/licenses/gpl-license.php
 */

// this file can't be used on its own
if (!defined ('GVERSION')) {
    die ('This file can not be used on its own!');
}

$themeAPI = 3;
$_SYSTEM['framework'] = 'uikit3';
$_SYSTEM['base_theme'] = '';
$_SYSTEM['disable_mootools'] = true;
$_IMAGE_TYPE = 'png';
$_SYSTEM['disable_jquery_menu'] = true;     // not needed for this theme
$_SYSTEM['disable_jquery_slimbox'] = true;  // use uikit

// multiple language support
/*
$lang = COM_getLanguageId();
if (empty($lang)) {
    $result = DB_query("SELECT onleft,name FROM {$_TABLES['blocks']} WHERE is_enabled = 1");
} else {
    $result = DB_query("SELECT onleft,name FROM {$_TABLES['blocks']}");
}
$nrows = DB_numRows($result);
for ($i = 0; $i < $nrows; $i++) {
    $A = DB_fetchArray($result);
        if ($A['onleft'] == 1) {
            $_BLOCK_TEMPLATE[$A['name']] = 'blockheader-left.thtml,blockfooter-left.thtml';
        } else {
            $_BLOCK_TEMPLATE[$A['name']] = 'blockheader-right.thtml,blockfooter-right.thtml';
    }
}
*/

// custom block templates
$_BLOCK_TEMPLATE['_admin_block'] = 'blockheader-admin.thtml,blockfooter-admin.thtml';
$_BLOCK_TEMPLATE['whats_related_block'] = 'blockheader-related.thtml,blockfooter-related.thtml';
$_BLOCK_TEMPLATE['story_options_block'] = 'blockheader-related.thtml,blockfooter-related.thtml';
$_BLOCK_TEMPLATE['configmanager_block'] = 'blockheader-admcfg.thtml,blockfooter-admcfg.thtml';
$_BLOCK_TEMPLATE['configmanager_subblock'] = 'blockheader-admcfg.thtml,blockfooter-admcfg.thtml';
$_BLOCK_TEMPLATE['section_block'] = 'blockheader-list.thtml,blockfooter-list.thtml';
$_BLOCK_TEMPLATE['topicoption'] = 'topicoption.thtml,topicoption.thtml';
$_BLOCK_TEMPLATE['_submit_story'] = 'blockheader-submitstory.thtml,blockfooter-submitstory.thtml';
$_BLOCK_TEMPLATE['rss_feeds'] = 'blockheader-rss.thtml,blockfooter-right.thtml';

/**
 * Full_content - no left / right
 * left_content  - left nav ONLY no RIGHT nav
 * left_content_right - both navs
 * content_right - right nav ONLY
 */
$uiStyles = array(
    'full_content' => array(
        'left_class' => '',
        'content_class' => 'uk-width-4-4@m',
        'right_class' => '',
    ),
    'left_content' => array(
        'left_class' => 'uk-width-1-4@m uk-width-1-5@l',
        'content_class' => 'uk-width-3-4@m uk-width4-5@l',
        'right_class' => '',
    ),
    'left_content_right' => array(
        'left_class' => 'uk-width-1-4@m uk-width-1-5@l',
        'content_class' => 'uk-width-3-4@m uk-width4-5@l',
        'right_class' => '',
    ),
    'content_right' => array(
        'left_class' => '',
        'content_class' => 'uk-width-4-4@m',
        'right_class'  => '',
    ),
);

$LANG_BLOCKS = array(
    'left_title'    => $LANG01['blocks_right_title'], // 'Left Side',
    'right_title'   => $LANG01['blocks_footer_title'], // 'Right Side',
    'location_left' => '',
    'location_right' => '',
    'location_footer' => '',
    'location_other' => '',     // could be static page, or used somewhere else...
);

define('BLOCK_LOCATION_NAV',    0);  // left side
define('BLOCK_LOCATION_EXTRA',  1);  // right side
define('BLOCK_LOCATION_FOOTER', 2);  // footer
define('BLOCK_LOCATION_OTHER',  3);  // other

$blockInterface = array(
    'left'  => array(                        // BLOCK_LOCATION_NAV
        'enabled'   => true,
        'location'  => 'right',      // left, right, footer, other
        'title'     => $LANG01['blocks_right_title']
    ),
    'right' => array(                       // BLOCK_LOCATION_EXTRA
        'enabled'   => true,
        'location'  => 'footer',     // left, right, footer, other
        'title'     => $LANG01['blocks_footer_title']
    ),
);

// define the JS we need for this theme..
$outputHandle = outputHandler::getInstance();

// if the theme needs jquery-ui - uncomment
// also see jquery-ui styles below..
$outputHandle->addScriptFile($_CONF['path_html'].'javascript/jquery/jquery-ui.min.js');
$outputHandle->addScriptFile($_CONF['path_html'].'javascript/ps.js');
$outputHandle->addScriptFile($_CONF['path_layout'].'js/jquery.smartmenus.min.js');
$outputHandle->addScriptFile($_CONF['path_layout'].'js/glfusion.js');

// Load our CSS specific to this theme
$outputHandle->addCSSFile($_CONF['path_layout'].'css/uikit.css',HEADER_PRIO_VERYHIGH);
$outputHandle->addCSSFile($_CONF['path_layout'].'css/uk2-compat.css',HEADER_PRIO_VERYHIGH);
$outputHandle->addCSSFile($_CONF['path_layout'].'css/uk2-icon.css',HEADER_PRIO_VERYHIGH);
$outputHandle->addCSSFile($_CONF['path_layout'].'css/uk2-width.css',HEADER_PRIO_VERYHIGH);

// Load our JS specific to this theme
//$outputHandle->addScriptFile($_CONF['path_layout'].'js/uikit.min.js');
$outputHandle->addScriptFile($_CONF['path_layout'].'js/uikit.js');
$outputHandle->addScriptFile($_CONF['path_layout'].'js/uikit-icons.min.js');

// Media Player
$outputHandle->addScriptFile($_CONF['path_html'].'javascript/addons/mediaplayer/mediaelement-and-player.min.js');
$outputHandle->addCSSFile($_CONF['path_html'] .'javascript/addons/mediaplayer/mediaelementplayer.css');

// must load the jquery ui library we want to use if using jquery ui.
$outputHandle->addLinkStyle($_CONF['layout_url'].'/css/jquery-ui/jquery-ui.min.css');

//  Custom CSS, loaded last
if ( file_exists($_CONF['path_layout'] .'custom.css') ) {
    $outputHandle->addCSSFile($_CONF['path_layout'].'custom.css', HEADER_PRIO_VERYLOW);
}


/**
 * return the class to use for tooltips
 */
function theme_getToolTipStyle()
{
    return('tooltip');
}

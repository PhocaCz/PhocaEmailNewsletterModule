<?php // no direct access
/* @package Joomla
 * @copyright Copyright (C) Open Source Matters. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
 * @extension Phoca Extension
 * @copyright Copyright (C) Jan Pavelka www.phoca.cz
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
 */
defined('_JEXEC') or die('Restricted access');

$layout 	= new JLayoutFile('newsletter_form', null, array('component' => 'com_phocaemail'));

echo '<div class="pc-email-newsletter-mod">';

	if ($description != '') {
		echo '<div class="pretext"><p>'.$description.'</p></div>';
	}
	
	if ($display_form_link == 2) {
		
		// LINK
		echo '<div class=""><a href="'.JRoute::_($link).'">'.strip_tags($link_text).'</a></div>';
	} else if ($display_form_link == 3) {
		
		// BUTTON
		echo '<div class=""><a class="button btn btn-primary ph-email-mod-btn" href="'.JRoute::_($link).'">'.strip_tags($link_text).'</a></div>';
		
	} else {
			
		$d						= array();
		$d['params']			= $paramsC;
		$d['mailing_list']		= $lists;
		$d['link_subscribe']	= $linkSubscribe;
		$d['extension-type']	= 'mod';
		echo $layout->render($d);
		
	}

echo '</div>';
echo '<div style="clear:both"></div>';


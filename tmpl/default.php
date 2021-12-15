<?php // no direct access
/* @package Joomla
 * @copyright Copyright (C) Open Source Matters. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
 * @extension Phoca Extension
 * @copyright Copyright (C) Jan Pavelka www.phoca.cz
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
 */
defined('_JEXEC') or die('Restricted access');

use Joomla\CMS\Factory;
use Joomla\CMS\Layout\FileLayout;
use Joomla\CMS\Router\Route;
use Joomla\CMS\Language\Text;
use Joomla\CMS\HTML\HTMLHelper;

$layout 	= new FileLayout('newsletter_form', null, array('component' => 'com_phocaemail'));

echo '<div class="pc-email-newsletter-mod '.$moduleclass_sfx .'">';

	if ($description != '') {
		echo '<div class="pretext"><p>'.$description.'</p></div>';
	}

	if ($display_form_link == 2) {

		// LINK
		echo '<div class=""><a href="'.JRoute::_($link).'">'.strip_tags($link_text).'</a></div>';
	} else if ($display_form_link == 3) {

		// BUTTON
		echo '<div class=""><a class="button btn btn-primary ph-email-mod-btn" href="'.Route::_($link).'">'.strip_tags($link_text).'</a></div>';

	} else if ($display_form_link == 4) {

        $required 	= 'aria-required="true" required';
        $requiredS	= '<span class="star">&nbsp;*</span>';
        $requiredC	= 'required';
        echo '<form action="'.Route::_($link).'" method="post" id="ph-subscribe-form-mod" class="form-inline '.$moduleclass_sfx .'">';
        echo '<div id="ph-form-subscribe-email" class="input-group">';
        //echo '<span class="input-group-text" title="'. Text::_('COM_PHOCAEMAIL_NEWSLETTER_EMAIL').'">';
        //echo '<span class="icon-mail hasTooltip"></span>';
        //echo '</span>';
        echo '<input id="ph-mod-email" type="email" name="email" class="form-control '.$requiredC.'" tabindex="0" size="18" placeholder="'. Text::_('COM_PHOCAEMAIL_NEWSLETTER_EMAIL') .'" value="" '.$required.' />';
        echo '<button id="ph-mod-btn" type="submit" tabindex="0" name="submit" class="btn btn-primary">'. Text::_('COM_PHOCAEMAIL_NEWSLETTER_SUBSCRIBE') .'</button>';
        echo '<input type="hidden" name="option" value="com_phocaemail" />';
        echo '<input type="hidden" name="view" value="newsletter" />';
        echo  HTMLHelper::_('form.token');
        echo '</div>';
        echo '</form>';

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


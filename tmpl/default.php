<?php // no direct access
/* @package Joomla
 * @copyright Copyright (C) Open Source Matters. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
 * @extension Phoca Extension
 * @copyright Copyright (C) Jan Pavelka www.phoca.cz
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
 */
defined('_JEXEC') or die('Restricted access');


echo '<div class="pc-email-newsletter-mod">';

echo '<form action="'.JRoute::_($link).'" method="post" id="ph-subscribe-form" class="form-inline">';
if ($description != '') {
	echo '<div class="pretext"><p>'.$description.'</p></div>';
}
echo '<div class="userdata">';

echo '<div id="ph-form-subscribe-name" class="control-group">';
echo '<div class="controls">';
echo '<div class="input-prepend">';
echo '<span class="add-on">';
echo '<span class="glyphicon glyphicon-user icon-user hasTooltip" title="'. JText::_('MOD_PHOCAEMAIL_NEWSLETTER_NAME').'"></span>';
echo '<label for="ph-mod-name" class="element-invisible">'. JText::_('MOD_PHOCAEMAIL_NEWSLETTER_NAME') .'</label>';
echo '</span>';
echo '<input id="ph-mod-name" type="text" name="name" class="input-small" tabindex="0" size="18" placeholder="'. JText::_('MOD_PHOCAEMAIL_NEWSLETTER_NAME') .'" aria-required="true" class="required" required />';
echo '</div>';
echo '</div>';
echo '</div>';


echo '<div id="ph-form-subscribe-email" class="control-group">';
echo '<div class="controls">';
echo '<div class="input-prepend">';
echo '<span class="add-on">';
echo '<span class="glyphicon glyphicon-envelope icon-mail hasTooltip" title="'. JText::_('MOD_PHOCAEMAIL_NEWSLETTER_EMAIL').'"></span>';
echo '<label for="ph-mod-email" class="element-invisible">'.  JText::_('MOD_PHOCAEMAIL_NEWSLETTER_EMAIL').'</label>';
echo '</span>';
echo '<input id="ph-mod-email" type="email" name="email" class="input-small required" tabindex="0" size="18" placeholder="'. JText::_('MOD_PHOCAEMAIL_NEWSLETTER_EMAIL') .'" aria-required="true"  required />';
echo '</div>';
echo '</div>';
echo '</div>';

if (!empty($lists)) {
	echo '<div id="ph-form-subscribe-mailinglist" class="control-group">';
	echo '<div class="controls" style="margin:10px;">';
	
	foreach($lists as $k => $v) {
		echo '<div class="checkbox">';
		echo '<label>';
		echo '<input type="checkbox" name="mailinglist[]" value="'.(int)$v->value.'"> '.$v->text;
		echo '</label>';
		echo '</div>';
		echo '<div style="clear:both"></div>';
	}
	echo '</div></div>';
}

echo '<div id="ph-form-subscribe-submit" class="control-group">';
echo '<div class="controls">';
echo '<button type="submit" tabindex="0" name="submit" class="btn btn-primary">'. JText::_('MOD_PHOCAEMAIL_NEWSLETTER_SUBSCRIBE') .'</button>';
echo '</div>';
echo '</div>';

echo '</div>';


echo '<input type="hidden" name="option" value="com_phocaemail" />';
echo '<input type="hidden" name="view" value="newsletter" />';
echo '<input type="hidden" name="task" value="subscribe" />';
echo  JHtml::_('form.token');

echo '</form>';

?>

</div>
<div style="clear:both"></div>


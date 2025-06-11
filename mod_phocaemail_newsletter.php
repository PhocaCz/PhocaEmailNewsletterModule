<?php
/* @package Joomla
 * @copyright Copyright (C) Open Source Matters. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
 * @extension Phoca Extension
 * @copyright Copyright (C) Jan Pavelka www.phoca.cz
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
 */

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Component\ComponentHelper;
use Joomla\CMS\Helper\ModuleHelper;
use Joomla\CMS\Factory;
use Joomla\CMS\Language\Text;
use Phoca\Component\Phocaemail\Site\Helper\RouteHelper;

defined('_JEXEC') or die('Restricted access');// no direct access

if (!ComponentHelper::isEnabled('com_phocaemail', true)) {

	throw new Exception('Error - Phoca Email component needs to be installed', 500);
	return false;
}


$lang = Factory::getLanguage();
//$lang->load('com_phocaemail.sys');
$lang->load('com_phocaemail');
HTMLHelper::stylesheet('media/com_phocaemail/css/main.css' );
//require_once( JPATH_ADMINISTRATOR.'/components/com_phocaemail/helpers/phocaemailutils.php');
//require_once( JPATH_ADMINISTRATOR.'/components/com_phocaemail/helpers/phocaemaillists.php');
//require_once( JPATH_SITE.'/components/com_phocaemail/helpers/routerrules.php');
//require_once( JPATH_SITE.'/components/com_phocaemail/helpers/route.php');



$user 		= Factory::getUser();
$db 		= Factory::getDBO();
$app 		= Factory::getApplication('site');
$menu  		= $app->getMenu();
$document	= Factory::getDocument();

// PARAMS
$paramsC 				= ComponentHelper::getParams('com_phocaemail') ;

$description 			= $params->get( 'description', '' );
$display_mailing_list 	= $paramsC->get( 'display_mailing_list', 0 );
$display_form_link		= $params->get( 'display_form_link', 1);
$link_text				= $params->get( 'link_text', '');

$moduleclass_sfx 		= htmlspecialchars((string)$params->get('moduleclass_sfx'), ENT_COMPAT, 'UTF-8');

if ($link_text == '') {
	$link_text = 'MOD_PHOCAEMAIL_NEWSLETTER_SUBSCRIBE_TO_OUR_NEWSLETTER';
}
$link_text = Text::_($link_text);// Translate even the string set by parameters

$link = RouteHelper::getNewsletterRoute(0);
$linkSubscribe = RouteHelper::getNewsletterRoute(0, 'subscribe');
//echo JRoute::_($link);
//$output = '<a href="'.JRoute::_($link).'">Unsubscribe</a>';
$lists = array();
if ($display_mailing_list == 1) {
	if ($display_mailing_list == 1) {
	//$lists = PhocaEmailListsHelper::options();
	$order 	= 'ordering ASC';
	$db 	= Factory::getDBO();
	$query 	= 'SELECT a.id AS value, a.title AS text'
			.' FROM #__phocaemail_lists AS a'
			.' WHERE a.published = 1'
			.' ORDER BY '. $order;
	$db->setQuery($query);
	$lists = $db->loadObjectList();
}
}


require(ModuleHelper::getLayoutPath('mod_phocaemail_newsletter'));
?>

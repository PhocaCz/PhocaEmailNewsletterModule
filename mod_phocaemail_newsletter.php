<?php
/* @package Joomla
 * @copyright Copyright (C) Open Source Matters. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
 * @extension Phoca Extension
 * @copyright Copyright (C) Jan Pavelka www.phoca.cz
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
 */
defined('_JEXEC') or die('Restricted access');// no direct access
if(!defined('DS')) define('DS', DIRECTORY_SEPARATOR);
require_once( JPATH_SITE.'/components/com_phocaemail/helpers/route.php');

$user 		= JFactory::getUser();
$db 		= JFactory::getDBO();
$app 		= JFactory::getApplication('site');
$menu  		= $app->getMenu();
$document	= JFactory::getDocument();
		
// PARAMS
$description 			= $params->get( 'description', '' );
$display_mailing_list 	= $params->get( 'display_mailing_list', '' );

$link = PhocaEmailHelperRoute::getNewsletterRoute(0, 'subscribe');
//echo JRoute::_($link);
//$output = '<a href="'.JRoute::_($link).'">Unsubscribe</a>';
$lists = array();
if ($display_mailing_list == 1) {

	$order 	= 'ordering ASC';
	$db 	= JFactory::getDBO();
	$query 	= 'SELECT a.id AS value, a.title AS text'
			.' FROM #__phocaemail_lists AS a'
			.' WHERE a.published = 1'
			. ' ORDER BY '. $order;
	$db->setQuery($query);
	$lists = $db->loadObjectList();
}


require(JModuleHelper::getLayoutPath('mod_phocaemail_newsletter'));
?>
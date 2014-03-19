<?php

defined('_JEXEC') or die;

jimport('joomla.application.component.helper');

class MsgsHelper extends JHelperContent
{
	
	// non utilisé pour l'instant (servirait si on gérait les droits : cf access.xml...)
// 	const OPTION = "com_msgs";
	
// 	public static function getActions($view)
// 	{
// 		$user = JFactory::getUser();
// 		$result = new JObject;
// 		$assetName = 'com_msgs';
	
// 		$actions = array('core.admin', 'core.manage', 'core.create', 'core.edit', 'core.edit.state', 'core.delete');
	
// 		foreach ($actions as $action)
// 		{
// 			$result->set($action, $user->authorise($action, $assetName));
// 		}
	
// 		return $result;
// 	}
	
}

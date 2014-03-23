<?php

defined('_JEXEC') or die;

jimport('joomla.application.component.helper');

class MsgsHelper extends JHelperContent
{
	const OPTION = "com_msgs";
	
	// (servirait si on gérait les droits : cf access.xml...)
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
	
	/** Méthode créant le menu du composant. */
	public static function createMenu()
	{
		$menu = array(
				array("title" => JText::_('COM_MSGS_SECTION_1'),
						array(JText::_('COM_MSGS_MESSAGERIE'),
								'index.php?option=com_msgs&view=messagerie',
								'messagerie',
								'icon-envelope')),
					
				array("title" => JText::_('COM_MSGS_SECTION_2'),
						array(JText::_('COM_MSGS_NOUVEAU_MSG'),
								'index.php?option=com_msgs&view=message&layout=edit',
								'message',
								'icon-pencil-2'))
		);
	
		return $menu;
	}
	
	/** Méthode affichant le menu du composant. */
	public static function showMenu($vName)
	{
		$menu = self::createMenu();
		$result = "";
	
		foreach ($menu as $sub_menu)
		{
			$result .= '<h2 class="nav-header">'.$sub_menu["title"].'</h2>';
			array_shift($sub_menu);
				
			$result .= '<ul class="j-links-group nav nav-list">';
				
			foreach ($sub_menu as $menu_item)
			{
				$name = $menu_item[0];
				$link = $menu_item[1];
				$active = $menu_item[2];
				$icon = $menu_item[3];
					
				$result .= '<li '.($active === $vName ? 'class="active"' : null ).'>';
				$result .= '<a href="'.$link.'"><i class="'.$icon.'"></i> <span class="j-links-link">'.$name.'</span></a>';
				$result .= '</li>';
			}
				
			$result .= '</ul>';
		}
	
		return $result;
	}
}

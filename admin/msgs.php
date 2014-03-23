<?php
defined('_JEXEC') or die;

// Vérifie l'accès au composant
if (!JFactory::getUser()->authorise('core.manage', 'com_msgs'))
{
	return JError::raiseWarning(404, JText::_('JERROR_ALERTNOAUTHOR'));
}

$task = JFactory::getApplication()->input->get('task');

$controller	= JControllerLegacy::getInstance('Msgs');
$controller->execute(JFactory::getApplication()->input->get('task'));
$controller->redirect();
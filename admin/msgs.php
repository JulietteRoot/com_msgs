<?php
defined('_JEXEC') or die;

// Importation des librairies et des helpers.
require_once JPATH_ADMINISTRATOR.DIRECTORY_SEPARATOR."components".DIRECTORY_SEPARATOR."com_msgs".DIRECTORY_SEPARATOR."helpers".DIRECTORY_SEPARATOR."msgs.php";

$task = JFactory::getApplication()->input->get('task');

$controller	= JControllerLegacy::getInstance('Msgs');
$controller->execute(JFactory::getApplication()->input->get('task'));
$controller->redirect();
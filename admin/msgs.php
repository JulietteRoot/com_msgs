<?php
defined('_JEXEC') or die;

$task = JFactory::getApplication()->input->get('task');

$controller	= JControllerLegacy::getInstance('Msgs');
$controller->execute(JFactory::getApplication()->input->get('task'));
$controller->redirect();
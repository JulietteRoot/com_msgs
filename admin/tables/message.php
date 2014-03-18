<?php
/**
 * @package		Joomla.Administrator
 * @subpackage	com_comptaetats

 * @copyright	2014 - Easy CE
 * @author		DeltaCE
*/

// Accés direct refusé.
defined('_JEXEC') or die;

// Importation de la classe ControllerAdmin
jimport('joomla.application.component.controlleradmin');

/** Déclaration du contrôleur Exercice. */
class MsgsTableMessage extends JTable
{
	/** Constructeur. */
	public function __construct(&$_db)
	{
		parent::__construct('#__msgs_messagerie', 'id', $_db);
	}
       	
	/** Enregistre une entrée en base. */
	public function store($updateNulls = false)
	{
		$date = JFactory::getDate();
		$user = JFactory::getUser();
		
		$this->created = $date->toSql();
		$this->created_by = $user->get('id');
				
		return parent::store($updateNulls);
	}
}
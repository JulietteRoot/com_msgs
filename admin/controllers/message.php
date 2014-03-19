<?php
/**
 * @package		Joomla.Administrator
 * @subpackage	com_comptaconfig

 * @copyright	2013 - Easy CE
 * @author		DeltaCE
 */

// Accès direct refusé.
defined('_JEXEC') or die;

/** Déclaration du contrôleur Fournisseur. */
class MsgsControllerMessage extends JControllerForm
{
	protected $text_prefix = 'COM_MSGS';

	/** Constructeur. */
	public function __construct($config = array())
	{
		$this->view_list = 'messagerie'; // nom de la vue vers laquelle retourner !! (par défaut serait "messages")
		parent::__construct($config);
	}
	
// 	public function save()
// 	{
// 		return parent::save();
// 		//$this->setRedirect(html_entity_decode(JRoute::_('index.php?option=com_msgs&view=messagerie')));
// 	}
}
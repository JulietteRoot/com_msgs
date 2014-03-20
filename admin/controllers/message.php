<?php

// Accès direct refusé.
defined('_JEXEC') or die;

/** Déclaration du contrôleur Fournisseur. */
class MsgsControllerMessage extends JControllerForm  // singulier -> form
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
// 		//$this->setRedirect(html_entity_decode(JRoute::_('index.php?option=com_msgs&view=messagerie')));
// 		//return parent::save();
// 	}
}
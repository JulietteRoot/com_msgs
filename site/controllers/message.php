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
		// retourne par défaut vers la vue "messages")
		parent::__construct($config);
	}
	
// 	public function test(){
// 		echo "test";
// 		return;
// 	}
	
	public function save($key = null, $urlVar = 'id')
	{
		$result = parent::save($key, $urlVar);
		if ($result)
		{
			$this->setRedirect(html_entity_decode(JRoute::_('index.php?option=com_msgs&view=messages')));
		}
		return $result;
	}
	
// 	public function cancel()
// 	{
// 		$this->setRedirect(html_entity_decode(JRoute::_('index.php?option=com_msgs&view=messages')));
// 	}
	
}
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
	
}
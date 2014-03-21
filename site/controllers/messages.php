<?php

// Accès direct refusé.
defined('_JEXEC') or die;

// Importation du composant Controller
jimport('joomla.application.component.controllerform');

/** Déclaration du contrôleur Messages */
class MsgsControllerMessages extends JControllerAdmin // pluriel -> liste
{
	protected $text_prefix = 'COM_MSGS';

	/** Constructeur (pas nécessaire si on ne le surcharge pas). */
// 	public function __construct($config = array())
// 	{
// 		parent::__construct($config);
// 	}
	
	/** Méthode retournant le modèle associé. */
	// on lui dit sur quel modèle travailler : message (singulier ?)
	public function getModel($name = 'message', $prefix = 'MsgsModel', $config = array('ignore_request' => true))
	{
		$model = parent::getModel($name, $prefix, $config);
		return $model;
	}
		
}
?>
<?php
/**
 * @package		Joomla.Administrator
 * @subpackage	com_comptaetats

 * @copyright	2013 - Easy CE
 * @author		DeltaCE
 */

// Accès direct refusé.
defined('_JEXEC') or die;

// Importation du composant Controller
jimport('joomla.application.component.controllerform');

/** Déclaration du contrôleur Journaux. */
class MsgsControllerMessagerie extends JControllerAdmin
{
	protected $text_prefix = 'COM_MSGS';

	/** Constructeur. */
// 	public function __construct($config = array())
// 	{
// 		parent::__construct($config);
// 	}
	
	/** Méthode retournant le modèle associé. */
	// on lui dit sur quel modèle travailler : message (sg)
	public function getModel($name = 'message', $prefix = 'MsgsModel', $config = array('ignore_request' => true))
	{
		$model = parent::getModel($name, $prefix, $config);
		return $model;
	}
		
}
?>
<?php

// Accès direct refusé.
defined('_JEXEC') or die;

/** Déclaration du modèle Message */
class MsgsModelMessage extends JModelAdmin
{
	/** Méthode retournant la connexion à la table des écritures. */
	public function getTable($type = 'message', $prefix = 'MsgsTable', $config = array()) // nom complet de la table → MsgsTableMessage
	{
		return JTable::getInstance($type, $prefix, $config);
	}
	
	/** Méthode retournant le formulaire d'ajout */
	// charge le formulaire
	public function getForm($data = array(), $loadData = true)
	{
		$form = $this->loadForm('com_msgs.message', 'message', array('control' => 'jform', 'load_data' => $loadData));
		// c'est le fichier XML
		
		if (empty($form))
		{
			return false;
		}
	
		return $form;
	}
	
	/** Méthode retournant les valeurs à insérer dans le formulaire d'édition. */
	// charge les données (édition)
// 	protected function loadFormData()
// 	{
// 		$app  = JFactory::getApplication();
// 		$data = $app->getUserState('com_msgs.edit.message.data', array());
		
// 		if(empty($data))
// 		{
// 			$data = $this->getItem();
// 		}
		
// 		$this->preprocessData('com_msgs.message', $data);
		
// 		return $data;
// 	}
}
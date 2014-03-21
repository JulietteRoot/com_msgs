<?php

// Accès direct refusé.
defined('_JEXEC') or die;

// Importation de la classe JView.
jimport('joomla.application.component.view');

/** Déclaration de la vue Message */
class MsgsViewMessage extends JViewLegacy
{

	/** Méthode permettant d'afficher la vue. */
	public function display($tpl = null)
	{
        // Récupération des variables du composant.
		$this->form		= $this->get('Form'); // du modèle !
		$this->item		= $this->get('Item');
		$this->state	= $this->get('State');

		// Vérifie la présence d'erreurs.
		if (count($errors = $this->get('Errors')))
		{
			JError::raiseError(500, implode("\n", $errors));
			return false;
		}
						
		parent::display($tpl);
	}

}
?>
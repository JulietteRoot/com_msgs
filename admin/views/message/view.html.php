<?php

// Accès direct refusé.
defined('_JEXEC') or die;

// Importation de la classe JView.
jimport('joomla.application.component.view');

/** Déclaration de la vue Fournisseur. */
class MsgsViewMessage extends JViewLegacy
{
// 	protected $form; // non -> on récupère ceux du modèle
// 	protected $item;
// 	protected $state;

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
		
		// Ajout de la barre d'outils.
		$this->addToolbar();
						
		parent::display($tpl);
	}

    /** Méthode permettant d'afficher la barre d'outils. */
	protected function addToolbar()
	{
		// Mise en place du titre de la page.
		if(isset($this->item->id)) // si objet déjà enregistré -> édition, sinon ajout
		{
			JToolbarHelper::title(JText::_('COM_MSGS_EDITION_MESSAGE'), 'pencil');
		}
		else
		{
			JToolbarHelper::title(JText::_('COM_MSGS_AJOUT_MESSAGE'), 'pencil');
		}

		$user		= JFactory::getUser();
		$userId		= $user->get('id');

		JToolbarHelper::save('message.save');
		JToolbarHelper::cancel('message.cancel');

		JToolbarHelper::divider();
		//JToolbarHelper::help('JHELP_COMPONENTS_COMPTATRESORERIE');
	}
}
?>
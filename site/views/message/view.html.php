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
		
		// Ajout de la barre d'outils.
// 		$this->addToolbar();
						
		parent::display($tpl);
	}

    /** Méthode permettant d'afficher la barre d'outils. */
// 	protected function addToolbar()
// 	{
// 		JToolbarHelper::title(JText::_('COM_MSGS_AJOUT_MESSAGE'), 'pencil');

// 		$user		= JFactory::getUser();
// 		$userId		= $user->get('id');

// 		JToolbarHelper::save('message.save');
// 		JToolbarHelper::cancel('message.cancel');

// 		JToolbarHelper::divider();
// 	}
	
	protected function getToolbar() {
		// add required stylesheets from admin template
		$document = JFactory::getDocument();
		$document->addStyleSheet('administrator/templates/isis/css/template.css');
		//now we add the necessary stylesheets from the administrator template
		//in this case i make reference to the isis default administrator template in joomla 3.2
		$document->addCustomTag( '<link href="administrator/templates/isis/css/template.css" rel="stylesheet" type="text/css" />'."\n\n" );
		//load the JToolBar library and create a toolbar
		jimport('cms.html.toolbar');
		$bar =& new JToolBar( 'toolbar' );
		//and make whatever calls you require
		$bar->appendButton( 'Standard', 'save', 'Save', 'yourcom.save', false );
		$bar->appendButton( 'Separator' );
		$bar->appendButton( 'Standard', 'cancel', 'Cancel', 'yourcom.cancel', false );
		//generate the html and return
		return $bar->render();
	}
}
?>
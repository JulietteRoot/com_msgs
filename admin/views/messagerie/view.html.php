<?php

// Accès direct refusé.
defined('_JEXEC') or die;

// Importation de la classe JView.
jimport('joomla.application.component.view');

/** Déclaration de la vue Messagerie. */
class MsgsViewMessagerie extends JViewLegacy
{
	/** Méthode permettant d'afficher la vue. */
    public function display($tpl = null)
    {
        // Récupération des variables du composant.
        $this->items  = $this->get("Items"); // appelle la fct getItems() du model (correspond aux objets liés à la vue : messages)
        $this->state = $this->get("State"); // filtres de recherche (variables du post)
        $this->form = $this->get('Form');
        $this->pagination = $this->get('Pagination');
		$this->filterForm    = $this->get('FilterForm'); // recherche
		$this->activeFilters = $this->get('ActiveFilters');
		
		// Assign data to the view
		$this->welcome = $this->get('Welcome'); // méthode get du model
		
//         // Récupération des paramètres du composant.
//         $this->params = &JComponentHelper::getParams( 'com_msgs' );

		// menu à gauche 
		$this->sidebar = MsgsHelper::showMenu('messagerie'); // nom de la vue courante à mettre en surbrillance
        
        // Ajout de la barre d'outils.
        $this->addToolBar();
               
        // Affichage de la page.
        parent::display($tpl);
    }

    /** Méthode permettant d'afficher la barre d'outils. */
    protected function addToolbar()
    {
        // Titre de la page
        JToolBarHelper::title(JText::_('COM_MSGS_TITRE_MESSAGERIE'), 'list-2'); // 2ème param = l'icône qui apparait à côté du titre

        //$bar = & JToolBar::getInstance('toolbar');
        //JToolbarHelper::help('JHELP_COMPONENTS_COMPTACONFIG');  // lien vers l'aide
        
        // cette version simple suffit pour la toolbar :
        JToolBarHelper::deleteList('', 'messagerie.delete'); // "pluriel"
        JToolBarHelper::editList('message.edit'); // singulier
        JToolBarHelper::addNew('message.add'); // singulier
        
        // pour le bouton "paramètres" :
        $user = JFactory::getUser();
        if ($user->authorise('core.admin', 'com_msgs'))
        {
        	JToolbarHelper::preferences('com_msgs');
        }
        
        // on utiliserait cette version si on avait la gestion des droits avec access.xml :
        
//     	$canDo = MsgsHelper::getActions("messagerie"); // nom de la vue
        
//         // Nouveau
//         if ($canDo->get('core.create'))
//         {
//         	JToolBarHelper::addNew('message.add', 'JTOOLBAR_NEW');
//         }
        
//         // Editer
//         if ($canDo->get('core.edit'))
//         {
//         	JToolBarHelper::editList('message.edit', 'JTOOLBAR_EDIT');
//         }
        
//         //Bouton supprimer ???
//         if ($canDo->get('core.delete'))
//         {
//         	JToolbarHelper::deleteList(false, 'messagerie.delete', 'JTOOLBAR_DELETE'); // deleteList(string message, string task, string caption)

//         }

    }
    
    /** Méthode retournant les éléments de tris. */
	protected function getSortFields()
	{
		return array
		(
			'pc.id' => JText::_('JGRID_HEADING_ORDERING')
		);
	}
}
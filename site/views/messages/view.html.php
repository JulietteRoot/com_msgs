<?php

// Accès direct refusé.
defined('_JEXEC') or die;

// Importation de la classe JView.
jimport('joomla.application.component.view');

/** Déclaration de la vue Messages */
class MsgsViewMessages extends JViewLegacy
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
        
        // Ajout de la barre d'outils.
//         $this->addToolBar();
        
                 
        // Affichage de la page.
        parent::display($tpl);
    }

    /** Méthode permettant d'afficher la barre d'outils. */
//     protected function addToolbar()
//     {
//         // Titre de la page
//         JToolBarHelper::title(JText::_('COM_MSGS_TITRE_MESSAGERIE'), 'list-2'); // 2ème param = l'icône qui apparait à côté du titre

//         $bar = & JToolBar::getInstance('toolbar');
        
//         // bouton d'ajout pour la toolbar :
//         JToolBarHelper::addNew('message.add'); // singulier
//     }
    
    /** Méthode retournant les éléments de tris. */
	protected function getSortFields()
	{
		return array
		(
			'pc.id' => JText::_('JGRID_HEADING_ORDERING')
		);
	}
}
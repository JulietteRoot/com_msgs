<?php

// Accès direct refusé.
defined('_JEXEC') or die;

/** Déclaration du modèle Messags */
class MsgsModelMessages extends JModelList
{
	/** Constructeur. */
	public function __construct($config = array())
	{
		// si pas de tri particulier demandé, celui-ci s'applique
		if (empty($config['filter_fields']))
		{
			$config['filter_fields'] = array(
					'id', 'm.id'
			);
		}
		
		parent::__construct($config);
	}
	
	/** Méthode formatant une requête SQL chargeant la liste des données, la renvoie sous forme de String */
	protected function getListQuery()
	{
		// Création d'une nouvelle requete
		$db = $this->getDbo();
		$query = $db->getQuery(true);
		$user = JFactory::getUser(); // pour récupérer l'utilisateur courant
		
		// Requête de base pour le modèle.
		$query->select('m.*, u.name, DATE_FORMAT(m.created, "%d/%m/%Y") as created') // format FR (l'alias peut porter le nom du champ)
			  ->from('#__msgs_messagerie AS m')
			  ->innerjoin('#__users AS u ON m.created_by = u.id')
			  ->where('u.id=' . $user->id); // on récupère uniquement les messages de l'utilisateur courant
			
		// Mise en place du filtre de recherche par mot clé.
		$search = $this->getState('filter.search');
		if (!empty($search)) 
		{
			$search = $db->Quote('%'.$db->escape($search).'%');
			$query->where('LOWER(m.subject) LIKE '.$search);
		}
						
		// Mise en place de l'ordre d'affichage.
		$orderCol = $this->getUserStateFromRequest($this->context.'.filter_order', 'filter_order', " o.date_operation"); // Nom de la colonne triée
		$orderDirn = $this->getUserStateFromRequest($this->context.'.filter_order_Dir', 'filter_order_Dir', "desc"); // Direction (ASC OU DESC)

		$fullordering = $this->getState('list.fullordering');
		if(!empty($fullordering))
		{
			$fullordering = explode(' ', $fullordering);
			$query->order($db->escape($fullordering[0].' '.$orderDirn));
			$orderDirn = ($orderDirn=='desc'?'asc':'desc');
			$this->state->set('list.direction', $orderDirn);
		}
		else
		{			
			$query->order($db->escape("m.created desc")); // tri par défaut	
		}

		//var_dump($query->dump());
		return $query;
	}
	
	// on aurait ici getItem() si la méthode devait être surchargée
	// (exécute la requête et retourne un tableau d'objets)
	
	/** Méthode permettant de gérer l'ordonnancement et le tri. */
	protected function populateState($ordering = null, $direction = null)
	{
		$app = JFactory::getApplication();
	
		if ($layout = JRequest::getVar('layout'))
		{
			$this->context .= '.'.$layout;
		}
	
		$search = $this->getUserStateFromRequest($this->context.'.filter.search', 'filter_search');
		$this->setState('filter.search', $search);
		// "filter" correspond à un tableau de filtres, ce qu’on retrouve dans le POST
		// (on a défini le "search" dans site/models/forms/filter_messages.xml)
		
		parent::populateState('m.created', 'desc');
	}
}
?>
<?php

// Accès direct refusé.
defined('_JEXEC') or die;

/** Déclaration du modèle Messagerie */
class MsgsModelMessagerie extends JModelList
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
	
	/** Méthode retournant la connexion à la table des écritures. */
	// NON UTILISEE ICI. Elle serait appelée dans le modèle qui sert pour l'édition.
// 	public function getTable($type = 'message', $prefix = 'MsgsTable', $config = array()) // pour donner le nom de la table → MsgsTableMessage
// 	{
// 		return JTable::getInstance($type, $prefix, $config);
// 	}

	
	/** Méthode formatant une requête SQL chargeant la liste des données, la renvoie sous forme de String */
	protected function getListQuery()
	{
		// Création d'une nouvelle requete
		$db = $this->getDbo();
		$query = $db->getQuery(true);
	
		// Requête de base pour le modèle.
		$query->select('m.*, u.name, DATE_FORMAT(m.created, "%d/%m/%Y") as created') // format FR (l'alias peut porter le nom du champ)
			  ->from('#__msgs_messagerie AS m')
			  ->leftjoin('#__users AS u ON m.created_by = u.id');
			
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
		// (on a défini le "search" dans admin/models/forms/filter_messagerie.xml)
		
		parent::populateState('m.created', 'desc');
	}
}
?>
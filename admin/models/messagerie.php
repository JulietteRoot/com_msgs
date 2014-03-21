<?php

// Accès direct refusé.
defined('_JEXEC') or die;

/** Déclaration du modèle Messagerie */
class MsgsModelMessagerie extends JModelList
{
	
	protected $welcome = false;
	
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
		// on récupère les paramètres :
		$params = JComponentHelper::getParams('com_msgs');
		//var_dump($params);
		
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
		
		// Mis en place du filtre de recherche par archive
// 		$archive = $this->getState('filter.archive');
// 		if ($archive == 'tous')
// 		{
// 			$query->where('');
// 		}
// 		else if($archive == 'archive')
// 		{
// 			$query->where('');
// 		}
// 		else if($archive == 'non_archive')
// 		{
// 			$query->where('');
// 		}
		
		// nombre de messages modulable (cf params) :
		$query->setLimit($params->get('msg_number'));

		// affichage du message de bienvenue si demandé (cf params)
// 		$bienvenue = false;
// 		if($params->get('welcome_msg') == 1){
// 			$bienvenue = true; // on crée une valeur pour la vue
// 		}
		
		var_dump($query->dump());
		return $query;
	}
	
	// affichage du message de bienvenue si demandé (cf params)
	public function getWelcome()
	{
		if(JComponentHelper::getParams('com_msgs')->get('welcome_msg') == 1){
			$this->welcome = true; // variable pour la vue
		}
		return $this->welcome;
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
		
		// pour les filtres de recherche :
		$archive = $this->getUserStateFromRequest($this->context.'.filter.archive', 'filter_archive');
		$this->setState('filter.archive', $archive);
		
		parent::populateState('m.created', 'desc');
	}
}
?>
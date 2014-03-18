<?php
/**
 * @package		Joomla.Administrator
 * @subpackage	com_comptaetats

 * @copyright	2014 - Easy CE
 * @author		DeltaCE
*/

// Accès direct refusé.
defined('_JEXEC') or die;

/** Déclaration du modèle Journaux. */
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
	public function getTable($type = 'message', $prefix = 'Msgs', $config = array())
	{
		return JTable::getInstance($type, $prefix, $config);
	}
	
	/** Méthode formatant une requête SQL chargeant la liste des données. */
	protected function getListQuery()
	{
		// Création d'une nouvelle requete
		$db = $this->getDbo();
		$query = $db->getQuery(true);
	
		// Requête de base pour le modèle.
		$query->select('m.*')
			  ->from('#__msgs_messagerie AS m')
			  ->order('m.created');
			
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

		var_dump($query);
		return $query;
	}
	
	/** Méthode permettant de gérer l'ordonancement et le tri. */
	protected function populateState($ordering = null, $direction = null)
	{
		$app = JFactory::getApplication();
	
		if ($layout = JRequest::getVar('layout'))
		{
			$this->context .= '.'.$layout;
		}
	
		$search = $this->getUserStateFromRequest($this->context.'.filter.search', 'filter_search');
		$this->setState('filter.search', $search);
		
		parent::populateState('m.created', 'desc');
	}
}
?>
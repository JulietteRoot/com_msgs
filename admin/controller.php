<?php

// Accès direct refusé.
defined('_JEXEC') or die;

// Importation de la classe Controller
jimport('joomla.application.component.controller');

/** Déclaration du contrôleur principal. */
class MsgsController extends JControllerLegacy
{
    protected $default_view = 'messagerie'; // nom de la vue par défaut

    public function display($cachable = false, $urlparams = false)
    {
    	ini_set('display_errors', TRUE); error_reporting(E_ALL);
    	
    	// on place ici les includes pour les méthodes statiques du helper 
    	// Importation des librairies et des helpers
    	require_once JPATH_ADMINISTRATOR.DIRECTORY_SEPARATOR."components".DIRECTORY_SEPARATOR."com_msgs".DIRECTORY_SEPARATOR."helpers".DIRECTORY_SEPARATOR."msgs.php";
    	
        parent::display();
        return $this;
    }
}
?>
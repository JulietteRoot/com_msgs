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
    	
        parent::display();
        return $this;
    }
}
?>
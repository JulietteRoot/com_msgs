<?php
/**
 * @package		Joomla.Administrator
 * @subpackage	com_comptaetats

 * @copyright	2014 - Easy CE
 * @author		DeltaCE
*/

// Accés direct refusé.
defined('_JEXEC') or die;

// Importation de la classe Controller
jimport('joomla.application.component.controller');

/** Déclaration du contrôleur principal. */
class MsgsController extends JControllerLegacy
{
    protected $default_view = 'messagerie'; // nom du dossier

    public function display($cachable = false, $urlparams = false)
    {
    	ini_set('display_errors', TRUE); error_reporting(E_ALL);
    	
        parent::display();
        return $this;
    }
}
?>
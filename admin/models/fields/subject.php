<?php

defined('JPATH_BASE') or die;

jimport('joomla.html.html');
jimport('joomla.form.formfield');
jimport('joomla.form.helper');
JFormHelper::loadFieldClass('list');

/**
 * Champ personnalisé avec la liste des objets (subjects) en base
 */
class JFormFieldSubject extends JFormFieldList // bien mettre le nom "Subject" ici
{
    protected $type = 'Subject';

    protected function getOptions()
    {
        // Initialisation des variables
        $options = array();
        $db	= JFactory::getDbo();

        // Recherche de la liste des objets triés par ordre alphabétique
        $query	= $db->getQuery(true);
        $query->select('m.id AS value, m.subject AS text'); // value = ce qu'on récupère / text = ce qui est affiché
        $query->from('#__msgs_messagerie AS m');
        $query->order('m.subject');
        $db->setQuery($query);
        $options = (array)$db->loadObjectList();

        if ($db->getErrorNum()) {
            JError::raiseWarning(500, $db->getErrorMsg());
        }

        // Ajout d'une option "Sélectionner"
        array_unshift($options, JHtml::_('select.option', '', "- ".JText::_('COM_MSGS_FIELD_SUBJECT_SELECT')." -"));

        return $options;
    }
}
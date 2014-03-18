<?php

// Accès direct refusé.
defined('_JEXEC') or die('Restricted Access');

// Récupération des variables d'ordonnancements.
$listOrder	= ($this->state->get('list.ordering'));
$listDirn	= ($this->state->get('list.direction')); ?>

<tr>
    <th width="1%">
        <input type="checkbox" name="checkall-toggle" value="" title="" onclick="Joomla.checkAll(this)">
    </th>
    
    <th width="11%">
        <?php echo JHtml::_('searchtools.sort',  'COM_MSGS_DATE', 'm.created', $listDirn, $listOrder); ?>
        <!-- ce qui doit s'afficher / le champ correspondant -->
    </th>
    
    <th width="11%">
		<?php echo JHtml::_('searchtools.sort',  'COM_MSGS_AUTEUR', '.m.created_by', $listDirn, $listOrder); ?>
    </th>
    
    <th width="11%">
		<?php echo JHtml::_('searchtools.sort',  'COM_MSGS_OBJET', 'm.subject', $listDirn, $listOrder); ?>
    </th>
    
    <th width="40%">
		<?php echo JHtml::_('searchtools.sort', 'COM_MSGS_CONTENU', 'm.content', $listDirn, $listOrder); ?>
	</th>
</tr>
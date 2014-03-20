<?php

// Accès direct refusé.
defined('_JEXEC') or die('Restricted Access');

// Récupération des variables d'ordonnancements.
$listOrder	= ($this->state->get('list.ordering'));
$listDirn	= ($this->state->get('list.direction')); ?>

<tr>
	<!-- d'abord la case à cocher -->
    <th width="1%">
        <input type="checkbox" name="checkall-toggle" value="" title="" onclick="Joomla.checkAll(this)">
    </th>
    
    <th width="11%">
        <?php echo JHtml::_('searchtools.sort',  'COM_MSGS_DATE', 'm.created', $listDirn, $listOrder); ?>
        <!-- élt de Joomla pour le tri / ce qui doit s'afficher / le champ correspondant / listdir / ordre de tri -->
    </th>
    
    <th width="11%">
		<?php echo JHtml::_('searchtools.sort',  'COM_MSGS_OBJET', 'm.subject', $listDirn, $listOrder); ?>
    </th>
    
    <th width="40%">
		<?php echo JHtml::_('searchtools.sort', 'COM_MSGS_CONTENU', 'm.content', $listDirn, $listOrder); ?>
	</th>
</tr>
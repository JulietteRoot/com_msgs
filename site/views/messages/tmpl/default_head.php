<?php

// Accès direct refusé.
defined('_JEXEC') or die('Restricted Access');

// Récupération des variables d'ordonnancements.
$listOrder	= ($this->state->get('list.ordering'));
$listDirn	= ($this->state->get('list.direction')); ?>

<tr>
    <!-- version basique sans tri -->
    <th width="11%">
        <?php echo JText::_('COM_MSGS_DATE'); ?>
    </th>
    
    <th width="11%">
		<?php echo JText::_('COM_MSGS_OBJET'); ?>
    </th>
    
    <th width="40%">
		<?php echo JText::_('COM_MSGS_CONTENU'); ?>
	</th>
</tr>
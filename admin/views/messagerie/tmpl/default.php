<?php
/**
 * @package		Joomla.Administrator
 * @subpackage	com_comptaetats

 * @copyright	2014 - Easy CE
 * @author		DeltaCE
*/

// Accès direct refusé.
defined('_JEXEC') or die;

// Importation des outils du formulaire.
JHtml::_('bootstrap.tooltip');
JHtml::_('behavior.multiselect');
JHtml::_('formbehavior.chosen', 'select');

$user		= JFactory::getUser();
$listOrder	= $this->escape($this->state->get('list.ordering'));
$listDirn	= $this->escape($this->state->get('list.direction'));
$sortFields = $this->getSortFields(); ?>

<form action="<?php echo html_entity_decode(JRoute::_('index.php?option=com_msgs&view=messagerie')); ?>" method="post" name="adminForm" id="adminForm">
		<div id="j-main-container">
			<?php
			// Importation de la barre contenant les filtres.
			echo JLayoutHelper::render('joomla.searchtools.default', array('view' => $this));

			if (empty($this->items)) : ?>
				<div class="alert alert-no-items">
					<?php echo JText::_('JGLOBAL_NO_MATCHING_RESULTS_JOURNAL'); ?>
				</div>
			<?php else : ?>
				<table class="adminlist table table-striped">
					<thead><?php echo $this->loadTemplate('head');?></thead>
					<tfoot><?php echo $this->loadTemplate('foot');?></tfoot>
					<tbody><?php echo $this->loadTemplate('body');?></tbody>
				</table>
			<?php endif; ?>
		
			<input type="hidden" name="task" value="" />
			<input type="hidden" name="boxchecked" value="0" />
			<input type="hidden" name="filter_order" value="<?php echo $listOrder; ?>" />
			<input type="hidden" name="filter_order_Dir" value="<?php echo $listDirn; ?>" />
			<?php echo JHtml::_('form.token'); ?>
		</div>
	</div>
</form>
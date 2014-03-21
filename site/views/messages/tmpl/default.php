<?php
// default.php pour une liste (correspond au edit.php pour de l'édition ou ajout)

// Accès direct refusé.
defined('_JEXEC') or die;

// Importation des outils du formulaire.
JHtml::_('bootstrap.tooltip');
JHtml::_('behavior.multiselect');
JHtml::_('formbehavior.chosen', 'select');

$user		= JFactory::getUser(); // on récupère l'utilisateur connecté
$listOrder	= $this->escape($this->state->get('list.ordering'));
$listDirn	= $this->escape($this->state->get('list.direction'));
$sortFields = $this->getSortFields(); ?>

<h1>Mes messages envoyés</h1>

<!--  dans action : adresse de la vue courante -->
<form action="<?php echo html_entity_decode(JRoute::_('index.php?option=com_msgs&view=messages')); ?>" method="post" name="adminForm" id="adminForm">
		<div id="j-main-container">
			<?php
			// Importation de la barre contenant les filtres.
			//echo JLayoutHelper::render('joomla.searchtools.default', array('view' => $this)); // (getGroup...)

			if (empty($this->items)) : ?>
				<div class="alert alert-no-items">
					<?php echo JText::_('JGLOBAL_NO_MATCHING_RESULTS_MESSAGE'); // si pas de messages stockés ?>
				</div>
			<?php else : ?>
				<table class="adminlist table table-striped">
					<thead><?php echo $this->loadTemplate('head');?></thead>
					<tfoot><?php echo $this->loadTemplate('foot');?></tfoot>
					<tbody><?php echo $this->loadTemplate('body');?></tbody>
				</table>
			<?php endif; ?>
		
			<?php echo JHtml::_('form.token'); ?> <!-- sécurité -->
		</div>
</form>

<p>
	<a class="btn btn-lg btn-primary" href="<?php echo html_entity_decode(JRoute::_('index.php?option=com_msgs&view=message&layout=edit'));?>">Nouveau message</a>
</p>

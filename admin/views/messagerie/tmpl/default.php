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
$sortFields = $this->getSortFields();

if($this->welcome) : //this se réfère à la vue ?>
	<p>Bienvenue !</p>
<?php endif;?>

<!--  dans action : adresse de la vue courante -->
<form action="<?php echo html_entity_decode(JRoute::_('index.php?option=com_msgs&view=messagerie')); ?>" method="post" name="adminForm" id="adminForm">
		<div id="j-main-container">
			<?php
			// Importation de la barre contenant les filtres.
			echo JLayoutHelper::render('joomla.searchtools.default', array('view' => $this));

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
		
			<input type="hidden" name="task" value="" /> <!-- va prendre le champ de l’action (add...) -->
			<input type="hidden" name="boxchecked" value="0" /> <!-- quels élts sont cochés dans la liste -->
			<input type="hidden" name="filter_order" value="<?php echo $listOrder; ?>" /> <!-- sur quelle colonne on a cliqué -->
			<input type="hidden" name="filter_order_Dir" value="<?php echo $listDirn; ?>" /> <!-- l'ordre -->
			<?php echo JHtml::_('form.token'); ?> <!-- sécurité -->
		</div>
</form>

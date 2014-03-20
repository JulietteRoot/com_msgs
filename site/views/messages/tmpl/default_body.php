<?php

// Accès direct refusé.
defined('_JEXEC') or die('Restricted Access');

foreach ($this->items as $i => $item) : ?>
	
	<tr>
		<td align="center">
			<?php echo JHtml::_('grid.id', $i, $item->id); // pour la génération des checkboxes ?>
		</td>
		
		<td>
			<!--  à intituler comme dans la base -->
			<?php echo  $item->created; ?>
		</td>
		
		<td>
			<?php echo  $item->subject; ?>
		</td>
		
		<td>
			<?php echo  $item->content; ?>
		</td>
	</tr>
<?php  endforeach; ?>
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
			<?php
				if(strlen($item->name) > 0){
					echo $item->name; // si plusieurs names, utiliser un alias pour désigner le bon
				}else{
					echo JText::_('COM_MSGS_ANONYME');
				}?>
		</td>
		
		<td>
			<?php echo  $item->subject; ?>
		</td>
		
		<td>
			<?php echo  $item->content; ?>
		</td>
	</tr>
<?php  endforeach; ?>
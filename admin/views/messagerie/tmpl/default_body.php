<?php

// Accès direct refusé.
defined('_JEXEC') or die('Restricted Access');

$last_ecriture_id = '0';

foreach ($this->items as $i => $item) : ?>
	
	<tr <?php echo (($item->ecriture_id!=$last_ecriture_id) && $last_ecriture_id!='0')?'style="border-top:3px solid #cccccc;"':''; ?>>
		<td align="center">
			<?php echo ($item->ecriture_id==$last_ecriture_id)?'':JHtml::_('grid.id', $i, $item->id); ?>
		</td>
		 	
		<td>
			<?php echo  ($item->ecriture_id==$last_ecriture_id)?'':$item->date; ?>
		</td>
		
		<td>
			<?php echo  '<a href="#" rel="tooltip" title="'.$item->libelle_compte.'">'.$item->numero_compte.'</a>'; ?>
		</td>
		
		<td>
			<?php echo  $item->compte_analytique; ?>
		</td>
		
		<td>
			<?php echo  $item->compte_tiers; ?>
		</td>
		
		<td>
			<?php echo  $item->nom; ?>
		</td>
		
		<td>
			<?php echo  $item->num_piece; ?>
		</td>
		
		<td>
			<?php echo  $item->numero_reference; ?>
		</td>
		
		<td style="text-align:right;">
			<?php echo  $item->montant_debit>0?$item->montant_debit:''; ?>
		</td>
		
		<td style="text-align:right;">
			<?php echo $item->montant_credit>0?$item->montant_credit:''; ?>
		</td>
	</tr>
<?php  $last_ecriture_id = $item->ecriture_id;  endforeach; ?>
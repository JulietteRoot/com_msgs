<?php

defined('_JEXEC') or die;

// Include the HTML helpers.
JHtml::addIncludePath ( JPATH_COMPONENT . '/helpers/html' );

JHtml::_ ( 'behavior.formvalidation' );
JHtml::_ ( 'behavior.keepalive' );
?>
<script type="text/javascript">
	Joomla.submitbutton = function(task)
	{
		if (task == 'message.cancel' || document.formvalidator.isValid(document.id('message-form')))
		{
			Joomla.submitform(task, document.getElementById('message-form'));
		}
	}
</script>

<form action="<?php echo JRoute::_('index.php?option=com_msgs'); ?>"
	method="post" name="adminForm" id="message-form"
	class="form-validate form-horizontal">
	<fieldset class="adminform">
		<div class="control-group">
			<div class="control-label">
				<?php echo $this->form->getLabel('user_id_to'); ?>
			</div>
			
			<div class="controls">
				<?php echo $this->form->getInput('user_id_to'); ?>
			</div>
		</div>
		
		<div class="control-group">
			<div class="control-label">
				<?php echo $this->form->getLabel('subject'); ?>
			</div>
			
			<div class="controls">
				<?php echo $this->form->getInput('subject'); ?>
			</div>
		</div>
		
		<div class="control-group">
			<div class="control-label">
				<?php echo $this->form->getLabel('message'); ?>
			</div>
			
			<div class="controls">
				<?php echo $this->form->getInput('message'); ?>
			</div>
		</div>
	</fieldset>
	
	<input type="hidden" name="task" value="" />
	
	<?php echo JHtml::_('form.token'); ?>
</form>

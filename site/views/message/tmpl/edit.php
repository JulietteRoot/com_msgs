<?php
// edit.php pour de l'édition ou ajout (correspond au default.php pour une liste)

// Accès direct refusé.
defined('_JEXEC') or die;

JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
JHtml::_('behavior.modal'); ?>

<form action="<?php echo html_entity_decode(JRoute::_('index.php?option=com_msgs')); ?>" method="post" name="adminForm" id="adminForm" autocomplete="off"  id="commission-form" class="form-validate">
    <div class="row-fluid">
        <div class="span12 form-horizontal">
            <div class="tabbable">
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_infos_section">
                      <!-- on définit les champs qui apparaissent dans le fichier XML site/models/forms/message.xml -->
                      <?php foreach($this->form->getFieldset('message') as $field) { ?>
                            <div class="control-group">
                                    <div class="control-label">
                                            <?php echo $this->form->getLabel($field->fieldname); ?>
                                    </div>
                                    <div class="controls">
                                            <?php echo $this->form->getInput($field->fieldname); ?>
                                    </div>
                            </div>
                        <?php } ?>
                     </div>
                </div>
            </div>
        </div>
    </div>

    <input type="hidden" name="task" value="" />
    <?php echo JHtml::_('form.token'); ?>
    <div class="clr"></div>
</form>
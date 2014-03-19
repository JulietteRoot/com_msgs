<?php

// Accès direct refusé.
defined('_JEXEC') or die;

// Importation de la classe JView.
jimport('joomla.application.component.view');

/**
 * Déclaration de la vue Message.
 */
class MsgsViewMessage extends JViewLegacy {
	protected $form;
	protected $item;
	protected $state;
	
	public function display($tpl = null) {
		$this->form = $this->get ( 'Form' );
		$this->item = $this->get ( 'Item' );
		$this->state = $this->get ( 'State' );
		
		// Check for errors.
		if (count ( $errors = $this->get ( 'Errors' ) )) {
			JError::raiseError ( 500, implode ( "\n", $errors ) );
			return false;
		}
		
		parent::display ( $tpl );
		$this->addToolbar ();
	}
	
	protected function addToolbar() {
		if ($this->getLayout () == 'edit') {
			JToolbarHelper::title ( JText::_ ( 'COM_MESSAGES_WRITE_PRIVATE_MESSAGE' ), 'envelope-opened new-privatemessage' );
			JToolbarHelper::save ( 'message.save', 'COM_MESSAGES_TOOLBAR_SEND' );
			JToolbarHelper::cancel ( 'message.cancel' );
			JToolbarHelper::help ( 'JHELP_COMPONENTS_MESSAGING_WRITE' );
		} else {
			JToolbarHelper::title ( JText::_ ( 'COM_MESSAGES_VIEW_PRIVATE_MESSAGE' ), 'envelope inbox' );
			$sender = JUser::getInstance ( $this->item->user_id_from );
			if ($sender->authorise ( 'core.admin' ) || $sender->authorise ( 'core.manage', 'com_messages' ) && $sender->authorise ( 'core.login.admin' )) {
				JToolbarHelper::custom ( 'message.reply', 'redo', null, 'COM_MESSAGES_TOOLBAR_REPLY', false );
			}
			JToolbarHelper::cancel ( 'message.cancel' );
			JToolbarHelper::help ( 'JHELP_COMPONENTS_MESSAGING_READ' );
		}
	}
}
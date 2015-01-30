<div class="users form">
<?php echo $this->Form->create('User'); 
//debug($provider);die;?>
	<fieldset>
		<legend><?php echo __('Complain'); ?></legend>
	<?php
		echo $this->Form->input('Provider',array('options' => $provider));
		echo $this->Form->input('message',array('type'=>'textArea'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
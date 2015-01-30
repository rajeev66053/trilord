<div class="users form">
<?php echo $this->Form->create('User', array('novalidate' => true)); ?>
	<fieldset>
		<legend><?php echo __('Add Dates'); ?></legend>
	<?php
		echo $this->Form->input('from',array('id'=>'datepicker','placeholder'=>date('Y-m-d'),'label'=>'Issue Date'));
		echo $this->Form->input('to',array('id'=>'datepicker1','placeholder'=>date('Y-m-d'),'label'=>'Expire Date'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>

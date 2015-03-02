<div class="careers form">
<?php echo $this->Form->create('Career'); ?>
	<fieldset>
		<legend><?php echo __('Add Career'); ?></legend>
	<?php
		echo $this->Form->input('title');
		echo $this->Form->input('description');
		//echo $this->Form->input('created_date');
		echo $this->Form->input('valid_till');
		echo $this->Form->input('is_active');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Careers'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Job Appliers'), array('controller' => 'job_appliers', 'action' => 'index')); ?> </li>
		<!--<li><?php //echo $this->Html->link(__('New Job Applier'), array('controller' => 'job_appliers', 'action' => 'add')); ?> </li>-->
	</ul>
</div>

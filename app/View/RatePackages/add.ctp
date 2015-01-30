<div class="ratePackages form">
<?php echo $this->Form->create('RatePackage'); ?>
	<fieldset>
		<legend><?php echo __('Add Rate Package'); ?></legend>
	<?php
		echo $this->Form->input('title');
		echo $this->Form->input('is_active');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Rate Packages'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Service Provider Rates'), array('controller' => 'service_provider_rates', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Service Provider Rate'), array('controller' => 'service_provider_rates', 'action' => 'add')); ?> </li>
	</ul>
</div>

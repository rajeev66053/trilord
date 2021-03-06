<div class="servicePackageRequests index">
	<h2><?php echo __('Service Package Requests'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('service_package_id'); ?></th>
			<th><?php echo $this->Paginator->sort('seeker_id'); ?></th>
			<th><?php echo $this->Paginator->sort('requested_date'); ?></th>
			<th><?php echo $this->Paginator->sort('description'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th><?php echo $this->Paginator->sort('assigned_date'); ?></th>
			<th><?php echo $this->Paginator->sort('is_locked'); ?></th>
			<th><?php echo $this->Paginator->sort('locked_by'); ?></th>
			<th><?php echo $this->Paginator->sort('completed_date'); ?></th>
			<th><?php echo $this->Paginator->sort('rate'); ?></th>
			<th><?php echo $this->Paginator->sort('requested_amount'); ?></th>
			<th><?php echo $this->Paginator->sort('freezed_amount'); ?></th>
			<th><?php echo $this->Paginator->sort('completed_amount'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($servicePackageRequests as $servicePackageRequest): ?>
	<tr>
		<td><?php echo h($servicePackageRequest['ServicePackageRequest']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($servicePackageRequest['ServicePackage']['title'], array('controller' => 'service_packages', 'action' => 'view', $servicePackageRequest['ServicePackage']['id'])); ?>
		</td>
		<td><?php echo h($servicePackageRequest['ServicePackageRequest']['seeker_id']); ?>&nbsp;</td>
		<td><?php echo h($servicePackageRequest['ServicePackageRequest']['requested_date']); ?>&nbsp;</td>
		<td><?php echo h($servicePackageRequest['ServicePackageRequest']['description']); ?>&nbsp;</td>
		<td><?php echo h($servicePackageRequest['ServicePackageRequest']['status']); ?>&nbsp;</td>
		<td><?php echo h($servicePackageRequest['ServicePackageRequest']['assigned_date']); ?>&nbsp;</td>
		<td><?php echo h($servicePackageRequest['ServicePackageRequest']['is_locked']); ?>&nbsp;</td>
		<td><?php echo h($servicePackageRequest['ServicePackageRequest']['locked_by']); ?>&nbsp;</td>
		<td><?php echo h($servicePackageRequest['ServicePackageRequest']['completed_date']); ?>&nbsp;</td>
		<td><?php echo h($servicePackageRequest['ServicePackageRequest']['rate']); ?>&nbsp;</td>
		<td><?php echo h($servicePackageRequest['ServicePackageRequest']['requested_amount']); ?>&nbsp;</td>
		<td><?php echo h($servicePackageRequest['ServicePackageRequest']['freezed_amount']); ?>&nbsp;</td>
		<td><?php echo h($servicePackageRequest['ServicePackageRequest']['completed_amount']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $servicePackageRequest['ServicePackageRequest']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $servicePackageRequest['ServicePackageRequest']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $servicePackageRequest['ServicePackageRequest']['id']), null, __('Are you sure you want to delete # %s?', $servicePackageRequest['ServicePackageRequest']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Service Package Request'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Service Packages'), array('controller' => 'service_packages', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Service Package'), array('controller' => 'service_packages', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Service Package Assigned Providers'), array('controller' => 'service_package_assigned_providers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Service Package Assigned Provider'), array('controller' => 'service_package_assigned_providers', 'action' => 'add')); ?> </li>
	</ul>
</div>

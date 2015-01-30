<?php
$filename = date('Y-m-d').'Provider';
header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
header("Content-Disposition: attachment; filename=".$filename.".xls");  //File name extension was wrong
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Cache-Control: private",false);
?>
		<table cellpadding="0" cellspacing="0">
		<tr>
				<th><?php echo __('Id'); ?></th>
				<th><?php echo __('Name'); ?></th>
				<th><?php echo __('Email'); ?></th>
				<th><?php echo __('Phone'); ?></th>
				<th><?php echo __('Permanent Address'); ?></th>
				<th><?php echo __('Temporary Address'); ?></th>
				<th><?php echo __('Expertise Level'); ?></th>
		</tr>
		<?php foreach ($users as $user):?>
		<tr>
			<td><?php echo h($user['User']['id']); ?>&nbsp;</td>
			<td><?php echo h($user['User']['name']); ?>&nbsp;</td>
			<td><?php echo h($user['User']['email']); ?>&nbsp;</td>
			<td><?php echo h($user['User']['primary_phone']); ?>&nbsp;</td>
			<td><?php echo h($user['User']['permanent_address']); ?>&nbsp;</td>
			<td><?php echo h($user['User']['temporary_address']); ?>&nbsp;</td>
			<td><?php echo h($user['User']['expertise_level']); ?>&nbsp;</td>
			
		</tr>
	<?php endforeach; ?>
		</table>
	
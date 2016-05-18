<div class="sideboxes index">
	<h2><?php echo __('Sideboxes'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			
			<th><?php echo $this->Paginator->sort('name','Nazwa'); ?></th>
			<th><?php echo $this->Paginator->sort('context','Zawartość'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($sideboxes as $sidebox): ?>
	<tr>
		
		<td><?php echo h($sidebox['Sidebox']['name']); ?>&nbsp;</td>
		<td><?php echo h($sidebox['Sidebox']['context']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Pokaż'), array('action' => 'view', $sidebox['Sidebox']['id'])); ?>
			<?php echo $this->Html->link(__('Edytuj'), array('action' => 'edit', $sidebox['Sidebox']['id'])); ?>
			<?php echo $this->Form->postLink(__('Usuń'), array('action' => 'delete', $sidebox['Sidebox']['id']), null, __('Na pewno usunąć # %s?', $sidebox['Sidebox']['name'])); ?>
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
<?php echo $this->element('Actions'); ?>
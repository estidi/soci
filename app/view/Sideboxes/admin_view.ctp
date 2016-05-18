<div class="sideboxes view">
<h2><?php  echo __('Sidebox'); ?></h2>
	<dl>
		<dt><?php echo __('Nazwa'); ?></dt>
		<dd>
			<?php echo h($sidebox['Sidebox']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Zawartość'); ?></dt>
		<dd>
			<?php echo $sidebox['Sidebox']['context']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php echo $this->element('Actions'); ?>

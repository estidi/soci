<div class="sideboxes form">
<?php echo $this->Form->create('Sidebox'); ?>
	<fieldset>
		<legend><?php echo __('Edytuj element'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name',array('label'=>'Nazwa'));
		echo $this->Form->input('context',array('label'=>'Zawartość'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<?php echo $this->element('Actions'); ?>
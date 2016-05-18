<div class="pages view">
<h2><?php  echo __('Page'); ?></h2>
	<dl>

		<dt><?php echo __('Tytuł'); ?></dt>
		<dd>
			<?php echo h($page['Page']['title']); ?>
			&nbsp;
		</dd>		
                <dt><?php echo __('Ost. modyfikacja'); ?></dt>
		<dd>
			<?php echo h($page['Page']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Treść'); ?></dt>
		<dd>
			<?php echo $page['Page']['body']; ?>
			&nbsp;
		</dd>

	</dl>
</div>
<?php echo $this->element('Actions'); ?>


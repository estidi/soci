<div class="menus view">
    <h2><?php echo __('Menu'); ?></h2>
    <dl>
        <dt><?php echo __('Menu nadrzędne'); ?></dt>
        <dd>
            <?php echo $this->Html->link($menu['ParentMenu']['name'], array('controller' => 'menus', 'action' => 'view', $menu['ParentMenu']['id'])); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Nazwa'); ?></dt>
        <dd>
            <?php echo h($menu['Menu']['name']); ?>
            &nbsp;
        </dd>
    </dl>
</div>
<?php echo $this->element('Actions'); ?>
<div class="menus index">
    <h2><?php echo __('Przeglądaj Menu :'); ?></h2>
    <table cellpadding="0" cellspacing="0" >
        <tr>	

            <th><?php echo h('Nazwa'); ?>
            <th><?php echo h('Strona'); ?>
            <th></th> <?php// debug($treelist); ?>
        </tr>
        <?php foreach ($treelist as $menu): ?>
            <tr style="background-color: silver;">

                <td><?php

                    echo h($menu['Menu']['name']);
                    ?>&nbsp;
                </td>
                <td><?php echo $this->Html->link(__($menu['Page']['title']), array('controller' => 'pages', 'action' => 'view', $menu['Page']['id'])); ?>&nbsp;</td>
                <td class="actions" style="text-align: right">
                    <?php echo $this->Html->link(__('Pokaż'), array('action' => 'view', $menu['Menu']['id'])); ?>
                    <?php echo $this->Html->link(__('Edytuj'), array('action' => 'edit', $menu['Menu']['id'])); ?>
                    <?php echo $this->Html->link(__('Wyżej'), array('action' => 'moveup', $menu['Menu']['id'])); ?>
                    <?php echo $this->Html->link(__('Niżej'), array('action' => 'movedown', $menu['Menu']['id'])); ?>
                    <?php echo $this->Form->postLink(__('Usuń'), array('action' => 'delete', $menu['Menu']['id']), null, __('Na pewno usunąć # %s?', $menu['Menu']['name'])); ?>
                </td>
            </tr>
            <?php foreach ($menu['children'] as $menuc): ?>
                <tr>

                    <td><?php
                        echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.h($menuc['Menu']['name']);
                        ?>&nbsp;
                    </td>
                    <td><?php echo $this->Html->link(__($menuc['Page']['title']), array('controller' => 'pages', 'action' => 'view', $menuc['Page']['id'])); ?>&nbsp;</td>
                    <td class="actions" style="text-align: right">
                        <?php echo $this->Html->link(__('Pokaż'), array('action' => 'view', $menuc['Menu']['id'])); ?>
                        <?php echo $this->Html->link(__('Edytuj'), array('action' => 'edit', $menuc['Menu']['id'])); ?>
                        <?php echo $this->Html->link(__('Wyżej'), array('action' => 'moveup', $menuc['Menu']['id'])); ?>
                        <?php echo $this->Html->link(__('Niżej'), array('action' => 'movedown', $menuc['Menu']['id'])); ?>
                        <?php echo $this->Form->postLink(__('Usuń'), array('action' => 'delete', $menuc['Menu']['id']), null, __('Na pewno usunąć # %s?', $menuc['Menu']['name'])); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endforeach; ?>
    </table>
</div>
<?php echo $this->element('Actions'); ?>


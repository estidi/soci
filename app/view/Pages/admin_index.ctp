<div class="pages index">
    <h2><?php echo __('Pages'); ?></h2>
    <table cellpadding="0" cellspacing="0">
        <tr>

            <th><?php echo $this->Paginator->sort('Tytul'); ?></th>
            <th><?php echo $this->Paginator->sort('treść'); ?></th>
            <th class="actions"></th>
        </tr>
        <?php foreach ($pages as $page): ?>
            <tr>
                <td><?php echo h($page['Page']['title']); ?>&nbsp;</td>
                <td>
                    <?php
                    echo $this->Text->truncate(h($page['Page']['body']), 120, array(
                                'ellipsis' => '...',
                                'exact' => false
                            )
                    );
                    ?>&nbsp;</td>
                <td class="actions">
                    <?php echo $this->Html->link(__('Pokaż'), array('action' => 'view', $page['Page']['id'])); ?>
                    <?php echo $this->Html->link(__('Edytuj'), array('action' => 'edit', $page['Page']['id'])); ?>
                    <?php echo $this->Form->postLink(__('Usuń'), array('action' => 'delete', $page['Page']['id']), null, __('Na pewno usunąć# %s?', $page['Page']['title'])); ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <div class="paging">
        <?php
        echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
        echo $this->Paginator->numbers(array('separator' => ''));
        echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
        ?>
    </div>
</div>
<?php echo $this->element('Actions'); ?>

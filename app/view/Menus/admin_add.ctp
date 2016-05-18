<div class="menus form">
    <?php echo $this->Form->create('Menu'); ?>
    <fieldset>
        <legend><?php echo __('Dodaj nowe menu'); ?></legend>

       
        <label for="MenuName">Menu Nadrzędne</label>
        <?php echo $this->Form->select('parent_id', $parentMenus, array('empty' => "Menu Górne"));?>
        <br/>
        <label for="MenuName">Strona</label>
        <?php
        echo $this->Form->select('page_id', $pages, array('empty' => "- - - - - "));
        echo $this->Form->input('name', array('label' => 'Nazwa'));
        echo $this->Form->end(__('Submit'));
        ?>
    </fieldset>

</div>
<?php echo $this->element('Actions'); ?>

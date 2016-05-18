<div class="actions">
    <h3><?php echo __('Powrót na strone'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Powrót'), array('controller' => 'menus','action' => 'view',1,'admin'=>false)); ?></li>
       
  
    </ul>
    <h3><?php echo __('Menu'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Przeglądaj'), array('controller' => 'menus','action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Dodaj nowe'), array('controller' => 'menus', 'action' => 'add')); ?> </li>
  
    </ul>
    <h3><?php echo __('Strony'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Przeglądaj'), array('controller' => 'pages','action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Dodaj nową'), array('controller' => 'pages', 'action' => 'add')); ?> </li>
  
    </ul>
    <h3><?php echo __('Panel boczny'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Przeglądaj'), array('controller' => 'sideboxes','action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Dodaj nowy element'), array('controller' => 'sideboxes', 'action' => 'add')); ?> </li>
  
    </ul>
    <h3><?php echo __('Użytkownicy'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Przeglądaj'), array('controller' => 'users','action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Dodaj nowego'), array('controller' => 'users', 'action' => 'add')); ?> </li>
  
    </ul>    <h3><?php echo __('Wyloguj'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('wyloguj się'), array('controller' => 'users','action' => 'logout')); ?></li>
    </ul>
</div>
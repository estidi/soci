<li class="spacing"><img src="/images/linia-menu-top.jpg"/></li>
<?php
    $topMenu = $this->requestAction('/menus/topMenu');
    
    foreach ($topMenu as $id => $name):
?>
    <li><?php echo $this->Html->link(__($name), array('controller' => 'menus', 'action' => 'view', $id)); ?></li>
    <li class="spacing"><img src="/images/linia-menu-top.jpg"/></li>
<?php endforeach; ?>
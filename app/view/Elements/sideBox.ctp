<?php
$sideboxes = $this->requestAction('/sideboxes/view');

foreach ($sideboxes as $sidebox):
    ?>
    <div class="box">
        <div class="rightBoxTtitle"><p class="rightTitle"><?php echo __($sidebox['Sidebox']['name']); ?></div>

        <p class="boxContent"><?php echo __($sidebox['Sidebox']['context']); ?></p>
    </div>
<?php endforeach; ?>
<?php if(count($this->panellists)): ?>
    <div class="">
        <?php foreach($this->panellists as $panellist): ?>
            <div class="">
                    <?php echo $panellist->email ?>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
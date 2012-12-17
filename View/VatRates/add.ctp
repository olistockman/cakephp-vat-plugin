<div class="vatClass form">
<?php echo $this->Form->create('VatRates'); ?>
	<fieldset>
		<legend><?php echo __('Add Vat Rates'); ?></legend>
            <?php
                    $i = 0;
                    foreach ($classes as $class) {
                        echo $this->element('per_class', array('prefix' => $i, 'class_id' => $class['VatClass']['id'], 'class_name' => $class['VatClass']['name']));
                        $i++;
                    }
            ?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
            <li><?php echo $this->Html->link(__('List Vat Rates'), array('action' => 'index')); ?></li>
        </ul>
</div>
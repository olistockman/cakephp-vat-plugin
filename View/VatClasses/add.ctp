<div class="vatClass form">
<?php echo $this->Form->create('VatClass'); ?>
	<fieldset>
		<legend><?php echo __('Add Vat Class'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('code');
		echo $this->Form->input('country_code',array('type' => 'select', 'options' => $this->Geography->countries, 'default' => ''));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
            <li><?php echo $this->Html->link(__('List Vat Class'), array('action' => 'admin_index')); ?></li>
        </ul>
</div>
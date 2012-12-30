<?php
    echo '<h2>' . $class_name . '</h2>' . "\n";
    echo $this->Form->input('VatRate.' . $prefix . '.vat_class_id', array('type' => 'hidden', 'value' => $class_id));
    echo $this->Form->input('VatRate.' . $prefix . '.rate');
    echo $this->Form->input('VatRate.' . $prefix . '.start_date');
    echo '<br />';
?>
<?php

$variable_arr = array("Mobile", "Name", "Amount", "Due", "Etc");
$variable_str = '<select name="Variable" id="drp_dwn">';            
$variable_str .= '<option selected>&ltSelect Data&gt</option>';

foreach($variable_arr as $variable)
{
    $variable_str .= '<option value="'. $variable .'">&lt'.$variable.'&gt</option>';
}

$variable_str .= '</select>';

?>
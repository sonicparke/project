<?php
function get_autocomplete_result($value) {
  global $result_array;
  $result_array[] = array('value' => $value, 'label' => $value);
}

function get_autocomplete_result_name($id, $value) {
  global $result_array;
  $result_array[] = array('id' => (int) $id, 'value' => $value, 'label' => $value);
}
?>

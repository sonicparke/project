<?php
function get_autocomplete_result($name, $id) {
  global $result_array;
  $result_array[] = array('value' => $id, 'label' => $name);
}

function get_result($id, $name) {
  global $result_array;
  $result_array[$id] = $name;
}
?>

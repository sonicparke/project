<?php
function stripslashes_deep($value) {
  return is_array($value) ? array_map('stripslashes_deep', $value) : stripslashes($value);
}

function fix_gpc_vars() {
  if (get_magic_quotes_gpc()) {
    foreach (array('_GET', '_POST', '_REQUEST', '_COOKIE', '_ENV') as $globalkey) {
      foreach ($GLOBALS[$globalkey] as $key => $value) {
        $GLOBALS[$globalkey][$key] = stripslashes_deep($value);
      }
    }
  }
}
?>

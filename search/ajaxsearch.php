<?php
error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', TRUE);
ini_set('html_errors', FALSE);

// $category = @$_REQUEST['category'];
$category = NULL;
$field = @$_REQUEST['field'];
$term = @$_REQUEST['term'];

$field_parts = explode('_', $field, 2);
if (count($field_parts) === 2) {
  list ($category, $field) = $field_parts;
}

// echo "\$category=$category, \$field=$field, \$term=$term\n";

$goodsearch = FALSE;

if (in_array($category, array('vendor', 'show', 'product'))) {
  if ($category === 'vendor') {
    if (in_array($field, array('name', 'city', 'state', 'country'))) {
      $goodsearch = TRUE;
    }
  } elseif ($category === 'show') {
    // echo "$category is show!\n";
    if (in_array($field, array('name', 'city'))) {
      $goodsearch = TRUE;
    // } else {
    //   echo "$field is not name or city\n";
    }
  } elseif ($category === 'product') {
    if (in_array($field, array('name'))) {
      $goodsearch = TRUE;
    }
  }
  $term = "%$term%";
}

$result_array = array();
if ($goodsearch) {
  require_once('../inc/db.inc.php');
  require_once('../inc/search.inc.php');
  if (@$_REQUEST['format'] === 'debug') {
    header('Content-Type: text/plain');
  } else {
    header('Content-Type: application/json');
  }
  if ($field === 'name') {
    $query = "SELECT `id`, `$field` FROM `${category}s` WHERE `$field` LIKE :term";
    $func = 'get_autocomplete_result_name';
  } else {
    $query = "SELECT DISTINCT `$field` FROM `${category}s` WHERE `$field` LIKE :term";
    $func = 'get_autocomplete_result';
  }
  // echo "$query\n";
  $stmt = $pdo->prepare($query);
  $stmt->bindParam(":term", $term);
  $stmt->execute();
  $result = $stmt->fetchAll(PDO::FETCH_FUNC, $func);
}

if (@$_REQUEST['format'] === 'debug') {
  echo var_export($result_array, TRUE) . "\n";
} else {
  echo json_encode($result_array) . "\n";
}

?>

<?php
error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', TRUE);
ini_set('html_errors', FALSE);

$show_id = (int) @$_REQUEST['show_id'];
$show_name = @$_REQUEST['show_name'];
$show_city = @$_REQUEST['show_city'];

$vendor_id = (int) @$_REQUEST['vendor_id'];
$vendor_name = @$_REQUEST['vendor_name'];
$vendor_city = @$_REQUEST['vendor_city'];
$vendor_state = @$_REQUEST['vendor_state'];
$vendor_country = @$_REQUEST['vendor_country'];

$product_id = (int) @$_REQUEST['product_id'];
$product_name = @$_REQUEST['product_name'];

if ($show_id or $vendor_id or $product_id or "$show_name$show_city$vendor_name$vendor_city$vendor_state$vendor_country$product_name") {
  require_once('../inc/db.inc.php');
  require_once('../inc/search.inc.php');
  if (@$_REQUEST['format'] === 'debug') {
    header('Content-Type: text/plain');
  } else {
    header('Content-Type: application/json');
  }

  // $query = 'SELECT `vendors`.`id` AS `vendor_id`, `vendors`.`name` AS `vendor_name`, `shows`.`id` AS `show_id`, `shows`.`name` AS `show_name`, `products`.`id` AS `product_id`, `products`.`name` AS `product_name` FROM `vendors` LEFT JOIN `vendors_shows` ON `vendors`.`id` = `vendors_shows`.`vendor_id` LEFT JOIN `shows` ON `vendors_shows`.`show_id` = `shows`.`id` LEFT JOIN `vendors_products` ON `vendors`.`id` = `vendors_products`.`vendor_id` LEFT JOIN `products` ON `vendors_products`.`product_id` = `products`.`id`';
  $query = 'SELECT `vendors`.`id` AS `vendor_id`, `vendors`.`name` AS `vendor_name`, `vendors`.`phone` AS `vendor_phone`, `vendors`.`url` AS `vendor_url` FROM `vendors` LEFT JOIN `vendors_shows` ON `vendors`.`id` = `vendors_shows`.`vendor_id` LEFT JOIN `shows` ON `vendors_shows`.`show_id` = `shows`.`id` LEFT JOIN `vendors_products` ON `vendors`.`id` = `vendors_products`.`vendor_id` LEFT JOIN `products` ON `vendors_products`.`product_id` = `products`.`id`';

  $where = $params = array();

  if ($show_id) {
    $where[] = "`shows`.`id` = :show_id";
    $params[] = 'show_id';
  } else {
    if ($show_name) {
      $where[] = "`shows`.`name` LIKE :show_name";
      $params[] = 'show_name';
      $show_name = "%$show_name%";
    }
  }

  if ($product_id) {
    $where[] = "`products`.`id` = :product_id";
    $params[] = 'product_id';
  } else {
    if ($product_name) {
      $where[] = "`products`.`name` LIKE :product_name";
      $params[] = 'product_name';
      $product_name = "%$product_name%";
    }
  }

  if ($vendor_id) {
    $where[] = "`vendors`.`id` = :vendor_id";
    $params[] = 'vendor_id';
  } else {
    if ($vendor_name) {
      $where[] = "`vendors`.`name` LIKE :vendor_name";
      $params[] = 'vendor_name';
      $vendor_name = "%$vendor_name%";
    }
    if ($vendor_city) {
      $where[] = "`vendors`.`city` LIKE :vendor_city";
      $params[] = 'vendor_city';
      $vendor_city = "%$vendor_city%";
    }
    if ($vendor_state) {
      $where[] = "`vendors`.`state` LIKE :vendor_state";
      $params[] = 'vendor_state';
      $vendor_state = "%$vendor_state%";
    }
    if ($vendor_country) {
      $where[] = "`vendors`.`country` LIKE :vendor_country";
      $params[] = 'vendor_country';
      $vendor_country = "%$vendor_country%";
    }
  }

  if ($where) {
    $where = implode(' AND ', $where);
    $query .= " WHERE $where";
    $query .= ' GROUP BY `vendors`.`name` ORDER BY `vendors`.`name`';

    $stmt = $pdo->prepare($query);
    foreach ($params as $param) {
      $stmt->bindParam(":$param", $$param);
    }

    $stmt->execute();
    $result_array = array();
    $result_array = $stmt->fetchAll();

    // Clean out all the numeric keys, since we dont' need them.
    foreach (array_keys($result_array) as $result_key) {
      foreach (array_keys($result_array[$result_key]) as $key) {
        if (is_int($key)) {
          unset($result_array[$result_key][$key]);
        } elseif (substr($key, -3) === '_id') {
          // Make IDs numeric.
          $result_array[$result_key][$key] = (int) $result_array[$result_key][$key];
        }
      }
    }

    $result_array = array('items' => $result_array);

    if (@$_REQUEST['format'] === 'debug') {
      echo var_export($result_array, TRUE) . "\n";
    } else {
      echo json_encode($result_array) . "\n";
    }
  }
}
?>

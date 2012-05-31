<?php
error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', TRUE);
ini_set('html_errors', FALSE);

$show_id = @$_REQUEST['show_id'];
$show_name_search = @$_REQUEST['show_name_search'];
$show_city_search = @$_REQUEST['show_city_search'];

$vendor_id = @$_REQUEST['vendor_id'];
$vendor_name_search = @$_REQUEST['vendor_name_search'];
$vendor_city_search = @$_REQUEST['vendor_city_search'];
$vendor_state_search = @$_REQUEST['vendor_state_search'];
$vendor_country_search = @$_REQUEST['vendor_country_search'];

$product_id = @$_REQUEST['product_id'];
$product_name_search = @$_REQUEST['product_name_search'];

if ($show_id or $vendor_id or $product_id or "$show_name_search$show_city_search$vendor_name_search$vendor_city_search$vendor_state_search$vendor_country_search$product_name_search") {
  require_once('../inc/db.inc.php');
  require_once('../inc/search.inc.php');
  if (@$_REQUEST['format'] === 'debug') {
    header('Content-Type: text/plain');
  } else {
    header('Content-Type: application/json');
  }

  $query = 'SELECT `vendors`.`id` AS `vendor_id`, `vendors`.`name` AS `vendor_name`, `shows`.`id` AS `show_id`, `shows`.`name` AS `show_name`, `products`.`id` AS `product_id`, `products`.`name` AS `product_name` FROM `vendors` LEFT JOIN `vendors_shows` ON `vendors`.`id` = `vendors_shows`.`vendor_id` LEFT JOIN `shows` ON `vendors_shows`.`show_id` = `shows`.`id` LEFT JOIN `vendors_products` ON `vendors`.`id` = `vendors_products`.`vendor_id` LEFT JOIN `products` ON `vendors_products`.`product_id` = `products`.`id`';

  $where = $params = array();

  if ($show_id) {
    $where[] = "`shows`.`id` = :show_id";
    $params[] = 'show_id';
  } else {
    if ($show_name_search) {
      $where[] = "`shows`.`name` LIKE :show_name_search";
      $params[] = 'show_name_search';
      $show_name_search = "%$show_name_search%";
    }
  }

  if ($product_id) {
    $where[] = "`products`.`id` = :product_id";
    $params[] = 'product_id';
  } else {
    if ($product_name_search) {
      $where[] = "`products`.`name` LIKE :product_name_search";
      $params[] = 'product_name_search';
      $product_name_search = "%$product_name_search%";
    }
  }

  if ($vendor_id) {
    $where[] = "`vendors`.`id` = :vendor_id";
    $params[] = 'vendor_id';
  } else {
    if ($vendor_name_search) {
      $where[] = "`vendors`.`name` LIKE :vendor_name_search";
      $params[] = 'vendor_name_search';
      $vendor_name_search = "%$vendor_name_search%";
    }
    if ($vendor_city_search) {
      $where[] = "`vendors`.`city` LIKE :vendor_city_search";
      $params[] = 'vendor_city_search';
      $vendor_city_search = "%$vendor_city_search%";
    }
    if ($vendor_state_search) {
      $where[] = "`vendors`.`state` LIKE :vendor_state_search";
      $params[] = 'vendor_state_search';
      $vendor_state_search = "%$vendor_state_search%";
    }
    if ($vendor_country_search) {
      $where[] = "`vendors`.`country` LIKE :vendor_country_search";
      $params[] = 'vendor_country_search';
      $vendor_country_search = "%$vendor_country_search%";
    }
  }

  if ($where) {
    $where = implode(' AND ', $where);
    $query .= " WHERE $where";

    $stmt = $pdo->prepare($query);
    foreach ($params as $param) {
      $stmt->bindParam(":$param", $$param);
    }

    $stmt->execute();
    // $result = $stmt->fetchAll(PDO::FETCH_FUNC, 'get_result');
    $result = $stmt->fetchAll();
    if (@$_REQUEST['format'] === 'debug') {
      echo var_export($result, TRUE) . "\n";
    } else {
      echo json_encode($result) . "\n";
    }
  }
}
?>

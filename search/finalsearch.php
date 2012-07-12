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

$get_all = @$_REQUEST['get_all'];
$popup = @$_REQUEST['popup'];

$result_array = array();

if ($get_all and in_array($get_all, array('show', 'vendor', 'product'))) {
  require_once('../inc/db.inc.php');
  if ($get_all === 'show' or $get_all === 'product') {
    if ($vendor_id) {
      if ($get_all === 'show') {
        $query = "SELECT `id` AS `${get_all}_id`, `name` AS `${get_all}_name`, (SELECT `booth_num` FROM `vendors_shows` WHERE `vendor_id` = $vendor_id AND `show_id` = `shows`.`id`) AS `booth_num`, (SELECT `booth_num` IS NOT NULL FROM `vendors_shows` WHERE `vendor_id` = $vendor_id AND `show_id` = `shows`.`id`) AS `checked` FROM `shows` WHERE ! `deleted` ORDER BY `name`";
      } else {
        $query = "SELECT `id` AS `${get_all}_id`, `name` AS `${get_all}_name`, (SELECT COUNT(*) FROM `vendors_${get_all}s` WHERE `vendor_id` = $vendor_id AND `${get_all}_id` = `${get_all}s`.`id`) AS `checked` FROM `${get_all}s` WHERE ! `deleted` ORDER BY `name`";
      }
    } else {
      $query = "SELECT `id` AS `${get_all}_id`, `name` AS `${get_all}_name` FROM `${get_all}s` WHERE ! `deleted` ORDER BY `name`";
    }
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $result_array = array();
    $result_array = $stmt->fetchAll();
  } elseif ($get_all === 'vendor') {
    $query = "SELECT `vendors`.`id` AS `vendor_id`, `name` AS `vendor_name`, `address` AS `vendor_address`, `city` AS `vendor_city`, `state` AS `vendor_state`, `zip` AS `vendor_zip`, `country` AS `vendor_country`, `phone` AS `vendor_phone`, `fax` AS `vendor_fax`, `email` AS `vendor_email`, `url` AS `vendor_url`, `level` AS `vendor_level`, (SELECT GROUP_CONCAT(`product_id` ORDER BY `product_id` SEPARATOR \",\") FROM `vendors_products` WHERE `vendor_id` = `vendors`.`id`) AS `vendor_product_ids` FROM `${get_all}s` WHERE ! `deleted` ORDER BY `name`";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $result_array = array();
    $result_array = $stmt->fetchAll();
    foreach ($result_array as $key => $value) {
      $product_list = $value['vendor_product_ids'];
      if (strpos($product_list, ',')) {
        $product_list = explode(',', $product_list);
        foreach ($product_list as $product_key => $product_value) {
          $product_list[$product_key] = (int) $product_value;
        }
        $result_array[$key]['vendor_product_ids'] = $product_list;
      } else {
        $result_array[$key]['vendor_product_ids'] = array();
      }
    }
  }
} elseif ($popup and in_array($popup, array('vendor'))) {
  require_once('../inc/db.inc.php');
  if ($popup === 'vendor' and $vendor_id) {
    $query = "SELECT `vendors`.`id` AS `vendor_id`, `name` AS `vendor_name`, `address` AS `vendor_address`, `city` AS `vendor_city`, `state` AS `vendor_state`, `zip` AS `vendor_zip`, `country` AS `vendor_country`, `phone` AS `vendor_phone`, `fax` AS `vendor_fax`, `email` AS `vendor_email`, `url` AS `vendor_url`, `level` AS `vendor_level` FROM `vendors` WHERE `vendors`.`id` = :vendor_id /* " . __FILE__ . ':' . __LINE__ . ' */';
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':vendor_id', $vendor_id, PDO::PARAM_INT);
    $stmt->execute();
    $vendor_id = (int) $vendor_id;
    $result_array = array();
    if ($result_array = $stmt->fetch(PDO::FETCH_ASSOC)) {
      $result_array['vendor_id'] = (int) $result_array['vendor_id'];
      $query = "SELECT `shows`.`id` AS `show_id`, `shows`.`name` AS `show_name`, `vendors_shows`.`booth_num` FROM `vendors_shows` LEFT JOIN `shows` ON `vendors_shows`.`show_id` = `shows`.`id` WHERE `vendors_shows`.`vendor_id` = :vendor_id AND ! `shows`.`deleted` ORDER BY `shows`.`name` /* " . __FILE__ . ':' . __LINE__ . ' */';
      $stmt = $pdo->prepare($query);
      $stmt->bindParam(':vendor_id', $vendor_id, PDO::PARAM_INT);
      $stmt->execute();
      $vendor_id = (int) $vendor_id;
      $result_array['shows'] = array();
      while ($result_show = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $result_show['show_id'] = (int) $result_show['show_id'];
        $result_array['shows'][] = $result_show;
      }
      $result_array = array($result_array);
    }
  }
} elseif ($show_id or $vendor_id or $product_id or "$show_name$show_city$vendor_name$vendor_city$vendor_state$vendor_country$product_name") {
  require_once('../inc/db.inc.php');
  require_once('../inc/search.inc.php');

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

    foreach ($params as $param) {
      if (substr($param, -3) === '_id') {
        $$param = (int) $$param;
      }
    }

  }
}

// Clean out all the numeric keys, since we dont' need them.
if (!$popup) {
  foreach (array_keys($result_array) as $result_key) {
    foreach (array_keys($result_array[$result_key]) as $key) {
      if (is_int($key)) {
        unset($result_array[$result_key][$key]);
      } elseif ($key === 'checked') {
        $result_array[$result_key][$key] = (bool) $result_array[$result_key][$key];
      } elseif (substr($key, -3) === '_id') {
        // Make IDs numeric.
        $result_array[$result_key][$key] = (int) $result_array[$result_key][$key];
      }
    }
  }
}

$result_array = array('items' => $result_array);

if (@$_REQUEST['format'] === 'debug') {
  header('Content-Type: text/plain');
  echo var_export($result_array, TRUE) . "\n";
} else {
  header('Content-Type: application/json');
  echo json_encode($result_array) . "\n";
}
?>

<?php
error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', TRUE);
ini_set('html_errors', FALSE);

$category = $action = $id = NULL;

if (in_array(@$_REQUEST['category'], array('vendor', 'product', 'show'))) {
  $category = $_REQUEST['category'];
} else {
  die('Must send category');
}

if (in_array(@$_REQUEST['action'], array('create', 'update', 'delete'))) {
  $action = $_REQUEST['action'];
} else {
  die('Must send action');
}

if (is_numeric(@$_REQUEST[$category . '_id'])) {
  $id = (int) $_REQUEST[$category . '_id'];
}

if ($action === 'update' or $action === 'delete') {
  if (!$id) die("Must send ${category}_id");
} elseif ($action === 'create') {
  if ($id) die("Must not send ${category}_id");
}

require_once('../inc/db.inc.php');

if ($action === 'delete') {
  $query = "UPDATE `${category}s` SET `deleted` = TRUE WHERE `id` = :id";
  $stmt = $pdo->prepare($query);
  $stmt->bindParam(':id', $id, PDO::PARAM_INT);
  if ($stmt->execute()) {
    if ($stmt->rowCount() === 1) {
      $return = array('error' => FALSE);
    } else {
      $return = array('error' => TRUE, 'error_info' => ucfirst($category) . ' not found');
    }
  } else {
    $error_info = $stmt->errorInfo();
    $return = array('error' => TRUE, 'error_info' => $error_info[2]);
  }
} else {
  $param_names = array(
                       'vendor' => array('name', 'first_name', 'address', 'city', 'state', 'zip', 'country', 'phone', 'fax', 'email', 'url'),
                       'show' => array('name'),
                       'product' => array('name')
                       );

  if ($action === 'create' or $action === 'update') {
    $set_params = $bind_params = array();
    foreach ($param_names[$category] as $param_name) {
      $full_param_name = $category . '_' . $param_name;
      $$full_param_name = @$_REQUEST[$full_param_name];
      if ($action === 'create' or array_key_exists($full_param_name, $_REQUEST)) {
        $set_params[] = "`$param_name` = :$full_param_name";
        $bind_params[$full_param_name] = PDO::PARAM_STR;
      }
    }
    $set_params = implode(', ', $set_params);
    if ($action === 'create') {
      $query = "INSERT INTO `${category}s` SET $set_params";
    } elseif ($action === 'update') {
      $query = "UPDATE `${category}s` SET $set_params WHERE `id` = :id";
      $bind_params['id'] = PDO::PARAM_INT;
    }
    $stmt = $pdo->prepare($query);
    foreach ($bind_params as $bind_param_name => $bind_param_type) {
      $stmt->bindParam(":$bind_param_name", $$bind_param_name, $bind_param_type);
    }
    if ($stmt->execute()) {
      if ($stmt->rowCount() === 1) {
        $return = array('error' => FALSE);
        if ($id = (int) $pdo->lastInsertId()) $return["${category}_id"] = $id;
      } else {
        $return = array('error' => TRUE, 'error_info' => ucfirst($category) . ' already exists');
      }
    } else {
      $error_info = $stmt->errorInfo();
      $return = array('error' => TRUE, 'error_info' => $error_info[2]);
    }
  } else {
    die("Can't do $action yet.\n");
  }
}

if (@$_REQUEST['format'] === 'debug') {
  header('Content-Type: text/plain');
  echo var_export($return, TRUE) . "\n";
} else {
  header('Content-Type: application/json');
  echo json_encode($return) . "\n";
}
?>

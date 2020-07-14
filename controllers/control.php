<?php
header('Content-Type: application/json');
include_once __DIR__ . '/../models/model.php';

  if($_REQUEST['action'] === 'index') {
    $all_content = Kelc::all();
    // echo "Index route.";
    echo json_encode($all_content);
  } elseif ($_REQUEST['action'] === 'create') {
    $request_body = file_get_contents('php://input');
    $body_object = json_decode($request_body);

    $new_item = new Kelc($body_object->name, $body_object->image, $body_object->description);
    $all_content = Kelc::create($new_item);

    echo json_encode($all_content);
  } else if ($_REQUEST['action'] === 'update'){
    $request_body = file_get_contents('php://input');
    $body_object = json_decode($request_body);

    $updated_item = new Kelc($_REQUEST["id"], $body_object->name, $body_object->image, $body_object->description);
    $all_content = Kelc::update($updated_item);

    echo json_encode($all_content);
  } else if ($_REQUEST['action'] === 'delete') {
    $all_content = Kelc::delete($_REQUEST["id"]);

    echo json_encode($all_content);
  }

 ?>
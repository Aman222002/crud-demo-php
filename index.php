<?php

include_once "./autoload.php";
$streamInput = file_get_contents("php://input");

if (strpos($streamInput, ":")) {
  $jsonData = true;
} else {
  $jsonData = false;
}
$user = new pdo1();
$action = 'unknown';
$request = $jsonData ? json_decode($streamInput, 1) : $_REQUEST;
if (isset($request['action'])) {
  $action = trim($request['action']);
  unset($request['action']);
}
$result = [];
switch ($action) {
  case 'getUser':
    $result = $user->getAll(['name','email'],['name'=>'Vijay@123']);
    break;
  case 'deleteUser':
    $result = $user->delete($request);
    break;
  case 'updateUser':
    $result = $user->update($request);
    break;
  case 'addUser':
    $result = $user->insert($request);
    break;
  default:
    invalidQuery();
}
if(is_array($result)){
  header("Content-Type: application/json");
  echo json_encode($result);
  exit();
}else{
  echo $result;
  exit();
}

function invalidQuery($message=null){
  http_response_code(201);
  $response=new stdClass();
  $response->code=203;
  $response->responseDescription=$message?$message:'invalid request';
  return (array)$response;
}
//$users = $user->getAll( ['name', 'email'], ['name' => 'manu']);

//$users2= $user->update(['email'=>'manu123@gmail.com '],['id'=>'15']);
//$users3 = $user->insert( ['email' => 'aaabc@gmail.com', 'phone' => '123456789']);
 //print_r($users);

 //$action = $_REQUEST['action'];

//switch ($action) {
   // case 'addUser':
      //  $data = $_REQUEST;
      //  unset($data['action']);
        //$reponse = $user->create($data);
      //  break;
//}
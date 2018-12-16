<?php
header('Content-Type: application/json; charset=utf-8');

$response = array();
$response['status'] = 'bad';

if(!empty($_FILES['file']['tmp_name'])){
  for($key = 0; $key < count($_FILES['file']['tmp_name']); $key++){
    $upload_path = "../../img/";
    $user_filename = $_FILES['file']['name'][$key];
    $userfile_basename = pathinfo($user_filename, PATHINFO_FILENAME);
    $userfile_extension = pathinfo($user_filename, PATHINFO_EXTENSION);

    $server_filename = $userfile_basename . '.' . $userfile_extension;
    $server_filepath = $upload_path . $server_filename;
    $i = 0;
    while (file_exists($server_filepath)) {
      $i++;
      $server_filename = $userfile_basename . "($i)." . $userfile_extension;
      $server_filepath = $upload_path .   $server_filename;
    }
    if(copy($_FILES['file']['tmp_name'][$key], $server_filepath)){
      $response['files'][] =  "/img/" .   $server_filename;
      $response['status'] = 'ok';
    }
  }
}
echo json_encode($response);

?>

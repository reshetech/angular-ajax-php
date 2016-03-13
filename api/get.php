<?php
require 'functions.php';

$connect = connect();

// Get the data
$users = array();
$sql = "SELECT id, name, nickName FROM users WHERE 1";

if($result = mysqli_query($connect,$sql))
{
  $count = mysqli_num_rows($result);

  $cr = 0;
  while($row = mysqli_fetch_assoc($result))
  {
      $users[$cr]['id']       = $row['id'];
      $users[$cr]['name']     = $row['name'];
      $users[$cr]['nickName'] = $row['nickName'];

      $cr++;
  }
}

$json = json_encode($users);
echo $json;
exit;

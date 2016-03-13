<?php
require 'functions.php';

$connect = connect();

/**Delete*/
$postdata = file_get_contents("php://input");
if(isset($postdata) && !empty($postdata))
{
    $request = json_decode($postdata);

  	$userId  = (int)mysqli_real_escape_string($connect,$request->userId);

  	$sql = "DELETE FROM `users` WHERE `id` = " . $userId;

    mysqli_query($connect,$sql);
}
